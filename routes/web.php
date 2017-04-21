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






//website
Route::get('/', 'WebsiteController@index');
Route::get('/teamcard/{id}', 'WebsiteController@teamCard');
Route::get('/tournaments/club/{level}', 'WebsiteController@showDomestic');
Route::get('/viewMatchResult/{match}', 'WebsiteController@matchResult');
Route::get('/viewInning/{inning}', 'WebsiteController@inningResult');


Route::get('/admin', 'DashboardController@index')->name('home');

//routes for Player
Route::get('/addplayer', function () {
    return view('dashboard.addplayer');
});

Route::get('/players/addplayer','TeamController@search');
Route::get('editPlayer','TeamController@search1');
//Route::get('/players/addteam','TeamController@searchTeam');

Route::get('/addTeamPlayer', 'PlayerController@search1');
Route::get('players/{player}/edit', 'PlayerController@edit');
Route::get('/addTournamentPlayers', 'PlayerController@search2');
Route::get('/addplayer','TeamController@search');
Route::get('/searchPlayer', 'PlayerController@search');
Route::post('/tournamentTeamPlayer', 'PlayerController@storeTournamentPlayer');
Route::post('/players', 'PlayerController@store');
Route::post('/playerTeam', 'PlayerController@storeTeam');
Route::PUT('/players/{player}', 'PlayerController@update');
Route::DELETE('/players/{player}', 'PlayerController@destroy')->name('player.destroy');




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
Route::get('/searchInstitue', 'InstituteController@search');
Route::get('/institutes/{institute}/edit', 'InstituteController@edit');
Route::PUT('/institutes/{institute}', 'InstituteController@update');
Route::POST('/institutes', 'InstituteController@store');
Route::DELETE('/institues/{institute}', 'InstituteController@destroy')->name('institute.destroy');


//routes for Matches
Route::get('/matchResultsMain/{match}', 'MatchResultController@show');
Route::get('/matchResults/{match}', 'MatchResultController@showMatchBasicInfo');
Route::POST('/matchResult/{match}/basicDetails', 'MatchResultController@updateBasicInfo');
Route::POST('/matchResult/{match}/finalResult', 'MatchResultController@updateFinalResult');
Route::POST('/updateInnings/new/{match}', 'InningsController@newInning');
Route::POST('/updateInnings/reset/{inning}', 'InningsController@resetInning');
Route::get('/updateInnings/{inning}', 'InningsController@show');
Route::POST('/updateInnings/{inning}/basic', 'InningsController@update');
Route::POST('/updateInnings/{inning}/batting', 'InningsController@updateBatsman');
Route::POST('/updateInnings/batting/delete', 'InningsController@deleteBatsman');
Route::POST('/updateInnings/{inning}/bowling', 'InningsController@updateBowler');
Route::POST('/updateInnings/bowling/delete', 'InningsController@deleteBowler');


//routes for Tournaments

Route::get('createTournament', function () {
    return view('tournaments.createTournament');
});
Route::get('setTournament', function () {
    return view('tournaments.tournamentStructure');
});

Route::get('setTournament', 'TournamentController@index');
Route::get('matchSchedule', function () {
    return view('tournaments.matchSchedule');
});
Route::get('matchSchedule', 'MatchController@index');
Route::get('/matchSchedulePools/{id}', 'MatchController@poolsDropDown');

Route::post('setMatch', 'MatchController@store');

Route::get('/addTournamentTeams', 'TournamentController@search');
Route::post('/tournamentTeam', 'TournamentController@storeTeam');

Route::post('/tournaments', 'TournamentController@store');


Route::get('/searchTeam', 'TeamController@index');
Route::get('/addteam', 'TeamController@addteam');
Route::post('/saveteam', 'TeamController@store');
Route::get('deleteteam/{id}', 'TeamController@destroy');
Route::get('editteamteam/{team}', 'TeamController@edit');
Route::PUT('saveeditteam/{team}', 'TeamController@update');

//routes for Rounds
Route::post('/tournamentRounds', 'RoundController@store');
Route::get('/roundsDropDown/{id}', 'TournamentController@roundsDropDown');

//routes for Pools
Route::post('/roundPools', 'PoolController@store');

Route::get('/poolsDropDown/{id}', 'TournamentController@poolsDropDown');
Route::post('/poolTeams', 'TournamentController@storeTournamentTeams');

//login register
Route::get('/register','RegistrationController@create');
Route::post('/register','RegistrationController@store');

Route::get('/login','SessionsController@create');
Route::post('/login','SessionsController@store');
Route::get('/logout','SessionsController@destroy');

