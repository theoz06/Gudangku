<?php

namespace App\Http\Controllers;

use App\Models\receiving;
use App\Models\barang;
use Illuminate\Http\Request;
use DB;

use function PHPUnit\Framework\returnSelf;

class receivingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('Operator.receiving');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {   
        
        return view('/Operator/addReceiving',['listBarang'=>barang::query()->get()]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $newReceiving = new receiving;
        
        $newReceiving->Nama_Barang = $request->input('jenisbarang');
        $newReceiving->Supplier = $request->input('namasupplier');
        $newReceiving->No_referensi = $request->input('noReferensi');
        $newReceiving->jumlahMasuk = $request->input('stokmasuk');
        $newReceiving->Date = $request->input('dateIn');
        $newReceiving->Catatan = $request->input('note');
        $newReceiving->UoM = $request->input('satuan');

        $newReceiving->save();

        return redirect('/Operator/receiving')->with('status', 'Barang masuk BERHASIL di tambah!');

        
        

       
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

}
