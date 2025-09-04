<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RekamMedisTindakan extends Model
{
    protected $fillable = [
        'id_rekam', 'id_tindakan', 'jumlah'
    ];
    public function rekamMedis()
    {
        return $this->belongsTo(RekamMedis::class, 'id_rekam', 'id_rekam');
    }
}
