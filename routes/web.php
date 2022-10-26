<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CotizacionController;
use App\Models\Post;

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

Route::group(['middleware' => 'auth'], function () {
Route::get('/cotizar', [CotizacionController::class, 'index']);
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/findcliente', [App\Http\Controllers\CotizacionController::class, 'findcliente'])->name('findcliente');
Route::get('/findproducto', [App\Http\Controllers\CotizacionController::class, 'findproducto'])->name('findproducto');
Route::post('/savemaecotizacion', [App\Http\Controllers\CotizacionController::class, 'saveMaeCotizacion'])->name('saveMaeCotizacion');
});

Auth::routes();
