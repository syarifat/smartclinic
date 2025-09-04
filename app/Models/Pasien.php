<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pasien extends Model
{
    protected $primaryKey = 'id_pasien';
    protected $fillable = [
        'nomor_kartu', 'nama', 'nik', 'umur', 'alamat', 'telp', 'riwayat_penyakit', 'golongan_darah'
    ];
}
