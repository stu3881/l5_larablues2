DB::connection(blues_main)->table('MiscThings')->where(Input::get('key_field_name'),'=',Input::get('key_field_value'))
->update(array(
'table_name' => Input::get('table_name'),
'field_name' => Input::get('field_name'),
'value' => Input::get('value'),
'record_type' => Input::get('record_type'),
'name' => Input::get('name')));
