<?php

use App\Http\Controllers\PendaftaranController;
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

//pendaftaran
Route::get('/pendaftaran', 'PendaftaranController@index')->name('pendaftaran.index');
Route::resource('pendaftaran',PendaftaranController::class)->except('destroy');
Route::get('delpendaftaran/{id}', [PendaftaranController::class, 'destroy'])
 ->name('pendaftaran.destroy');