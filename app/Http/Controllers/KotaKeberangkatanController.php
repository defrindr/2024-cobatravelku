<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\KotaKeberangkatan;
use Illuminate\Support\Facades\Auth;

class KotaKeberangkatanController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $idUser = auth()->user()->id;
        $kotaKeberangkatan = KotaKeberangkatan::all();
        return view('kota_keberangkatan.keberangkatan', compact('kotaKeberangkatan'));
    }

    public function create()
    {
        return view('kota_keberangkatan.createkotakeberangkatan');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_kotaKeberangkatan' => 'required|string|max:255',
        ]);

        KotaKeberangkatan::create($request->all());

        return redirect()->route('kota_keberangkatan.index')
                         ->with('success', 'Kota Keberangkatan created successfully.');
    }

    public function edit(KotaKeberangkatan $kotaKeberangkatan)
    {
        return view('kota_keberangkatan.editkotaKeberangkatan', compact('kotaKeberangkatan'));
    }

    public function update(Request $request, KotaKeberangkatan $kotaKeberangkatan)
    {
        $request->validate([
            'nama_kotaKeberangkatan' => 'required|string|max:255',
        ]);

        $kotaKeberangkatan->update($request->all());

        return redirect()->route('kota_keberangkatan.index')
                         ->with('success', 'Kota Keberangkatan updated successfully.');
    }

    public function destroy(KotaKeberangkatan $kotaKeberangkatan)
    {
        $kotaKeberangkatan->delete();

        return redirect()->route('kota_keberangkatan.index')
                         ->with('success', 'Kota Keberangkatan deleted successfully.');
    }
}
