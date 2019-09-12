<?php

Route::group(['namespace' => '\App\Http\Controllers\CoreModules\Events'], function() {
	Route::get('/event/{id}', [
		'as'	=>	'event-single',
		'uses'	=>	'EventsController@getFrontendSingleEvent'
	]);

	Route::get('/events', [
		'as'	=>	'events',
		'uses'	=>	'EventsController@getFrontendEvents'
	]);
});