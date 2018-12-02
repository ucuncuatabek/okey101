<?php

Route::get('/', function () {
	if(Auth::check()) {
	    return redirect('/home');
	}
    return view('welcome');
});

Auth::routes();

Route::get('/matchup', function () {
	return redirect('/matchup/createPaired');
});

Route::get('/matchup/list/{status}', 'MatchupController@list');

Route::get('/matchup/createPaired', 'MatchupController@createPaired');
// Route::get('/matchup/createUnpaired', 'MatchupController@createUnpaired');  //dont have the option yet
Route::post('/matchup/store', 'MatchupController@store');
Route::get('/matchup/edit/{id}', 'MatchupController@edit');
Route::get('/matchup/view/{id}', 'MatchupController@view');
Route::get('/matchup/show/{id}', 'MatchupController@show');
Route::get('/matchup/endMatch/{id}', 'MatchupController@endMatch');
Route::post('/matchup/addPoint', 'MatchupController@addPoint');
Route::post('/matchup/editPoint', 'MatchupController@editPoint');
