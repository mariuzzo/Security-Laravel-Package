<?php namespace Mariuzzo\Security\Models;

class Role extends Elegant {

	// Set validation rules
	protected $rules = array(
		'name' 				=> 'required',
		'description' 		=> 'required'
	);

	// Protected attributes from
	// mass assigment
	protected $guarded = array();	

}