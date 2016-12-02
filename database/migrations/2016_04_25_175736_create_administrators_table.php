<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateAdministratorsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('administrators', function(Blueprint $table)
		{
			$table->integer('index', true);
			$table->string('userid', 40);
			$table->string('directory_node', 40);
			$table->string('record_type', 20);
			$table->date('date_created');
			$table->date('last_changed');
			$table->string('directory_node_description', 40);
			$table->string('image_database', 20)->default('sbblues_main');
			$table->string('image_table', 20)->default('blobs');
			$table->string('image_field', 20)->default('image');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('administrators');
	}

}
