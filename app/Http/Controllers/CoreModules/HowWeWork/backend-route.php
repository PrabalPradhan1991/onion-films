<?php

Route::group(['prefix' => 'admin', 'namespace' => '\App\Http\Controllers\CoreModules\HowWeWork'], function() {
	
	Route::get('/how-we-work', [
		'as'	=>	'admin-ddhow-we-work-get',
		'uses'	=>	'HowWeWorkController@getHowWeWork',
		'middleware'	=>	'auth'
	]);

	Route::post('/how-we-work', [
		'as'	=>	'admin-ddhow-we-work-post',
		'uses'	=>	'HowWeWorkController@postHowWeWork',
		'middleware'	=>	'auth'
	]);

});
