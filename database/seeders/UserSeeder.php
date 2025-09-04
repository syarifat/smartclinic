<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        \App\Models\User::insert([
            [
                'username' => 'admin',
                'password' => bcrypt('admin123'),
                'role' => 'admin',
                'nama_lengkap' => 'Administrator',
            ],
            [
                'username' => 'resepsionis',
                'password' => bcrypt('resepsionis123'),
                'role' => 'resepsionis',
                'nama_lengkap' => 'Resepsionis Klinik',
            ],
            [
                'username' => 'dokter',
                'password' => bcrypt('dokter123'),
                'role' => 'dokter',
                'nama_lengkap' => 'dr. Syarif',
            ],
            [
                'username' => 'apotek',
                'password' => bcrypt('apotek123'),
                'role' => 'apotek',
                'nama_lengkap' => 'Apoteker Klinik',
            ],
            [
                'username' => 'kasir',
                'password' => bcrypt('kasir123'),
                'role' => 'kasir',
                'nama_lengkap' => 'Kasir Klinik',
            ],
        ]);
    }
}
