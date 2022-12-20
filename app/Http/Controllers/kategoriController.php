<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\DB;
use App\Models\kategori;

class kategoriController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request,)
    {   
        $request->validate([
            'namakategori'=>'required|string|unique:kategori,Nama_kategori',
        ]);

        $newKategori = new kategori;

        $newKategori->Nama_kategori = $request->input('namakategori');
       
        $newKategori->save();

        return redirect()->back()->with('status', 'Kategori berhasil ditambah');

        
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
    public function edit(Request $request ,$id)
    {   

        $request->validate([
            'namakategori'=>'required|string|unique:kategori,Nama_kategori',
        ]);
        

        $newKategori = kategori::findorfail($id);

        $newKategori->Nama_kategori = $request->input('namakategori');
        $newKategori->save();

        return redirect()->back()->with('status', 'Kategori berhasil diubah');
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
        $request->validate([
            'namakategori'=>'required|string|unique:kategori,Nama_kategori',
        ]);
        
        $newKategori = kategori::findorfail($id);

        $newKategori->Nama_kategori = $request->input('namakategori');
        
        $newKategori->save();

        return redirect()->back()->with('status', 'Kategori berhasil update');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $newKategori = kategori::find($id); //cari dulu datanya oleh id
        $newKategori->delete();

        return redirect()->back()->with('status', 'Kategori berhasil Dihapus');

    }
}
