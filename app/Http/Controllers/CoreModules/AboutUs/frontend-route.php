<?php

Route::group(['namespace' => '\App\Http\Controllers\CoreModules\AboutUs'], function() {
	Route::get('about-us',
	['as'	=>	'about-us',
	 'uses'	=>	'AboutUsController@getFrontendAboutUs']);
});