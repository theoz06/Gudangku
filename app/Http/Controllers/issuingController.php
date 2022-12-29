<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\barang;
use App\Models\issuing;

class issuingController extends Controller
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
        return view('addIssuing', ['listBarang'=>barang::query()->get()]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $newIssuing = new issuing;

        $newIssuing->Nama_Barang = $request->input('jenisbarang');
        $newIssuing->Picker = $request->input('namapicker');
        $newIssuing->No_referensi = $request->input('noReferensi');
        $newIssuing->jumlahKeluar = $request->input('stokOut');
        $newIssuing->Date = $request->input('dateOut');
        $newIssuing->Catatan = $request->input('note');
        $newIssuing->UoM = $request->input('satuan');

        $newIssuing->save();

        return redirect('issuing')->with('status', 'Barang masuk BERHASIL di tambah!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function tampil()
    {
        return view('Issuing.IssuingView');
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
