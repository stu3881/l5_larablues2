DB::table('MiscThingss')->where(Input::get('key_field_name'),'=',Input::get('key_field_value'))
->update(array(
'business_rules_field_name_array' => Input::get('business_rules_field_name_array'),
'business_rules_r_o_array' => Input::get('business_rules_r_o_array'),
'business_rules_value_array' => Input::get('business_rules_value_array')));
