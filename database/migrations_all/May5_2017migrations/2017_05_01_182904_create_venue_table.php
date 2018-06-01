<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateVenueTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('venue', function(Blueprint $table)
		{
			$table->integer('venue_index', true);
			$table->string('venue_name', 100)->default('');
			$table->string('venue_link', 100)->nullable()->default('');
			$table->integer('venue_local')->nullable()->default(0);
			$table->integer('venue_height')->nullable()->default(200);
			$table->integer('venue_width')->nullable()->default(200);
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('venue');
	}

}
