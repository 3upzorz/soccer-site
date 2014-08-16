<?php

class UserController extends BaseController {

	/**
	 * Makes the add user view
	 */
	public function addUserView(){

		return View::make('add-user', array('title' => 'PCSA - Add User'));
	}

	/**
	 * Makes the login view
	 */
	public function loginView(){

		return View::make("login", array('title' => 'PCSA - Login'));
	}

	/**
	 * logs in the user
	 */
	public function login(){

		$email = Input::get("email");
		$password = Input::get("password");

		if (Auth::attempt(array('email' => $email, 'password' => $password)))
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
