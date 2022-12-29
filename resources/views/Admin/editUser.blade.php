@extends('Admin.adminlayout')
@section('title', 'Edit User')

@section('content')

<div class="main-container ">

  <div class="main-title" aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item active" aria-current="page">Data > User > Edit User
    </ol>
</div>
<hr>

    <form action="{{ route('editUser', ['id' => $data->id]) }}" method="POST" class="row-2 inputform" style="border: 1px solid #E2E3FC" enctype="multipart/form-data">
        @method('POST')
        @csrf

        <div class="row mb-3">
            <label for="nama" class="col-sm-2 col-form-label">Nama</label>
            <div class="col-sm-4">
              <input type="text" class="form-control" name="nama" id="nama" required value="{{$data->nama}}">
            </div>
        </div>

        <div class="row mb-3">
          <label for="hakAkses" class="col-sm-2 col-form-label">Hak Akses</label>
          <div class="col-sm-4">
            <select class="form-select" required name="hakAkses" id="hakAkses" aria-label="Default select example">
              <option value="Operator" selected="{{ $data->hakAkses == 'Operator' ? true : false }}">Operator</option>
              <option value="Admin" selected="{{ $data->hakAkses == 'Admin' ? true : false }}">Admin</option>
              <option value="Manager" selected="{{ $data->hakAkses == 'Manager' ? true : false }}">Manager</option>
            </select>
          </div>
        </div>

        <div class="row mb-3">
          <label for="username" class="col-sm-2 col-form-label">Username</label>
          <div class="col-sm-4">
            <input type="text" class="form-control" name="username" id="username" value="{{$data->username}}" required>
          </div>
        </div>

        <div class="row mb-3 g-3">
            <label for="password" class="col-sm-2 col-form-label">Password</label>
            <div class="col-sm-4">
              <input type="password" class="form-control" name="password" id="password" value="{{$data->password}}" required>
            </div>
        </div>

        <button type="submit" class="btn btn-primary mt-4 ml-auto uil uil-save">Simpan</button>
    </form>
       
</div>

@endsection