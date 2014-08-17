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
		$report->division = $division;

		$report->save();
		
		//loop through incidents and assiign to current report
		$incidentsArray = array();
		foreach($incidents as $incident){
			$incidentsArray[] = 
				new Incident(
					array(
						'incident_type_id' => (int)$incident['typeId'],
						'description' => $incident['description']
					)
				);
		}

		$report->incidents()->saveMany($incidentsArray);

		echo json_encode(array("success" => true));
		return 0;
	}

	public function showReport($report_id){

		$data['report'] = Report::find($report_id);
		$data['incidents'] = $data['report']->Incidents();

		return View::make("show_report",$data);
	}

	public function search(){

		$gameNumber = Input::get("gameNumber");
		$date = Input::get("gameDate");
		$teamName = Input::get("teamName");
		$refName = Input::get("refName");

		$start_date = DateTime::createFromFormat('d/m/Y h:i A', $date)->format('Y-m-d H:i:s');
		$end_date = DateTime::createFromFormat('d/m/Y h:i A', $date . " 11:59 PM")->format('Y-m-d H:i:s');

		$fields = array();

		if($gameNumber){
			$report = Report::where("game_number","=",$gameNumber);
			echo json_encode($report);
			return 1;
		}


		DB::table("reports");

		if($teamName){
			DB::where("away_name","=",$teamName);
			DB::orWHere("home_name","=",$teamName);
		}
		if($date){
			DB::where("game_date",">=",$start_date);
			DB::where("game_date","<=",$end_date);
		}
		if($refName){
			DB::join("users","users.id","=","reports.user_id");
			DB::where("users.full_name","LIKE","%$refName%");	
		}


		$results = DB::get();



		// $sql = "SELECT * FROM reports r";
		// if($refName){
		// 	$sql = $sql . " INNER JOIN users u ON u.id = r.user_id
		// 	AND u.full_name LIKE %" . $refName . " ";
		// }

		// $sql = $sql . " WHERE ";

		// if($teamName){
		// 	$sql = $sql . " home_name LIKE %" . $teamName . " OR away_name LIKE %" . $teamName . " ";

		// 	if($date){
		// 		$sql = $sql . " AND "
		// 	}
		// }

		

		// if($date){
		// 	$fields[] = "game_date" => DateTime::createFromFormat('d/m/Y h:i A', $gameDate . " " . $gameTime)->format('Y-m-d H:i:s');;
		// }

		// echo json_encode($report);

	}


	public function test(){

		// $report = new Report();

		// $gameNumber = "12345";
		// $gameDate = "03/08/2014";
		// $gameTime = "4:35 PM";
		// $field = "Riverside";
		// $homeName = "Grizzlies";
		// $homeScore = 5;
		// $awayName = "Arctic Squirrels";
		// $awayScore = 6;
		// $comments = "aefasefase";
		// $division = 1;
		// $refType = 1;

		// //create report
		// $report->user_id = 1;//Auth::id();
		// $report->game_number = $gameNumber;
		// $report->game_date = DateTime::createFromFormat('d/m/Y h:i A', $gameDate . " " . $gameTime)->format('Y-m-d H:i:s');
		// $report->field = $field;
		// $report->home_name = $homeName;
		// $report->home_score = $homeScore;
		// $report->away_name = $awayName;
		// $report->away_score = $awayScore;
		// $report->comments = $comments;
		// $report->ref_type = $refType;
		// $report->division = $division;

		// $report->save();

		// $incidents = array(
		// 	new Incident(
		// 		array(
		// 			'incident_type_id' => 1,
		// 			'description' => 'some nerd elbowed this other nerd, it was pretty funny actually'
		// 		)
		// 	),
		// 	new Incident(
		// 		array(
		// 			'incident_type_id' => 1,
		// 			'description' => 'I thought someone died but actually they just fell asleep'
		// 		)
		// 	)
		// );

		// $report->incidents()->saveMany($incidents);
		Auth::logout();
		return View::make('error');
	}

}
