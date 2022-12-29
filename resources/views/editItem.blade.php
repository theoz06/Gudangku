@extends('layouts.mainlayout')
@section('title', 'Edit Item')

@section('content')

<div class="main-container ">

  <div class="main-title" aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item active" aria-current="page">Data > Barang > Ubah Data
    </ol>
</div>
<hr>

    <form action="{{ route('editItem', ['id' => $data->id]) }}" method="POST" class="row-2 inputform" enctype="multipart/form-data">
        @method('POST')
        @csrf

        <div class="row mb-3">
          <label for="nameBarang" class="col-sm-2 col-form-label">Nama Barang</label>
          <div class="col-sm-4">
            <input type="text" class="form-control" name="namaBarang" id="namaBarang" value="{{$data->Nama_barang}}" required>
          </div>
        </div>

        <div class="row mb-3">
          <label for="nameCategory" class="col-sm-2 col-form-label">Kategori</label>
          <div class="col-sm-4">
            <select class="form-select " name="namaKategori" id="namaKategori" aria-label="Default select example" >
              @foreach ($listKategori as $key => $rowKategori) 
                <option 
                  value="{{ $rowKategori->Nama_kategori }}" 
                  selected="{{ $rowKategori->Nama_kategori == $data->Kategori ? true : false }}"
                >
                  {{ $rowKategori->Nama_kategori }}
                </option>
              @endforeach

            </select>
          </div>
        </div>

        <div class="row mb-3">
          <label for="nameBrand" class="col-sm-2 col-form-label">Brand</label>
          <div class="col-sm-4">
            <select class="form-select " name="namaBrand" aria-label="Default select example" required>
              @foreach ($listBrand as $key=>$rowBrand)
                <option 
                  value="{{ $rowBrand->Nama_brand }}" 
                  selected="{{ $rowBrand->Nama_brand == $data->Brand ? true : false }}"
                >
                  {{ $rowBrand->Nama_brand }}
                </option>
              @endforeach
            </select>
          </div>
        </div>

        <div class="row mb-3">
          <label for="nameUoM" class="col-sm-2 col-form-label">UoM</label>
          <div class="col-sm-4">
            <select class="form-select " name="satuan" aria-label="Default select example" required>
              @foreach($listUoM as $key=>$rowSatuan)
                <option 
                  value="{{ $rowSatuan->Nama_uom }}" 
                  selected="{{ $rowSatuan->Nama_uom == $data->UoM ? true : false }}"
                >
                  {{ $rowSatuan->Nama_uom }}
                </option>
              @endforeach
            </select>
          </div>
        </div>

        <div class="row mb-3">
          <label for="jenisKurir" class="col-sm-2 col-form-label">Jenis Pengiriman</label>
          <div class="col-sm-4">
            <select class="form-select" required name="jenisKurir" id="jenisKurir" aria-label="Default select example">
              <option value="Reguler" selected="{{ $data->jPengiriman == 'Reguler' ? true : false }}">Reguler</option>
              <option value="Express" selected="{{ $data->jPengiriman == 'Express' ? true : false }}">Express</option>
            </select>
            
          </div>
        </div>

        <div class="row mb-3">
          <label for="price" class="col-sm-2 col-form-label">Price (Rp)</label>
          <div class="col-sm-4">
            <input type="text" class="form-control" name="price" id="price" value="{{$data->Price}}">
          </div>
        </div>

        <div class="row mb-3">
          <label for="nameGambar" class="col-sm-2 col-form-label">Gambar</label>
          <div class="col-sm-4">
            <input type="file" class="form-control" name="gambar" id="gambar" value="{{$data->Gambar}}">
          </div>
        </div>

        <div class="row mb-3">
          <label for="note" class="col-sm-2 col-form-label">Catatan</label>
          <div class="col-sm-4">
            <textarea class="form-control" name="note" id="note" required>{{$data->Catatan}}</textarea>
          </div>
        </div>

        <button type="submit" class="btn btn-primary mt-4 ml-auto uil uil-save">Simpan</button>
    </form>
    
    
</div>

@endsection