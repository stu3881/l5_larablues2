DB::table('MiscThingss')->where(Input::get('key_field_name'),'=',Input::get('key_field_value'))
->update(array(
'no_of_blank_entries' => Input::get('no_of_blank_entries'),
'model' => Input::get('model'),
'model_table' => Input::get('model_table'),
'snippet_table' => Input::get('snippet_table'),
'snippet_table_key_field_name' => Input::get('snippet_table_key_field_name'),
'node_name' => Input::get('node_name'),
'view_files_prefix' => Input::get('view_files_prefix'),
'backup_node' => Input::get('backup_node'),
'generated_files_folder' => Input::get('generated_files_folder'),
'key_field_name' => Input::get('key_field_name'),
'key_field_name_array' => Input::get('key_field_name_array')));
