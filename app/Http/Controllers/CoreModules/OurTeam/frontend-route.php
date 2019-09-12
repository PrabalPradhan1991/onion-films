<?php

Route::group(['namespace' => '\App\Http\Controllers\CoreModules\OurTeam'], function() {
	Route::get('/our-team', [
		'as'	=>	'our-team',
		'uses'	=>	'OurTeamController@getFrontendOurTeam'
	]);
});