<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateMiscThingsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('miscThings', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->string('record_type', 30);
			$table->string('report_name', 50)->nullable();
			$table->text('report_query', 65535)->nullable();
			$table->string('bypassed_field_name', 40)->nullable();
			$table->string('report_containing_menu', 50)->nullable();
			$table->text('edit1_array', 65535)->nullable();
			$table->string('db_connection_name', 50)->nullable();
			$table->string('db_default', 50)->nullable();
			$table->string('db_driver', 50)->nullable();
			$table->string('db_host', 50)->nullable();
			$table->string('db_database', 50)->nullable();
			$table->string('db_username', 50)->nullable();
			$table->string('db_password', 50)->nullable();
			$table->string('db_charset', 50)->nullable();
			$table->string('db_collation', 50)->nullable();
			$table->string('db_prefix', 50)->nullable();
			$table->string('db_schema', 50)->nullable();
			$table->string('maintenance_query', 50)->nullable();
			$table->text('lookup_name_value_array', 65535)->nullable();
			$table->text('lookup_name_value_array_indexed', 65535)->nullable();
			$table->text('lookup_name_value_array_string', 65535)->nullable();
			$table->text('lookup_name_value_array_gen_by_table', 65535)->nullable();
			$table->text('business_rules_field_name_array', 65535)->nullable();
			$table->text('business_rules_r_o_array', 65535)->nullable();
			$table->text('business_rules_value_array', 65535)->nullable();
			$table->text('business_rules', 65535)->nullable();
			$table->text('query_field_name_array', 65535)->nullable();
			$table->text('query_r_o_array', 65535)->nullable();
			$table->text('query_value_array', 65535)->nullable();
			$table->text('advanced_query', 65535)->nullable();
			$table->string('name', 40)->nullable();
			$table->string('value', 40)->nullable();
			$table->string('class_name', 40)->nullable();
			$table->string('node_name', 30)->nullable();
			$table->string('table_name', 30)->nullable();
			$table->string('field_name', 30)->nullable();
			$table->string('field_name_source_string', 50)->nullable();
			$table->text('misc_text_area_0', 65535)->nullable();
			$table->text('browse_select_display_snippet', 65535)->nullable();
			$table->text('browse_select_array', 65535)->nullable();
			$table->text('browse_select_field_names_row', 65535)->nullable();
			$table->text('fields_name_value_array', 65535)->nullable();
			$table->text('modifiable_fields_array', 65535)->nullable();
			$table->text('required_fields_array', 65535)->nullable();
			$table->text('required_fields_required_array', 65535)->nullable();
			$table->text('required_fields_as_string_list', 65535)->nullable();
			$table->text('query_where_clause_array', 65535)->nullable();
			$table->text('edit_blade_hidden_snippet', 65535)->nullable();
			$table->string('modifiable_fields_list', 200)->nullable();
			$table->text('modifiable_fields_update_array_include', 65535)->nullable();
			$table->text('modifiable_add_save_snippet', 65535)->nullable();
			$table->text('merge_browse_select_and_modify_arrays', 65535)->nullable();
			$table->text('modifiable_fields_putUpdate', 65535)->nullable();
			$table->text('getEdit2_include', 65535)->nullable();
			$table->string('function_name', 50)->nullable();
			$table->string('snippet_name', 50)->nullable();
			$table->boolean('key_value_select_exists')->nullable();
			$table->string('key_value_select_name', 30)->nullable();
			$table->string('key_value_select_routine_name', 75)->nullable();
			$table->string('key_value_select_file_name', 30)->nullable();
			$table->timestamps();
			$table->string('controller_name', 40)->nullable();
			$table->string('no_of_blank_entries', 5)->nullable();
			$table->string('model', 40)->nullable();
			$table->string('model_table', 40)->nullable();
			$table->string('snippet_table', 40)->nullable();
			$table->string('snippet_table_key_field_name', 40)->nullable();
			$table->string('backup_node', 40)->nullable();
			$table->string('generated_files_folder', 40)->nullable();
			$table->string('key_field_name', 40)->nullable();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('miscThings');
	}

}
