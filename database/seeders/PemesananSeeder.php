<?php

namespace Database\Seeders;

use App\Models\Customer;
use App\Models\Jadwal;
use App\Models\Pemesanan;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PemesananSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Pemesanan::create([
            'ref_code' => time(),
            'customer_id' => 1,
            'jadwal_id' => 1,
            'jumlah_kursi' => 1,
            'jumlah_bayar' => Jadwal::find(1)->harga_travel,
            'bukti_bayar' => null,
            'nomor_telepon' => '081231231242',
            'lokasi_penjemputan' => '-',
            'lokasi_pengantaran' => '-',
            'bisa_bayar' => 1,
            'waktu_mulai_bayar' => date('H:i:s', strtotime("- 10 minutes")),
            'waktu_selesai_bayar' => date('H:i:s'),
        ]);
        Pemesanan::create([
            'ref_code' => time() + 50,
            'customer_id' => 1,
            'jadwal_id' => 1,
            'jumlah_kursi' => 1,
            'jumlah_bayar' => Jadwal::find(1)->harga_travel,
            'bukti_bayar' => null,
            'nomor_telepon' => '081231231242',
            'lokasi_penjemputan' => '-',
            'lokasi_pengantaran' => '-',
            'bisa_bayar' => 0,
            'waktu_mulai_bayar' => date('H:i:s'),
            'waktu_selesai_bayar' => date('H:i:s', strtotime("+ 10 minutes")),
        ]);
    }
}
