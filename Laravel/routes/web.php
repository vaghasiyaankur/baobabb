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

Route::group(['middleware' => ['countryCheck']], function () { 
Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/category/{slug}', [App\Http\Controllers\HomeController::class, 'category'])->name('category');
Route::get('/product/{slug}', [App\Http\Controllers\HomeController::class, 'product'])->name('product');
Route::get('/category', [App\Http\Controllers\HomeController::class, 'allCategory'])->name('allcategory');
Route::get('/seller', [App\Http\Controllers\HomeController::class, 'seller'])->name('seller');
Route::get('/seller/{username}', [App\Http\Controllers\HomeController::class, 'singleSeller'])->name('singleSeller');
Route::post('/search/product', [App\Http\Controllers\HomeController::class, 'searchProduct'])->name('search.product');
Route::get('/category/change/{slug}', [App\Http\Controllers\HomeController::class, 'changeCategory'])->name('category.change');
});

Route::group(['middleware' => ['auth'],'prefix' => 'user', 'as' => 'user.'], function () {
    Route::get('/',function(){
        return redirect()->route('user.dashboard');
    });
    Route::get('/dashboard' , [App\Http\Controllers\UserController::class,'index'])->name('dashboard');
    Route::get('profile' , [App\Http\Controllers\UserController::class,'profile'])->name('profile');
    Route::post('profile-update', [App\Http\Controllers\UserController::class, 'profile_update'])->name('profile.update');
    Route::resource('product', 'App\Http\Controllers\ProductController', ['names'=> 'product']);
    Route::resource('wishlist', 'App\Http\Controllers\WishlistController', ['names'=> 'wishlist']);
    // Route::resource('category', 'App\Http\Controllers\admin\CategoryController', ['names'=> 'category']); 
    Route::resource('country', 'App\Http\Controllers\admin\CountryController', ['names'=> 'country']);
    // Route::resource('user', 'App\Http\Controllers\admin\UserController', ['names'=> 'user']);
});


Route::group(['middleware' => ['admin'],'prefix' => 'admin', 'as' => 'admin.'], function () { 
    Route::get('/',function(){
        return redirect()->route('admin.dashboard');
    });
    Route::get('/dashboard' , [App\Http\Controllers\admin\DashboardController::class,'index'])->name('dashboard');
    Route::resource('category', 'App\Http\Controllers\admin\CategoryController', ['names'=> 'category']);   
    Route::resource('country', 'App\Http\Controllers\admin\CountryController', ['names'=> 'country']);   
    Route::resource('user', 'App\Http\Controllers\admin\UserController', ['names'=> 'user']);   
    Route::resource('product', 'App\Http\Controllers\admin\ProductController', ['names'=> 'product']);   
    Route::resource('currency', 'App\Http\Controllers\admin\CurrencyController', ['names'=> 'currency']);   
});
