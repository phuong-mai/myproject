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
Route::get('index',[
    'as'=>'index',
    'uses'=>'HomeController@index'
]);
Route::get('product',[
    'as'=>'product',
    'uses'=>'HomeController@product'
]);
Route::get('login',[
    'as'=>'login',
    'uses'=>'LoginController@index'
]);
Route::post('login',[
    'as'=>'login',
    'uses'=>'LoginController@login'
]);
Route::post('logout',[
    'as'=>'logout',
    'uses'=>'LoginController@logout'
]);
Route::get('register',[
    'as'=>'register',
    'uses'=>'UserController@index'
]);
Route::post('register',[
    'as'=>'register',
    'uses'=>'UserController@register'
]);


