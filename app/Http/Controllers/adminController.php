<?php

namespace App\Http\Controllers;

use App\Models\admin;
use App\Models\barang;
use App\Models\issuing;
use App\Models\kategori;
use App\Models\receiving;
use Illuminate\Support\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;

class adminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $barangCount = barang::count();
        $kategoriCount = kategori::count();
        $receivingCount = receiving::count();
        $issuingCount = issuing::count();

        return view('Admin.dashboard',['barang_Count'=> $barangCount,
                    'kategoriCount'=> $kategoriCount,
                    'receivingCount'=> $receivingCount,
                    'issuingCount'=> $issuingCount]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Admin.addUser');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

       $validator = $request->validate([
            'nama'=>'required',
            'username'=>'required|unique:admin',
            'password'=>'required|min:5|max:8',
            'hakAkses'=>'required'
        ]);

        $newUser = new admin;

        $newUser->nama = $request->input('nama');
        $newUser->username = $request->input('username');
        $newUser->password = $request->input('password');
        $newUser->hakAkses = $request->input('hakAkses');

        $newUser->save();

        if ('$save'){
            return redirect('/Admin/managUser')->with('status', 'User berhasil ditambah');
        }else{
            return back()->with('fail','Something went wrong, try again later');
        }
        
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
        $newUser = admin::findorfail($id);
        return view('Admin.editUser',['data'=>$newUser]);
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
        $newUser = admin::find($id);

        $newUser->nama = $request->input('nama');
        $newUser->username = $request->input('username');
        $newUser->password = $request->input('password');
        $newUser->hakAkses = $request->input('hakAkses');

        $newUser->save();
        
        return redirect('/Admin/managUser')->with('status', 'Data User berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $newUser = admin::find($id);
        $newUser->delete();

        return redirect()->back()->with('status', 'User berhasil di HAPUS!');
    }
}
