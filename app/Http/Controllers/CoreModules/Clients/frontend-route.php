<?php

Route::group(['namespace' => '\App\Http\Controllers\CoreModules\Clients'], function() {
	Route::get('/client-projects', [
		'as'	=>	'client-projects',
		'uses'	=>	'ClientsController@getFrontendClientProjects'
	]);
});