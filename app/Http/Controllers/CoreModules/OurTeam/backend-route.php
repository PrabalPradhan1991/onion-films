<?php

Route::group(['prefix' => 'admin', 'namespace' => '\App\Http\Controllers\CoreModules\OurTeam'], function() {
	Route::get('/our-team/list', [
		'as'	=>	'admin-our-team-list',
		'uses'	=>	'OurTeamController@getListView',
		'middleware'	=>	'auth'
	]);

	Route::get('/our-team/create', [
		'as'	=>	'admin-our-team-create-get',
		'uses'	=>	'OurTeamController@getCreateView',
		'middleware'	=>	'auth'
	]);

	Route::post('/our-team/create', [
		'as'	=>	'admin-our-team-create-post',
		'uses'	=>	'OurTeamController@postCreateView',
		'middleware'	=>	'auth'
	]);

	Route::get('/our-team/edit/{id}', [
		'as'	=>	'admin-our-team-edit-get',
		'uses'	=>	'OurTeamController@getEditView',
		'middleware'	=>	'auth'
	]);

	Route::post('/our-team/edit/{id}', [
		'as'	=>	'admin-our-team-edit-post',
		'uses'	=>	'OurTeamController@postEditView',
		'middleware'	=>	'auth'
	]);

	Route::post('/our-team/delete/{id}', [
		'as'	=>	'admin-our-team-delete-post',
		'uses'	=>	'OurTeamController@postDeleteView',
		'middleware'	=>	'auth'
	]);

});
