@extends('layouts.mainlayout')
@section('title', 'Receiving')

@section('content')
<main class="main-container addItem-form">

    <div class="main-title" aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item active" aria-current="page">Transaction > Receiving
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
            <h2>DATA Receiving</h2>
            <a type="button" class="btn btn-primary " href="/addReceiving" data-bs-target="#addbarang" data-bs-whatever="@mdo">+Add Item</a>
        </div>
        <hr>
    
        <table id="datatable" class="table table-striped table-bordered">
            <thead>
                <tr>
                    <th class="col-sm-1">No</th>
                    <th class="col-md-4">Date Time</th>
                    <th class="col-md-4">No Referensi</th>
                    <th class="col-md-4">Supplier</th>
                    <th class="col-md-1">Remarks</th>
                </tr>
            </thead>
            <tfoot>
                <tr>
                    <th class="col-sm-1">No</th>
                    <th class="col-md-4">Date Time</th>
                    <th class="col-md-4">No Referensi</th>
                    <th class="col-md-4">Supplier</th>
                    <th class="col-md-4">Remarks</th>
                </tr>
            </tfoot>
            <tbody>
                    
                @foreach($newReceiving as $key=>$data)
                    <tr>    
                        <td>{{$loop->iteration}}</td> 
                        <td>{{$data->Date}}</td>
                        <td>{{$data->No_referensi}}</td>
                        <td>{{$data->Supplier}}</td>
                        <td>{{$data->Catatan}}</td>            
                    </tr>          

                @endforeach  
                </tbody>
            </table>
    </div>

<!-- AKHIR DATA -->

    <script>
        $(document).ready(function(){
            $('#datatable').DataTable();
        });
    </script>
</main>
@endsection