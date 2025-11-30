<?php

use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\PageController;
use App\Http\Controllers\Admin\PostController;
use App\Http\Controllers\Admin\ProductController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\ProfileController;
use App\Http\Controllers\Admin\SlideController;
use App\Http\Controllers\FrontController;


//Auth Routes
Auth::routes();
Route::group(['prefix'=>'admin','middleware'=>'auth'], function(){
    Route::resource('/profile', ProfileController::class);
    Route::resource('/slide', SlideController::class);
    Route::resource('/page', PageController::class);
    Route::resource('/category', CategoryController::class);
    Route::resource('/product', ProductController::class);
    Route::resource('/post', PostController::class);
});


Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


//Public Routes
//Route::get('/', function () {return view('welcome');});
Route::get('/', [App\Http\Controllers\FrontController::class, 'index']);
Route::get('/empresa', [App\Http\Controllers\FrontController::class, 'empresa']);
Route::get('/{category:slug}', [App\Http\Controllers\FrontController::class, 'category']);
Route::get('/{category.slug}/{product.slug}', [App\Http\Controllers\FrontController::class, 'product']);
Route::get('/blog', [App\Http\Controllers\FrontController::class, 'blog']);
Route::get('/blog/{post:slug}', [App\Http\Controllers\FrontController::class, 'post']);
Route::get('/contacto', [App\Http\Controllers\FrontController::class, 'contacto']);
