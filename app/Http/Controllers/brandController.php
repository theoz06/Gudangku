<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\DB;
use App\Models\brand;

class brandController extends Controller
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
    public function store(Request $request)
    {
        $request->validate([
            'namabrand'=>'required|string|unique:brand,Nama_brand',
        ]);

        $newBrand = new brand;

        $newBrand->Nama_brand = $request->input('namabrand');
       
        $newBrand->save();

        return redirect()->back()->with('status', 'Brand berhasil ditambah');
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
        $request->validate([
            'namabrand'=>'required|string|unique:brand,Nama_brand',
        ]);
        
        $newBrand = brand::findorfail($id);

        $newBrand->Nama_brand = $request->input('namabrand');
        $newBrand->save();

        return redirect()->back()->with('status', 'Brand berhasil diubah');
        // return view('MD-Brand', compact('newBrand'));
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
        // $newBrand = brand::findorfail('$id');
        // $newBrand->update($request->all());
        // return redirect()->back()->with('status', 'Brand berhasil ditambah');
        $newBrand = brand::findorfail($id);

        $newBrand->Nama_brand = $request->input('namabrand');
        
        $newBrand->save();

        return redirect()->back()->with('status', 'Brand berhasil update');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $newBrand = brand::find($id); //cari dulu datanya oleh id
        $newBrand->delete();

        return redirect()->back()->with('status', 'Brand berhasil Dihapus');
    }
}
