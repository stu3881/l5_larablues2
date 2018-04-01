DB::table('MiscThingss')->where(Input::get('key_field_name'),'=',Input::get('key_field_value'))
->update(array(
'field_name' => Input::get('field_name'),
'record_type' => Input::get('record_type'),
'table_name' => Input::get('table_name')));
