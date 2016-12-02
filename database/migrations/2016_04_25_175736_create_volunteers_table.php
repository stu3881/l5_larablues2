<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateVolunteersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('volunteers', function(Blueprint $table)
		{
			$table->increments('v_index');
			$table->string('v_name', 100)->nullable()->default('');
			$table->string('email', 100)->nullable();
			$table->string('v_phone', 100)->nullable()->default('');
			$table->string('v_member', 5)->nullable()->default('?');
			$table->boolean('v_flag')->default(1);
			$table->string('v_assign', 100)->nullable()->default('');
			$table->string('v_notes', 100)->nullable()->default('');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('volunteers');
	}

}
