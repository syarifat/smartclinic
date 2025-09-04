<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pembayaran extends Model
{
    public function kunjungan()
    {
        return $this->belongsTo(Kunjungan::class, 'id_kunjungan', 'id_kunjungan');
    }

    protected $primaryKey = 'id_bayar';
    protected $fillable = [
        'id_kunjungan', 'biaya_konsultasi', 'biaya_tindakan', 'biaya_obat', 'total_bayar', 'metode_bayar', 'tanggal_bayar'
    ];
}
