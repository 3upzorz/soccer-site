<?php

class UserController extends BaseController {

	/**
	 * Makes the add user view
	 */
	public function addUserView(){

		return View::make('add-user', array('title' => 'PCSA - Add User', ));
	}

	/**
	 * Makes the login view
	 */
	public function loginView(){

		$flashError = Session::get('flashError');
		$flashSuccess = Session::get('flashSuccess');

		$data = array(
			'title' => 'PCSA - Login',
		);

		if(isset($flashError) && $flashError){
			$data['flashError'] = $flashError;
		}

		if(isset($flashSuccess) && $flashSuccess){
			$data['flashSuccess'] = $flashSuccess;
		}

		return View::make("login", $data);
	}

	/**
	 * login the user
	 * TODO validate email & password
	 */
	public function login(){

		$credentials = array(
			'email'    => Input::get("email"),
			'password' => Input::get("password")
		);

		if (Auth::attempt($credentials))
		{
			return Redirect::route('index');
		}
		else{
			return View::make('login')->with('flashNotice', 'Email/Password incorrect');
		}

	}

	/**
	 * logout the user and redirect to the login page with success
	 */
	public function logout(){

		Auth::logout();
		return Redirect::route('login')->with('flashSuccess', 'Successfully logged out!');
	}

	/**
	 * Adds the user to the database
	 */
	public function addUser(){

		
	}

	/**
	 * 
	 */
}
