<?php

use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\PageController;
use App\Http\Controllers\Admin\PostController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\BlogController;
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


// Public Routes
Route::get('/', [FrontController::class, 'index']);
Route::get('/enterprise', [FrontController::class, 'enterprise']); // corregí enterpise

// RUTAS ESTÁTICAS SIEMPRE ANTES
Route::get('/blog', [BlogController::class, 'index']);
Route::get('/contact', [FrontController::class, 'contact']);

// RUTAS CON MODELS BINDING
Route::get('/blog/{post:slug}', [BlogController::class, 'post']);
Route::get('/{category:slug}', [FrontController::class, 'category']);
Route::get('/{category:slug}/{product:id}', [FrontController::class, 'product']);

