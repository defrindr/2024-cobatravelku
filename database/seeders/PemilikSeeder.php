<?php

namespace Database\Seeders;

use App\Models\Pemilik;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PemilikSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::create([
            'name' => 'Pemilik',
            'email' => 'pemilik@example.com',
            'password' => bcrypt('password'),
            'role' => User::ROLE_PEMILIK
        ]);

        Pemilik::create([
            'user_id' => $user->id,
            'alamat' => 'Krebet',
            'nomor_telepon' => '088996089371'
        ]);
    }
}
