<?php

class UserController extends BaseController {

	/**
	 * Makes the add user view
	 */
	public function addUserView(){

		return View::make('add-user', array('title' => 'PCSA - Add User'));
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
