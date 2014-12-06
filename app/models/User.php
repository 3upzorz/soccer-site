<?php

use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;
use Illuminate\Database\Eloquent\SoftDeletingTrait;

class User extends Eloquent implements UserInterface, RemindableInterface {

	use UserTrait, RemindableTrait, SoftDeletingTrait;

	protected $dates = ['deleted_at'];

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'users';

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	protected $hidden = array('password', 'remember_token');

	/**
	 * the attributes that can be mass assigned
	 */
	protected $guarded = array('username', 'password');

	/**
	 * Define the relationship between the User model and the UserPermissionType Model
	 */
	public function permissions(){
		return $this->belongsToMany("UserPermissionType", 'user_permissions');
	}

	/**
	 * Define the relationship between the User model and the Report Model
	 */
	public function reports(){
		return $this->hasMany("Report","user_id");
	}
}
