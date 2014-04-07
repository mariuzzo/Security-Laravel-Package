<?php namespace Mariuzzo\Security\Command;

use Illuminate\Console\Command;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Input\InputArgument;
use Mariuzzo\Security\Models\Permission;

class PermissionCreateCommand extends Command {

	/**
	 * The console command name.
	 *
	 * @var string
	 */
	protected $name = 'permission:create';

	/**
	 * The console command description.
	 *
	 * @var string
	 */
	protected $description = 'Create a User Permission.';

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
		$name 			= $this->ask('Type the permission name:');
		$description	= $this->ask('Type the permission description:');
		
		// Compact data
		$data = compact('name', 'description');

		// Instantiate a new role
		$permission = new Permission($data);

		// If validation fails
		// show errors
		if( ! $permission->validate($data)){
			$messages = $permission->errors();

			foreach ($messages as $message)
			{
			    $this->error($message);
			}

			return;
		}

		// Insert new Permission to database.
		$permission->save();

		$this->info('Permission created!');
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