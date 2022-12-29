@extends('Admin.adminlayout')
@section('title', 'Tambah Issuing')

@section('content')

<div class="main-container ">

  <div class="main-title" aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item active" aria-current="page">Data > User > Tambah User
    </ol>
</div>
<hr>

    <form action="{{ url('addUser') }}" method="POST" class="row-2 inputform" style="border: 1px solid #E2E3FC" enctype="multipart/form-data">
      
        @csrf

        <div class="row mb-3">
            <label for="nama" class="col-sm-2 col-form-label">Nama</label>
            <div class="col-sm-6">
              <input type="text" class="form-control" name="nama" id="nama" value="{{ old('nama')}}">
              <span class="text-danger">@error('nama'){{$message}}@enderror</span>
            </div>
        </div>

        <div class="row mb-3">
          <label for="hakAkses" class="col-sm-2 col-form-label">Hak Akses</label>
          <div class="col-sm-4">
            <select class="form-select " name="hakAkses" id="hakAkses" aria-label="Default select example" value="{{old('hakAkses')}}">
              <option selected disabled>- Pilih Hak Akses -</option>
              
              <option value="Operator">Operator</option>
              <option value="Admin">Admin</option>
              <option value="Manager">Operator</option>
              
            </select>
            <span class="text-danger">@error('hakAkses'){{$message}}@enderror</span>
            
          </div>
        </div>

        <div class="row mb-3">
          <label for="username" class="col-sm-2 col-form-label">Username</label>
          <div class="col-sm-6">
            <input type="text" class="form-control" name="username" id="username" value="{{old('username')}}">
            <span class="text-danger">@error('username'){{$message}}@enderror</span>
          </div>
        </div>

        <div class="row mb-3 g-3">
            <label for="stokOut" class="col-sm-2 col-form-label">Password</label>
            <div class="col-sm-1">
              <input type="password" class="form-control" name="password" id="password" value="{{old('password')}}">
              <span class="text-danger">@error('password'){{$message}}@enderror</span>
            </div>
        </div>

        <div class="row mb-3">
            <label for="nameGambar" class="col-sm-2 col-form-label">Gambar</label>
            <div class="col-sm-4">
              <input type="file" class="form-control" name="gambar" id="gambar" value="#">
            </div>
        </div>

        <button type="submit" class="btn btn-primary mt-4 ml-auto uil uil-save">Simpan</button>
    </form>
       
</div>

@endsection