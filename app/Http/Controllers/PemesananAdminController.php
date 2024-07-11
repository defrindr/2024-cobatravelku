<?php

namespace App\Http\Controllers;

use App\Models\Jadwal;
use App\Models\KotaKeberangkatan;
use App\Models\KotaTujuan;
use App\Models\Pemesanan;
use App\Models\Pengiriman;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PemesananAdminController extends Controller
{
    public function show(Pemesanan $pemesanan)
    {
        return view('pemesanan-admin.show', compact('pemesanan'));
    }
    public function showBarang(Pengiriman $pemesanan)
    {
        return view('pemesanan-admin.show-barang', compact('pemesanan'));
    }

    public function index(Request $request)
    {
        $query = Pemesanan::query()->orderBy('id', 'desc');
        $status = request()->get('status_pemesanan');
        if ($status) $query->whereStatus($status);
        else $query->where('status', '!=', 'pending');
        $pemesanan = $query->get();

        $query = Pengiriman::query()->orderBy('id', 'desc');
        $status = request()->get('status_pengiriman');
        if ($status) $query->whereStatus($status);
        else $query->where('status', '!=', 'pending');
        $pengiriman = $query->get();

        return view('pemesanan-admin.index', compact('pemesanan', 'pengiriman'));
    }

    public function konfirmasi(Request $request, Pemesanan $pemesanan)
    {
        DB::beginTransaction();
        try {
            $pemesanan->update(['status' => 'lunas']);
            $jadwal = $pemesanan->jadwal;

            $confirmedOrder = $jadwal->travels()->where(['status' => 'lunas'])->count();
            $sisa = $jadwal->kuota - $confirmedOrder;
            $jadwal->update(['sisa_kuota' => $sisa]);

            if ($sisa == 0) {
                $jadwal->travels()->where(['status' => 'pending'])->delete();
            }
        } catch (\Throwable $th) {
            //throw $th;
        }

        return view('pemesanan-admin.show', compact('pemesanan'));
    }
    public function konfirmasiBarang(Request $request, Pengiriman $pemesanan)
    {
        $pemesanan->update(['status' => 'lunas']);
        return view('pemesanan-admin.show-barang', compact('pemesanan'));
    }
}
