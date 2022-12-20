@extends('layouts.mainlayout')
@section('title', 'Master Data')

@section('content')
<main class="main-container">

    <div class="main-title" aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item active" aria-current="page">Data > Kategori
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
            <h2>KATEGORI BARANG</h2>
            <button type="button" class="btn btn-primary " data-bs-toggle="modal" data-bs-target="#addKategori" data-bs-whatever="@mdo">+Add Kategori</button>
        </div>
        <hr>

        <!-- FORM PENCARIAN -->
       {{-- <div class="pb-3 search-input">
        <form class="d-flex" action="" method="get">
            <input class="form-control me-1" type="search" name="katakunci" value="{{ Request::get('katakunci') }}" placeholder="Masukkan kata kunci" aria-label="Search">
            <button class="btn btn-secondary" type="submit">Cari</button>
        </form>
        </div>--}}

        <!-- Modal start -->

        <div class="modal fade" id="addKategori" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Tambah Kategori</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form action="{{ url('add-kategori') }}" method="POST">
                            @csrf

                            <div class="mb-3">
                                <label for="namekategori" class="col-form-label">Nama Kategori:</label>
                                <input type="text" class="form-control" name="namakategori" aria-label="default input example" required>
                            </div>

                            <div class="modal-footer">
                                <button type="submit" class="btn btn-primary">Save</button>
                                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancel</button>
                            </div>

                        </form>
                    </div>     
                </div>
            </div>
        </div>

        <!-- Modal end -->
    
    <table id="datatableKategori" class="table table-striped table-bordered">
        <thead>
            <tr>
                <th class="col-sm-1">No</th>
                <th class="col-md-4">Nama Kategori</th>
                <th class="col-md-1">Aksi</th>
            </tr>
        </thead>
        <tfoot>
            <tr>
                <th class="col-sm-1">No</th>
                <th class="col-md-4">Nama Kategori</th>
                <th class="col-md-1">Aksi</th>
            </tr>
        </tfoot>
        <tbody>
                
            @foreach($listKategori as $key => $data)
            {{-- listKategori = variable yang di-set melalui backend --}}
                <tr>    

                    <td>{{$loop->iteration}}</td>
                    <td>{{$data->Nama_kategori}}</td>
                    <td>
                        <a href='#' class="btn btn-warning btn-sm uil uil-edit editKategori" data-bs-target="#editModalKategori"></a>
                        <a href="/delete-kategori/{{ $data->id }}" class="btn btn-danger btn-sm uil uil-trash-alt"></a>
                    </td>              
                </tr>
                
            @endforeach            
            {{-- <tr>
                <td>1</td>
                <td>aaa</td>
                <td>
                    <a href='' class="btn btn-warning btn-sm uil uil-edit"></a>
                    <a href='' class="btn btn-danger btn-sm uil uil-trash-alt"></a>
                </td>
            </tr> --}}

              
            </tbody>
        </table>
    </div>

    <!-- Edit Modal -->
    <div class="modal fade" id="editModalKategori" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Edit Kategori</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{ url('edit-kategori') }}" method="PUT" id="editFormKategori"> 
                @method('PATCH')
                @csrf

                <div class="mb-3">
                    <label for="namekategori" class="col-form-label">Nama Kategori:</label>
                    <input type="text" class="form-control" name="namakategori" id="namakategori" aria-label="default input example" required>
                </div>

                <div class="modal-footer">
                    <input type="submit" class="btn btn-primary" value="submit">
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancel</button>
                </div>

                </form>
            </div>
            
            </div>
        </div>
    </div>

    <script src="js/script.js"></script>
<!-- AKHIR DATA -->
</main>
@endsection