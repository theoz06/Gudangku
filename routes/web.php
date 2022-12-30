<?php

use App\Models\barang;
use App\Models\admin;
use App\Models\issuing;
use App\Models\kategori;
use App\Models\receiving;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\uomController;
use App\Http\Controllers\adminController;
use App\Http\Controllers\brandController;
use App\Http\Controllers\mainController;
use App\Http\Controllers\barangController;
use App\Http\Controllers\issuingController;
use App\Http\Controllers\kategoriController;
use App\Http\Controllers\receivingController;
use App\Http\Controllers\check;


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

Route::get('/', function(){
    return view('/auth/login');
});



/*---------------------------------------------- Operator Route Start ---------------------------------------------------*/


/*---------------------------------------------- Main Route Start ---------------------------------------------------*/
    Route::post('/auth/check', [mainController::class, 'check'])->name('auth.check');
    Route::get('/auth/logout', [mainController::class, 'logout'])->name('auth.logout');
    
/*---------------------------------------------- Main Route End ---------------------------------------------------*/




/*---------------------------------------------- Admin Route Start ---------------------------------------------------*/
Route::get('/Admin/dashboard', [adminController::class]);

Route::get('/Admin/dashboard', [adminController::class, 'index'])->name('dashboard');

Route::post('/Admin/addUser', [adminController::class, 'store'])->name('addUser');

Route::get('/Admin/editUser/{id}', [adminController::class, 'edit'])->name('editUser');

Route::post('/Admin/editUser/{id}', [adminController::class, 'update'])->name('editUser');

Route::get('/Admin/delete/{id}', [adminController::class, 'destroy'])->name('delete');

Route::get('/Admin/managUser', function(){
    $hakAkses = DB::table('roles')->get();
    $newUser = DB::table('admin')->get();
    return view('Admin.managUser',['newUser'=>$newUser,
                                    'role'=>$hakAkses 
    ]);
});

Route::get('/Admin/dashboard', function(){
    $barangCount = barang::count();
    $kategoriCount = kategori::count();
    $receivingCount = receiving::count();
    $issuingCount = issuing::count();

    return view('Admin.dashboard',['barang_Count'=> $barangCount,
                'kategoriCount'=> $kategoriCount,
                'receivingCount'=> $receivingCount,
                'issuingCount'=> $issuingCount]);
});
/*---------------------------------------------- Admin Route End ---------------------------------------------------*/

/*---------------------------------------------- Manager Route Start ---------------------------------------------------*/

Route::get('/Manager/managerDashboard', [managerController::class, 'index'])->name('managerDashboard');

Route::get('/Manager/managerDashboard', function(){
        $barangCount = barang::count();
        $kategoriCount = kategori::count();
        $receivingCount = receiving::count();
        $issuingCount = issuing::count();

        return view('Manager.managerDashboard',['barang_Count'=> $barangCount,
                    'kategoriCount'=> $kategoriCount,
                    'receivingCount'=> $receivingCount,
                    'issuingCount'=> $issuingCount]);
});

Route::get('/Manager/Rpt-issuing',function(){
    $rptIssuing = DB::table('issuing')->get();
    return view('Manager.Rpt-issuing',['data'=>$rptIssuing]);
});

// Route Report-Receiving

Route::get('/Manager/Rpt-receiving',function(){
    $rptReceiving = DB::table('receiving')->get();
    return view('Manager.Rpt-receiving',['data'=>$rptReceiving]);
});

Route::get('/Manager/Rpt-stock',function(){
    $rptStock = DB::table('barang')->get();
    return view('Manager.Rpt-stock',['data'=>$rptStock]);
});

/*---------------------------------------------- Manager Route end ---------------------------------------------------*/

Route::group(['middleware'=>['authCheck']], function(){
/*---------------------------------------------- Dashboard start ---------------------------------------------------*/

    Route::get('/auth/login', [mainController::class, 'login'])->name('auth.login');
    Route::get('/dashboard', function(){
        $barangCount = barang::count();
        $kategoriCount = kategori::count();
        $receivingCount = receiving::count();
        $issuingCount = issuing::count();
    
        return view('dashboard',[
                    'barang_Count'=> $barangCount,
                    'kategoriCount'=> $kategoriCount,
                    'receivingCount'=> $receivingCount,
                    'issuingCount'=> $issuingCount]);
    });
    
    Route::get('/gudangku',function(){
        $barangCount = barang::count();
        $kategoriCount = kategori::count();
        $receivingCount = receiving::count();
        $issuingCount = issuing::count();
    
        return view('dashboard',['barang_Count'=> $barangCount,
                    'kategoriCount'=> $kategoriCount,
                    'receivingCount'=> $receivingCount,
                    'issuingCount'=> $issuingCount]);
    });
                    
/*---------------------------------------------- Dashboard end ---------------------------------------------------*/
});

/*---------------------------------------------- Operator Route start ---------------------------------------------------*/

    // Route Master Data (kategori)

    
Route::post('add-kategori', [kategoriController::class, 'store']);
Route::get('/edit-kategori/{id}',[kategoriController::class, 'update'])->name('edit-kategori');
Route::get('/edit-kategori/{id}',[kategoriController::class, 'edit'])->name('edit-kategori');
Route::get('/delete-kategori/{id}',[kategoriController::class, 'destroy'])->name('delete-kategori');

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

Route::get('/editItem/{id}', [barangController::class, 'edit'])->name('editItem');

Route::post('/editItem/{id}', [barangController::class, 'update'])->name('editItem');

Route::get('/delete/{id}', [barangController::class,'destroy'])->name('delete');

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

    return view('addItem', [
        'listItem'=>$dataBarang,
        'listBrand'=>$dataBrand, 
        'listKategori'=>$dataKategori, 
        'listUoM'=>$dataUoM
    ]);
});

Route::get('/Rpt-issuing',function(){

    $rptIssuing = DB::table('issuing')->get();

    return view('Rpt-issuing',['data'=>$rptIssuing]);
});

// Route Report-Receiving

Route::get('/Rpt-receiving',function(){
    $rptReceiving = DB::table('receiving')->get();
    return view('Rpt-receiving',['data'=>$rptReceiving]);
});

Route::get('/Rpt-stock',function(){
    $rptStock = DB::table('barang')->get();
    return view('Rpt-stock',['data'=>$rptStock]);
});

// Route Receiving
Route::get('receiving', [receivingController::class]);

Route::get('addReceiving', [receivingController::class, 'create'])->name('addReceiving');

Route::post('addReceiving', [receivingController::class, 'store'])->name('addReceiving');

Route::get('delete/{id}', [receivingController::class, 'destroy'])->name('delete');

Route::get('receivingView',[receivingController::class, 'tampil'])->name('receivingView');

Route::get('/receiving',function(){

    $newReceiving = DB::table('receiving')->get();

    return view('receiving',['newReceiving'=>$newReceiving]);
});

// Route Issuing
Route::get('issuing', [issuingController::class]);

Route::get('addIssuing',[issuingController::class, 'create'])->name('addIssuing');

Route::post('addIssuing', [issuingController::class, 'store'])->name('addIssuing');

Route::get('delete/{id}',[issuingController::class, 'destroy'])->name('delete');

Route::get('Issuing/IssuingView',[issuingController::class, 'tampil'])->name('IssuingView');

Route::get('/issuing',function(){

    $newIssuing = DB::table('issuing')->get();

    return view('issuing', ['newIssuing'=>$newIssuing]);
});

/*---------------------------------------------- Operator Route End ---------------------------------------------------*/
