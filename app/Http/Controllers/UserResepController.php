<?php

namespace App\Http\Controllers;

use App\Resep;
use App\Artikel;
use App\Resep_kategori;
use Illuminate\Http\Request;

class UserResepController extends Controller
{
    protected $data = [];
    public function __construct()
    {
        $this->data['kategori'] = Resep_kategori::get();
    }

    public function search(Request $request)
    {
        $keyword = $request->input('search');
        $resepResults = $this->searchResep($keyword); // Gantikan dengan method pencarian untuk model Resep
        $artikelResults = $this->searchArtikel($keyword); // Gantikan dengan method pencarian untuk model Artikel

        return view('search', compact('resepResults', 'artikelResults', 'keyword'), $this->data);
    }

    private function searchResep($keyword)
    {
        return Resep::where(function ($query) use ($keyword) {
            if ($keyword) {
                $query->where('judul', 'like', '%' . $keyword . '%')
                    ->orWhere('slug', 'like', '%' . $keyword . '%')
                    ->orWhere('deskripsi', 'like', '%' . $keyword . '%');
            }
        })->get();
    }

    private function searchArtikel($keyword)
    {
        return Artikel::where(function ($query) use ($keyword) {
            if ($keyword) {
                $query->where('judul', 'like', '%' . $keyword . '%')
                    ->orWhere('slug', 'like', '%' . $keyword . '%')
                    ->orWhere('deskripsi', 'like', '%' . $keyword . '%');
            }
        })->get();
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

    // ==================== artikel =======================
    public function showArtikel()
    {
        $artikel = Artikel::orderBy('created_at', 'desc')->get();
        return view('artikel', compact('artikel'), $this->data);
    }

    public function detailArtikel($slug)
    {
        $artikel = Artikel::where('slug', $slug)->first();

        if (!$artikel) {
            abort(404, 'Not Found');
        }

        return view('detailArtikel', compact('artikel'), $this->data);
    }
    // ================== end artikel ===================

    // ================== start contact ===================
    public function contact()
    {
        return view('contact', $this->data);
    }

    // ================== end contact ===================
}
