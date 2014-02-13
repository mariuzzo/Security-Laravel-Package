<?php

use Illuminate\Database\Migrations\Migration;

class CreateRolesPermissionsTable extends AbstractMigration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('roles_permissions', function($table)
		{
			$table->increments('id');
			$table->integer('role_id')->unsigned();
			$table->integer('permission_id')->unsigned();
		});

		$this->addCommonsTo('roles_permissions');

		Schema::table('roles_permissions', function($table)
		{
	        $table->foreign('role_id')->references('id')->on('roles');
	        $table->foreign('permission_id')->references('id')->on('permissions');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('roles_permissions');
	}

}