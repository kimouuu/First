<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\User;

class PenggunaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name' => 'admin1',
            'email' => 'admin1@mail.com',
            'password' => bcrypt('password'),

        ]);

        User::create([
            'name' => 'karyawan1',
            'email' => 'karyawan@mail.com',
            'password' => bcrypt('karyawan1'),

        ]);

        User::create([
            'name' => 'user1',
            'email' => 'pelanggan@mail.com',
            'password' => bcrypt('12345678'),

        ]);
    }
}
