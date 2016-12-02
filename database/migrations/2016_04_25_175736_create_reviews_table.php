<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateReviewsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('reviews', function(Blueprint $table)
		{
			$table->integer('index', true);
			$table->string('album_name', 40)->nullable();
			$table->string('artist', 40)->nullable();
			$table->string('event_name', 40)->nullable();
			$table->date('event_date')->nullable();
			$table->string('event_location', 40)->nullable();
			$table->string('review_type', 20);
			$table->date('date_created');
			$table->string('intro_if_any', 100);
			$table->dateTime('last_changed')->nullable();
			$table->date('release_date');
			$table->string('record_label', 40)->nullable();
			$table->string('reviewer', 40)->nullable();
			$table->string('text', 8000);
			$table->string('title_if_any', 200);
			$table->string('image_path', 200)->default('images/reviews');
			$table->string('image_table', 20)->default('blobs');
			$table->binary('image_content');
			$table->string('image_file', 40);
			$table->integer('image_size');
			$table->string('image_type');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('reviews');
	}

}
