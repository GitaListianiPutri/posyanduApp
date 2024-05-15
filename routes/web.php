<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PertumbuhanController;
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

// Route::get('/', function () {
//     return view('login');
// });

Route::get('/', [LoginController::class, 'index'])->name('login');
Route::post('/login-proses', [LoginController::class, 'login_proses'])->name('login-proses');
Route::get('/logout', [LoginController::class, 'logout'])->name('logout');

Route::get('/register', [LoginController::class, 'register'])->name('register');
Route::post('/register-proses', [LoginController::class, 'register_proses'])->name('register-proses');


Route::group(['prefix' => 'admin', 'middleware' => ['auth', 'role:admin'], 'as' => 'admin.'], function () {
    Route::get('/dashboard', [HomeController::class, 'dashboard'])->name('dashboard');
    Route::get('/index', [HomeController::class, 'index'])->name('index');

    Route::get('/create', [HomeController::class, 'create'])->name('index.create');
    Route::post('/store', [HomeController::class, 'store'])->name('index.store');
    Route::get('/edit/{id}', [HomeController::class, 'edit'])->name('index.edit');
    
    Route::put('/update/{id}', [HomeController::class, 'update'])->name('index.update');
    Route::delete('/delete/{id}', [HomeController::class, 'delete'])->name('index.delete');

    Route::get('/index2', [HomeController::class, 'index2'])->name('index2');
    Route::get('/create2', [HomeController::class, 'create2'])->name('index2.create2');
    Route::post('/store2', [HomeController::class, 'store2'])->name('index2.store2');
    Route::get('/edit2/{id}', [HomeController::class, 'edit2'])->name('index2.edit2');
    Route::put('/update2/{id}', [HomeController::class, 'update2'])->name('index2.update2');
    Route::delete('/delete2/{id}', [HomeController::class, 'delete2'])->name('index2.delete2');

});

Route::group(['prefix' => 'peserta', 'middleware' => ['auth', 'role:peserta'], 'as' => 'peserta.'], function () {
    Route::get('/dashboard', [HomeController::class, 'dashboard'])->name('dashboard');

    Route::get('/index', [HomeController::class, 'index'])->name('index');


    Route::get('/index2', [HomeController::class, 'index2'])->name('index2');

    Route::get('/detail/{id}', [HomeController::class, 'detail'])->name('index.detail');


});
