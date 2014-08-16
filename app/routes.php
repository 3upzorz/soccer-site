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

Route::get('/', array('as' => 'index', function()
{	
	//if user logged in
	if(Auth::check()){

		//if user is ref
		if(Auth::user()->user_type_id == 3){
			return Redirect::route('create_report_view');	
		}

		return Redirect::route('add_user_view');
		
	}else{
		return View::make('login');
	}
}));


Route::post('register', array('as' => 'registeer', 'uses' => 'HomeController@register'));

Route::post('login', array('as' => 'login', 'uses' => 'UserController@login'));

Route::post('report/create', array('as' => 'create_report', 'uses' => 'ReportController@createReport'));

Route::get('showReport/{id}', array('as' => 'show_report', 'uses' => 'HomeController@showReport/{id}'));

Route::get('login', array('as' => 'login_view', 'uses' => 'UserController@addUserView'));

Route::get('register', array('as' => 'register_view', 'uses' => 'HomeController@registerView'));

Route::get('report/create', array('as' => 'create_report_view', 'uses' => 'HomeController@createReportView'));

Route::get('report/search', array('as' => 'search_report_view', 'uses' => 'HomeController@searchView'));

Route::get('user/add', array('as' => 'add_user_view', 'uses' => 'UserController@addUserView'));


Route::post('user/add', array('as' => 'add_user', 'uses' => 'UserController@addUser'));

Route::get('report', array('as' => 'search_report_view', 'uses' => 'HomeController@reportView'));

Route::get('test', array('uses' => 'ReportController@test'));

