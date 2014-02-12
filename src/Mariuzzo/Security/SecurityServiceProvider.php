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
		$this->package('mariuzzo/security', 'mariuzzo-security');
		$this->app->bind('mariuzzo-security::command.user.create', function($app) {
			return new UserCreateCommand();
		});
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
		return array('mariuzzo.security.users.create');
	}

}