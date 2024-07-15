<?php

namespace Database\Seeders;

use App\Models\Mitra;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MitraSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::create([
            'name' => 'Eka',
            'email' => 'mitra@example.com',
            'password' => bcrypt('password'),
            'role' => User::ROLE_MITRA
        ]);

        Mitra::create([
            'user_id' => $user->id,
            'alamat' => 'Wajak',
            'nomor_telepon' => '08121212345',
            'nomor_polisi' => 'N 2853 L',
            'jenis_mobil' => 'Grandmax',
            'harga_sewa' => '200000',

        ]);

        $user = User::create([
            'name' => 'Dewa',
            'email' => 'mitra2@example.com',
            'password' => bcrypt('password'),
            'role' => User::ROLE_MITRA
        ]);

        Mitra::create([
            'user_id' => $user->id,
            'alamat' => 'Batu',
            'nomor_telepon' => '0876545678',
            'nomor_polisi' => 'N 156 Y',
            'jenis_mobil' => 'Avanza',
            'harga_sewa' => '200000',

        ]);
        // Tambahkan lebih banyak data mitra sesuai kebutuhan

    }
}
