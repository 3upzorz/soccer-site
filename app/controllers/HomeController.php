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

	public function searchView(){

		return View::make('search-reports', array('title' => 'PCSA - Report Search'));
	}

	public function reportView(){

		return View::make('report', array('title' => 'PCSA - Game Report'));
	}

	public function registerView(){

		$userType = Auth::user()->type;

		//call type model, grab user types this user can create

		//assign to $data array

		//pass data array
		return View::make("register");

	}

	public function register(){

		$email = Input::get("email");
		$password = Input::get("password");
		$type = Input::get("type");

		//get user type
		$userType = Auth::user()->type;

		//if use is superuser allow all
		//if user is admin allow create ref

			

		$user = new User();

		$user->email = $email;
		$user->password = Hash::make($password);
		$user->save();

		return true;
	}

	public function createReportView(){

		return View::make("create-report", array('title' => 'PCSA - Create Report'));

	}

	public function createReport(){
		//TODO REMOVE
		$input = Input::all();
		echo '<pre>';
		var_dump($input);
		echo '</pre>';
		die();

		$report = new Report();

		$home = Input::get("home");
		$away = Input::get("away");
		$timeOfMatch = Input::get("time_of_match");
		$status = Input::get("status");
		$comments = Input::get("comments");
		$refereeRole = Input::get("referee_role");

		$incidents = Input::get("incidents");

		//create report

		$report->user_id = Auth::id();
		$report->home = $home;
		$report->away = $away;
		$report->time_of_match = $timeOfMatch;
		$report->status = $status;
		$report->comments = $comments;
		$report->refereeRole = $refereeRole;
		$report->incidents = $incidents;
		$report->save();

		//loop through incidents and assiign to current report
		foreach($incidents as $incident){
			$report->attach($incident['id'],array("comments" => $incident['comments']));
		}

		return true;
	}

	public function showReport($report_id){

		$data['report'] = Report::find($report_id);
		$data['incidents'] = $data['report']->Incidents();

		return View::make("show_report",$data);
	}

	// public function test(){

	// 	echo Hash::make("test");
	// }

}
