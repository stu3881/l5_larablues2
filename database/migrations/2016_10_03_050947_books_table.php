<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class BooksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $table = 'books';
        Schema::create('books', function (Blueprint $table) {
            $table->increments('id');
            $table->string('isbn', 100)->nullable();
            $table->string('title', 200)->nullable();
            $table->string('author', 200);
            $table->string('publisher', 200)->nullable();
            $table->string('image', 45)->nullable();
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
        Schema::drop('books');
    }
}
