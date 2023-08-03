<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Resep_kategori extends Model
{
    protected $fillable = [
        'nama',
        'slug'
    ];

    public function resep()
    {
        return $this->hasMany('App\Resep', 'kategori_id', 'id');
    }
}
