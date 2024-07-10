<?php

namespace Database\Seeders;

use App\Models\Jadwal;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class JadwalSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Jadwal::create([
            'nomor_polisi' => 'B 063 L',
            'jenis_mobil' => 'Avanza',
            'kuota' => 1,
            'sisa_kuota' => 1,
            'harga_travel' => 100000,
            'harga_barang' => 60000,
            'tanggal' => date('Y-m-d'),
            'jam_berangkat' => date('H:i:s', strtotime('+4hour')),
            'kota_keberangkatan_id' => 1,
            'kota_tujuan_id' => 1,
        ]);
        Jadwal::create([
            'nomor_polisi' => 'K 374 N',
            'jenis_mobil' => 'Kijang',
            'kuota' => 1,
            'sisa_kuota' => 1,
            'harga_travel' => 700000,
            'harga_barang' => 60000,
            'tanggal' => date('Y-m-d'),
            'jam_berangkat' => date('H:i:s', strtotime('+9hour')),
            'kota_keberangkatan_id' => 1,
            'kota_tujuan_id' => 1,
        ]);
    }
}
