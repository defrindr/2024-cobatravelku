<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Mitra;
use Illuminate\Support\Facades\Auth;

class MitraController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $idUser = auth()->user()->id;
        $mitra = Mitra::all();
        return view('mitra.mitra', compact('mitra'));
    }

    public function create()
    {
        return view('mitra.createmitra');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'alamat' => 'required',
            'email' => 'required|email',
            'no_telepon' => 'required',
            'nomor_polisi' => 'required',
            'jenis_mobil' => 'required',
        ]);

        Mitra::create($request->all());

        return redirect()->route('mitra.index')->with('success', 'Mitra created successfully.');
    }

    public function edit(Mitra $mitra)
    {
        return view('mitra.editmitra', compact('mitra'));
    }

    public function update(Request $request, Mitra $mitra)
    {
        $request->validate([
            'nama' => 'required',
            'alamat' => 'required',
            'email' => 'required|email',
            'no_telepon' => 'required',
            'nomor_polisi' => 'required',
            'jenis_mobil' => 'required',
        ]);

        $mitra->update($request->all());

        return redirect()->route('mitra.index')->with('success', 'Mitra updated successfully.');
    }

    public function destroy(Mitra $mitra)
    {
        $mitra->delete();

        return redirect()->route('mitra.index')->with('success', 'Mitra deleted successfully.');
    }
}
