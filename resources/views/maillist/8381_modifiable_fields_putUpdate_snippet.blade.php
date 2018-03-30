DB::connection(blues_main)->table('MiscThings')->where(Input::get('key_field_name'),'=',Input::get('key_field_value'))
->update(array(
'record_type' => Input::get('record_type'),
'db_connection_name' => Input::get('db_connection_name'),
'db_snippet_connection' => Input::get('db_snippet_connection'),
'db_data_connection' => Input::get('db_data_connection'),
'db_host' => Input::get('db_host'),
'db_database' => Input::get('db_database'),
'db_username' => Input::get('db_username'),
'db_password' => Input::get('db_password'),
'db_charset' => Input::get('db_charset'),
'db_collation' => Input::get('db_collation'),
'db_prefix' => Input::get('db_prefix'),
'db_driver' => Input::get('db_driver'),
'generated_files_folder' => Input::get('generated_files_folder')));
