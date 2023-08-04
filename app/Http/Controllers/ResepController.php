<?php

namespace App\Http\Controllers;

use App\Resep;
use App\BahanResep;
use App\Resep_gambar;
use App\LangkahMembuat;
use App\Resep_kategori;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
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

    // =========== START GAMBAR RESEP MAKANAN ================
    
    public function tambahGambar($id)
    {
        if(empty($id)) {
            return redirect('/resep');
        }

        $resep = Resep::findOrFail($id);

        return view('admin.resep.gambarResep.gambar', compact('resep'));
    }

    public function storeGambar(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'nama' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        $resep = Resep::findOrFail($id);

        if ($request->hasFile('nama')) {
            $image = $request->file('nama');
            $name = Str::slug($resep->judul) . '_' . time();
            $filename = $name . '.' . $image->getClientOriginalExtension();

            $folder = '/uploads/images';
            $filePath = $image->storeAs($folder, $filename, 'public');

            $data = [
                'resep_id' => $resep->id,
                'nama' => $filePath
            ];

            Resep_gambar::create($data);
            return redirect('resep/' . $id . '/gambar-makanan')->with('success', 'Gambar berhasil ditambahkan');
        }
    }

    public function removeGambar($id)
    {
        $gambar = Resep_gambar::findOrFail($id);

        // Menghapus gambar dari folder penyimpanan
        Storage::disk('public')->delete($gambar->nama);

        $gambar->delete();

        return redirect('resep/' . $gambar->resep->id . '/gambar-makanan')->with('success','Data berhasil dihapus');
    }
    // =========== END GAMBAR RESEP MAKANAN ================

    // =========== START BAHAN MAKANAN ================
    
    public function tambahBahan($attributeID)
    {
        if(empty($attributeID)) {
            return redirect('/resep');
        }

        $resep = Resep::findOrFail($attributeID);

        return view('admin.resep.bahanResep.bahan', compact('resep'));
    }
    
    public function storeBahan(Request $request, $id)
    {
        if(empty($id)){
            return redirect('/resep');
        }

        $data = [
            'keterangan' => $request->keterangan,
            'resep_id' => $request->resep_id,
        ];
    
        $validator = Validator::make($request->all(), [
            'keterangan' => 'required',
        ]);
    
        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }
    
        BahanResep::create($data);
        return redirect('resep/'.$id.'/bahan-makanan')->with('success','Bahan berhasil ditambahkan');
    }

    public function editBahan($id)
    {
        $bahanResep = BahanResep::findOrFail($id);
        $resep = $bahanResep->resep;

        return view('admin.resep.bahanResep.bahan', compact('bahanResep','resep'));
    }

    public function updateBahan(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'keterangan' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }
        
        $bahanResep = BahanResep::findOrFail($id);
        $bahanResep->update([
            'keterangan' => $request->keterangan,
        ]);

        return redirect('resep/'.$bahanResep->resep->id.'/bahan-makanan')->with('success','Bahan berhasil diubah');
    }

    public function removeBahan($id)
    {
        if (empty($id)) {
            return redirect('/resep');
        }
        
        
        $bahanResep = BahanResep::findOrFail($id);
        $resepId = $bahanResep->resep->id; 
        
        $bahanResep->delete();
        
        return redirect('resep/' . $resepId . '/bahan-makanan')->with('success', 'Bahan berhasil dihapus');
        
    }
    // =========== END BAHAN MAKANAN ================
}
