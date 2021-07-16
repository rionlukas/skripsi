<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\StockController;
use App\Http\Controllers\PembelianController;

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
Route::view('/owner/create', 'owner.stock.create');
Route::post('/owner/stock/insert', 'StockController@store')->name('stock_insert');
Route::get('/owner/stock/edit/{id}', 'StockController@edit')->name('stock_edit');
Route::put('/owner/stock/update/{id}', 'StockController@update')->name('stock_update');
Route::delete('/owner/stock/delete/{id}', 'StockController@destroy')->name('stock_destroy');


//Route pembelian
Route::get('/owner/pembelian', 'PembelianController@index')->name('pembelian_acc');
Route::view('/owner/pembelian/create', 'owner.pembelian.create');
Route::post('/owner/pembelian/insert', 'PembelianController@store')->name('pembelian_insert');
Route::get('/owner/pembelian/approve/{id}/{value}', 'PembelianController@approval')->name('pembelian_approval');

//Route order
Route::get('owner/order', 'OrderController@index');
Route::view('/owner/order/create', 'owner.order.create');
Route::post('/owner/order/insert', 'OrderController@store')->name('order_insert');
Route::get('/owner/order/approve/{id}/{value}', 'OrderController@approval')->name('order_approval');

