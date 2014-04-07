<?php namespace Mariuzzo\Security\Models;

class User extends Elegant {

	// Set validation rules
	protected $rules = array(
		'username' 				=> 'required',
		'password' 				=> 'required|min:4',
		'password_confirmation' => 'required|same:password',
		'email' 				=> 'required|email|unique:users',
		'first_name' 			=> 'required',
		'last_name' 			=> 'required',
		'status' 				=> 'required',
		'role_id' 				=> 'required'
	);

	// Protected attributes from
	// mass assigment
	protected $guarded = array('password', 'password_confirmation');	

}