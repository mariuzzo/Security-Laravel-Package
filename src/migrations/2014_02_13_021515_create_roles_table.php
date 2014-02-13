<?php

use Illuminate\Database\Migrations\Migration;

/**
 * The CreateRolesTable class.
 *
 * @author rmariuzzo
 */
class CreateRolesTable extends AbstractMigration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('roles', function($table)
		{
			$table->increments('id');
			$table->string('name', 100)->unique();
			$table->string('description', 200);
		});

		$this->addCommonsTo('roles');

		Schema::table('users', function($table)
		{
			$table->foreign('role_id')->references('id')->on('roles');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('users', function($table)
		{
			$table->dropForeign('users_role_id_foreign');
		});

		Schema::drop('roles');
	}

}