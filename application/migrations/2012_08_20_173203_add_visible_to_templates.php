<?php

class Add_Visible_To_Templates {

	/**
	 * Make changes to the database.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table("templates", function($table){
			$table->boolean("visible")->default(1);
		});
	}

	/**
	 * Revert the changes to the database.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table("templates", function($table){
			$table->drop_column("visible");
		});
	}

}