@extends('layouts.mainlayout')
@section('title', 'Issuing VieW')

@section('content')

<div class="container bg-light show" >
    @csrf

    <div class="pb-3 d-flex add-btn">
        <h2 class="uil uil-truck">Issuing</h2>
        <button type="button" class="btn btn-light uil uil-print" style="font-size: 30px;"></button>
    </div>
    <hr style="margin-top: 0;">
    
    <div class="pb-3 d-flex add-btn">
        <div>Picker : <span style="color:#5942D4; font-style:italic;"> ini Picker nya</span> </div>
    </div>
    <hr>

    <table id="datatable" class="table table-striped table-bordered">
        <thead>
            <tr>
                <th class="col-sm-1">No</th>
                <th class="col-md-4">Jenis Barang</th>
                <th class="col-md-4">ID-Barang</th>
                <th class="col-md-4">UoM</th>
                <th class="col-md-4">Jumlah</th>
                <th class="col-md-1">Aksi</th>
            </tr>
        </thead>
        <tfoot>
            <tr>
                <th class="col-sm-1">No</th>
                <th class="col-md-4">Jenis Barang</th>
                <th class="col-md-4">ID-Barang</th>
                <th class="col-md-4">UoM</th>
                <th class="col-md-4">Jumlah</th>
                <th class="col-md-1">Aksi</th>
            </tr>
        </tfoot>
        <tbody>
                
            
                <tr>    
                    <td>---</td>
                    <td>---</td>
                    <td>---</td>
                    <td>---</td>
                    <td>problem</td>
                    <td>
                        <a href="#" class="btn btn-danger btn-sm uil uil-trash-alt"></a>
                    </td>           
                </tr>          

             
        </tbody>
    </table>
    </table>
</div>

@endsection