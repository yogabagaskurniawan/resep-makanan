<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LangkahMembuat extends Model
{
    protected $fillable = [
        'resep_id',
        'keterangan'
    ];

    public function resep()
    {
        return $this->belongsTo('App\Resep', 'resep_id', 'id');
    }
}
