<?php

namespace App\Http\Controllers;

use App\Models\Jadwal;
use App\Models\KotaKeberangkatan;
use App\Models\KotaTujuan;
use App\Models\Pemesanan;
use App\Models\Pengiriman;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PemesananController extends Controller
{
    public function create(Request $request)
    {
        if (request()->has('jadwal_id')) {
            return $this->step2($request);
        }
        return $this->step1($request);
    }

    private function step2($request)
    {
        $jadwal = Jadwal::where('id', $request->jadwal_id)->first();
        return view('pemesanan.step2', compact(
            'jadwal',
        ));
    }

    private function step1($request)
    {

        $items = [];

        if ($request->has('submit') && request()->get('submit')) {

            $query = Jadwal::query();

            if (request()->has('bulan_tahun')) {
                $bulanTahun = request()->get('bulan_tahun');
                $bulan = date("m", strtotime("{$bulanTahun}-01"));
                $tahun = date("Y", strtotime("{$bulanTahun}-01"));

                $query->where(DB::raw('MONTH(tanggal)'), '=', intval($bulan))
                    ->where(DB::raw('YEAR(tanggal)'), '=', intval($tahun));
            }

            if (request()->has('kota_keberangkatan')) {
                $kota = request()->get('kota_keberangkatan');
                $query->where('kota_keberangkatan_id', '=', $kota);
            }

            if (request()->has('kota_tujuan')) {
                $kota = request()->get('kota_tujuan');
                $query->where('kota_tujuan_id', '=', $kota);
            }

            $items = $query->get();
        }

        $kotaKeberangkatans = KotaKeberangkatan::get();
        $kotaTujuans = KotaTujuan::get();

        return view('pemesanan.step1', compact(
            'items',
            'kotaKeberangkatans',
            'kotaTujuans',
        ));
    }


    public function store(Request $request)
    {
        $request->validate([
            'jadwal_id' => 'required',
            'jenis_layanan' => 'required',
            'jenis_pembayaran' => 'required',
        ]);

        if ($request->jenis_layanan == 'travel') {
            $request->validate([
                'jumlah_kursi' => 'required',
                'nomor_telepon' => 'required',
                'lokasi_penjemputan' => 'required',
                'lokasi_pengantaran' => 'required'
            ]);
        } else {
            $request->validate([
                'nomor_telepon' => 'required',
                'lokasi_penjemputan' => 'required',
                'lokasi_pengantaran' => 'required'
            ]);
        }

        try {
            DB::beginTransaction();
            $jadwal = Jadwal::find($request->jadwal_id);
            $payload = $request->all();
            $payload['status'] = 'pending';
            if ($request->jenis_layanan == 'travel') {
                if ($jadwal->sisa_kuota <= 0) {
                    session()->flash('error', 'Kuota habis');
                    return redirect()->back()->withInput();
                }
                $payload['customer_id'] = auth()->user()->customer->id;
                $payload['ref_code'] = "TRX-" . (random_int(1, 9) * time());
                $payload['jumlah_bayar'] = $request->jumlah_kursi * $jadwal->harga_travel;
                if ($payload['jenis_pembayaran'] == 'tf') {
                    if ($jadwal->travels()->count() == 0) {
                        $payload['bisa_bayar'] = 1;
                    }
                } else {
                    $payload['bisa_bayar'] = 0;
                    $payload['status'] = 'butuh konfirmasi';
                }
                $payload['waktu_mulai_bayar'] = date('H:i:s', strtotime($jadwal->estimasiPembayaran));
                $payload['waktu_selesai_bayar'] = date('H:i:s', strtotime($jadwal->estimasiPembayaran . " + 10 minutes"));
                $success = Pemesanan::create($payload);
                DB::commit();
                return redirect()->route("pemesanan.show", $success);
            } else {
                $payload['customer_id'] = auth()->user()->customer->id;
                $payload['ref_code'] = "TRX-" . (random_int(1, 9) * time());
                $payload['jumlah_bayar'] = $jadwal->harga_barang;
                if ($payload['jenis_pembayaran'] == 'cash')
                    $payload['status'] = 'butuh konfirmasi';
                $success = Pengiriman::create($payload);
                DB::commit();
                return redirect()->route("pemesanan.show-barang", $success);
            }
        } catch (\Throwable $th) {
            session()->flash('error', $th->getMessage());
            return redirect()->back()->withInput();
        }
    }

    public function show(Pemesanan $pemesanan)
    {
        return view('pemesanan.show', compact('pemesanan'));
    }

    public function showBarang(Pengiriman $pemesanan)
    {
        return view('pemesanan.show-barang', compact('pemesanan'));
    }

    public function bayar(Request $request, Pemesanan $pemesanan)
    {
        $request->validate([
            'file' => 'required'
        ]);

        $file = $request->file('file');
        $filename = time() . "_" . $file->getClientOriginalName();
        $path = base_path('public/uploads');
        if (!file_exists($path)) {
            mkdir($path, 0777, true);
        }

        $file->move($path, $filename);

        $pemesanan->update([
            'bukti_bayar' => $filename,
            'status' => 'butuh konfirmasi',
            'bisa_bayar' => 0
        ]);

        return redirect()->back();
    }

    public function bayarBarang(Request $request, Pengiriman $pemesanan)
    {
        $request->validate([
            'file' => 'required'
        ]);

        $file = $request->file('file');
        $filename = time() . "_" . $file->getClientOriginalName();
        $path = base_path('public/uploads');
        if (!file_exists($path)) {
            mkdir($path, 0777, true);
        }

        $file->move($path, $filename);

        $pemesanan->update([
            'bukti_bayar' => $filename,
            'status' => 'butuh konfirmasi',
            'bisa_bayar' => 0
        ]);

        return redirect()->back();
    }

    public function index(Request $request, $status = null)
    {
        $query = Pemesanan::query()->where('customer_id', '=', auth()->user()->customer->id);
        $status = $request->get('status');
        if ($status) {
            if ($status == "pending")
                $query->whereStatus($status);
            else
                $query->whereIn('status', ['butuh konfirmasi', 'lunas']);
        }
        $pemesanan = $query->get();

        $query = Pengiriman::query()->where('customer_id', '=', auth()->user()->customer->id);
        if ($status) {
            if ($status == "pending")
                $query->whereStatus($status);
            else
                $query->whereIn('status', ['butuh konfirmasi', 'lunas']);
        }
        $pengiriman = $query->get();

        return view('pemesanan.index', compact('pemesanan', 'pengiriman'));
    }
}
