<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BelajarController;

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

// Route::get('/', function () {
//     return view('awal');
// });

// Membuat route sederhana
Route::get('/about', function() {
    return "Belajar Laravel";
});

// Membuat route dengan parameter
Route::get('/user/{id}', function($id){
    return 'Halo, ' . $id;
});

// Route yang mengambil view dari blade template
Route::get('/', function () {
    return view('awal', ['nama' => 'Pak Ainan']);
});

Route::get('/belajar', [BelajarController::class, 'belajar']);
