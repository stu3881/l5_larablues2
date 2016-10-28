DB::connection(blues_main)->table('Volunteers')->where(Input::get('key_field_name'),'=',Input::get('key_field_value'))
->update(array(
'v_index' => Input::get('v_index'),
'v_member' => Input::get('v_member'),
'v_name' => Input::get('v_name'),
'v_notes' => Input::get('v_notes')));
