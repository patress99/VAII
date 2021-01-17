<?php

use App\Http\Controllers\EmailController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
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

Route::get('/gallery', function () {
    return view('gallery.index');
});

Route::get('/contact', function () {
    return view('email.create');
});

Route::get('/email', function () {
    return view('email.index');
});



Route::resource('gallery', \App\Http\Controllers\GalleryController::class);

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::group(['middleware' => ['auth']], function () {


    Route::resource('email', '\App\Http\Controllers\EmailController');
    Route::resource('user', UserController::class);
    Route::get('user/{user}/delete',  [UserController::class, 'destroy'])->name('user.delete');
    Route::get('user/{id}/setting',  [UserController::class, 'setting'])->name('settings');
    Route::get('gallery/{id}/delete', ['uses' => '\App\Http\Controllers\GalleryController@destroy', 'as' => 'gallery.delete']);
    Route::get('gallery/{id}/edit', ['uses' => '\App\Http\Controllers\GalleryController@edit', 'as' => 'gallery.edit']);


});
