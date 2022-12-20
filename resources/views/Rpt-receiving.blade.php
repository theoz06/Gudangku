@extends('layouts.mainlayout')
@section('title', 'Receiving')

@section('content')
<main class="main-container addItem-form">

    <div class="main-title" aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item active" aria-current="page">Transaction > Receiving
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
                <th class="col-md-4">Nama Barang</th>
                <th class="col-md-4">Date Time</th>
                <th class="col-md-4">No Referensi</th>
                <th class="col-md-4">Supplier</th>
                <th class="col-md-1">Jumlah</th>
                <th class="col-md-1">Satuan</th>
            </tr>
        </thead>
        <tfoot>
            <tr>
                <th class="col-sm-1">No</th>
                <th class="col-md-4">Nama Barang</th>
                <th class="col-md-4">Date Time</th>
                <th class="col-md-4">No Referensi</th>
                <th class="col-md-4">Supplier</th>
                <th class="col-md-1">Jumlah</th>
                <th class="col-md-1">Satuan</th>
            </tr>
        </tfoot>
        <tbody>
                

                <tr>    
                    <td>No</td>
                    <td>Nama Barang</td>
                    <td>Date Time</td>
                    <td>No Referensi</td>
                    <td>Supplier</td>
                    <td>Jumlah</td>
                    <td>Satuan</td>             
                </tr>          

              
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