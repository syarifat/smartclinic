<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RekamMedis extends Model
{
    protected $primaryKey = 'id_rekam';
    protected $fillable = [
        'id_kunjungan', 'diagnosa', 'catatan_dokter'
    ];
}
