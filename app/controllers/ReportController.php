<?php

class ReportController extends BaseController {

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

	public function searchView(){

		return View::make('search-reports', array('title' => 'PCSA - Report Search'));
	}

	public function reportView(){

		return View::make('report', array('title' => 'PCSA - Game Report'));
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
		// $input = Input::all();
		// echo '<pre>';
		// var_dump($input);
		// echo '</pre>';
		// die();




		$report = new Report();

		$gameNumber = Input::get("gameNumber");
		$gameDate = Input::get("gameDate");
		$gameTime = Input::get("gameTime");
		$field = Input::get("field");
		$homeName = Input::get("homeName");
		$homeScore = Input::get("homeScore");
		$awayName = Input::get("awayName");
		$awayScore = Input::get("awayScore");
		$comments = Input::get("comments");
		$division = Input::get("division");
		$refType = Input::get("refType");

		$incidents = Input::get("incidents");

		//create report

		$report->user_id = 1;//Auth::id();
		$report->game_number = $gameNumber;
		$report->game_date = DateTime::createFromFormat('d/m/Y h:i A', $gameDate . " " . $gameTime)->format('Y-m-d H:i:s');
		$report->field = $field;
		$report->home_name = $homeName;
		$report->home_score = $homeScore;
		$report->away_name = $awayName;
		$report->away_score = $awayScore;
		$report->comments = $comments;
		$report->ref_type = $refType;
		$division = Input::get("division");

		$report->save();
		//die(var_dump($incidents));
		//loop through incidents and assiign to current report
		foreach($incidents as $incident){
			$report->attach($incident['id'],array("comments" => $incident['comments']));
		}

		//return true;

		echo json_encode(array("success" => true));
		return 0;
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
