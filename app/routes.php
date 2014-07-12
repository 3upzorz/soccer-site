<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::get('/', function()
{
	return View::make('hello');
});


Route::post('register', array('as' => 'registeer', 'uses' => 'HomeController@register'));

Route::post('login', array('as' => 'login', 'uses' => 'HomeController@login'));

Route::post('createReport', array('as' => 'create_report', 'uses' => 'HomeController@createReport'));

Route::get('showReport/{id}', array('as' => 'show_report', 'uses' => 'HomeController@showReport/{id}'));

Route::get('login', array('as' => 'login_view', 'uses' => 'HomeController@loginView'));

Route::get('register', array('as' => 'register_view', 'uses' => 'HomeController@registerView'));

Route::get('createReport', array('as' => 'create_report_view', 'uses' => 'HomeController@createReportView'));

