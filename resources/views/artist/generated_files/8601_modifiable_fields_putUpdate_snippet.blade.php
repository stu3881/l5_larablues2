DB::table('MiscThingss')->where(Input::get('key_field_name'),'=',Input::get('key_field_value'))
->update(array(
'record_type' => Input::get('record_type'),
'db_connection_name' => Input::get('db_connection_name'),
'controller_name' => Input::get('controller_name'),
'no_of_blank_entries' => Input::get('no_of_blank_entries'),
'model' => Input::get('model'),
'model_table' => Input::get('model_table'),
'node_name' => Input::get('node_name'),
'snippet_table' => Input::get('snippet_table'),
'snippet_table_key_field_name' => Input::get('snippet_table_key_field_name'),
'backup_node' => Input::get('backup_node'),
'generated_files_folder' => Input::get('generated_files_folder'),
'key_field_name' => Input::get('key_field_name')));
