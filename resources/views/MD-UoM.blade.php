@extends('layouts.mainlayout')
@section('title', 'Master Data')

@section('content')
<main class="main-container">

    <div class="main-title" aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item active" aria-current="page">Data > UoM
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
            <h2>UoM BARANG</h2>
            <button type="button" class="btn btn-primary " data-bs-toggle="modal" data-bs-target="#adduom" data-bs-whatever="@mdo">+Add UoM</button>
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

        <div class="modal fade" id="adduom" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Tambah UoM</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form action="{{ url('add-uom') }}" method="POST">
                            @csrf

                            <div class="mb-3">
                                <label for="nameuom" class="col-form-label">Nama UoM:</label>
                                <input type="text" class="form-control" name="namauom" id="namauom" aria-label="default input example" required>
                            </div>
                            <div class="mb-3">
                                <label for="keterangan" class="col-form-label">Keterangan:</label>
                                <input type="text" class="form-control" name="keterangan" id="keterangan" aria-label="default input example" required>
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
    
    <table id="datatableUom" class="table table-striped table-bordered">
        <thead>
            <tr>
                <th class="col-sm-1">No</th>
                <th class="col-md-4">Nama Satuan</th>
                <th class="col-md-4">Keterangan</th>
                <th class="col-md-1">Aksi</th>
            </tr>
        </thead>
        <tfoot>
            <tr>
                <th class="col-sm-1">No</th>
                <th class="col-md-4">Nama Satuan</th>
                <th class="col-md-4">Keterangan</th>
                <th class="col-md-1">Aksi</th>
            </tr>
        </tfoot>
        <tbody>
                
            @foreach($listUoM as $key => $data)
            {{-- listbrand = variable yang di-set melalui backend --}}
                <tr>    

                    <td>{{$loop->iteration}}</td>
                    <td>{{$data->Nama_uom}}</td>
                    <td>{{$data->Keterangan}}</td>
                    <td>
                        <a href="#" class="btn btn-warning btn-sm uil uil-edit editUom" data-bs-target="#editModalUom"></a>
                        <a href='/delete-uom/{{$data->id}}' class="btn btn-danger btn-sm uil uil-trash-alt"></a>
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
    <div class="modal fade" id="editModalUom" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Edit UoM</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{ url('edit-uom') }}" method="PUT" id="editFormUom">
                @method('PATCH')
                @csrf
                

                <div class="mb-3">
                    <label for="nameuom" class="col-form-label">Nama UoM:</label>
                    <input type="text" class="form-control" name="namauom" id="namauom" aria-label="default input example" required>
                </div>
                <div class="mb-3">
                    <label for="keterangan" class="col-form-label">Keterangan:</label>
                    <input type="text" class="form-control" name="keterangan" id="keterangan" aria-label="default input example" required>
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

    <script src="js/script3.js"></script>
<!-- AKHIR DATA -->
</main>
@endsection