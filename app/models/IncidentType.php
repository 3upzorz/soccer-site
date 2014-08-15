<?php

class IncidentType extends Eloquent {

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'incident_types';

	/**
	 * the attributes that can be edited by mass
	 */
	protected $fillable = array('first_name', 'last_name', 'email');
	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	

	// public function incidents(){
	// 	return $this->hasMany("Incident",'incident_type_id');
	// }
}
