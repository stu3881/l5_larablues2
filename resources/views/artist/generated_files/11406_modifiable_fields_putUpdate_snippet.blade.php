DB::table('Artists')->where(Input::get('key_field_name'),'=',Input::get('key_field_value'))
->update(array(
'artist_name' => Input::get('artist_name'),
'artist_sort' => Input::get('artist_sort')));
