<?php

use Illuminate\Database\Migrations\Migration;

/**
 * The AbstractMigration class.
 *
 * @author rmariuzzo
 */
class AbstractMigration extends Migration
{
    /**
     * Add common columns to a table schema.
     *
     * @param tableName string The name of the table.
     *
     * @return void
     */
    protected function addCommonsTo($tableName) {
        // Add common columns.
        Schema::table($tableName, function($table)
        {
            // $table->timestamps();
            $table->integer('created_by')->unsigned()->nullable();
            $table->integer('updated_by')->unsigned()->nullable();
        });
        // Add common relationships.
        Schema::table($tableName, function($table)
        {
            $table->foreign('created_by')->references('id')->on('users');
            $table->foreign('updated_by')->references('id')->on('users');
        });
    }
}