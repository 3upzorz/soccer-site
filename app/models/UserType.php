<?php

class UserType extends Eloquent {

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'user_types';

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */

	
	public function user(){
		return $this->hasMany("User","user_type_id");
	}
}
