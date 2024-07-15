<?php

namespace App\Http\Controllers;

use App\Models\Mitra;
use App\Models\User;
use Illuminate\Http\Request;

class MitraController extends Controller
{
    public function index()
    {
        $mitra = Mitra::with('user')->get();
        return view('mitra.index', compact('mitra'));
    }

    public function create()
    {
        $users = User::all();
        return view('mitra.create', compact('users'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'alamat' => 'required|string|max:255',
            'no_telepon' => 'required|string|max:15',
            'nomor_polisi' => 'required|string|max:10',
            'jenis_mobil' => 'required|string|max:50',
            'harga_sewa' => 'required|numeric',
        ]);

        Mitra::create($request->all());
        return redirect()->route('mitra.index')->with('success', 'Mitra created successfully.');
    }

    public function edit(Mitra $mitra)
    {
        $users = User::all();
        return view('mitra.edit', compact('mitra', 'users'));
    }

    public function update(Request $request, Mitra $mitra)
    {
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'alamat' => 'required|string|max:255',
            'no_telepon' => 'required|string|max:15',
            'nomor_polisi' => 'required|string|max:10',
            'jenis_mobil' => 'required|string|max:50',
            'harga_sewa' => 'required|numeric',
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
