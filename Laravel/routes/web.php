<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers;

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
//     return view('welcome');
// });

Auth::routes();

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/category/{slug}', [App\Http\Controllers\HomeController::class, 'category'])->name('category');
Route::get('/product/{slug}', [App\Http\Controllers\HomeController::class, 'product'])->name('product');
Route::get('/category', [App\Http\Controllers\HomeController::class, 'allCategory'])->name('allcategory');
Route::get('/seller', [App\Http\Controllers\HomeController::class, 'seller'])->name('seller');
Route::get('/seller/{username}', [App\Http\Controllers\HomeController::class, 'singleSeller'])->name('singleSeller');


Route::group(['prefix' => 'admin', 'as' => 'admin.'], function () { 
    Route::view('/','admin/dashboard')->name('dashboard');
    Route::resource('category', 'App\Http\Controllers\admin\CategoryController', ['names'=> 'category']);   
    Route::resource('country', 'App\Http\Controllers\admin\CountryController', ['names'=> 'country']);   
    Route::resource('user', 'App\Http\Controllers\admin\UserController', ['names'=> 'user']);   
    Route::resource('product', 'App\Http\Controllers\admin\ProductController', ['names'=> 'product']);   
});
