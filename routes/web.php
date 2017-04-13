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

Route::get('teamRegistration', function () {
    return view('player.teamRegistration');
});
 Route::get('addplayer','TeamController@search');

Route::get('searchPlayer', 'PlayerController@search');

Route::get('createScorer', 'ScorerController@create');
Route::get('searchScorer', 'ScorerController@search');
Route::get('createInstitute', 'InstituteController@create');

Route::get('searchInstitute', 'InstituteController@search');

Route::get('editInstitute/{institute}', 'InstituteController@edit');


Route::POST('/institutes', 'InstituteController@store');
Route::post('/scorers', 'ScorerController@store');
Route::post('/players', 'PlayerController@store');
Route::POST('/teams', 'TeamController@store');

Route::get('/matchResults/{match}', 'MatchResultController@show');
Route::get('createTournament', function () {
    return view('tournaments.createTournament');
});

Route::post('/tournaments', 'TournamentController@store');

Route::get('/team', 'TeamController@index');
Route::get('/addteam', 'TeamController@addteam');

Route::post('/saveteam', 'TeamController@store');

Route::get('deleteteam/{id}', 'TeamController@destroy');
Route::get('editteamteam/{team}', 'TeamController@edit');
Route::PUT('saveeditteam/{team}', 'TeamController@update');
