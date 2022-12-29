@extends('layouts.mainlayout')
@section('title', 'Management User')


@section('content')
<main class="main-container addItem-form">

    <div class="main-title" aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item active" aria-current="page">Data > User
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
            <a type="button" class="btn btn-primary " href="/addUser" data-bs-target="#addbarang" data-bs-whatever="@mdo">+Add User</a>
        </div>
        <hr>
    
    <table id="datatableBarang" class="table table-striped table-bordered">
        <thead>
            <tr>
                <th class="col-sm-1">No</th>
                <th class="col-md-3">Username</th>
                <th class="col-md-3">Nama</th>
                <th class="col-md-1">Password</th>
                <th class="col-md-3">Hak Akses</th>
                <th class="col-md-1">Aksi</th>
            </tr>
        </thead>
        <tfoot>
            <tr>
                <th class="col-sm-1">No</th>
                <th class="col-md-3">Username</th>
                <th class="col-md-3">Nama</th>
                <th class="col-md-1">Password</th>
                <th class="col-md-3">Hak Akses</th>
                <th class="col-md-1">Aksi</th>
            </tr>
        </tfoot>
        <tbody>
                
            {{-- listbrand = variable yang di-set melalui backend --}}
            <tr>    

                <td>1</td>
                <td>dummy</td>
                <td>dummy</td>
                <td>dummy</td>
                <td>dummy</td>
                <td>
                    <a href="#" class="btn btn-warning btn-sm uil uil-edit editBarang" ></a>
                    <a href='#' class="btn btn-danger btn-sm uil uil-trash-alt"></a>
                </td>              
            </tr>

              
            </tbody>
        </table>
    </div>
    {{-- @foreach($listItem as $key=>$data)
      
    @endforeach --}}

   

<!-- AKHIR DATA -->

    <script>
        $(document).ready(function(){
            $('#datatableBarang').DataTable();
        });
    </script>
</main>
@endsection