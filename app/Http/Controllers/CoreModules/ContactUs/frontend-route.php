<?php

Route::group(['namespace' => '\App\Http\Controllers\CoreModules\ContactUs'], function() {
	Route::get('contact-us',
	['as'	=>	'contact-us',
	 'uses'	=>	'ContactUsController@getFrontendContactUs']);
});

Route::post('/contact-us', function() {
	$input = request()->all();

	$email = (new \App\Http\Controllers\CoreModules\ContactUs\ContactUsModel)->getContactUs()->email;
	\Mail::to($email)
		->queue(new \App\Mail\ContactMail($input));

	session()->flash('success-msg', 'We have received your email. We will contact you soon');

	return redirect()->back();

})->name('contact-post');