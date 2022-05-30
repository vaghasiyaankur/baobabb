<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Http\Request;



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

Route::get('chat/', 'App\Http\Controllers\MessageController@index'); 
Route::get('/load-latest-messages', 'App\Http\Controllers\MessageController@getLoadLatestMessages');
Route::post('/send', 'App\Http\Controllers\MessageController@postSendMessage');
Route::get('/fetch-old-messages', 'App\Http\Controllers\MessageController@getOldMessages');
Route::post('/sendMessage', 'App\Http\Controllers\MessageController@sendMessageFromInquiry')->name('sendMessageInquiry');

Auth::routes();
Route::post('/forgot-password',[App\Http\Controllers\Auth\ForgotPasswordController::class,'submitForgetPassword'])->name('user.forgot.password');
Route::get('reset-password/{token}', [App\Http\Controllers\Auth\ForgotPasswordController::class, 'showResetPasswordForm'])->name('reset.password.get');
Route::post('reset-password', [App\Http\Controllers\Auth\ForgotPasswordController::class, 'submitResetPasswordForm'])->name('reset.password.post');

Route::get('auth/google', [App\Http\Controllers\SocialiteController::class, 'redirectToGoogle']);
Route::get('callback/google', [App\Http\Controllers\SocialiteController::class, 'handleCallbackGoogle']);

Route::get('auth/facebook', [App\Http\Controllers\SocialiteController::class, 'redirectToFacebook']);
Route::get('callback/facebook', [App\Http\Controllers\SocialiteController::class, 'handleCallbackFacebook']);


// Route::group(['middleware' => 'web'], function () { 
Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/category/{slug}', [App\Http\Controllers\HomeController::class, 'category'])->name('category');
Route::get('/product/{slug}', [App\Http\Controllers\HomeController::class, 'product'])->name('product');
Route::get('/category', [App\Http\Controllers\HomeController::class, 'allCategory'])->name('allcategory');
Route::get('/seller', [App\Http\Controllers\HomeController::class, 'seller'])->name('seller');
Route::get('/seller/{username}', [App\Http\Controllers\HomeController::class, 'singleSeller'])->name('singleSeller');
Route::post('/search/product', [App\Http\Controllers\HomeController::class, 'searchProduct'])->name('search.product');
Route::get('/category/change/{slug}', [App\Http\Controllers\HomeController::class, 'changeCategory'])->name('category.change');
Route::get('lang/change', 'App\Http\Controllers\HomeController@changeLang')->name('changeLang');
Route::get('/page/{page}', [App\Http\Controllers\HomeController::class, 'page']);
// });
Route::middleware(['auth'])->group(function () {
    Route::get('/email/verify', 'App\Http\Controllers\Auth\VerificationController@show')->name('verification.notice');
    Route::get('/email/verify/{id}/{hash}', 'App\Http\Controllers\Auth\VerificationController@verify')->name('verification.verify')->middleware(['signed']);
    Route::post('/email/resend', 'App\Http\Controllers\Auth\VerificationController@resend')->name('verification.resend');
});
Route::group(['middleware' => ['auth','verified'],'prefix' => 'user', 'as' => 'user.'], function () {
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
    // Route::resource('user', 'App\Http\Controllers\admin\UserController', ['names'=> 'user'])
    Route::get('message/', 'App\Http\Controllers\MessageController@index')->name('message'); 
    // Route::get('messages', 'App\Http\Controllers\MessageController@fetchMessages');
    Route::get('/load-latest-messages', 'App\Http\Controllers\MessageController@getLoadLatestMessages');
    Route::post('/send', 'App\Http\Controllers\MessageController@postSendMessage');
    Route::get('/fetch-old-messages', 'App\Http\Controllers\MessageController@getOldMessages');
    // Route::post('messages', 'App\Http\Controllers\MessageController@sendMessage');
});

    // admin login 
    Route::get('admin/login', 'App\Http\Controllers\admin\Auth\LoginController@showLoginForm')->name('admin.login');
	Route::post('admin/login', 'App\Http\Controllers\admin\Auth\LoginController@login')->name('admin.login');
	Route::get('admin/logout', 'App\Http\Controllers\admin\Auth\LoginController@logout')->name('admin.logout');
Route::group(['middleware' => ['admin'],'prefix' => 'admin', 'as' => 'admin.'], function () { 
    Route::get('/',function(){
        return redirect()->route('admin.dashboard');
    });
    Route::get('/dashboard' , [App\Http\Controllers\admin\DashboardController::class,'index'])->name('dashboard');
    Route::get('profile' , [App\Http\Controllers\admin\DashboardController::class,'profile'])->name('profile');
    Route::post('profile-update', [App\Http\Controllers\admin\DashboardController::class, 'profile_update'])->name('profile.update');
    Route::resource('category', 'App\Http\Controllers\admin\CategoryController', ['names'=> 'category']);   
    Route::resource('category/{id}/subcategory', 'App\Http\Controllers\admin\SubCategoryController', ['names'=> 'subcategory']);   
    Route::resource('country', 'App\Http\Controllers\admin\CountryController', ['names'=> 'country']);   
    Route::resource('user', 'App\Http\Controllers\admin\UserController', ['names'=> 'user']);   
    Route::resource('product/type', 'App\Http\Controllers\admin\ProductTypeController', ['names'=> 'product.type']);   
    Route::resource('product', 'App\Http\Controllers\admin\ProductController', ['names'=> 'product']);   
    Route::resource('custom/field', 'App\Http\Controllers\admin\FieldController', ['names'=> 'custom.field']);   
    Route::resource('custom/field/{id}/option', 'App\Http\Controllers\admin\FieldOptionController', ['names'=> 'custom.field.option']);   
    Route::resource('category/{id}/custom_field', 'App\Http\Controllers\admin\CategoryFieldController', ['names'=> 'category.custom_field']);   
    Route::resource('currency', 'App\Http\Controllers\admin\CurrencyController', ['names'=> 'currency']);   
    Route::resource('language', 'App\Http\Controllers\admin\LanguageController', ['names'=> 'language']);    
    Route::resource('pages', 'App\Http\Controllers\admin\PagesController', ['names'=> 'pages']); 
    Route::resource('setting', 'App\Http\Controllers\admin\SettingController', ['only' => ['index','edit','update']], ['names'=> 'setting']);   
});
