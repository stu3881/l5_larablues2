<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddTableFields extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('miscThings', function(Blueprint $table)
        {
         $table->boolean('table_route_exists')->nullable()->after('table_name');
         $table->boolean('table_controller_exists')->nullable()->after('table_name');
         $table->boolean('table_reporting_active')->nullable()->after('table_name');
        });
      //
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        $table->dropColumn('table_reporting_active');
        $table->dropColumn('table_controller_exists');
        $table->dropColumn('table_route_exists');
    }
}
