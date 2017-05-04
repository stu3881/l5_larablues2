<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreatePhotographersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('photographers', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('firstname', 100)->nullable();
			$table->string('lastname', 100)->default('');
			$table->string('middlename', 100)->nullable();
			$table->string('url', 100)->nullable();
			$table->boolean('active')->default(1);
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('photographers');
	}

}
