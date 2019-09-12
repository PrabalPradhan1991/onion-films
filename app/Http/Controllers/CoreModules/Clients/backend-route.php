<?php

Route::group(['prefix' => 'admin', 'namespace' => '\App\Http\Controllers\CoreModules\Clients'], function() {
	Route::get('/clients/list', [
		'as'	=>	'admin-clients-list',
		'uses'	=>	'ClientsController@getListView',
		'middleware'	=>	'auth'
	]);

	Route::get('/clients/create', [
		'as'	=>	'admin-clients-create-get',
		'uses'	=>	'ClientsController@getCreateView',
		'middleware'	=>	'auth'
	]);

	Route::post('/clients/create', [
		'as'	=>	'admin-clients-create-post',
		'uses'	=>	'ClientsController@postCreateView',
		'middleware'	=>	'auth'
	]);

	Route::get('/clients/edit/{id}', [
		'as'	=>	'admin-clients-edit-get',
		'uses'	=>	'ClientsController@getEditView',
		'middleware'	=>	'auth'
	]);

	Route::post('/clients/edit/{id}', [
		'as'	=>	'admin-clients-edit-post',
		'uses'	=>	'ClientsController@postEditView',
		'middleware'	=>	'auth'
	]);

	Route::post('/clients/delete/{id}', [
		'as'	=>	'admin-clients-delete-post',
		'uses'	=>	'ClientsController@postDeleteView',
		'middleware'	=>	'auth'
	]);

});
