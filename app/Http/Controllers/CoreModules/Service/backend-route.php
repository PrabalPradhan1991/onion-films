<?php

Route::group(['prefix' => 'admin', 'namespace' => '\App\Http\Controllers\CoreModules\Service'], function() {
	Route::get('/service/list', [
		'as'	=>	'admin-service-list',
		'uses'	=>	'ServiceController@getListView',
		'middleware'	=>	'auth'
	]);

	Route::get('/service/create', [
		'as'	=>	'admin-service-create-get',
		'uses'	=>	'ServiceController@getCreateView',
		'middleware'	=>	'auth'
	]);

	Route::post('/service/create', [
		'as'	=>	'admin-service-create-post',
		'uses'	=>	'ServiceController@postCreateView',
		'middleware'	=>	'auth'
	]);

	Route::get('/service/edit/{id}', [
		'as'	=>	'admin-service-edit-get',
		'uses'	=>	'ServiceController@getEditView',
		'middleware'	=>	'auth'
	]);

	Route::post('/service/edit/{id}', [
		'as'	=>	'admin-service-edit-post',
		'uses'	=>	'ServiceController@postEditView',
		'middleware'	=>	'auth'
	]);

	Route::post('/service/delete/{id}', [
		'as'	=>	'admin-service-delete-post',
		'uses'	=>	'ServiceController@postDeleteView',
		'middleware'	=>	'auth'
	]);

});
