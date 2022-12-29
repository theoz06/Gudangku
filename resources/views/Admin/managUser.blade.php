@extends('Admin.adminlayout')
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

        @if (session('fail'))
            <div class="alert alert-success">{{ session('fail') }}</div>      
        @endif

        <!-- TOMBOL TAMBAH DATA -->
        <div class="pb-3 d-flex add-btn">
            <h2>DATA USER</h2>
            <button type="button" class="btn btn-primary " data-bs-toggle="modal" data-bs-target="#addUser" data-bs-whatever="@mdo">+Add User</button>
        </div>
        <hr>
    
    <table id="datatableBarang" class="table table-striped table-bordered">
        <thead>
            <tr>
                <th class="col-sm-1">No</th>
                <th class="col-md-3">Username</th>
                <th class="col-md-3">Nama</th>
                <th class="col-md-2">Password</th>
                <th class="col-md-2">Hak Akses</th>
                <th class="col-md-1">Aksi</th>
            </tr>
        </thead>
        <tfoot>
            <tr>
                <th class="col-sm-1">No</th>
                <th class="col-md-3">Username</th>
                <th class="col-md-3">Nama</th>
                <th class="col-md-2">Password</th>
                <th class="col-md-2">Hak Akses</th>
                <th class="col-md-1">Aksi</th>
            </tr>
        </tfoot>
        <tbody>
                
            {{-- listbrand = variable yang di-set melalui backend --}}

            @foreach ($newUser as $data)
            <tr>    

                <td>{{$loop->iteration}}</td>
                <td>{{$data->nama}}</td>
                <td>{{$data->username}}</td>
                <td>{{$data->password}} </td>
                <td>{{$data->hakAkses}}</td>
                <td>
                    <a href="{{ route('editUser', ['id' => $data->id]) }}" class="btn btn-warning btn-sm uil uil-edit "></a>
                    <a href='delete/{{$data->id}}' class="btn btn-danger btn-sm uil uil-trash-alt"></a>
                </td>              
            </tr>
            @endforeach
            

              
            </tbody>
        </table>
    </div>

     <!-- Modal start -->

     <div class="modal fade" id="addUser" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Tambah Brand</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{ url('/Admin/addUser') }}" method="POST">
                        @csrf

                        <div class="row mb-3">
                            <label for="nama" class="col-sm-3 col-form-label">Nama</label>
                            <div class="col-sm-8">
                              <input type="text" class="form-control" name="nama" id="nama" autofocus >
                              <span class="text-danger">@error('nama'){{$message}}@enderror</span>
                            </div>
                        </div>
                
                        <div class="row mb-3">
                          <label for="hakAkses" class="col-sm-3 col-form-label">Hak Akses</label>
                          <div class="col-sm-8">
                            <select class="form-select " name="hakAkses" id="hakAkses" aria-label="Default select example" >
                              <option selected disabled>- Pilih Hak Akses -</option>
                              
                              <option value="Operator">Operator</option>
                              <option value="Admin">Admin</option>
                              <option value="Manager">Manager</option>
                              
                            </select>
                            <span class="text-danger">@error('hakAkses'){{$message}}@enderror</span>
                            
                          </div>
                        </div>
                
                        <div class="row mb-3">
                          <label for="username" class="col-sm-3 col-form-label">Username</label>
                          <div class="col-sm-8">
                            <input type="text" class="form-control" name="username" id="username" >
                            <span class="text-danger">@error("username"){{$message}}@enderror</span>
                          </div>
                        </div>
                
                        <div class="row mb-3 g-3">
                            <label for="password" class="col-sm-3 col-form-label">Password</label>
                            <div class="col-sm-8">
                              <input type="password" class="form-control" name="password" id="password" >
                              <span class="text-danger">@error('password'){{$message}}@enderror</span>
                            </div>
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

<!-- AKHIR DATA -->

    <script>
        $(document).ready(function(){
            $('#datatableBarang').DataTable();
        });

    
    </script>
</main>
@endsection