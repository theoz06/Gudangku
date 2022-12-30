@extends('layouts.mainlayout')
@section('title', 'Add Item')

@section('content')

<div class="main-container ">

  <div class="main-title" aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item active" aria-current="page">Data > Barang > Tambah Data
    </ol>
</div>
<hr>

    <form action="{{ url('/Operator/addItem') }}" method="POST" class="row-2 inputform" enctype="multipart/form-data">
        
        @csrf

            <div class="row mb-3">
              <label for="nameBarang" class="col-sm-2 col-form-label">Nama Barang</label>
              <div class="col-sm-4">
                <input type="text" class="form-control" name="namaBarang" id="namaBarang" required>
              </div>
            </div>
            <div class="row mb-3">
              <label for="nameCategory" class="col-sm-2 col-form-label">Kategori</label>
              <div class="col-sm-4">
                <select class="form-select " name="namaKategori" id="namaKategori" aria-label="Default select example" >
                  <option selected disabled>- Pilih Kategori -</option>

                  @foreach ($listKategori as $key => $rowKategori) 

                  <option value="{{$rowKategori->Nama_kategori}}">{{$rowKategori->Nama_kategori}}</option>
    

                  @endforeach

                </select>
              </div>
            </div>
            <div class="row mb-3">
              <label for="nameBrand" class="col-sm-2 col-form-label">Brand</label>
              <div class="col-sm-4">
                <select class="form-select " name="namaBrand" aria-label="Default select example" required>
                  <option selected disabled>- Pilih Brand -</option>
                  @foreach ($listBrand as $key=>$rowBrand)
                  <option value="{{ $rowBrand->Nama_brand }}">{{ $rowBrand->Nama_brand }}</option>
                  @endforeach
                </select>
              </div>
            </div>
            <div class="row mb-3">
              <label for="nameUoM" class="col-sm-2 col-form-label">UoM</label>
              <div class="col-sm-4">
                <select class="form-select " name="satuan" aria-label="Default select example" required>
                  <option selected disabled>- Pilih Satuan -</option>
                  @foreach($listUoM as $key=>$rowSatuan)
                  <option value="{{ $rowSatuan->Nama_uom }}">{{ $rowSatuan->Nama_uom }}</option>
                  @endforeach
                </select>
              </div>
            </div>
            <div class="row mb-3">
              <label for="jenisKurir" class="col-sm-2 col-form-label">Jenis Pengiriman</label>
              <div class="col-sm-4">
                <select class="form-select " name="jenisKurir" id="jenisKurir" aria-label="Default select example" required>
                  <option selected disabled>- Pilih Jenis Pengiriman -</option>
                  <option value="Reguler">Reguler</option>
                  <option value="Express">Express</option>
                </select>
              </div>
            </div>
            <div class="row mb-3">
              <label for="price" class="col-sm-2 col-form-label">Price (Rp)</label>
              <div class="col-sm-4">
                <input type="text" class="form-control" name="price" id="price">
              </div>
            </div>
            <div class="row mb-3">
              <label for="foto" class="col-sm-2 col-form-label">Gambar</label>
              <div class="col-sm-4">
                <input type="file" class="form-control" name="foto" id="foto">
              </div>
            </div>
            <div class="row mb-3">
              <label for="note" class="col-sm-2 col-form-label">Catatan</label>
              <div class="col-sm-4">
                <textarea class="form-control" name="note" id="note" required></textarea>
              </div>
            </div>
            <button type="submit" class="btn btn-primary mt-4 ml-auto uil uil-save">Simpan</button>
    </form>
    

</div>

@endsection