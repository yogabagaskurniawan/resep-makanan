<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Resep extends Model
{
    protected $fillable = [
        'user_id',
        'judul',
        'deskripsi',
        'slug',
        'durasi',
        'hasil',
        'bahan',
        'cara_membuat',
    ];

    public function user()
    {
        return $this->belongsTo('App\User', 'user_id', 'id');
    }

    public function resepGambar()
    {
        return $this->hasMany('App\Resep_gambar', 'resep_id', 'id');
    }

    public function resepKategori()
    {
        return $this->hasOne('App\Resep_kategori', 'resep_id', 'id');
    }
}
