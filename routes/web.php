<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\newcontroller;
use App\Http\Controllers\userController;
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
    return view('app');
})->middleware('auth');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


// Route::get('user',[HomeController::class,'index'])->name('index');
// Route::get('show_user',[HomeController::class,'show_user'])->name('show_user');


route::resource('/user',userController::class)->middleware('auth');



Route::get('/users/{user}/activate', [userController::class, 'activate'])->name('users.activate');
Route::get('/users/{user}/deactivate', [userController::class, 'deactivate'])->name('users.deactivate');




