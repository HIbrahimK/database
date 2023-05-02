<?php

use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DropDownController;

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

Route::get('ogrenciekle', function () {
    return view('form');
})->name('ogrenciEkle');

Route::get('/', function () {
    return view('home');
})->name('home');

Route::post('kayit', [UserController::class, 'register']);
Route::post('logout', [UserController::class, 'logout']);
Route::post('login', [UserController::class, 'login']);

Route::get('home',[DropDownController::class,'index']);
Route::get('register',[DropDownController::class,'index']);
Route::post('api/fetch-state',[DropDownController::class,'fatchState']);
Route::post('api/fetch-cities',[DropDownController::class,'fatchCity']);
Route::get('create',[\App\Http\Controllers\KullaniciController::class,'create']);
Route::get('listele',[\App\Http\Controllers\KullaniciController::class,'listele']);
Route::get('update',[\App\Http\Controllers\KullaniciController::class,'update']);
Route::get('delete',[\App\Http\Controllers\KullaniciController::class,'delete']);
Route::get('fdelete',[\App\Http\Controllers\KullaniciController::class,'fdelete']);

//Route::get('form',[\App\Http\Controllers\KullaniciController::class,'form']);
