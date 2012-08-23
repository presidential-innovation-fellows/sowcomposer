<?php

class Add_Foreign_Keys {

	/**
	 * Make changes to the database.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('sows', function($table){
			$table->foreign('based_on_template_id')->references('id')->on('templates')->on_delete('SET NULL');
		});

		Schema::table('sow_sections', function($table){
			$table->foreign('sow_id')->references('id')->on('sows')->on_delete('cascade');
			$table->foreign('based_on_template_section_id')->references('id')->on('template_sections')->on_delete('SET NULL');
		});

		Schema::table('template_sections', function($table){
			$table->foreign('template_id')->references('id')->on('templates')->on_delete('cascade');
		});
	}

	/**
	 * Revert the changes to the database.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('sows', function($table){
			$table->drop_foreign('sows_based_on_template_id_foreign');
		});

		Schema::table('sow_sections', function($table){
			$table->drop_foreign('sow_sections_sow_id_foreign');
			$table->drop_foreign('sow_sections_based_on_template_section_id_foreign');
		});

		Schema::table('template_sections', function($table){
			$table->drop_foreign('template_sections_template_id_foreign');
		});
	}

}