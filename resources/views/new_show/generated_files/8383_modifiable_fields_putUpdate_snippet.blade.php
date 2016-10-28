DB::table('MiscThingss')->where(Input::get('key_field_name'),'=',Input::get('key_field_value'))
->update(array(
'business_rules_field_name_array' => Input::get('business_rules_field_name_array'),
'field_name' => Input::get('field_name')));
