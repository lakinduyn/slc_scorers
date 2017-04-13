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

//routes for Player
Route::get('addplayer', function () {
    return view('dashboard.addplayer');
});
Route::get('/players/addplayer','TeamController@search');
Route::get('editPlayer','TeamController@search1');
Route::get('/players/search', 'PlayerController@search');
Route::get('players/{player}/edit', 'PlayerController@edit');
Route::post('/players', 'PlayerController@store');
Route::PUT('/players/{player}', 'PlayerController@update');
Route::DELETE('/players/{player}', 'PlayerController@destroy')->name('institute.destroy');



//routes for Teams
Route::get('teamRegistration', function () {
    return view('player.teamRegistration');
});
Route::POST('/teams', 'TeamController@store');

//routes for Scorer
Route::get('createScorer', 'ScorerController@create');
Route::get('searchScorer', 'ScorerController@search');
Route::post('/scorers', 'ScorerController@store');


//routes for Institutes
Route::get('/institutes/create', 'InstituteController@create');
Route::get('/institutes/search', 'InstituteController@search');
Route::get('/institutes/{institute}/edit', 'InstituteController@edit');
Route::PUT('/institutes/{institute}', 'InstituteController@update');
Route::POST('/institutes', 'InstituteController@store');
Route::DELETE('/institues/{institute}', 'InstituteController@destroy')->name('institute.destroy');


//routes for Matches
Route::get('/matchResults/{match}', 'MatchResultController@show');

//routes for Tournaments
Route::get('createTournament', function () {
    return view('tournaments.createTournament');
});

Route::post('/tournaments', 'TournamentController@store');

