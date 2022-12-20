@extends('layouts.mainlayout')
@section('title', 'Master Data')

@section('content')
<main class="main-container addItem-form">

    <div class="main-title" aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item active" aria-current="page">Data > Barang
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
            <h2>DATA BARANG</h2>
            <a type="button" class="btn btn-primary " href="/addItem" data-bs-target="#addbarang" data-bs-whatever="@mdo">+Add Item</a>
        </div>
        <hr>
    
    <table id="datatableBarang" class="table table-striped table-bordered">
        <thead>
            <tr>
                <th class="col-sm-1">No</th>
                <th class="col-md-4">Nama Barang</th>
                <th class="col-md-4">Brand</th>
                <th class="col-md-4">UoM</th>
                <th class="col-md-1">Aksi</th>
            </tr>
        </thead>
        <tfoot>
            <tr>
                <th class="col-sm-1">No</th>
                <th class="col-md-4">Nama Barang</th>
                <th class="col-md-4">Brand</th>
                <th class="col-md-4">UoM</th>
                <th class="col-md-1">Aksi</th>
            </tr>
        </tfoot>
        <tbody>
                
            @foreach($listItem as $key => $data)
            {{-- listbrand = variable yang di-set melalui backend --}}
                <tr>    

                    <td>{{$loop->iteration}}</td>
                    <td>{{$data->Nama_barang}}</td>
                    <td>{{$data->Brand}}</td>
                    <td>{{$data->UoM}}</td>
                    <td>
                        <a href="#" class="uil uil-folder-open"></a>
                        <a href='#' class="btn btn-warning btn-sm uil uil-edit editBarang" ></a>
                        <a href="/delete-barang/{{$data->id}}" class="btn btn-danger btn-sm uil uil-trash-alt"></a>
                    </td>              
                </tr>
                
            @endforeach            

              
            </tbody>
        </table>
    </div>

   

<!-- AKHIR DATA -->

    <script>
        $(document).ready(function(){
            $('#datatableBarang').DataTable();
        });
    </script>
</main>
@endsection