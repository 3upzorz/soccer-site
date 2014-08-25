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
			'username'    => Input::get("username"),
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

		$username = Input::get('username');
		$firstName = Input::get('firstName');
		$lastName = Input::get('lastName');
		$password = Input::get('password');
		$confirmPassword = Input::get('confirmPassword');
		$permissions = Input::get('permissions');

		//TODO create custom rule to validate permissions
		// Validator::extend('foo', function($attribute, $value, $parameters){
		//     return $value == 'foo';
		// });

		$rules = array(
			'username'        => 'required|unique:users,username',
			'firstName'       => 'required|alpha',
			'lastName'        => 'required|alpha',
			'password'        => 'required',
			'confirmPassword' => 'same:password'
			'permissions'     => 
		);

		$user = new User;

		$user->username = $username;
		$user->first_name = $firstName;
		$user->last_name = $lastName;
		$user->password = Hash::make($password);

		$user->save();

		$user->permissions()->sync($permissions);
	}

	/**
	 * 
	 */
	public function test(){

		$permissions = User::find(Auth::id())->permissions()->get()->toArray();

		echo '<pre>';
		var_dump($permissions);
		echo '</pre>';
	}
}
