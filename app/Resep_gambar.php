<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Resep_gambar extends Model
{
    protected $fillable = [
        'resep_id',
        'nama'
    ];

    public function resep()
    {
        return $this->belongsTo('App\Resep', 'resep_id', 'id');
    }
}
