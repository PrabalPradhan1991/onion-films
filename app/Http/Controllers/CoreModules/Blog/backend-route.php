<?php

Route::group(['prefix' => 'admin', 'namespace' => '\App\Http\Controllers\CoreModules\Blog'], function() {
	Route::get('/blog/list', [
		'as'	=>	'admin-blog-list',
		'uses'	=>	'BlogController@getListView',
		'middleware'	=>	'auth'
	]);

	Route::get('/blog/create', [
		'as'	=>	'admin-blog-create-get',
		'uses'	=>	'BlogController@getCreateView',
		'middleware'	=>	'auth'
	]);

	Route::post('/blog/create', [
		'as'	=>	'admin-blog-create-post',
		'uses'	=>	'BlogController@postCreateView',
		'middleware'	=>	'auth'
	]);

	Route::get('/blog/edit/{id}', [
		'as'	=>	'admin-blog-edit-get',
		'uses'	=>	'BlogController@getEditView',
		'middleware'	=>	'auth'
	]);

	Route::post('/blog/edit/{id}', [
		'as'	=>	'admin-blog-edit-post',
		'uses'	=>	'BlogController@postEditView',
		'middleware'	=>	'auth'
	]);

	Route::post('/blog/delete/{id}', [
		'as'	=>	'admin-blog-delete-post',
		'uses'	=>	'BlogController@postDeleteView',
		'middleware'	=>	'auth'
	]);

});
