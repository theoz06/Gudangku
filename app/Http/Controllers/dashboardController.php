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
        $userCount = admin::count();
        $barangCount = barang::count();
        $kategoriCount = kategori::count();
        $receivingCount = receiving::count();
        $issuingCount = issuing::count();

        return view('dashboard',[
                    'userCount'=>$userCount,
                    'barang_Count'=> $barangCount,
                    'kategoriCount'=> $kategoriCount,
                    'receivingCount'=> $receivingCount,
                    'issuingCount'=> $issuingCount]);
    }
}
