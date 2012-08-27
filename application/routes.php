<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Simply tell Laravel the HTTP verbs and URIs it should respond to. It is a
| breeze to setup your application using Laravel's RESTful routing and it
| is perfectly suited for building large applications and simple APIs.
|
| Let's respond to a simple GET request to http://example.com/hello:
|
|		Route::get('hello', function()
|		{
|			return 'Hello World!';
|		});
|
| You can even respond to more than one URI:
|
|		Route::post(array('hello', 'world'), function()
|		{
|			return 'Hello World!';
|		});
|
| It's easy to allow URI wildcards using (:num) or (:any):
|
|		Route::put('hello/(:any)', function($name)
|		{
|			return "Welcome, $name.";
|		});
|
*/

Route::get('/', array('uses' => 'home@step1', 'as' => 'step1'));
Route::post('step1', array('uses' => 'home@step1_post', 'as' => 'step1_post'));

Route::get('(:any)/step2', array('uses' => 'home@step2', 'as' => 'step2'));
Route::post('(:any)/step2', array('uses' => 'home@step2_post', 'as' => 'step2_post'));

Route::get('(:any)/step3/(:any)', array('uses' => 'home@step3', 'as' => 'step3'));
Route::post('(:any)/step3/(:any)', array('uses' => 'home@step3_post', 'as' => 'step3_post'));

Route::get('(:any)/step5', array('uses' => 'home@step5', 'as' => 'step5'));
Route::post('(:any)/step5', array('uses' => 'home@step5_post', 'as' => 'step5_post'));

Route::get('(:any)/step6', array('uses' => 'home@step6', 'as' => 'step6'));
Route::post('(:any)/step6', array('uses' => 'home@step6_post', 'as' => 'step6_post'));

Route::get('(:any)', array('uses' => 'home@step7', 'as' => 'step7'));
Route::get('(:any)/doc', array('uses' => 'home@doc', 'as' => 'doc'));
Route::get('(:any)/print', array('uses' => 'home@print', 'as' => 'print'));
Route::get('(:any)/view', array('uses' => 'home@view', 'as' => 'view'));

Route::get('templates/new', array('uses' =>'sowtemplates@new'));
Route::post('templates', array('uses' =>'sowtemplates@create'));

/*
|--------------------------------------------------------------------------
| Basset Routes
|--------------------------------------------------------------------------
*/

Bundle::start('basset');

if (Config::get('basset')) Basset\Config::extend(Config::get('basset'));

Basset::styles('website', function($basset) {
  $basset->add('main', 'main.css')
         ->add('font-awesome', 'font-awesome.css');
});

Basset::scripts('website', function($basset) {
  $basset->add('bootstrap-datepicker', 'bootstrap-datepicker.js')
         ->add('autogrow-input', 'autogrow-input.js')
         ->add('main', 'main.js');
});



/*
|--------------------------------------------------------------------------
| Application 404 & 500 Error Handlers
|--------------------------------------------------------------------------
|
| To centralize and simplify 404 handling, Laravel uses an awesome event
| system to retrieve the response. Feel free to modify this function to
| your tastes and the needs of your application.
|
| Similarly, we use an event to handle the display of 500 level errors
| within the application. These errors are fired when there is an
| uncaught exception thrown in the application.
|
*/

Event::listen('404', function()
{
	return Response::error('404');
});

Event::listen('500', function()
{
	return Response::error('500');
});

/*
|--------------------------------------------------------------------------
| Route Filters
|--------------------------------------------------------------------------
|
| Filters provide a convenient method for attaching functionality to your
| routes. The built-in before and after filters are called before and
| after every request to your application, and you may even create
| other filters that can be attached to individual routes.
|
| Let's walk through an example...
|
| First, define a filter:
|
|		Route::filter('filter', function()
|		{
|			return 'Filtered!';
|		});
|
| Next, attach the filter to a route:
|
|		Router::register('GET /', array('before' => 'filter', function()
|		{
|			return 'Hello World!';
|		}));
|
*/

Route::filter('before', function()
{
	// Do stuff before every request to your application...
});

Route::filter('after', function($response)
{
	// Do stuff after every request to your application...
});

Route::filter('csrf', function()
{
	if (Request::forged()) return Response::error('500');
});

Route::filter('auth', function()
{
	if (Auth::guest()) return Redirect::to('login');
});