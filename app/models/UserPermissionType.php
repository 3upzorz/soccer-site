<?php

class UserPermissionType extends Eloquent {

	//No timestamps
	public $timestamps = false;

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'user_permission_types';

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */

	// public function users(){
	// 	return $this->belongsToMany("User","user_type_id");
	// }
}
