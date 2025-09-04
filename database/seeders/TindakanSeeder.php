<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TindakanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        \App\Models\Tindakan::insert([
            [
                'nama_tindakan' => 'Pemeriksaan Dokter',
                'harga' => 50000,
            ],
            [
                'nama_tindakan' => 'Suntik Vitamin',
                'harga' => 35000,
            ],
            [
                'nama_tindakan' => 'Nebulizer',
                'harga' => 40000,
            ],
        ]);
    }
}
