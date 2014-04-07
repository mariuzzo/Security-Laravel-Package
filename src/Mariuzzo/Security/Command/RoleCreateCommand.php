<?php namespace Mariuzzo\Security\Command;

use Illuminate\Console\Command;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Input\InputArgument;
use Mariuzzo\Security\Models\Role;

class RoleCreateCommand extends Command {

	/**
	 * The console command name.
	 *
	 * @var string
	 */
	protected $name = 'role:create';

	/**
	 * The console command description.
	 *
	 * @var string
	 */
	protected $description = 'Create a User Role.';

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
		$name 			= $this->ask('Type the role name:');
		$description	= $this->ask('Type the role description:');
		
		// Compact data
		$data = compact('name', 'description');

		// Instantiate a new role
		$role = new Role($data);

		// If validation fails
		// show errors
		if( ! $role->validate($data)){
			$messages = $role->errors();

			foreach ($messages as $message)
			{
			    $this->error($message);
			}

			return;
		}

		// Insert new role to database.
		$role->save();

		$this->info('Role created!');
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