<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\DB;
use App\Models\kategori;
use App\Models\barang;
use App\Models\brand;
use App\Models\uom;



class barangController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   


        return view ('MD-barang');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return view('addItem');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {   
       
        $newBarang = new barang;
        $kategoriLIst = kategori::all();
        $brandList = brand::all();
        $satuanList = uom::all();
        
        $foto_file = $request->file('foto');
        $foto_ekstensi = $foto_file->extension();
        $foto_nama = date('ymdhis').".".$foto_ekstensi;
        $foto_file->move(public_path('Gambar'), $foto_nama);

        $newBarang->Nama_barang = $request->input('namaBarang');
        $newBarang->Price = $request->input('price');
        $newBarang->Brand = $request->input('namaBrand');
        $newBarang->Kategori = $request->input('namaKategori');
        $newBarang->UoM = $request->input('satuan');
        $newBarang->Catatan = $request->input('note');
        $newBarang->jPengiriman = $request->input('jenisKurir');
        $newBarang->Gambar = $foto_nama; 

        
        

        $newBarang->save();
        
        return redirect('MD-Barang')->with('status', 'Item berhasil ditambah');
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
    public function edit(Request $request, $id)
    {
        $item = barang::query()->findOrFail($id);

        return view('editItem', [
            'data' => $item,
            'listBrand' => brand::query()->get(),
            'listKategori' => kategori::query()->get(),
            'listUoM' => uom::query()->get(),
        ]);
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
        $newBarang = barang::find($id);

        $foto_file =$request->file('foto');
        
        if ($foto_file) {
            $foto_ekstensi = $foto_file->extension();
    
            $foto_nama = date('ymdhis').".".$foto_ekstensi;
    
            $foto_file->move(public_path('Gambar'), $foto_nama);

            $newBarang->Gambar = $foto_nama;
        }

        $newBarang->Nama_barang = $request->input('namaBarang');

        $newBarang->Kategori = $request->input('namaKategori');

        $newBarang->Brand = $request->input('namaBrand');

        $newBarang->UoM = $request->input('satuan');

        $newBarang->jPengiriman = $request->input('jenisKurir');

        $newBarang->Price = $request->input('price');

        $newBarang->Catatan = $request->input('note');
        
        $newBarang->save();

        return redirect('MD-Barang')->with('status','Data barang BERHASIL di ubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $newBarang = barang::find($id);

        $newBarang->delete();

        return redirect()->back()->with('status', 'Item berhasil dihapus');
    }
}
