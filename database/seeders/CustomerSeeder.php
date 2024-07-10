<?php

namespace Database\Seeders;

use App\Models\Customer;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CustomerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::create([
            'name' => 'Customer 1',
            'email' => 'customer@example.com',
            'password' => bcrypt('password'),
            'role' => User::ROLE_CUSTOMER
        ]);

        Customer::create([
            'user_id' => $user->id,
            'alamat' => 'Jl. Maju mundur cantik No. 18',
            'nomor_telepon' => '08121212345'
        ]);

        $user = User::create([
            'name' => 'Customer 2',
            'email' => 'customer2@example.com',
            'password' => bcrypt('password'),
            'role' => User::ROLE_CUSTOMER
        ]);

        Customer::create([
            'user_id' => $user->id,
            'alamat' => 'Jl. Maju mundur cantik No. 18',
            'nomor_telepon' => '08121212345'
        ]);
    }
}
