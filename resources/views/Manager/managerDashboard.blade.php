@extends('Manager.managerlayout')
@section('title','Home-Manager')

@section('content')
<main class="main-container">

    <div class="main-title" aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item active" aria-current="page">Dashboard</li>
        </ol>
    </div>
    
    <div class="main-cards">
        <div class="card">
            <div class="card-inner">
                <p class="title">BARANG</p>
            </div>
            <span class="title">{{$barang_Count}}</span>
            <i class="uil uil-desktop bg-info"></i>
        </div>
    
        <div class="card">
            <div class="card-inner">
                <p class="title">Zero Stock</p>
            </div>
            <span class="title">0</span>
            <i class="uil uil-minus-circle bg-danger"></i>
        </div>
    
        <div class="card">
            <div class="card-inner">
                <p class="title">Max Stock</p>
            </div>
            <span class="title">3</span>
            <i class="uil uil-arrow-up bg-primary"></i>
        </div>
    
        <div class="card">
            <div class="card-inner">
                <p class="title">Kategori</p>
            </div>
            <span class="title">{{$kategoriCount}}</span>
            <i class="uil uil-plus bg-success"></i>
        </div>
    
    </div>
    
        <div class="mini-card">
            <div class="mini-card-item">
                <div class="card-inner">
                    <p class="title">Receiving</p>
                </div>
                <span class="title">{{$receivingCount}}</span>
                <i class="uil uil-shopping-cart"></i>
            </div>
    
            <div class="mini-card-item">
                <div class="card-inner">
                    <p class="title">User</p>
                </div>
                <span class="title">{{$userCount}}</span>
                <i class="uil uil-user "></i>
            </div>
    
            <div class="mini-card-item">
                <div class="card-inner">
                    <p class="title">Issuing</p>
                </div>
                <span class="title">{{$issuingCount}}</span>
                <i class="uil uil-truck "></i>
            </div>
        </div>
    

</main>
@endsection

