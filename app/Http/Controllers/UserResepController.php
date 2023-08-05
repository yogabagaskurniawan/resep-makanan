<?php

namespace App\Http\Controllers;

use App\Resep;
use App\Resep_kategori;
use Illuminate\Http\Request;

class UserResepController extends Controller
{
    protected $data = [];
    public function __construct()
    {
        $this->data['kategori'] = Resep_kategori::get();
    }

    public function index()
    {
        return view('home', $this->data);
    }
    
    public function showResep($slug)
    {
        // Cari record dalam tabel 'Resep_kategori' berdasarkan field 'slug'
        $kategori1 = Resep_kategori::where('slug', $slug)->first();

        if (!$kategori1) {
            // Jika record tidak ditemukan, keluarkan pesan error atau redirect ke halaman lain
            abort(404, 'Not Found');
        }

        // Jika record ditemukan, cari record 'Resep' berdasarkan 'kategori_id' yang sesuai
        $resep = Resep::where('kategori_id', $kategori1->id)->get();

        return view('kategori', compact('resep', 'kategori1'), $this->data);
    }

    public function detailResep($slug)
    {
        $resep = Resep::where('slug', $slug)->first();

        if (!$resep) {
            abort(404, 'Not Found');
        }

        return view('detailResep', compact('resep'), $this->data);
    }
}
