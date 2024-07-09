<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LandingController extends Controller
{
    public function showLandingPage()
    {
        $menu = [
            'home' => 'Home',
            'profil' => 'Profil',
            'carapemesanan' => 'Cara Pemesanan',
            'lokasi' => 'Lokasi'
        ];

        return view('welcome', compact('menu'));
    }
}
