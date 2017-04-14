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

Route::get('/admin', function () {
    return view('dashboard.index');
});

//routes for Player
Route::get('/addplayer', function () {
    return view('dashboard.addplayer');
});
Route::get('/addplayer','TeamController@search');
Route::get('/searchPlayer', 'PlayerController@search');
Route::post('/players', 'PlayerController@store');


//routes for Teams
Route::get('/teamRegistration', function () {
    return view('dashboard.teamRegistration');
});
Route::POST('/teams', 'TeamController@store');

//routes for Scorer
Route::get('/createScorer', 'ScorerController@create');
Route::get('/searchScorer', 'ScorerController@search');
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
Route::POST('/matchResult/{match}/basicDetails', 'MatchResultController@updateBasicInfo');
Route::get('/updateInnings/{inning}', 'InningsController@show');
Route::POST('/updateInnings/{inning}/basic', 'InningsController@update');
Route::POST('/updateInnings/{inning}/batting', 'InningsController@updateBatsman');
Route::POST('/updateInnings/batting/delete', 'InningsController@deleteBatsman');
Route::POST('/updateInnings/{inning}/bowling', 'InningsController@updateBowler');
Route::POST('/updateInnings/bowling/delete', 'InningsController@deleteBowler');


//routes for Tournaments

Route::get('/createTournament', function () {
    return view('tournaments.createTournament');
});


Route::get('tournamentStructure', function () {
    return view('tournaments.tournamentStructure');
});
Route::get('tournamentStructure', 'TournamentController@index');




Route::post('/tournaments', 'TournamentController@store');


Route::get('/team', 'TeamController@index');
Route::get('/addteam', 'TeamController@addteam');
Route::post('/saveteam', 'TeamController@store');
Route::get('deleteteam/{id}', 'TeamController@destroy');
Route::get('editteamteam/{team}', 'TeamController@edit');
Route::PUT('saveeditteam/{team}', 'TeamController@update');

//routes for Rounds
Route::post('/tournamentRounds', 'RoundController@store');

//routes for Pools
Route::post('/roundPools', 'PoolController@store');
Route::post('/poolTeams', 'TournamentController@storeTournamentTeams');

