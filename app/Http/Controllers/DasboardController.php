<?php

namespace App\Http\Controllers;
use App\Models\Pesan;

use Illuminate\Http\Request;

class DasboardController extends Controller
{
    public function showDashboard()
    {
        $belum_bayar_count = Pesan::where('status', 'Belum Bayar')->count();
        $dalam_proses_count = Pesan::where('status', 'Dalam Proses')->count();
        $kendaraan_count = \App\Models\Kendaraan::count();
        $member_count = \App\Models\Member::count();
        $jadwal_count = \App\Models\Jadwal::count();

        return view('dashboard', [
            'belum_bayar_count' => $belum_bayar_count,
            'dalam_proses_count' => $dalam_proses_count,
            'kendaraan_count' => $kendaraan_count,
            'member_count' => $member_count,
            'jadwal_count' => $jadwal_count,
        ]);
    }
}
