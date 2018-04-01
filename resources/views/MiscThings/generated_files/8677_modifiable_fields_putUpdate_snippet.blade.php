DB::table('MiscThingss')->where(Input::get('key_field_name'),'=',Input::get('key_field_value'))
->update(array(
'db_connection_name' => Input::get('db_connection_name'),
'record_type' => Input::get('record_type')));
