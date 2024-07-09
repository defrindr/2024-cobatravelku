<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CaraPemesananController extends Controller
{
    public function showCaraPemesananPage()
    {
        return view('halamandepan.carapemesanan');
    }
}
