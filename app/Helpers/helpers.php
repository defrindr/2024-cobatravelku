<?php

use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Auth;



if (!function_exists('isActiveDashboard')) {
    function isActiveDashboard()
    {
        return Request::is('beranda');
    }
}

if (!function_exists('isActivekota_keberangkatan')) {
    function isActiveDataKota()
    {
        return request()->is('kota_keberangkatan*') || Request::is('tujuan*');
    }
}

if (!function_exists('isActiveKendaraan')) {
    function isActiveKendaraan()
    {
        return Request::is('mitra*');
    }
}

if (!function_exists('isActiveKonfirmasiIndustri')) {
    function isActiveKonfirmasiIndustri()
    {
        return Request::is('konfirmasiIndustri');
    }
}

if (!function_exists('isActivePenjadwalan')) {
    function isActivePenjadwalan()
    {
        return Request::is('penjadwalan*') || Request::is('laporanPenjadwalan*') || Request::is('kelompokDosen*');
    }
}


