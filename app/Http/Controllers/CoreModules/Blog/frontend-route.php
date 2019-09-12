<?php

Route::group(['namespace' => '\App\Http\Controllers\CoreModules\Blog'], function() {
	Route::get('/blogs', [
		'as'	=>	'blogs',
		'uses'	=>	'BlogController@getFrontendBlogs'
	]);

	Route::get('/blog/{slug}', [
		'as'	=>	'blog',
		'uses'	=>	'BlogController@getFrontendBlog'
	]);
});