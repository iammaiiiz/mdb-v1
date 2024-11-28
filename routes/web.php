<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\ProductController;

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

Route::get('/', [UserController::class,'login']);
Route::controller(UserController::class)->group(function (){
    Route::get('/login','login')->name('login');
    Route::get('/logout','logout')->name('logout');
    Route::get('/401','page_401')->name('401');
    Route::post('/authentication','authentication')->name('authentication');
});
Route::middleware('isAdmin')->group(function(){
    Route::controller(CompanyController::class)->group(function(){
        Route::get('/companies','index')->name('companies');
        Route::get('/company/new','new_company')->name('company.new');
        Route::get('/company/{id}/edit','edit')->name('company.edit');
        Route::get('/company/{id}','show')->name('company');
        Route::get('/company/{id}/toggleActivate','toggleActivate')->name('toggleActivate');
    
        Route::post('/company/store','store')->name('company.store');
        Route::post('/company/{id}/update','update')->name('company.update');
    });
    Route::controller(ProductController::class)->group(function(){
        Route::get('/products','index')->name('products');
        Route::get('/products/new','new')->name('products.new');
        Route::get('/products/image/{GTIN}/edit','editImage')->name('products.image.edit');
        Route::get('/products/image/{GTIN}/remove','removeImage')->name('products.image.remove');
        Route::get('/products/{id}/toggleActivate','toggleActivate')->name('products.toggle');
        Route::get('/products/{id}/remove','remove')->name('products.remove');
        Route::get('/products/{GTIN}','show')->name('product');
        Route::get('/products.json','allProducts');
        Route::get('/products/{GTIN}.json','showProduct');
    
        Route::post('/products/store','store')->name('products.store');
        Route::post('/products/image/{GTIN}/update','updateImage')->name('products.image.update');
    });
});

Route::controller(ProductController::class)->group(function(){
    Route::get('/gtin','gtin')->name('gtin');
    Route::get('/gtin','gtin')->name('gtin');
    Route::get('/01/{gtin}','publicProduct')->name('public.product');
    Route::post('/gtin/check','gtinCheck')->name('check.gtin');
});
