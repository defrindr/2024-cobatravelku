<?php

namespace Database\Seeders;

use App\Models\KotaKeberangkatan;
use App\Models\KotaTujuan;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class KotaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        KotaKeberangkatan::create(['id' => 1, 'nama' => 'Ponorogo']);
        KotaKeberangkatan::create(['id' => 2, 'nama' => 'Madiun']);
        KotaKeberangkatan::create(['id' => 3, 'nama' => 'Magetan']);

        KotaTujuan::create(['id' => 1, 'nama' => 'Surabaya']);
        KotaTujuan::create(['id' => 2, 'nama' => 'Jember']);
        KotaTujuan::create(['id' => 3, 'nama' => 'Banyuwangi']);
    }
}
