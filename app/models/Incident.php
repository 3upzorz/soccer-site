<?php


class Incident extends Eloquent {

	

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'incidents';

	/**
	 * the attributes that can be edited by mass assignment
	 */
	protected $fillable = array('incident_type_id', 'description');

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	
	/**
	 * Define relationship to Reports
	 */
	// public function report(){
	// 	return $this->belongsTo('Report');
	// }

	/**
	 * Define relationship to IncidentType
	 */
	// public function incidentType(){
	// 	return $this->belongsTo('IncidentType','incident_type_id');
	// }
}
