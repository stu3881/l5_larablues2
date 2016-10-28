<tr>
<td style="text-align:left">
{{ Form::label("record_type","record_type") }}
</td>
<td style="text-align:left">
{{ Form::text('record_type',$data_array_name['record_type']) }}
</td>
</tr>
<tr>
<td style="text-align:left">
{{ Form::label("db_connection_name","db_connection_name") }}
</td>
<td style="text-align:left">
{{ Form::text('db_connection_name',$data_array_name['db_connection_name']) }}
</td>
</tr>
<tr>
<td style="text-align:left">
{{ Form::label("db_snippet_connection","db_snippet_connection") }}
</td>
<td style="text-align:left">
{{ Form::text('db_snippet_connection',$data_array_name['db_snippet_connection']) }}
</td>
</tr>
<tr>
<td style="text-align:left">
{{ Form::label("db_data_connection","db_data_connection") }}
</td>
<td style="text-align:left">
{{ Form::text('db_data_connection',$data_array_name['db_data_connection']) }}
</td>
</tr>
<tr>
<td style="text-align:left">
{{ Form::label("db_host","db_host") }}
</td>
<td style="text-align:left">
{{ Form::text('db_host',$data_array_name['db_host']) }}
</td>
</tr>
<tr>
<td style="text-align:left">
{{ Form::label("db_database","db_database") }}
</td>
<td style="text-align:left">
{{ Form::text('db_database',$data_array_name['db_database']) }}
</td>
</tr>
<tr>
<td style="text-align:left">
{{ Form::label("db_username","db_username") }}
</td>
<td style="text-align:left">
{{ Form::text('db_username',$data_array_name['db_username']) }}
</td>
</tr>
<tr>
<td style="text-align:left">
{{ Form::label("db_password","db_password") }}
</td>
<td style="text-align:left">
{{ Form::text('db_password',$data_array_name['db_password']) }}
</td>
</tr>
<tr>
<td style="text-align:left">
{{ Form::label("db_charset","db_charset") }}
</td>
<td style="text-align:left">
{{ Form::text('db_charset',$data_array_name['db_charset']) }}
</td>
</tr>
<tr>
<td style="text-align:left">
{{ Form::label("db_collation","db_collation") }}
</td>
<td style="text-align:left">
{{ Form::text('db_collation',$data_array_name['db_collation']) }}
</td>
</tr>
<tr>
<td style="text-align:left">
{{ Form::label("db_prefix","db_prefix") }}
</td>
<td style="text-align:left">
{{ Form::text('db_prefix',$data_array_name['db_prefix']) }}
</td>
</tr>
<tr>
<td style="text-align:left">
{{ Form::label("db_driver","db_driver") }}
</td>
<td style="text-align:left">
{{ Form::text('db_driver',$data_array_name['db_driver']) }}
</td>
</tr>
<tr>
<td style="text-align:left">
{{ Form::label("generated_files_folder","generated_files_folder") }}
</td>
<td style="text-align:left">
{{ Form::text('generated_files_folder',$data_array_name['generated_files_folder']) }}
</td>
</tr>
<tr>
<td style="text-align:left">
{{ Form::label("field_name","field_name") }}
</td>
<td style='text-align:left'>
{{ Form::select('field_name',$lookups['field_name'] , $data_array_name['field_name']) }}
</td>
</tr>
<tr>
</tr>
