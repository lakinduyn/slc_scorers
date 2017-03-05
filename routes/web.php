<?php

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

use App\Institutes;

Route::get('/', function () {
    return view('welcome');
});

Route::get('admin', function () {
    return view('dashboard.index');
});
Route::get('addplayer', function () {
    return view('dashboard.addplayer');
});


Route::get('instituteRegistration', 'InstituteController@create');

Route::get('teamRegistration', function () {
    return view('dashboard.teamRegistration');
});


Route::get('searchInstitutes', 'InstituteController@search');

Route::POST('/institutes', 'InstituteController@store');

Route::post('/players', 'PlayerController@store');



