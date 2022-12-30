@extends('layouts.mainlayout')
@section('title', 'Tambah Receiving')

@section('content')

<div class="main-container ">

  <div class="main-title" aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item active" aria-current="page">Transaction > Receiving > Tambah Transaksi
    </ol>
</div>
<hr>

    <form action="{{ url('/Operator/addReceiving') }}" method="POST" class="row-2 inputform" style="border: 1px solid #E2E3FC" enctype="multipart/form-data">
      
        @csrf

        <div class="row mb-3">
          <label for="jenisbarang" class="col-sm-2 col-form-label">Jenis Barang</label>
          <div class="col-sm-4">
            <select class="form-select " name="jenisbarang" aria-label="Default select example" required>
              <option selected disabled>- Pilih Barang -</option>
              @foreach ($listBarang as $item)
              <option value="{{$item->Nama_barang}}">{{$item->Nama_barang}}</option>
              @endforeach
              
            </select>
            
          </div>

          <label for="satuan" class="col-sm-1 col-form-label">UoM</label>
            <div class="col-sm-1  date-col">
              <input type="text" class="form-control " name="satuan" id="satuan" required>
            </div>
        </div>

        <div class="row mb-3">
          <label for="namesupplier" class="col-sm-2 col-form-label">Supplier</label>
          <div class="col-sm-6">
            <input type="text" class="form-control" name="namasupplier" id="namasupplier" required>
          </div>
        </div>

        <div class="row mb-3">
          <label for="nameReferensi" class="col-sm-2 col-form-label">No Referensi</label>
          <div class="col-sm-6">
            <input type="text" class="form-control" name="noReferensi" id="noReferensi" required>
          </div>
        </div>

        <div class="row mb-3 g-3">
            <label for="stokmasuk" class="col-sm-2 col-form-label">Jumlah</label>
            <div class="col-sm-1">
              <input type="text" class="form-control" name="stokmasuk" id="stokmasuk" required>
            </div>

            <label for="dateIn" class="col-sm-1 col-form-label">date</label>
            <div class="col-sm-4  date-col">
              <input type="date" class="form-control" name="dateIn" id="dateIn" required>
            </div>
        </div>

        <div class="row mb-3">
          <label for="note" class="col-sm-2 col-form-label">Catatan</label>
          <div class="col-sm-6">
            <textarea class="form-control" name="note" id="note" required></textarea>
          </div>
        </div>

        <button type="submit" class="btn btn-primary mt-4 ml-auto uil uil-save">Simpan</button>
    </form>
       
</div>

@endsection