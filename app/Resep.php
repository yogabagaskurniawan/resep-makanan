<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Resep extends Model
{
    protected $fillable = [
        'user_id',
        'kategori_id',
        'judul',
        'deskripsi',
        'slug',
        'durasi',
        'porsi',
    ];

    public function user()
    {
        return $this->belongsTo('App\User', 'user_id', 'id');
    }

    public function resepGambar()
    {
        return $this->hasMany('App\Resep_gambar', 'resep_id', 'id');
    }

    public function bahanResep()
    {
        return $this->hasMany('App\BahanResep', 'resep_id', 'id');
    }

    public function langkahMembuat()
    {
        return $this->hasMany('App\LangkahMembuat', 'resep_id', 'id');
    }

    public function resepKategori()
    {
        return $this->belongsTo('App\Resep_kategori', 'kategori_id', 'id');
    }
}
