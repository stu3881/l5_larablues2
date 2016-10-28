DB::table('Volunteers')->where(Input::get('key_field_name'),'=',Input::get('key_field_value'))
->update(array(
'email' => Input::get('email'),
'v_assign' => Input::get('v_assign'),
'v_flag' => Input::get('v_flag'),
'v_member' => Input::get('v_member'),
'v_name' => Input::get('v_name'),
'v_notes' => Input::get('v_notes'),
'v_phone' => Input::get('v_phone')));
