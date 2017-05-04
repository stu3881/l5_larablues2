<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreatePhotographsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('photographs', function(Blueprint $table)
		{
			$table->integer('photoid', true);
			$table->integer('photogid')->default(0);
			$table->integer('showid')->default(-1);
			$table->date('date')->nullable();
			$table->string('directory', 100)->default('');
			$table->string('filename', 100)->default('');
			$table->string('comment', 100)->default('');
			$table->integer('artistid1')->default(-1);
			$table->integer('artistid2')->default(-1);
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('photographs');
	}

}
