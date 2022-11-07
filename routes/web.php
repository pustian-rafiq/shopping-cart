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




Auth::routes();

// Route::get('/home', 'HomeController@index')->name('home');


// =========================Frontend routes=========================================
Route::get('/', 'Frontend\FrontendController@index');

//Language routes here
Route::get('language/english','Frontend\LanguageController@EnglishLanguage')->name('language.english');
Route::get('language/bangla','Frontend\LanguageController@BanglaLanguage')->name('language.bangla');

//Single product routes here
Route::get('product/details/{id}','Frontend\FrontendController@ProductDetails')->name('product.details');




// =========================Admin routes=========================================
Route::group(['prefix'=>'admin','middleware' =>['admin','auth'],'namespace'=>'Admin'], function(){
    // Route::get('dashboard',[UserController::class,'index'])->name('admin.dashboard');
    Route::get('dashboard','AdminController@index')->name('admin.dashboard');

    
    //Slider routes
    Route::get('sliders','SliderController@index')->name('slider.view');
    Route::get('sliders/add','SliderController@SliderAdd')->name('slider.add');
    Route::post('sliders/store','SliderController@SliderStore')->name('slider.store');
    Route::get('sliders/edit/{id}','SliderController@SliderEdit')->name('slider.edit');
    Route::post('sliders/update/{id}','SliderController@SliderUpdate')->name('slider.update');
    Route::get('sliders/delete/{id}','SliderController@SliderDelete')->name('slider.delete');
    Route::get('sliders/active/{id}','SliderController@SliderActive')->name('slider.active');
    Route::get('sliders/inactive/{id}','SliderController@SliderInactive')->name('slider.inactive');

    //Profile routes
    Route::get('profile/setting','AdminController@ProfileView')->name('profile.setting');
    Route::post('update/profile','AdminController@UpdateProfile')->name('change.profile');
    Route::post('update/image','AdminController@UpdateImage')->name('change.image');
    Route::post('update/password','AdminController@UpdatePassword')->name('change.password');

     //Brand routes
     Route::get('brands','BrandController@index')->name('brand.view');
     Route::get('brands/add','BrandController@BrandAdd')->name('brand.add');
     Route::post('brands/store','BrandController@BrandStore')->name('brand.store');
     Route::get('brands/edit/{id}','BrandController@BrandEdit')->name('brand.edit');
     Route::post('brands/update/{id}','BrandController@BrandUpdate')->name('brand.update');
     Route::get('brands/delete/{id}','BrandController@BrandDelete')->name('brand.delete');

     //Category routes
     Route::get('category','CategoryController@index')->name('category.view');
     Route::get('category/add','CategoryController@CategoryAdd')->name('category.add');
     Route::post('category/store','CategoryController@CategoryStore')->name('category.store');
     Route::get('category/edit/{id}','CategoryController@CategoryEdit')->name('category.edit');
     Route::post('category/update/{id}','CategoryController@CategoryUpdate')->name('category.update');
     Route::get('category/delete/{id}','CategoryController@CategoryDelete')->name('category.delete');
     
     //Sub Category routes
     Route::get('sub-category','SubCategoryController@index')->name('subcategory.view');
     Route::get('sub-category/add','SubCategoryController@SubCategoryAdd')->name('subcategory.add');
     Route::post('sub-category/store','SubCategoryController@SubCategoryStore')->name('subcategory.store');
     Route::get('sub-category/edit/{id}','SubCategoryController@SubCategoryEdit')->name('subcategory.edit');
     Route::post('sub-category/update/{id}','SubCategoryController@SubCategoryUpdate')->name('subcategory.update');
     Route::get('sub-category/delete/{id}','SubCategoryController@SubCategoryDelete')->name('subcategory.delete');

    //Fetch sub and sub sub-categories routes using Ajax
    Route::get('subcategory/ajax/{cat_id}','SubCategoryController@GetSubCategory');
    Route::get('subsubcategory/ajax/{subcat_id}','SubSubCategoryController@GetSubSubCategory');

    //Sub sub category routes
    Route::get('sub-subcategory','SubSubCategoryController@index')->name('subsubcategory.view');
    Route::get('sub-subcategory/add','SubSubCategoryController@SubSubCategoryAdd')->name('subsubcategory.add');
    Route::post('sub-subcategory/store','SubSubCategoryController@SubSubCategoryStore')->name('subsubcategory.store');
    Route::get('sub-subcategory/edit/{id}','SubSubCategoryController@SubSubCategoryEdit')->name('subsubcategory.edit');
    Route::post('sub-subcategory/update/{id}','SubSubCategoryController@SubSubCategoryUpdate')->name('subsubcategory.update');
    Route::get('sub-subcategory/delete/{id}','SubSubCategoryController@SubSubCategoryDelete')->name('subsubcategory.delete');

    //Product routes
    Route::get('product/view','ProductController@index')->name('product.view');
    Route::get('product/add','ProductController@ProductAdd')->name('product.add');
    Route::post('product/store','ProductController@ProductStore')->name('product.store');
    Route::get('product/edit/{id}','ProductController@ProductEdit')->name('product.edit');
    Route::post('product/update/{id}','ProductController@ProductUpdate')->name('product.update');
    Route::post('product/thumbnail/update/{id}','ProductController@ProductThumbnailUpdate')->name('product.thumbnail.update');
    Route::post('product/multiple-image/update','ProductController@ProductMultipleImageUpdate')->name('product.multiImage.update');
    Route::get('product/image/delete/{id}','ProductController@ProductImageDelete')->name('product.image.delete');
    Route::get('product/delete/{id}','ProductController@ProductDelete')->name('product.delete');
    Route::get('product/active/{id}','ProductController@ProductInactive')->name('product.active');
    Route::get('product/inactive/{id}','ProductController@ProductActive')->name('product.inactive');

});


// =========================User routes=========================================
Route::group(['prefix'=>'user','middleware' =>['user','auth'],'namespace'=>'User'], function(){
    Route::get('dashboard','UserController@index')->name('user.dashboard');

    //Profile routes
    Route::post('update/profile','UserController@UpdateProfile')->name('update.profile');
    Route::get('update/image','UserController@UpdateImage')->name('update.image');
    Route::post('store/image','UserController@StoreImage')->name('store.image');
    Route::get('update/password','UserController@UpdatePassword')->name('update.password');
    Route::post('store/password','UserController@StorePassword')->name('store.password');
});