<?php

use App\Http\Controllers\DepositoController;
use App\Http\Controllers\ProductoController;


use Illuminate\Support\Facades\Route;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

Route::resource('productos','App\Http\Controllers\ProductoController');
Route::resource('depositos','App\Http\Controllers\DepositoController');
Route::get('reporte-depositos', 'App\Http\Controllers\DepositoController@reporteDepositos');
Route::get('stock-minimo', 'App\Http\Controllers\ProductoController@stockMinimoReport');


