<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PagesController;
use App\Http\Controllers\UasController;

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


// Route::get('/master', function () {
//     return view('layout.master');
// });

Route::get('/', function () {
    return view('welcome');
});

Route::get('/hello', function () {
    echo "<h1>Hello laravel</h1>";
});

Route::get('/home', function () {
    return view('home');
});

Route::get('/forminput', [PagesController::class,'FormInput']);
Route::post('/welcome', [PagesController::class,'Welcome']);

Route::get('/datatable', function () {
    return view('datatable.index');
});

// CRUD CAST
Route::get('/21312007', [UasController::class,'index']);
Route::get('/21312007/create', [UasController::class,'create']);
Route::post('/21312007', [UasController::class,'post']);
Route::get('/21312007/{21312007_id}/edit', [CastController::class,'edit']);
Route::put('/21312007/{21312007_id}', [UasController::class,'put']);
Route::delete('/21312007/{21312007_id}', [UasController::class,'delete']);

