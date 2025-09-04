<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class KunjunganSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        \App\Models\Kunjungan::insert([
            [
                'id_pasien' => 1,
                'tanggal_kunjungan' => now()->subDays(2)->format('Y-m-d'),
                'id_dokter' => 3,
                'keluhan' => 'Demam dan pusing',
                'status' => 'menunggu_dokter',
            ],
            [
                'id_pasien' => 2,
                'tanggal_kunjungan' => now()->subDay()->format('Y-m-d'),
                'id_dokter' => 3,
                'keluhan' => 'Batuk dan pilek',
                'status' => 'menunggu_dokter',
            ],
            [
                'id_pasien' => 3,
                'tanggal_kunjungan' => now()->format('Y-m-d'),
                'id_dokter' => 3,
                'keluhan' => 'Sesak napas',
                'status' => 'menunggu_dokter',
            ],
        ]);
    }
}
