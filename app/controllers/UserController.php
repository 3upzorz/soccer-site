<?php

class UserController extends BaseController {

	/**
	 * Makes the add user view
	 */
	public function addUserView(){

		return View::make('add-user', array('title' => 'PCSA - Add User'));
	}

	/**
	 * Makes the edit user view
	 */
	public function editView($userId){

		$data = array(
			'title' => 'PCSA - Edit User',
			'user'  => User::find($userId),
			'permissions' => $this->getUserPermissionTypes()
		);
		return View::make('edit-user', $data);
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
			return View::make('login')->with('flashError', 'Username/Password incorrect');
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
	 * Makes the User Management Panel View
	 */
	public function showManagementPanel(){
		$flashSuccess = Session::get('flashSuccess');
		$flashError = Session::get('flashError');
		$deletedUserId = Session::get('deletedUserId');

		$data = array(
			'title' => 'PCSA - User Management'
		);

		if(isset($flashSuccess) && $flashSuccess){
			$data['flashSuccess'] = $flashSuccess;
		}

		if(isset($deletedUserId) && $deletedUserId){
			$data['deletedUserId'] = $deletedUserId;
		}

		if(isset($flashError) && $flashError){
			$data['flashError'] = $flashError;
		}

		$criteria = array(
			'username' => strtolower(trim(Input::get('userName'))),
			'email' => strtolower(trim(Input::get('email'))),
			'permission' => Input::get('userPermission'),
			'deleted' => Input::get('deleted')
		);

		$data['criteria'] = $criteria;
		$data['users'] = $this->retrieveUsers($criteria);
		$data['permissions'] = $this->getUserPermissionTypes();

		return View::make('user-management-panel',$data);
	}

	/**
	 * gets the user permission types to display
	 */
	private function getUserPermissionTypes(){
		//get every user permissions type but the Super User permission
		$permissions = UserPermissionType::where('id', '!=', 1)->get();
		return $permissions;
	}

	/**
	 * Retrieves users from the database
	 * @param {Array} criteria : contains the criteria to filter users
	 * 					=> {String} username : (optional),
	 * 					=> {String} email : (optional),
	 * 					=> {Int} permission : (optional)
	 */
	private function retrieveUsers($criteria){

		$users;
		if(isset($criteria['deleted']) && $criteria['deleted']){

			$users = User::onlyTrashed()->orderBy('updated_at', 'desc');
		}else{

			$users = User::orderBy('updated_at', 'desc');	
		}

		if(isset($criteria['username']) && $criteria['username']){
			$users->where('username', '=', $criteria['username']);
		}

		if(isset($criteria['email']) && $criteria['email']){
			$users->where('email', '=', $criteria['email']);
		}

		if(isset($criteria['permission']) && $criteria['permission']){
			$users->whereHas('permissions', function($q) use ($criteria){
				$q->where('id', '=', $criteria['permission']);
			});
		}

		return $users->get();
	}

	/**
	 * creates a larvel validator that can be used to test valid input and get errors 
	 * will default to add user validation behavior
	 * @param {Array} input : the input from the front end form
	 * @param {Bool} required (optional) : should all of the important fields be considered required
	 * @param {Bool} passwordSent (optional) : is there a password that needs to be validated
	 * @param {Bool} update (optional) : validating info for a user update
	 */
	private function validateUserInput($input, $required = true, $passwordSent = true, $update = false){

		$values = array(
			'username' => (isset($input['username']) ? strtolower(trim($input['username'])) : null),
			'first_name' => (isset($input['first_name']) ? strtolower(trim($input['first_name'])) : null),
			'last_name' => (isset($input['last_name']) ? strtolower(trim($input['last_name'])) : null),
			'password' => (isset($input['password']) ? $input['password'] : null),
			'confirmPassword' => (isset($input['confirmPassword']) ? $input['confirmPassword'] : null),
			'permissions' => (isset($input['permissions']) ? $input['permissions'] : null)
		);

		//TODO validate that permissions are actually permissions that exist in db
		$rules;
		if($required){
			$rules = array(
				'username'        => 'required|unique:users,username',
				'first_name'       => 'required|alpha',
				'last_name'        => 'required|alpha',
				'password'        => 'required',
				'permissions'	  => 'required'
			);
		}else{
			$rules = array(
				'username'        => 'unique:users,username',
				'first_name'       => 'alpha',
				'last_name'        => 'alpha',
			);
		}

		if($passwordSent){
			$rules['confirmPassword'] = 'same:password';
		}

		if($update){
			$rules['user_id'] = 'required|exists:users,id';
			$rules['email'] = 'email';
			$rules['permissions'] = 'required';
			$values['user_id'] = (isset($input['user_id']) ? $input['user_id'] : null);
			$values['email'] = (isset($input['email']) ? $input['email'] : null);
		}

		return Validator::make($values,$rules);
	}

	/**
	 * Adds the user to the database
	 */
	public function addUser(){

		$input = Input::all();
		$validator = $this->validateUserInput($input);

		if($validator->fails()){
			return Redirect::to('manage/users')->with('addPopulate', true)->withErrors($validator)->withInput();
		}else{
			$user = new User;

			$user->username = $input['username'];
			$user->first_name = $input['first_name'];
			$user->last_name = $input['last_name'];
			$user->password = Hash::make($input['password']);

			$user->save();

			$user->permissions()->sync($input['permissions']);
			Session::flash('flashSuccess', 'User successfully created');
			return Redirect::to('manage/users');
		}
	}

	/**
	 * Edits an existing user with updated profile information
	 */
	public function editUser(){
		$input = Input::all();
		// echo '<pre>';
		// var_dump($input);
		// echo '</pre>';
		// die();

		//validate input, but none of the input is required and there is no password needed to be validated
		//and the purpose is for updating
		$validator = $this->validateUserInput($input,false,false,true);

		if($validator->fails()){
			return Redirect::to('user/edit/' . $input['user_id'])->withErrors($validator)->withInput();
		}else{

			$this->updateUser($input['user_id'],$input);
			Session::flash('flashSuccess', 'User successfully updated');
			return Redirect::to('user/edit/' . $input['user_id']);
		}
	}

	/**
	 * A function to update a user based on given input
	 */
	private function updateUser($userId, $input){

		//TODO handle failure of user find
		//See:
		//http://laravel.com/docs/4.2/eloquent#basic-usage
		//Retrieving A Model By Primary Key Or Throw An Exception
		$user = User::findOrFail($userId);
		$changed = false;

		//keys to ingore in input
		$ignore = array('permissions', '_token', 'user_id');

		//for every input field
		foreach ($input as $key => $value) {
			//check field exists
			if(!in_array($key, $ignore)){
				if($value === ""){
					$value = null;
				}
				//if field and value are not the same, update field
				if($user->$key !== $value){
					$user->$key = $value;
					$changed = true;
				}
			}
		}

		if(isset($input['permissions'])){
			$user->permissions()->sync($input['permissions']);
			$changed = true;
		}

		//if something was changed, save the user
		if($changed){
			$user->save();
		}
	}

	/**
	 * Deletes the user
	 */
	public function deleteUser(){
		$userId = Input::get('userId');

		$user = User::find($userId);

		//if user is a Super User
		if($user->permissions->contains(1)){
			
			Session::flash('flashError', 'Cannot delete a user with permission Super User');
			return Redirect::to('manage/users');
		}

		$user->delete();

		Session::flash('deletedUserId', $userId);
		Session::flash('flashSuccess', 'User deleted');
		return Redirect::to('manage/users');
	}

	/**
	 * Restore a deleted user
	 */
	public function restoreUser(){

		$userId = Input::get('userId');
		$deleted = Input::get('deleted');

		$user = User::onlyTrashed()->find($userId);
		$user->restore();

		Session::flash('flashSuccess', 'User restored');

		if(isset($deleted) && $deleted){
			return Redirect::to('manage/users?deleted=1');
		}
		return Redirect::to('manage/users');
	}

	/**
	 * Get and return the info of a user
	 */
	public function getViewableUser(){

		$userId = Input::get('userId');

		if(isset($userId) && $userId){

			$user = User::find($userId);
			$userArray = array(
				'profile' => $user->toArray(),
				'permissions' => $user->permissions()->get()->toArray()
			);
			return Response::json($userArray);

		}else{

			return Response::json(array(
				'fail' => true,
				'errors' => array("invalid user id")
			));
		}
	}

	/**
	 * TODO remove
	 * Random test function
	 */
	public function test(){
		$user = User::find(22);
		echo '<pre>';
		var_dump($user->permissions()->get()->toArray());
		echo '</pre>';
	}
}
