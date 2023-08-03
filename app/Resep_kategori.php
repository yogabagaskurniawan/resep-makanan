<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Resep_kategori extends Model
{
    protected $fillable = [
        'resep_id',
        'nama',
        'slug'
    ];

    public function resep()
    {
        return $this->belongsTo('App\Resep', 'resep_id', 'id');
    }
}
