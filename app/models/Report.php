<?php


class Report extends Eloquent {

	

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'reports';

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
		
	/**
	 * Define relationship to Incidents
	 */
	public function incidents(){
		return $this->hasMany('Incident');
	}

	/**
	 * Define relationship to User
	 */
	public function user(){
		return $this->belongsTo('User');
	}

	// public function RefereeRole(){
	// 	return $this->belongsTo("RefereeRole");
	// }

	// public function Incident(){
	// 	return $this->belongsToMany("Incident","report_incidents","incident_id","report_id");
	// }

	// public function User(){
	// 	return $this->belongsTo("User");
	// }
	

}
