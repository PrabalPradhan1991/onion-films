<?php

Route::get('/', function(){
	return view('frontend.index');
})->name('index');

Route::get('/about-us', function(){
	return view('frontend.about-us');
})->name('about-us');

/*Route::get('/blog-single-post', function(){
	return view('frontend.blog-single-post');
})->name('blog-single-post');

Route::get('/blog', function(){
	return view('frontend.blog');
})->name('blog');*/

Route::post('/event/{event_title}', function($event_title){
	$input = request()->all();

	\Mail::to('prabalpradhan1991@gmail.com')
		->send(new \App\Mail\EventMail($input, $event_title));

	session()->flash('success-msg', 'We have received your application. We will contact you soon');

	return redirect()->back();
})->name('event-post');

Route::get('/portfolio-item', function(){
	return view('frontend.portfolio-item');
})->name('portfolio-item');

Route::get('/portfolio', function(){
	return view('frontend.portfolio');
})->name('portfolio');