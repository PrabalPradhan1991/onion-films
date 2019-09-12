<?php

Route::group(['namespace' => '\App\Http\Controllers\CoreModules\Portfolio'], function() {
	Route::get('/portfolios', [
		'as'	=>	'portfolios',
		'uses'	=>	'PortfolioController@getFrontendPortfolios'
	]);

	Route::get('/portfolio/{portfolio_id}', [
		'as'	=>	'portfolio',
		'uses'	=>	'PortfolioController@getFrontendPortfolio'
	]);
});