<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', 'Frontend\FrontendController@index');


Auth::routes();

// Route::get('/home', 'HomeController@index')->name('home');


// =========================Frontend routes=========================================



// =========================Admin routes=========================================
Route::group(['prefix'=>'admin','middleware' =>['admin','auth'],'namespace'=>'Admin'], function(){
    // Route::get('dashboard',[UserController::class,'index'])->name('admin.dashboard');
    Route::get('dashboard','AdminController@index')->name('admin.dashboard');
});


// =========================User routes=========================================
Route::group(['prefix'=>'user','middleware' =>['user','auth'],'namespace'=>'User'], function(){
    Route::get('dashboard','UserController@index')->name('user.dashboard');
    Route::post('update/profile','UserController@UpdateProfile')->name('update.profile');
    Route::get('update/image','UserController@UpdateImage')->name('update.image');
    Route::post('store/image','UserController@StoreImage')->name('store.image');
    Route::get('update/password','UserController@UpdatePassword')->name('update.password');
    Route::post('store/password','UserController@StorePassword')->name('store.password');
});