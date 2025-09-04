<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Kunjungan extends Model
{
    protected $primaryKey = 'id_kunjungan';
    protected $fillable = [
        'id_pasien', 'tanggal_kunjungan', 'id_dokter', 'keluhan', 'status'
    ];

    public function pasien()
    {
        return $this->belongsTo(Pasien::class, 'id_pasien', 'id_pasien');
    }

    public function dokter()
    {
        return $this->belongsTo(User::class, 'id_dokter', 'id_user');
    }
    public function resep()
    {
        return $this->hasMany(Resep::class, 'id_kunjungan', 'id_kunjungan');
    }
}
