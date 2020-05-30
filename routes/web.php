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
Route::get('/v3','Captchav3Controller@index')->name('captchav3');
Route::post('/v3/submit','Captchav3Controller@store')->name('captchav3.submit');

Route::get('/v2-checkbox','Captchav2CheckboxController@index')->name('captchav2-checkbox');
Route::post('/v2-checkbox/submit','Captchav2CheckboxController@store')->name('captchav2-checkbox.submit');

Route::get('/v2-invisible','Captchav2InvisibleController@index')->name('captchav2-invisible');
Route::post('/v2-invisible/submit','Captchav2InvisibleController@store')->name('captchav2-invisible.submit');