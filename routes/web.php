<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CastController;

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

Route::get('/', [HomeController::class, 'index']);

Route::get('/register', [AuthController::class, 'register']);

Route::post('/dashboard', [AuthController::class, 'utama']);

Route::get('/table', function () {
    return view('layout.table');
});

Route::get('/data-tables', function () {
    return view('layout.data-tables');
});


Route::get('/master',function () {
    return view('layout.master');
});


Route::get('/cast', [CastController::class, 'index']);

Route::get('/cast/create', [CastController::class, 'create']);

Route::post('/cast', [CastController::class, 'store']);

Route::get('/cast/{cast_id}', [CastController::class, 'show']);

Route::get('/cast/{cast_id}/edit', [CastController::class, 'edit']);

Route::put('/cast/{cast_id}', [CastController::class, 'update']);

Route::delete('/cast/{cast_id}', [CastController::class, 'destroy']);