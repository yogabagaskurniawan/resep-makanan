<?php

namespace App\Http\Controllers;

use App\BahanResep;
use App\LangkahMembuat;
use App\Resep;
use App\Resep_gambar;
use App\Resep_kategori;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;


class ResepController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $resep = Resep::all();
        return view('admin.resep.index', compact('resep'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $kategori = Resep_kategori::get();
        return view('admin.resep.formAdd',compact('kategori'));
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
            'judul' => $request->judul,
            'durasi' => $request->durasi,
            'porsi' => $request->porsi,
            'deskripsi' => $request->deskripsi,
            'user_id' => auth()->user()->id,
            'slug' => Str::slug($request->judul),
            'kategori_id' => $request->selected_category
        ];
        
        $validator = Validator::make($request->all(), [
            'judul' => 'required|unique:Reseps',
            'durasi' => 'required',
            'porsi' => 'required',
            'deskripsi' => 'required',
            'selected_category' => 'required'
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        Resep::create($data);
        return redirect('/resep')->with('success','Resep berhasil ditambahkan');

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
        $resep = Resep::findOrFail($id);
        $kategori = Resep_kategori::all();
        return view('admin.resep.formEdit', compact('resep', 'kategori'));
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
        $resep = Resep::findOrFail($id);
        if ($resep->user_id !== Auth::user()->id) {
            return abort(403);
        }

        $validator = Validator::make($request->all(), [
            'judul' => 'required|unique:reseps,judul,' . $id . ',id',
            'durasi' => 'required',
            'porsi' => 'required',
            'deskripsi' => 'required',
            'selected_category' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        $resep->update([
            'judul' => $request->judul,
            'durasi' => $request->durasi,
            'porsi' => $request->porsi,
            'deskripsi' => $request->deskripsi,
            'kategori_id' => $request->selected_category,
        ]);

        return redirect('/resep')->with('success','Resep berhasil diupdate');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Resep::where('id',$id)->delete();
        Resep_gambar::where('resep_id',$id)->delete();
        BahanResep::where('resep_id',$id)->delete();
        LangkahMembuat::where('resep_id',$id)->delete();

        return back()->with('success','Resep berhasil dihapus');
    }
}
