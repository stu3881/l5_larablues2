DB::table('Volunteers')->where(Input::get('key_field_name'),'=',Input::get('key_field_value'))
->update(array(
'email' => Input::get('email'),
'v_name' => Input::get('v_name'),
'v_phone' => Input::get('v_phone')));
