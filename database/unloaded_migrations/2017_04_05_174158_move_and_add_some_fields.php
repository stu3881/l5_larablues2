<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class MoveAndAddSomeFields extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
            Schema::alter('miscThings', function (Blueprint $table) {
 
            $table->varchar('db_snippet_connection') ->after('db_schema');

        });
   }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
             Schema::alter('miscThings', function (Blueprint $table) {
 
            $table->varchar('db_snippet_connection') ->after('key_field_name');

        });
   }
}
