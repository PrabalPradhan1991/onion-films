<?php

Route::group(['prefix' => 'admin', 'namespace' => '\App\Http\Controllers\CoreModules\AboutUs'], function() {
	
	Route::get('/about-us', [
		'as'	=>	'admin-about-us-get',
		'uses'	=>	'AboutUsController@getAboutUs',
		'middleware'	=>	'auth'
	]);

	Route::post('/about-us', [
		'as'	=>	'admin-about-us-post',
		'uses'	=>	'AboutUsController@postAboutUs',
		'middleware'	=>	'auth'
	]);

});
