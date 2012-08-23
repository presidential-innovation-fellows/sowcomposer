<?php

class Add_Variables_To_Template {

	/**
	 * Make changes to the database.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('templates', function($table) {
		    $table->text('variables');
		});
	}

	/**
	 * Revert the changes to the database.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('templates', function($table) {
	    $table->drop_column('variables');
		});
	}

}