<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Resep extends Model
{
    protected $primaryKey = 'id_resep';
    protected $fillable = [
        'id_kunjungan', 'id_obat', 'jumlah', 'keterangan'
    ];
}
