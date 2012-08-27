<?php

class Add_Section_Display_Order_To_Template_Sections {

	/**
	 * Make changes to the database.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table("template_sections", function($table){
			$table->integer("section_display_order");
		});
	}

	/**
	 * Revert the changes to the database.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table("template_sections", function($table){
			$table->drop_column("section_display_order");
		});
	}

}