<?php namespace Mariuzzo\Security;

use Illuminate\Support\ServiceProvider;
use Mariuzzo\Security\Command\UserCreateCommand;

class SecurityServiceProvider extends ServiceProvider {

	/**
	 * Indicates if loading of the provider is deferred.
	 *
	 * @var bool
	 */
	protected $defer = false;

	/**
	 * Bootstrap the application events.
	 *
	 * @return void
	 */
	public function boot()
	{
		// Define the package.
		$this->package('mariuzzo/security', 'mariuzzo-security');

		// Bind commands to the IoC container.
		$this->app->bind('mariuzzo-security::command.user.create', function($app) {
			return new UserCreateCommand();
		});

		// Register the command to make them available.
		$this->commands(array(
			'mariuzzo-security::command.user.create'
		));
	}

	/**
	 * Register the service provider.
	 *
	 * @return void
	 */
	public function register()
	{
		//
	}

	/**
	 * Get the services provided by the provider.
	 *
	 * @return array
	 */
	public function provides()
	{
		return array();
	}

}