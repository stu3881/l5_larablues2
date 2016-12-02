<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddDbSnippetAndDataConnectionToMiscThings extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
public function up()
{
    //
    Schema::table('miscThings', function($table) {
     $table->string('db_snippet_connection', 100)->nullable();
     $table->string('db_data_connection', 100)->nullable();

    });    
}
      

    /**
     * Reverse the migrations.
     *
     * @return void
     */
public function down()
{
    Schema::table('miscThings', function($table) {
        $table->dropColumn('db_snippet_connection');
        $table->dropColumn('db_data_connection');
    });   
}
}
