<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;

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
Route::delete('/owner/stock/delete/{id}', 'StockController@destroy')->name('stock_destroy');


//Route pembelian
Route::get('/owner/pembelian', 'PembelianController@index')->name('pembelian');


