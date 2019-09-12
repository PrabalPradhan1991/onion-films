<?php

Route::group(['prefix' => 'admin', 'namespace' => '\App\Http\Controllers\CoreModules\Portfolio'], function() {
	Route::get('/portfolio/list', [
		'as'	=>	'admin-portfolio-list',
		'uses'	=>	'PortfolioController@getListView',
		'middleware'	=>	'auth'
	]);

	Route::get('/portfolio/create', [
		'as'	=>	'admin-portfolio-create-get',
		'uses'	=>	'PortfolioController@getCreateView',
		'middleware'	=>	'auth'
	]);

	Route::post('/portfolio/create', [
		'as'	=>	'admin-portfolio-create-post',
		'uses'	=>	'PortfolioController@postCreateView',
		'middleware'	=>	'auth'
	]);

	Route::get('/portfolio/edit/{id}', [
		'as'	=>	'admin-portfolio-edit-get',
		'uses'	=>	'PortfolioController@getEditView',
		'middleware'	=>	'auth'
	]);

	Route::post('/portfolio/edit/{id}', [
		'as'	=>	'admin-portfolio-edit-post',
		'uses'	=>	'PortfolioController@postEditView',
		'middleware'	=>	'auth'
	]);

	Route::post('/portfolio/delete/{id}', [
		'as'	=>	'admin-portfolio-delete-post',
		'uses'	=>	'PortfolioController@postDeleteView',
		'middleware'	=>	'auth'
	]);

	Route::get('/portfolio/asset-list/{portfolio_id}', [
		'as'	=>	'admin-portfolio-asset-list',
		'uses'	=>	'PortfolioController@getPorfolioAssetListView',
		'middleware'	=>	'auth'
	]);

	Route::post('portfolio/asset-delete/{id}', [
		'as'	=>	'admin-portfolio-asset-delete-post',
		'uses'	=>	'PortfolioController@postPortfolioAssetDelete',
		'middleware'	=>	'auth'
	]);

	Route::post('portfolio/asset-edit/{portfolio_id}', [
		'as'	=>	'admin-portfolio-asset-edit-post',
		'uses'	=>	'PortfolioController@postPortfolioAssetEdit',
		'middleware'	=>	'auth'
	]);

	Route::post('portfolio/asset-add/{portfolio_id}', [
		'as'	=>	'admin-portfolio-asset-add-post',
		'uses'	=>	'PortfolioController@postPortfolioAssetAdd',
		'middleware'	=>	'auth'
	]);

	Route::post('portfolio-feature-portfolio/{portfolio_id}', [
		'as'	=>	'admin-portfolio-feature-portfolio-post',
		'uses'	=>	'PortfolioController@postFeaturePortfolio',
		'middleware'	=>	'auth',
	]);

	Route::post('portfolio-unfeature-portfolio/{portfolio_id}', [
		'as'	=>	'admin-portfolio-unfeature-portfolio-post',
		'middleware'	=>	'auth',
		'uses'	=>	'PortfolioController@postUnfeaturePortfolio',
	]);

});
