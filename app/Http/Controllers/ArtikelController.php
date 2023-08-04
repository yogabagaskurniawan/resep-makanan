<?php

namespace App\Http\Controllers;

use App\Artikel;
use Attribute;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;


class ArtikelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $artikel = Artikel::all();
        return view('admin.artikel.index', compact('artikel'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $artikel = Artikel::get();
        return view('admin.artikel.formAdd', compact('artikel'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'judul' => 'required|unique:artikels',
            'deskripsi' => 'required',
            'gambar' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);
    
        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }
    
        if ($request->hasFile('gambar') && $request->file('gambar')->isValid()) {
            $image = $request->file('gambar');
            $name = 'artikel_' . time();
            $filename = $name . '.' . $image->getClientOriginalExtension();
    
            $folder = '/uploads/images';
            $filePath = $image->storeAs($folder, $filename, 'public');
    
            $artikel = new Artikel();
            $artikel->judul = $request->input('judul');
            $slug = Str::slug($artikel->judul);
            $artikel->slug = $slug;
            $artikel->deskripsi = $request->input('deskripsi');
            $artikel->gambar = $filePath;
            $artikel->save();
            return redirect('/artikel')->with('success', 'Artikel berhasil ditambahkan');
        }
    
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $artikel = Artikel::findOrFail($id);
        return view('admin.artikel.formEdit', compact('artikel'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $artikel = Artikel::findOrFail($id);

        $validator = Validator::make($request->all(), [
            'judul' => 'required|unique:artikels,judul,' . $id . ',id',
            'deskripsi' => 'required',
            'gambar' => 'image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        if ($request->hasFile('gambar') && $request->file('gambar')->isValid()) {
            $image = $request->file('gambar');
            $name = 'artikel_' . time();
            $filename = $name . '.' . $image->getClientOriginalExtension();
            $folder = '/uploads/images';
            $filePath = $image->storeAs($folder, $filename, 'public');

            // Hapus gambar lama 
            Storage::disk('public')->delete($artikel->gambar);

            // $artikel->gambar = $filePath;
            $artikel->update([
                'judul' => $request->judul,
                'deskripsi' => $request->deskripsi,
                'slug' => Str::slug($request->judul),
                'gambar' => $filePath
            ]);
    
            return redirect('/artikel')->with('success','Artikel berhasil diupdate');
        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $artikel = Artikel::find($id);

        Storage::disk('public')->delete($artikel->gambar);

        $artikel->delete();

        return redirect('/artikel')->with('success','Artikel berhasil dihapus');
    }
}
