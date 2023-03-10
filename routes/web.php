<?php

use App\Models\admin;
use App\Models\barang;
use App\Models\issuing;
use App\Models\kategori;
use App\Models\receiving;
use App\Http\Controllers\check;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\uomController;
use App\Http\Controllers\mainController;
use App\Http\Controllers\adminController;
use App\Http\Controllers\brandController;
use App\Http\Controllers\barangController;
use App\Http\Controllers\reportController;
use App\Http\Controllers\issuingController;
use App\Http\Controllers\kategoriController;
use App\Http\Controllers\receivingController;


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
    $newUser = DB::table('admin')->get();
    return view('Admin.managUser',['newUser'=>$newUser,
    ]);
});

Route::get('/Admin/dashboard', function(){
        $userCount = admin::count();
        $barangCount = barang::count();
        $kategoriCount = kategori::count();
        $receivingCount = receiving::count();
        $issuingCount = issuing::count();

        return view('Admin.dashboard',[
                    'userCount'=>$userCount,
                    'barang_Count'=> $barangCount,
                    'kategoriCount'=> $kategoriCount,
                    'receivingCount'=> $receivingCount,
                    'issuingCount'=> $issuingCount]);
});
/*---------------------------------------------- Admin Route End ---------------------------------------------------*/

/*---------------------------------------------- Manager Route Start ---------------------------------------------------*/

Route::get('/Manager/managerDashboard', [managerController::class, 'index'])->name('managerDashboard');

Route::get('/Manager/managerDashboard', function(){
    $userCount = admin::count();
    $barangCount = barang::count();
    $kategoriCount = kategori::count();
    $receivingCount = receiving::count();
    $issuingCount = issuing::count();

    return view('Manager.managerdashboard',[
                'userCount'=>$userCount,
                'barang_Count'=> $barangCount,
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
        $userCount = admin::count();
        $barangCount = barang::count();
        $kategoriCount = kategori::count();
        $receivingCount = receiving::count();
        $issuingCount = issuing::count();

        return view('dashboard',[
                    'userCount'=>$userCount,
                    'barang_Count'=> $barangCount,
                    'kategoriCount'=> $kategoriCount,
                    'receivingCount'=> $receivingCount,
                    'issuingCount'=> $issuingCount]);
    });
    
    Route::get('/gudangku',function(){
        $userCount = admin::count();
        $barangCount = barang::count();
        $kategoriCount = kategori::count();
        $receivingCount = receiving::count();
        $issuingCount = issuing::count();

        return view('dashboard',[
                    'userCount'=>$userCount,
                    'barang_Count'=> $barangCount,
                    'kategoriCount'=> $kategoriCount,
                    'receivingCount'=> $receivingCount,
                    'issuingCount'=> $issuingCount]);
    });
                    
/*---------------------------------------------- Dashboard end ---------------------------------------------------*/


    Route::resource('/Operator/MD-Barang',barangController::class);

    Route::get('/Operator/addItem', [barangController::class, 'create'])->name('addItem');

    Route::post('/Operator/addItem', [barangController::class, 'store'])->name('addItem');

    Route::get('/Operator/editItem/{id}', [barangController::class, 'edit'])->name('editItem');

    Route::post('/Operator/editItem/{id}', [barangController::class, 'update'])->name('editItem');

    Route::get('/delete/{id}', [barangController::class,'destroy'])->name('delete');

    Route::get('/Operator/MD-Barang',function(){

        $dataBarang = DB::table('barang')->get();
        $dataBrand = DB::table('brand')->get();
        $dataKategori = DB::table('kategori')->get();
        $dataUoM = DB::table('uom')->get();

        return view('Operator.MD-Barang', ['listItem'=>$dataBarang,
                    'listBrand'=>$dataBrand, 
                    'listKategori'=>$dataKategori, 
                    'listUoM'=>$dataUoM]);

    });
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

Route::resource('/MD-Brand',brandController::class);
Route::post('/add-brand',[brandController::class, 'store']);
Route::get('/edit-brand/{id}',[brandController::class, 'update'])->name('edit-brand');
Route::post('/add-brand/{id}','brandController@update')->name('add-brand');
Route::get('/edit-brand/{id}','brandController@edit')->name('edit-brand');
Route::get('/delete-brand/{id}',[brandController::class,'destroy'])->name('delete-brand');

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

Route::resource('/MD-UoM',uomController::class);
Route::post('/add-uom', [uomController::class, 'store']);
Route::get('/edit-uom/{id}',[uomController::class, 'update'])->name('edit-uom');
Route::get('/edit-uom/{id}',[uomController::class, 'edit'])->name('edit-uom');
Route::get('/delete-uom/{id}', [uomController::class,'destroy'])->name('delete-uom');

Route::get('/MD-UoM',function(){

    $dataUoM = DB::table('uom')->get();
    return view('MD-UoM', ['listUoM'=> $dataUoM]);
});

//Master Data Barang
// Route::resource('/Operator/MD-Barang',barangController::class);

// Route::get('/Operator/addItem', [barangController::class, 'create'])->name('addItem');

// Route::post('/Operator/addItem', [barangController::class, 'store'])->name('addItem');

// Route::get('/Operator/editItem/{id}', [barangController::class, 'edit'])->name('editItem');

// Route::post('/Operator/editItem/{id}', [barangController::class, 'update'])->name('editItem');

// Route::get('/delete/{id}', [barangController::class,'destroy'])->name('delete');

// Route::get('/Operator/MD-Barang',function(){

//     $dataBarang = DB::table('barang')->get();
//     $dataBrand = DB::table('brand')->get();
//     $dataKategori = DB::table('kategori')->get();
//     $dataUoM = DB::table('uom')->get();

//     return view('Operator.MD-Barang', ['listItem'=>$dataBarang,
//                 'listBrand'=>$dataBrand, 
//                 'listKategori'=>$dataKategori, 
//                 'listUoM'=>$dataUoM]);

// });

Route::get('/Operator/addItem',function(){

    $dataBarang = DB::table('barang')->get();
    $dataBrand = DB::table('brand')->get();
    $dataKategori = DB::table('kategori')->get();
    $dataUoM = DB::table('uom')->get();

    return view('/Operator/addItem', [
        'listItem'=>$dataBarang,
        'listBrand'=>$dataBrand, 
        'listKategori'=>$dataKategori, 
        'listUoM'=>$dataUoM
    ]);
});

Route::get('/Operator/cetakIssuing',[reportController::class, 'issuingPrint'])->name('cetakReceiving');

Route::get('/Operator/Rpt-issuing',function(){

    $rptIssuing = DB::table('issuing')->get();

    return view('Operator.Rpt-issuing',['data'=>$rptIssuing]);
});

// Route Report-Receiving

Route::get('/Operator/cetakReceiving',[reportController::class, 'receivingPrint'])->name('cetakReceiving');

Route::get('/Operator/Rpt-receiving',function(){
    $rptReceiving = DB::table('receiving')->get();
    return view('Operator.Rpt-receiving',['data'=>$rptReceiving]);
});

Route::get('/Operator/Rpt-stock',function(){
    $rptStock = DB::table('barang')->get();
    return view('Operator.Rpt-stock',['data'=>$rptStock]);
});

Route::get('/Operator/cetakStok',[reportController::class, 'stokPrint'])->name('cetakstok');

// Route Receiving
Route::get('/Operator/receiving', [receivingController::class]);

Route::get('/Operator/addReceiving', [receivingController::class, 'create'])->name('addReceiving');

Route::post('/Operator/addReceiving', [receivingController::class, 'store'])->name('addReceiving');

Route::get('/Operator/delete/{id}', [receivingController::class, 'destroy'])->name('delete');

Route::get('/Operator/receivingView',[receivingController::class, 'tampil'])->name('receivingView');

Route::get('/delete/{id}', [receivingController::class,'destroy'])->name('delete');


Route::get('/Operator/receiving',function(){

    $newReceiving = DB::table('receiving')->get();

    return view('Operator.receiving',['newReceiving'=>$newReceiving]);
});

// Route Issuing
Route::get('/Operator/issuing', [issuingController::class]);

Route::get('/Operator/addIssuing',[issuingController::class, 'create'])->name('addIssuing');

Route::post('/Operator/addIssuing', [issuingController::class, 'store'])->name('addIssuing');

Route::get('/Operator/delete/{id}',[issuingController::class, 'destroy'])->name('delete');

Route::get('/Operator/Issuing/IssuingView',[issuingController::class, 'tampil'])->name('IssuingView');

Route::get('/delete/{id}', [issuingController::class,'destroy'])->name('delete');

Route::get('/Operator/issuing',function(){

    $newIssuing = DB::table('issuing')->get();

    return view('Operator.issuing', ['newIssuing'=>$newIssuing]);
});

/*---------------------------------------------- Operator Route End ---------------------------------------------------*/
