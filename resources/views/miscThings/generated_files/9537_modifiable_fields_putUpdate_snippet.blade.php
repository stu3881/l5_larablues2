DB::table('MiscThings')->where(Input::get('key_field_name'),'=',Input::get('key_field_value'))
->update(array(
'record_type' => Input::get('record_type'),
'db_connection_name' => Input::get('db_connection_name'),
'db_database' => Input::get('db_database'),
'db_default' => Input::get('db_default'),
'db_driver' => Input::get('db_driver'),
'db_host' => Input::get('db_host'),
'db_password' => Input::get('db_password'),
'db_prefix' => Input::get('db_prefix'),
'db_schema' => Input::get('db_schema'),
'db_username' => Input::get('db_username'),
'db_charset' => Input::get('db_charset'),
'db_collation' => Input::get('db_collation')));
