DB::table('MiscThings')->where(Input::get('key_field_name'),'=',Input::get('key_field_value'))
->update(array(
'field_name' => Input::get('field_name'),
'record_type' => Input::get('record_type'),
'value' => Input::get('value'),
'name' => Input::get('name'),
'advanced_query' => Input::get('advanced_query')));
