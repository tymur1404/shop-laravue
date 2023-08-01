<?php

use Illuminate\Support\Facades\Route;
use \App\Http\Controllers;

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
Route::group(['prefix' => 'admin'], function(){

    Route::get('/', \App\Http\Controllers\Main\IndexController::class)->name('main.index');

    Route::resource('category', \App\Http\Controllers\CategoryController::class);

    Route::resource('tag', \App\Http\Controllers\TagController::class);

    Route::resource('color', \App\Http\Controllers\ColorController::class);

    Route::resource('user', \App\Http\Controllers\UserController::class);

    Route::resource('product', \App\Http\Controllers\ProductController::class);


});

Route::get('{page}', \App\Http\Controllers\ClientController::class)->where('page', '.*');
