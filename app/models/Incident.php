<?php


class Incident extends Eloquent {

	

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'incidents';

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	
	/**
	 * Define relationship to Reports
	 */
	public function report(){
		return $this->belongsTo('Report');
	}

	/**
	 * Define relationship to IncidentType
	 */
	public function report(){
		return $this->belongsTo('IncidentType','incident_type_id');
	}
}
