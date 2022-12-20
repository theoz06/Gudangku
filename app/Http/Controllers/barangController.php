<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\kategori;
use App\Models\barang;
use App\Models\brand;
use App\Models\uom;
use DB;


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
        $kategoriLIst = kategori::select('id','Nama_kategori');

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
        
        $newBarang->Gambar = ""; //biar nilai awal kosong dulu
        if($request->hasFile('Gambar')){
            $request->file('Gambar')->move('gambarBarang/', $request->file('Gambar')->getClientOriginalName());
            $newBarang->Gambar = $request->file('Gambar')->getClientOriginalName();
        }
        
        $newBarang->Nama_barang = $request->input('namaBarang');
        $newBarang->Price = $request->input('price');
        $newBarang->Brand = $request->input('namaBrand');
        $newBarang->Kategori = $request->input('namaKategori');
        $newBarang->UoM = $request->input('satuan');
        $newBarang->Catatan = $request->input('note');
        $newBarang->jPengiriman = $request->input('jenisKurir');

        
        

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
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
