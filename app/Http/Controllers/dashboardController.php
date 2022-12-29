<?php

namespace App\Http\Controllers;

use App\Models\barang;
use App\Models\issuing;
use App\Models\kategori;
use App\Models\receiving;
use Illuminate\Http\Request;

class dashboardController extends Controller
{
    public function index(){

        //$data = ['LoggedUserInfo'=>admin::where('id','=',session('LoggedUser'))->first()];

        $barangCount = barang::count();
        $kategoriCount = kategori::count();
        $receivingCount = receiving::count();
        $issuingCount = issuing::count();

        return view('dashboard',[
                    'barang_Count'=> $barangCount,
                    'kategoriCount'=> $kategoriCount,
                    'receivingCount'=> $receivingCount,
                    'issuingCount'=> $issuingCount]);
    }
}
