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
// Route::view('/about', 'about');
// Route::get('/', 'CoffeeController@index');
// Route::view('/coffee/create', 'coffee.create');
// Route::post('/coffee/store', 'CoffeeController@store')->name('coffee.store');

Route::get('/', function () {
    return view('welcome');
});

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
Route::view('/owner/pembelian/create', 'owner.pembelian.create');
Route::post('/owner/pembelian/insert', 'PembelianController@store')->name('pembelian_insert');
Route::get('/owner/pembelian/approve/{id}/{value}', 'PembelianController@approval')->name('pembelian_approval');

//Route order
Route::get('owner/order', 'OrderController@index')->name('order_acc');
Route::get('owner/order/approved', 'OrderController@approvedOrder')->name('order_approved');
Route::get('/owner/order/nota/{kodeKain}', 'OrderController@show')->name('order_nota');
Route::get('/owner/order/create', 'OrderController@create')->name('order_create');
Route::post('/owner/order/insert', 'OrderController@store')->name('order_insert');
Route::get('/owner/order/approve/{id}/{value}', 'OrderController@approval')->name('order_approval');
Route::get('/owner/surat_jalan', 'OrderController@pageSuratJalan')->name('order_surat_jalan');
Route::get('/owner/order/all', 'OrderController@GetAllOrder');
Route::post('/owner/surat_jalan/store', 'OrderController@createSuratJalan')->name('surat_jalan_insert');
Route::get('/owner/surat_jalan/pdf', 'OrderController@printSuratJalan')->name('surat_jalan_print');

//Route kain
Route::get('owner/kain', 'KainController@getAllOnlyData')->name('kain_master');

//Test
Route::get('testing/order/nota/{kodeKain}', 'OrderController@testing');
Route::get('testing/print', 'OrderController@testingPrint');



