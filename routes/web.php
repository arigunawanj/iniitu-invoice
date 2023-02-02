<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\BarangController;
use App\Http\Controllers\DetailController;
use App\Http\Controllers\FakturController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\PenjualanController;
use App\Http\Controllers\InvoiceDetailController;

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
Route::middleware(['guest'])->group(function () {
    Route::get('/', function () {
        return view('auth.login');
    });
});

Route::middleware(['auth'])->group(function () {
    Route::resource('barang', BarangController::class);
    Route::resource('customer', CustomerController::class);
    Route::resource('detail', DetailController::class);
    Route::resource('invoicedetail', InvoiceDetailController::class);
    Route::resource('faktur', FakturController::class);
    Route::resource('penjualan', PenjualanController::class);
    Route::resource('user', UserController::class);
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

    Route::get('getharga', [DetailController::class, 'getHarga']);
    Route::get('getbarang/{id}', [DetailController::class, 'getBarang']);
    
});

Auth::routes();

