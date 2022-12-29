@extends('Manager.managerlayout')
@section('title', 'Report-receiving')

@section('content')
<main class="main-container addItem-form">

    <div class="main-title" aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item active" aria-current="page">Report > Receiving
        </ol>
    </div>
    <hr>
    
<!-- START DATA -->
    <div class="my-3 p-3 bg-body rounded shadow-sm">

        @if (session('status'))
            <div class="alert alert-success">{{ session('status') }}</div>      
        @endif

        @if (session('update-status'))
            <div class="alert alert-success">{{ session('update-status') }}</div>      
        @endif

        <!-- TOMBOL TAMBAH DATA -->
        <div class="pb-3 d-flex add-btn">
            <h2>DATA Receiving</h2>
            <a type="button" class="btn btn-primary uil uil-print" href="/addItem" data-bs-target="#addbarang" data-bs-whatever="@mdo">Print</a>
        </div>
        <hr>
    
    <table id="datatable" class="table table-striped table-bordered">
        <thead>
            <tr>
                <th class="col-sm-1">No</th>
                <th class="col-md-3">Nama Barang</th>
                <th class="col-md-3">Date Time</th>
                <th class="col-md-3">No Referensi</th>
                <th class="col-md-6">Supplier</th>
                <th class="col-md-1">Jumlah</th>
                <th class="col-md-1">Satuan</th>
            </tr>
        </thead>
        <tfoot>
            <tr>
                <th class="col-sm-1">No</th>
                <th class="col-md-3">Nama Barang</th>
                <th class="col-md-3">Date Time</th>
                <th class="col-md-3">No Referensi</th>
                <th class="col-md-6">Supplier</th>
                <th class="col-md-1">Jumlah</th>
                <th class="col-md-1">Satuan</th>
            </tr>
        </tfoot>
        <tbody>
                
                @foreach ($data as $d)
                <tr>    
                    <td>{{$loop->iteration}}</td>
                    <td>{{$d->Nama_Barang}}</td>
                    <td>{{$d->Date}}</td>
                    <td>{{$d->No_referensi}}</td>
                    <td>{{$d->Supplier}}</td>
                    <td>{{$d->JumlahMasuk}}</td>
                    <td>{{$d->UoM}}</td>             
                </tr>
                @endforeach
                          
              
            </tbody>
        </table>
    </div>

   

<!-- AKHIR DATA -->

    <script>
        $(document).ready(function(){
            $('#datatable').DataTable();
        });
    </script>
</main>
@endsection