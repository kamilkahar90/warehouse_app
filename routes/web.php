<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::resource('products', App\Http\Controllers\ProductController::class);

Route::get('products/restore/{id}', [App\Http\Controllers\ProductController::class, 'restore'])->name('products.restore');
Route::delete('products/{id}/forcedelete', [App\Http\Controllers\ProductController::class, 'forceDelete'])->name('products.forceDelete');

Route::group(['prefix'=>'admin','middleware'=>['isAdmin','auth']], function() {
    Route::get('dashboard',[App\Http\Controllers\AdminController::class,'dashboard'])->name('admin.dashboard');
    Route::get('userlist',[App\Http\Controllers\AdminController::class,'userlist'])->name('admin.userlist');
    Route::get('settings',[App\Http\Controllers\AdminController::class,'settings'])->name('admin.settings'); 
});

Route::group(['prefix'=>'user','middleware'=>['isUser','auth']], function() {
    Route::get('dashboard',[App\Http\Controllers\UserController::class,'dashboard'])->name('user.dashboard');
    Route::get('userlist',[App\Http\Controllers\UserController::class,'userlist'])->name('user.profile');
    Route::get('settings',[App\Http\Controllers\UserController::class,'settings'])->name('user.settings'); 
});




