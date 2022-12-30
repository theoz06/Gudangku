<?php

namespace App\Http\Controllers;

use PDF;
use App\Models\barang;

use App\Models\issuing;
use App\Models\receiving;
use Illuminate\Http\Request;

class reportController extends Controller
{
    public function stokPrint(){
        $rptStock = barang::all();

        $pdf = PDF::loadview('/Operator/cetakStok',['data'=>$rptStock]);
    	return $pdf->stream();
    }

    public function receivingPrint(){
        $rptReceiving = receiving::all();

        $pdf = PDF::loadview('/Operator/cetakReceiving',['data'=>$rptReceiving]);
    	return $pdf->stream();
    }

    public function issuingPrint(){
        $rptIssuing = issuing::all();

        $pdf = PDF::loadview('/Operator/cetakIssuing',['data'=>$rptIssuing]);
    	return $pdf->stream();
    }


}
