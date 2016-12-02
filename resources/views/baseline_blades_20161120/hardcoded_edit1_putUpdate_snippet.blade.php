DB::table('MiscThings')->where(Input::get('key_field_name'),'=',Input::get('key_field_value'))
->update(array(
'report_name' 	=> Input::get('report_name'));


