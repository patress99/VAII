<?php

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
    return view('contact');
});

Route::resource('gallery', \App\Http\Controllers\GalleryController::class);
Route::get('gallery/{id}/delete', ['uses' => '\App\Http\Controllers\GalleryController@destroy', 'as' => 'gallery.delete']);
Route::get('gallery/{id}/edit', ['uses' => '\App\Http\Controllers\GalleryController@edit', 'as' => 'gallery.edit']);
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::group(['middleware' => ['auth']], function () {
    Route::resource('user', UserController::class);
    Route::get('user/{user}/delete',  [UserController::class, 'destroy'])->name('user.delete');

});
