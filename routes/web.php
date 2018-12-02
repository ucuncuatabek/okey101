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


//Burada url den php fonksiyonuna yönlendirme yapıyoruz

Route::get('/matchup/list/{status}', 'MatchupController@list');
Route::get('/matchup/createPaired', 'MatchupController@createPaired');
Route::get('/matchup/edit/{id}', 'MatchupController@edit');
Route::get('/matchup/view/{id}', 'MatchupController@view');
Route::get('/matchup/show/{id}', 'MatchupController@show');
Route::get('/matchup/endMatch/{id}', 'MatchupController@endMatch');
Route::get('/matchup/deleteMatch/{id}', 'MatchupController@deleteMatch');


Route::post('/matchup/store', 'MatchupController@store');
Route::post('/matchup/addPoint', 'MatchupController@addPoint');
Route::post('/matchup/editPoint', 'MatchupController@editPoint');
