<?php

Route::group(['prefix' => 'admin', 'namespace' => '\App\Http\Controllers\CoreModules\ContactUs'], function() {
	
	Route::get('/contact-us', [
		'as'	=>	'admin-cotact-us-get',
		'uses'	=>	'ContactUsController@getContactUs',
		'middleware'	=>	'auth'
	]);

	Route::post('/contact-us', [
		'as'	=>	'admin-cotact-us-post',
		'uses'	=>	'ContactUsController@postContactUs',
		'middleware'	=>	'auth'
	]);

});
