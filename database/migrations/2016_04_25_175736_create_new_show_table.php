<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateNewShowTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('new_show', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->integer('maillist_index')->nullable();
			$table->integer('tasks_index')->nullable();
			$table->char('record_type', 1)->default('');
			$table->date('date')->nullable();
			$table->date('show_volunteer_link')->nullable();
			$table->string('show_run_mode', 10)->nullable();
			$table->date('demo_mode_last_refreshed_date')->nullable();
			$table->integer('length')->nullable()->default(1);
			$table->string('title', 100)->nullable();
			$table->string('artist', 100)->default('');
			$table->string('1st_shift_start', 5)->nullable();
			$table->string('2nd_shift_start', 5)->nullable();
			$table->string('3rd_shift_start', 5)->nullable();
			$table->string('first_shift_start', 5)->nullable();
			$table->string('second_shift_start', 5)->nullable();
			$table->string('third_shift_start', 5)->nullable();
			$table->string('chair_setup_start', 5)->nullable();
			$table->string('chair_setup_end', 5)->nullable();
			$table->integer('venue_index')->nullable();
			$table->timestamps();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('new_show');
	}

}
