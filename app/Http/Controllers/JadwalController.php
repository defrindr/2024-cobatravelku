<?php

namespace App\Http\Controllers;

use App\Models\Jadwal;
use App\Models\KotaKeberangkatan;
use App\Models\KotaTujuan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class JadwalController extends Controller
{

  public function index(Request $request)
  {
    $query = Jadwal::query();

    $paginate = $query->paginate();
    return view('jadwal.index', compact('paginate'));
  }


  public function create()
  {
    $kotaTujuans = KotaTujuan::all();
    $kotaKeberangkatans = KotaKeberangkatan::all();
    return view('jadwal.create', compact('kotaTujuans', 'kotaKeberangkatans'));
  }

  public function store(Request $request)
  {
    $request->validate([
      'nomor_polisi' => 'required',
      'jenis_mobil' => 'required',
      'kuota' => 'required',
      'harga_travel' => 'required',
      'harga_barang' => 'required',
      'tanggal' => 'required',
      'jam_berangkat' => 'required',
      'kota_keberangkatan_id' => 'required',
      'kota_tujuan_id' => 'required',
    ]);

    try {
      $payload = $request->all();
      $payload['sisa_kuota'] = $payload['kuota'];
      $jadwal = Jadwal::create($payload);
      session()->flash('success', 'Berhasil menambahkan jadwal');
      return redirect()->route('jadwal.show', compact('jadwal'));
    } catch (\Throwable $th) {
      session()->flash('error', $th->getMessage());
      return redirect()->back()->withInput();
    }
  }

  public function edit(Jadwal $jadwal)
  {
    $kotaTujuans = KotaTujuan::all();
    $kotaKeberangkatans = KotaKeberangkatan::all();
    return view('jadwal.edit', compact('kotaTujuans', 'kotaKeberangkatans', 'jadwal'));
  }

  public function update(Request $request, Jadwal $jadwal)
  {
    $request->validate([
      'nomor_polisi' => 'required',
      'jenis_mobil' => 'required',
      // 'kuota' => 'required',
      'harga_travel' => 'required',
      'harga_barang' => 'required',
      'tanggal' => 'required',
      'jam_berangkat' => 'required',
      'kota_keberangkatan_id' => 'required',
      'kota_tujuan_id' => 'required',
    ]);

    try {
      $payload = $request->all();
      $payload['sisa_kuota'] = $payload['kuota'];
      $jadwal->update($request->all());
      session()->flash('success', 'Berhasil mengubah jadwal');
      return redirect()->route('jadwal.show', compact('jadwal'));
    } catch (\Throwable $th) {
      session()->flash('error', $th->getMessage());
      return redirect()->back()->withInput();
    }
  }

  public function show(Jadwal $jadwal)
  {
    return view('jadwal.show', compact('jadwal'));
  }

  public function destroy(Jadwal $jadwal)
  {
    $jadwal->delete();
    session()->flash('success', 'Berhasil dihapus');
    return redirect()->route('jadwal.index');
  }
}
