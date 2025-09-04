<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PasienSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        \App\Models\Pasien::insert([
            [
                'nomor_kartu' => 'P000001',
                'nama' => 'Budi Santoso',
                'nik' => '1234567890123456',
                'umur' => 30,
                'alamat' => 'Jl. Melati No. 1',
                'telp' => '081234567890',
                'riwayat_penyakit' => 'Hipertensi',
                'golongan_darah' => 'A',
            ],
            [
                'nomor_kartu' => 'P000002',
                'nama' => 'Siti Aminah',
                'nik' => '2345678901234567',
                'umur' => 25,
                'alamat' => 'Jl. Mawar No. 2',
                'telp' => '081298765432',
                'riwayat_penyakit' => 'Diabetes',
                'golongan_darah' => 'B',
            ],
            [
                'nomor_kartu' => 'P000003',
                'nama' => 'Agus Salim',
                'nik' => '3456789012345678',
                'umur' => 40,
                'alamat' => 'Jl. Kenanga No. 3',
                'telp' => '081212345678',
                'riwayat_penyakit' => 'Asma',
                'golongan_darah' => 'O',
            ],
        ]);
    }
}
