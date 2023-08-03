<?php

namespace App\Http\Controllers;

use App\Resep_kategori;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class KategoriController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $kategori = Resep_kategori::all();
        return view('admin.kategori.index', compact('kategori'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $kategori = Resep_kategori::get();
        return view('admin.kategori.formAdd', compact('kategori'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = [
            'nama' => $request->nama,
            'slug' => Str::slug($request->nama)
        ];
        
        $validator = Validator::make($request->all(), [
            'nama' => 'required|unique:Resep_kategoris',
            'slug' => 'unique:Resep_kategoris,slug'
        ]);
    
        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        Resep_kategori::create($data);
        return redirect('/kategori')->with('success','Data berhasil ditambahkan');
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
        $kategori = Resep_kategori::findOrFail($id);
        return view('admin.kategori.formEdit', compact('kategori'));
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
        $data = [
            'nama' => $request->nama,
            'slug' => Str::slug($request->nama)
        ];

        $validator = Validator::make($request->all(), [
            'nama' => 'required|unique:Resep_kategoris,nama,' . $id,
            'slug' => 'unique:Resep_kategoris,slug,' . $id,
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        Resep_kategori::where('id', $id)->update($data);

        return redirect('/kategori')->with('success', 'Data berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Resep_kategori::where('id',$id)->delete();
        return back()->with('success','Data berhasil dihapus');
    }
}
