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
    return view('UI.Accomodations.search');
});

Route::get('/show', function () {
    return view('UI.Accomodations.show');
});



Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
