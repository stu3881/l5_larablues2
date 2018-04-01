DB::table('MiscThingss')->where(Input::get('key_field_name'),'=',Input::get('key_field_value'))
->update(array(
'record_type' => Input::get('record_type'),
'field_name' => Input::get('field_name'),
'name' => Input::get('name'),
'table_name' => Input::get('table_name'),
'value' => Input::get('value')));
