DB::table('MiscThings')->where(Input::get('key_field_name'),'=',Input::get('key_field_value'))
->update(array(
'db_charset' => Input::get('db_charset'),
'db_collation' => Input::get('db_collation'),
'db_connection_name' => Input::get('db_connection_name'),
'db_database' => Input::get('db_database')));
