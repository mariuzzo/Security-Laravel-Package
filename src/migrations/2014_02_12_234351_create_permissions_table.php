<?php

use Illuminate\Database\Migrations\Migration;

/**
 * The CreatePermissionsTable class.
 *
 * @author rmariuzzo
 */
class CreatePermissionsTable extends AbstractMigration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('permissions', function($table)
		{
			$table->increments('id');
			$table->string('name', 100)->unique();
			$table->string('description', 200);
		});

		$this->addCommonsTo('permissions');
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('permissions');
	}

}