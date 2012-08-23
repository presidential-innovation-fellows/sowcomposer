<?php

class Create_Sections {

	/**
	 * Make changes to the database.
	 *
	 * @return void
	 */
	public function up()
	{

    Schema::create('templates', function($table)
    {
        $table->increments('id');
        $table->string('title');
        $table->timestamps();
    });

    Schema::create('template_sections', function($table)
    {
        $table->increments('id');
        $table->integer('template_id');
        $table->integer('display_order');
        $table->string('section_type');
        $table->string('help_text');
        $table->string('title');
        $table->text('body');
        $table->timestamps();
    });

    Schema::create('sows', function($table)
    {
        $table->increments('id');
        $table->string('uuid');
        $table->integer('based_on_template_id')->nullable();
        $table->string('author_email');
        $table->string('title');
        $table->text('body');
        $table->text('variables'); // {WEBSITE_URL: "energy.gov", NAME: "Energy"}]
        $table->timestamps();
    });

    Schema::create('sow_sections', function($table)
    {
        $table->increments('id');
        $table->integer('sow_id');
        $table->integer('based_on_template_section_id')->nullable();
        $table->integer('display_order');
        $table->string('section_type');
        $table->string('title');
        $table->text('body');
        $table->timestamps();
    });

	}

	/**
	 * Revert the changes to the database.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('templates');
		Schema::drop('template_sections');
		Schema::drop('sow_sections');
		Schema::drop('sows');
	}

}