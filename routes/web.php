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

Route::get('/', function () {
    return view('welcome');
});


Route::get('product/export', 'ProductController@export')->name('export');
Route::resource('product','ProductController');
Route::resource('category','CategoryController');



Route::view('secondtask','secondtask');
Route::view('thirdtask','thirdtask');

