DB::table('MiscThings')->where(Input::get('key_field_name'),'=',Input::get('key_field_value'))
->update(array(
'browse_select_array' => Input::get('browse_select_array')));
