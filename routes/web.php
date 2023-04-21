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

Route::post('/follow/{user}', 'App\Http\Controllers\FollowsController@store');

Route::get('/', 'App\Http\Controllers\HomeController@index');

Route::get('/profile/{user}', 'App\Http\Controllers\ProfilesController@index');
Route::patch('/profile/{user}', 'App\Http\Controllers\ProfilesController@update');
Route::middleware('auth:sanctum')->get('/profile/{user}/edit', 'App\Http\Controllers\ProfilesController@edit');

Route::get('/home', 'App\Http\Controllers\PostsController@index');
Route::middleware('auth:sanctum')->post('/p', 'App\Http\Controllers\PostsController@store');
Route::middleware('auth:sanctum')->get('/p/create', 'App\Http\Controllers\PostsController@create');
Route::get('/p/{post}', 'App\Http\Controllers\PostsController@show');