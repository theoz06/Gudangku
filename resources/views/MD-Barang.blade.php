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
                <th class="col-md-3">Nama Barang</th>
                <th class="col-md-3">Brand</th>
                <th class="col-md-1">UoM</th>
                <th class="col-md-1">Aksi</th>
            </tr>
        </thead>
        <tfoot>
            <tr>
                <th class="col-sm-1">No</th>
                <th class="col-md-3">Nama Barang</th>
                <th class="col-md-3">Brand</th>
                <th class="col-md-1">UoM</th>
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
                        <button href="#" data-bs-toggle="modal" data-bs-target="#view-{{ $data->id }}" class="btn btn-sm uil uil-folder-open btn-success"></button>
                        <a href="{{ route('editItem', [ 'id' => $data->id ]) }}" class="btn btn-warning btn-sm uil uil-edit editBarang" ></a>
                        <a href='delete/{{$data->id}}' class="btn btn-danger btn-sm uil uil-trash-alt"></a>
                    </td>              
                </tr>
                
                <div class="modal fade" id="view-{{ $data->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                  <div class="modal-dialog modal-lg modal-dialog-centered">
                    <div class="modal-content" style="background-color: #eee;">
                      <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">{{$data->Nama_barang}}</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                      </div>
                      <div class="modal-body">
                          <div class="row">
                              <div class="container py-1">
                                  <div class="row">
                                    <div class="col-lg-3">
                                      <div class="card mb-2">
                                        <div class="card-body text-center">
                                          @if ($data->Gambar)
                                              <img src="{{ asset('Gambar/'. $data->Gambar) }}" style="width: 250px" class="img-thumbnail" alt="#">
                                          @endif
                                          {{-- <img src="{{$data->Gambar}}" alt="avatar"
                                            class="rounded-circle img-fluid" style="width: 150px;"> --}}
                                        </div>
                                      </div>
                              
                                    </div>
                                    <div class="col-lg-9">
                                      <div class="card mb-2">
                                        <div class="card-body">
                                          <div class="row">
                                            <div class="col-sm-4">
                                              <p class="mb-0">ID Barang</p>
                                            </div>
                                            <div class="col-sm-8">
                                              <p class="text-muted mb-0">{{$data->id}}</p>
                                            </div>
                                          </div>
                                          <hr>
                                          <div class="row">
                                            <div class="col-sm-4">
                                              <p class="mb-0">Nama Barang</p>
                                            </div>
                                            <div class="col-sm-8">
                                              <p class="text-muted mb-0">{{$data->Nama_barang}}</p>
                                            </div>
                                          </div>
                                          <hr>
                                          <div class="row">
                                            <div class="col-sm-4">
                                              <p class="mb-0">Brand</p>
                                            </div>
                                            <div class="col-sm-8">
                                              <p class="text-muted mb-0">{{$data->Brand}}</p>
                                            </div>
                                          </div>
                                          <hr>
                                          <div class="row">
                                            <div class="col-sm-4">
                                              <p class="mb-0">Kategori</p>
                                            </div>
                                            <div class="col-sm-8">
                                              <p class="text-muted mb-0">{{$data->Kategori}}</p>
                                            </div>
                                          </div>
                                          <hr>
                                          <div class="row">
                                              <div class="col-sm-4">
                                                <p class="mb-0">Pengiriman</p>
                                              </div>
                                              <div class="col-sm-8">
                                                <p class="text-muted mb-0">{{$data->jPengiriman}}</p>
                                              </div>
                                          </div>
                                          <hr>
                                          <div class="row">
                                              <div class="col-sm-4">
                                                <p class="mb-0">UoM</p>
                                              </div>
                                              <div class="col-sm-8">
                                                <p class="text-muted mb-0">{{$data->UoM}}</p>
                                              </div>
                                          </div>
                                          <hr>
                                          <div class="row">
                                              <div class="col-sm-4">
                                                <p class="mb-0">Price (Rp)</p>
                                              </div>
                                              <div class="col-sm-8">
                                                <p class="text-muted mb-0">{{$data->Price}}</p>
                                              </div>
                                          </div>
                                          <hr>
                                          <div class="row">
                                          <div class="col-sm-4">
                                              <p class="mb-0">Catatan</p>
                                          </div>
                                          <div class="col-sm-8">
                                              <p class="text-muted mb-0">{{$data->Catatan}}</p>
                                          </div>
                                          </div>
                                          <hr>
        
        
                  
                                      </div>
                                    </div>
                                  </div>
                                </div>
                          </div>
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                      </div>
                  </div>
                </div>
              </div>
            @endforeach            

              
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