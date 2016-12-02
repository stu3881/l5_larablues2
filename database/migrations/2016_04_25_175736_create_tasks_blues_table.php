<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateTasksBluesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('tasks_blues', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->string('TaskName', 80)->default('');
			$table->string('TaskName1', 30);
			$table->string('TaskType', 30)->default('');
			$table->string('shift_id', 30);
			$table->boolean('active_for_current_show')->default(0);
			$table->string('PermanentTask', 1)->nullable();
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
		Schema::drop('tasks_blues');
	}

}
