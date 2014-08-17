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

		return View::make("login", array('title' => 'PCSA - Login'));
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
	 * Adds the user to the database
	 */
	public function addUser(){

		$email = Input::get("email");
		$email = Input::get("email");



		echo '<pre>';
		var_dump($input);
		echo '</pre>';
	}

	
}
