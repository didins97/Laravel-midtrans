<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});

// Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::middleware(['auth:sanctum', 'verified'])->group(function () {
    Route::get('/transaksi', [App\Http\Controllers\HomeController::class, 'index'])->name('transaksi');
    Route::get('/transaksi-show/{id}', [App\Http\Controllers\Transaksi\TransaksiShow::class, 'show'])
    ->name('transaksi.show');

    Route::get('/dashboard', function () {
        return view('/dashboard');
    })->name('dashboard');
});
