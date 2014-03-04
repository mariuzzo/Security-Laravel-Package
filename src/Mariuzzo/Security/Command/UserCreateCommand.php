<?php namespace Mariuzzo\Security\Command;

use Illuminate\Console\Command;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Input\InputArgument;
use Illuminate\Support\Facades\Validator;

class UserCreateCommand extends Command {

	/**
	 * The console command name.
	 *
	 * @var string
	 */
	protected $name = 'user:create';

	/**
	 * The console command description.
	 *
	 * @var string
	 */
	protected $description = 'Create a user.';

	/**
	 * Create a new command instance.
	 *
	 * @return void
	 */
	public function __construct()
	{
		parent::__construct();
	}

	/**
	 * Execute the console command.
	 *
	 * @return void
	 */
	public function fire()
	{
		// Prompt for information.
		$username              = $this->ask('Type the username:');
		$password              = $this->secret('Type the password:');
		$password_confirmation = $this->secret('Retype the password:');
		$email                 = $this->ask('Type the email:');
		$first_name            = $this->ask('Type the first name:');
		$last_name             = $this->ask('Type the last name:');
		$status                = $this->ask('Type the status:');
		$role_id			   = $this->ask('Type the Role Id:');

		// Validation Rules
		$rules = array(
			'username' 				=> 'required',
			'password' 				=> 'required|min:4',
			'password_confirmation' => 'required|same:password',
			'email' 				=> 'required|email|unique:users',
			'first_name' 			=> 'required',
			'last_name' 			=> 'required',
			'status' 				=> 'required',
			'role_id' 				=> 'required'
		);

		// Data
		$data = compact('username', 'password', 'password_confirmation', 
			'email', 'first_name', 'last_name', 'status');

		// Validator
		$validator = Validator::make($data, $rules);

		// If validation fails
		// show errors
		if($validator->fails()){
			$messages = $validator->messages();

			foreach ($messages->all() as $message)
			{
			    $this->error($message);
			}

			return;
		}

		// Hash the password.
		$password = \Hash::make($password);

		// Insert new user to database.
		\DB::table('users')->insert(
			compact('username', 'password', 'email', 'first_name', 
				'last_name', 'status', 'role_id')
		);

		$this->info('User created!');
	}

	/**
	 * Get the console command arguments.
	 *
	 * @return array
	 */
	protected function getArguments()
	{
		return [];
	}

	/**
	 * Get the console command options.
	 *
	 * @return array
	 */
	protected function getOptions()
	{
		return [];
	}
}
