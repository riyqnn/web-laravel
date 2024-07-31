<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AuthController;

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

