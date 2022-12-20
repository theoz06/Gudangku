<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\kategoriController;
use App\Http\Controllers\brandController;
use App\Http\Controllers\dashboardController;
use App\Http\Controllers\uomController;
use App\Http\Controllers\barangController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/dashboard', function () {
    return view('dashboard');
});

Route::get('/gudangku',function(){
    return view('dashboard');
});

// Route Master Data (kategori)

Route::resource('MD-Kategori',kategoriController::class);
Route::post('add-kategori', [kategoriController::class, 'store']);
Route::get('/edit-kategori/{id}',[kategoriController::class, 'update'])->name('edit-kategori');
Route::get('/edit-kategori/{id}',[kategoriController::class, 'edit'])->name('edit-kategori');
Route::get('/delete-kategori/{id}',[kategoriController::class, 'destroy'])->name('delete-kategori');

// Route::resource('MD-Kategori',kategoriController::class);
// Route::post('add-kategori', [kategoriController::class, 'store']);
// Route::get('/edit-kategori/{id}', [kategoriController::class, 'update'])->name('edit-kategori');
// Route::get('/edit-kategori/{id}','kategoriController@edit')->name('edit-kategori');
// Route::post('/delete/{id}',[kategoriController::class,'destroy'])->name('delete');

Route::get('/MD-Kategori',function(){
    $dataKategori = DB::table('kategori')->get(); // get data from database

    return view('MD-Kategori', ['listKategori' => $dataKategori]); // =>
    // listKategori = variable yang dikirimnama variable yang bakalan di pake di view nantinya.
});

Route::put('/edit-kategori/{id}', function($id){
    $dataKategori = DB::table('kategori')->get(); // get data from database

    return view('MD-Kategori', ['listKategori' => $dataKategori]); // =>
    // listKategori = variable yang dikirimnama variable yang bakalan di pake di view nantinya.
});

// Route Master Data (brand)

Route::resource('MD-Brand',brandController::class);
Route::post('add-brand',[brandController::class, 'store']);
Route::get('/edit-brand/{id}',[brandController::class, 'update'])->name('edit-brand');
Route::post('/add-brand/{id}','brandController@update')->name('add-brand');
Route::get('/edit-brand/{id}','brandController@edit')->name('edit-brand');
Route::post('/delete-brand/{id}',[brandController::class,'destroy'])->name('delete-brand');

Route::put('/edit-brand/{id}', function($id){

    $dataBrand = DB::table('brand')->get(); // get data from database

    return view('MD-Brand', ['listbrand' => $dataBrand]); // =>
    // listKategori = variable yang dikirimnama dataBrand yang bakalan di pake di view nantinya.
});

Route::get('/MD-Brand',function(){
    $dataBrand = DB::table('brand')->get();

    return view('MD-Brand', ['listbrand' => $dataBrand]);
});


// Route Mastr Data (UoM)

Route::resource('MD-UoM',uomController::class);
Route::post('add-uom', [uomController::class, 'store']);
Route::get('/edit-uom/{id}',[uomController::class, 'update'])->name('edit-uom');
Route::get('/edit-uom/{id}',[uomController::class, 'edit'])->name('edit-uom');
Route::get('/delete-uom/{id}', [uomController::class,'destroy'])->name('delete-uom');

Route::get('/MD-UoM',function(){

    $dataUoM = DB::table('uom')->get();
    return view('MD-UoM', ['listUoM'=> $dataUoM]);
});

//Master Data Barang
Route::resource('MD-Barang',barangController::class);
Route::get('addItem', [barangController::class, 'create'])->name('addItem');
Route::post('addItem', [barangController::class, 'store'])->name('addItem');

Route::get('/MD-Barang',function(){

    $dataBarang = DB::table('barang')->get();
    $dataBrand = DB::table('brand')->get();
    $dataKategori = DB::table('kategori')->get();
    $dataUoM = DB::table('uom')->get();

    return view('MD-Barang', ['listItem'=>$dataBarang,
                 'listBrand'=>$dataBrand, 
                 'listKategori'=>$dataKategori, 
                 'listUoM'=>$dataUoM]);

});

Route::get('/addItem',function(){

    $dataBarang = DB::table('barang')->get();
    $dataBrand = DB::table('brand')->get();
    $dataKategori = DB::table('kategori')->get();
    $dataUoM = DB::table('uom')->get();

    return view('addItem', ['listItem'=>$dataBarang,
                 'listBrand'=>$dataBrand, 
                 'listKategori'=>$dataKategori, 
                 'listUoM'=>$dataUoM]);

});



Route::get('/Rpt-issuing',function(){
    return view('Rpt-issuing');
});

Route::get('/Rpt-receiving',function(){
    return view('Rpt-receiving');
});

Route::get('/Rpt-stock',function(){
    return view('Rpt-stock');
});

Route::get('/receiving',function(){
    return view('receiving');
});

Route::get('/issuing',function(){
    return view('issuing');
});


