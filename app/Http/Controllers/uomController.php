<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\DB;
use App\Models\uom;

class uomController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
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
            'namauom'=>'required|string|unique:uom,Nama_uom'
        ]);

        $newUoM = new uom;

        $newUoM->Nama_uom = $request->input('namauom');
        $newUoM->Keterangan = $request->input('keterangan');
       
        $newUoM->save();

        return redirect()->back()->with('status', 'UoM berhasil ditambah');
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
        // $newUoM = uom::findorfail($id);
        // return view('MD-UoM', compact('newUoM'));

        $request->validate([
            'namauom'=>'required|string|unique:uom,Nama_uom',
        ]);
        
        $newUoM = uom::findorfail($id);
    
        $newUoM->Nama_uom = $request->input('namauom');
        $newUoM->Keterangan = $request->input('keterangan');
        $newUoM->save();
    
        return redirect()->back()->with('status', 'UoM berhasil diubah');
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
            'namauom'=>'required|string|unique:uom,Nama_uom',
        ]);
        
        $newUoM = uom::findorfail($id);
    
        $newUoM->Nama_uom = $request->input('namauom');
        $newUoM->Keterangan = $request->input('keterangan');
        $newUoM->save();
    
        return redirect()->back()->with('status', 'UoM berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $newUoM = uom::find($id); //cari dulu datanya oleh id
        $newUoM->delete();

        return redirect()->back()->with('status', 'UoM berhasil dihapus');
    }
}
