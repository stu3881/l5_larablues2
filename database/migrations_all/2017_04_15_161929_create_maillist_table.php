<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateMaillistTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('maillist', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->string('FirstName', 80)->nullable();
			$table->string('LastName', 80)->nullable();
			$table->string('Address', 100)->nullable();
			$table->string('City', 80)->nullable();
			$table->string('State', 50)->nullable();
			$table->string('Zip', 25)->nullable();
			$table->string('Email', 80)->nullable();
			$table->string('Original_email', 80)->nullable();
			$table->string('Phone', 30)->nullable();
			$table->string('Update', 20)->nullable();
			$table->string('Status', 25)->nullable();
			$table->integer('Quantity')->unsigned()->default(1);
			$table->string('Notes')->nullable();
			$table->string('Flags', 30)->nullable();
			$table->char('raffleAug2010', 1)->nullable();
			$table->integer('plst1_user_user_id')->nullable();
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
		Schema::drop('maillist');
	}

}
