<?php

Route::group(['prefix' => 'admin', 'namespace' => '\App\Http\Controllers\CoreModules\Slider'], function() {
	Route::get('/slider/list', [
		'as'	=>	'admin-slider-list',
		'uses'	=>	'SliderController@getListView',
		'middleware'	=>	'auth'
	]);

	Route::get('/slider/create', [
		'as'	=>	'admin-slider-create-get',
		'uses'	=>	'SliderController@getCreateView',
		'middleware'	=>	'auth'
	]);

	Route::post('/slider/create', [
		'as'	=>	'admin-slider-create-post',
		'uses'	=>	'SliderController@postCreateView',
		'middleware'	=>	'auth'
	]);

	Route::get('/slider/edit/{id}', [
		'as'	=>	'admin-slider-edit-get',
		'uses'	=>	'SliderController@getEditView',
		'middleware'	=>	'auth'
	]);

	Route::post('/slider/edit/{id}', [
		'as'	=>	'admin-slider-edit-post',
		'uses'	=>	'SliderController@postEditView',
		'middleware'	=>	'auth'
	]);

	Route::post('/slider/delete/{id}', [
		'as'	=>	'admin-slider-delete-post',
		'uses'	=>	'SliderController@postDeleteView',
		'middleware'	=>	'auth'
	]);

});
