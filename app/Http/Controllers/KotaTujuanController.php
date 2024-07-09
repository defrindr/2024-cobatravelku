<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\KotaTujuan;
use Illuminate\Support\Facades\Auth;

class KotaTujuanController extends Controller
{
    public function index()
    {
        $kota_tujuan = KotaTujuan::all();
        return view('kota_tujuan.tujuan', compact('kota_tujuan'));
    }

    public function create()
    {
        return view('kota_tujuan.createkotatujuan');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_kotaTujuan' => 'required',
        ]);

        KotaTujuan::create($request->all());

        return redirect()->route('kota_tujuan.index')
                         ->with('success', 'Kota Tujuan created successfully.');
    }

    public function edit(KotaTujuan $kota_tujuan)
    {
        // $kota_tujuan = KotaTujuan::where('nama_kotaTujuan', $nama_kota_tujuan)->firstOrFail();
        return view('kota_tujuan.editkotatujuan', compact('kota_tujuan'));
    }

    public function update(Request $request, KotaTujuan $kota_tujuan)
    {
        $request->validate([
            'nama_kotaTujuan' => 'required',
        ]);

        $kota_tujuan->update($request->all());

        return redirect()->route('kota_tujuan.index')
                         ->with('success', 'Kota Tujuan updated successfully.');
    }

    public function destroy($nama_kota_tujuan)
    {
        $kota_tujuan = KotaTujuan::where('nama_kotaTujuan', $nama_kota_tujuan)->firstOrFail();
        $kota_tujuan->delete();

        return redirect()->route('kota_tujuan.tujuan')
                         ->with('success', 'Kota Tujuan deleted successfully.');
    }
}
