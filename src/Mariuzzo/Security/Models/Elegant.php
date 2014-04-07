<?php namespace Mariuzzo\Security\Models;

use Illuminate\Database\Eloquent\Model as Eloquent;
use Illuminate\Support\Facades\Validator;

class Elegant extends Eloquent {
	protected $rules = array();

	protected $errors;

	// Timestamps FALSE by default
	public $timestamps = false;

	public function validate($data)
	{
		$v = Validator::make($data, $this->rules);

     	if ($v->fails())
		{
     		$this->errors = $v->errors;
			return false;
		}

     	return true;
	}

	public function errors()
	{
		return $this->errors;
	}
}