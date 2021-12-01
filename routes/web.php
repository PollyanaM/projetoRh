<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\rhController;

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

Route::get('/', 'App\Http\Controllers\rhController@index');

Route::get('/rh', 'App\Http\Controllers\rhController@index');

Route::resource('rh', rhController::class);
