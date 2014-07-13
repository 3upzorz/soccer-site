<?php

class HomeController extends BaseController {

	/*
	|--------------------------------------------------------------------------
	| Default Home Controller
	|--------------------------------------------------------------------------
	|
	| You may wish to use controllers instead of, or in addition to, Closure
	| based routes. That's great! Here is an example controller method to
	| get you started. To route to this controller, just add the route:
	|
	|	Route::get('/', 'HomeController@showWelcome');
	|
	*/

	public function showWelcome()
	{
		return View::make('hello');
	}


	public function loginView(){

		return View::make("login", array('title' => 'PCSA - Login'));

	}

	public function login(){

		$email = Input::get("email");
		$password = Input::get("password");

		if (Auth::attempt(array('email' => $email, 'password' => $password)))
		{
		    //return Redirect::intended('dashboard');
		    return true;
		}
		else{
			return false;
		}

	}

	public function registerView(){

		return View::make("register");

	}

	public function register(){

		$email = Input::get("email");
		$password = Input::get("password");

		$user = new User();

		$user->email = $email;
		$user->password = Hash::make($password);
		$user->save();

		return true;
	}

	public function createReportView(){

		return View::make("create_report");

	}

	public function createReport(){

		$report = new Report();

		$field = Input::get("field");

		$report->user_id = Auth::id();
		$report->field = $field;
		$report->save();

		return true;
	}

	public function showReport($report_id){

		$data['report'] = Report::find($report_id);

		return View::make("show_report",$data);
	}

}
