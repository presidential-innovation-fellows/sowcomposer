<?php

class Add_Read_Only_Uuid_To_Sows {

	/**
	 * Make changes to the database.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('sows', function($table) {
	    $table->string('read_only_uuid');
		});
	}

	/**
	 * Revert the changes to the database.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('sows', function($table) {
			$table->drop_column('read_only_uuid');
		});
	}

}