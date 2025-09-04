<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ObatSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        \App\Models\Obat::insert([
            [
                'nama_obat' => 'Paracetamol',
                'satuan' => 'tablet',
                'stok' => 200,
                'harga' => 1500,
            ],
            [
                'nama_obat' => 'Amoxicillin',
                'satuan' => 'kapsul',
                'stok' => 100,
                'harga' => 2500,
            ],
            [
                'nama_obat' => 'Vitamin C',
                'satuan' => 'tablet',
                'stok' => 300,
                'harga' => 1000,
            ],
            [
                'nama_obat' => 'Salbutamol',
                'satuan' => 'tablet',
                'stok' => 80,
                'harga' => 2000,
            ],
        ]);
    }
}
