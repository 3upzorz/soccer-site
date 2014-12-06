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

Route::group(array('before' => 'isRef'),function(){

	Route::get('report/create', array('as' => 'create_report_view', 'uses' => 'ReportController@createReportView'));
	Route::post('report/create', array('as' => 'create_report', 'uses' => 'ReportController@createReport'));

	Route::get('/', array('as' => 'index', function(){	
		
		//if user is ref
		if(Auth::user()->user_type_id == 3){
			return Redirect::route('create_report_view');	
		}
		//
		return Redirect::route('add_user_view');
	}));
});

Route::group(array('before' => 'isAdmin'),function(){

	Route::get('report/search', array('as' => 'search_report_view', 'uses' => 'ReportController@searchView'));

	Route::get('report', array('as' => 'search_report_view', 'uses' => 'ReportController@reportView'));

	Route::get('user/add', array('as' => 'add_user_view', 'uses' => 'UserController@addUserView'));
	Route::post('user/add', array('as' => 'add_user', 'uses' => 'UserController@addUser'));
	Route::get('user/edit/{userId}', array('as' => 'edit_user_view', 'uses' => 'UserController@editView'));
	Route::post('user/edit', array('as' => 'edit_user', 'uses' => 'UserController@editUser'));
	Route::post('user/delete', array('as' => 'delete_user', 'uses' => 'UserController@deleteUser'));
	Route::post('user/restore', array('as' => 'restore_user', 'uses' => 'UserController@restoreUser'));

	Route::get('manage/users', array('as' => 'user_management_panel', 'uses' => 'UserController@showManagementPanel'));

});

Route::post('user/get', array('as', 'get_user', 'uses' => 'UserController@getViewableUser'));

Route::get('login', array('as' => 'login_view', 'uses' => 'UserController@loginView'));
Route::post('login', array('as' => 'login', 'uses' => 'UserController@login'));

Route::get('logout', array('as' => 'logout', 'uses' => 'UserController@logout'));

//TODO remove
Route::get('user/test', array('uses' => 'UserController@test'));