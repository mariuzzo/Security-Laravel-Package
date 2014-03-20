<?php

use Illuminate\Database\Migrations\Migration;

/**
 * The CreateUsersTable class.
 *
 * @author rmariuzzo
 */
class CreateUsersTable extends AbstractMigration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('users', function($table) {
	        $table->increments('id');
	        $table->string('username', 100);
	        $table->string('password', 100);
	        $table->string('first_name', 100);
			$table->string('last_name', 100);
	        $table->string('email', 100)->unique();
	        $table->string('status', 1);
			$table->integer('role_id')->unsigned();
		});
			
		$this->addCommonsTo('users');
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('users');
	}

}