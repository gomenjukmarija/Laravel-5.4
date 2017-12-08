<?php

//App::bind('App\Billing\Stripe', function () {
//    return new \App\Billing\Stripe(config('services.stripe.secret'));
//});

App::bind('App\Billing\Stripe', function () {
    return new \App\Billing\Stripe(config('services.stripe.secret'));
}); //when we need single instance of class

//$stripe = App::make('App\Billing\Stripe');
//same result as under
$stripe = resolve('App\Billing\Stripe');

dd($stripe);


Route::get('/', 'PostsController@index')->name('home');
Route::get('/posts/create', 'PostsController@create');
Route::post('/posts', 'PostsController@store');
Route::get('/posts/{post}', 'PostsController@show');

Route::post('/posts/{post}/comments', 'CommentsController@store');


Route::get('/register', 'RegistrationController@create');
Route::post('/register', 'RegistrationController@store');

Route::get('/login', 'SessionsController@create');
Route::post('/login', 'SessionsController@store');
Route::get('/logout', 'SessionsController@destroy');