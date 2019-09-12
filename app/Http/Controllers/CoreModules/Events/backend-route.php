<?php

Route::group(['prefix' => 'admin', 'namespace' => '\App\Http\Controllers\CoreModules\Events'], function() {
	Route::get('/events/list', [
		'as'	=>	'admin-events-list',
		'uses'	=>	'EventsController@getListView',
		'middleware'	=>	'auth'
	]);

	Route::get('/events/create', [
		'as'	=>	'admin-events-create-get',
		'uses'	=>	'EventsController@getCreateView',
		'middleware'	=>	'auth'
	]);

	Route::post('/events/create', [
		'as'	=>	'admin-events-create-post',
		'uses'	=>	'EventsController@postCreateView',
		'middleware'	=>	'auth'
	]);

	Route::get('/events/edit/{id}', [
		'as'	=>	'admin-events-edit-get',
		'uses'	=>	'EventsController@getEditView',
		'middleware'	=>	'auth'
	]);

	Route::post('/events/edit/{id}', [
		'as'	=>	'admin-events-edit-post',
		'uses'	=>	'EventsController@postEditView',
		'middleware'	=>	'auth'
	]);

	Route::post('/events/delete/{id}', [
		'as'	=>	'admin-events-delete-post',
		'uses'	=>	'EventsController@postDeleteView',
		'middleware'	=>	'auth'
	]);

});
