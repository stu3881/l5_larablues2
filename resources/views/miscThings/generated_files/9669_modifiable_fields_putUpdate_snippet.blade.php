DB::table('MiscThings')->where(Input::get('key_field_name'),'=',Input::get('key_field_value'))
->update(array(
'backup_node' => Input::get('backup_node')));
