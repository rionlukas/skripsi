<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\StockController;
use App\Http\Controllers\PembelianController;
use App\Http\Controllers\KainController;

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

//contoh route
// Route::view('/about', 'abou  t');
// Route::get('/', 'CoffeeController@index');
// Route::view('/coffee/create', 'coffee.create');
// Route::post('/coffee/store', 'CoffeeController@store')->name('coffee.store');

Route::get('/', function () {
    return view('utama');
})->name('login_page');

Route::get('/admin', [AdminController::class, 'index'])->name('admin.index')->middleware('role:admin')->name('admin');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';

//route stock
Route::get('/owner/stock', 'StockController@index')->name('stock');
Route::get('/owner/create', 'StockController@create')->name('stock_create');
Route::post('/owner/stock/insert', 'StockController@store')->name('stock_insert');
Route::get('/owner/stock/edit/{id}', 'StockController@edit')->name('stock_edit');
Route::put('/owner/stock/update/{id}', 'StockController@update')->name('stock_update');
Route::delete('/owner/stock/delete/{id}', 'StockController@destroy')->name('stock_destroy');


//Route pembelian
Route::get('/owner/pembelian', 'PembelianController@index')->name('pembelian_acc');
Route::get('owner/pembelian/approved', 'PembelianController@approvedPembelian')->name('pembelian_approved');
Route::get('/owner/pembelian/create', 'PembelianController@create')->name('pembelian_create');
Route::post('/owner/pembelian/insert', 'PembelianController@store')->name('pembelian_insert');
Route::get('/owner/pembelian/approve/{id}/{value}', 'PembelianController@approval')->name('pembelian_approval');

//Route order
Route::get('owner/order', 'OrderController@index')->name('order_acc');
Route::get('owner/order/approved', 'OrderController@approvedOrder')->name('order_approved');
Route::get('/owner/order/nota/{kodeKain}', 'OrderController@show')->name('order_nota');
Route::get('/owner/order/create', 'OrderController@create')->name('order_create');
Route::post('/owner/order/insert', 'OrderController@store')->name('order_insert');
Route::get('/owner/order/approve/{id}/{value}/{jmlAcc}', 'OrderController@approval')->name('order_approval');
Route::get('/owner/surat_jalan', 'OrderController@pageSuratJalan')->name('order_surat_jalan');
Route::get('/owner/order/all', 'OrderController@GetAllOrder');
Route::post('/owner/surat_jalan/store', 'OrderController@createSuratJalan')->name('surat_jalan_insert');
Route::get('/owner/surat_jalan/pdf', 'OrderController@printSuratJalan')->name('surat_jalan_print');

//Route kain
Route::get('/owner/kain', 'KainController@getAllOnlyData')->name('kain_master');
Route::get('/master/kain', 'KainController@index')->name('kain_index');
Route::get('/master/kain/edit/{id}', 'KainController@edit')->name('kain_edit');
Route::put('/master/kain/update/{id}', 'KainController@update')->name('kain_update');
Route::delete('/master/kain/delete/{id}', 'KainController@destroy')->name('kain_delete');

//Route EOQ
Route::view('/eoq', 'eoq');

//Route User
Route::view('/user/register', 'register')->name('user_register');
Route::post('/user/create', 'UserController@store')->name('user_create');
Route::post('/user/login', 'UserController@login')->name('user_login');
Route::get('/user/greeting/{role}/{name}', 'UserController@greeting')->name('user_greeting');

//Test
Route::get('testing/order/nota/{kodeKain}', 'OrderController@testing');
Route::get('testing/print', 'OrderController@testingPrint');
Route::get('/testing/create', 'OrderController@createTesting');
Route::view('/testing/layouting', 'testing.layout');
Route::post('/testing/order/store', 'OrderController@storeTesting')->name('testing_post_order');
Route::post('/api/testing/order/store', 'OrderController@storeTesting')->name('testing_post_order');

//api
Route::put('api/owner/order/approve/{id}/{value}/{jmlAcc}', 'OrderController@api_approval')->name('api_order_approval');
Route::put('api/owner/pembelian/approve/{id}/{value}/{jmlAcc}', 'PembelianController@api_approval')->name('api_pembelian_approval');
Route::get('api/suppler', 'SupplierController@GetAll')->name('api_supplier');

