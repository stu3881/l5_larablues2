<tr>
<td style="text-align:left">
{{ Form::label("class_name","class_name") }}
</td>
<td style="text-align:left">
{{ Form::text('class_name',$record['class_name']) }}
</td>
<tr>
<td style="text-align:left">
{{ Form::label("controller_name","controller_name") }}
</td>
<td style="text-align:left">
{{ Form::text('controller_name',$record['controller_name']) }}
</td>
<tr>
<td style="text-align:left">
{{ Form::label("created_at","created_at") }}
</td>
<td style="text-align:left">
{{ Form::text('created_at',$record['created_at']) }}
</td>
<tr>
<td style="text-align:left">
{{ Form::label("db_charset","db_charset") }}
</td>
<td style="text-align:left">
{{ Form::text('db_charset',$record['db_charset']) }}
</td>
<tr>
<td style="text-align:left">
{{ Form::label("db_collation","db_collation") }}
</td>
<td style="text-align:left">
{{ Form::text('db_collation',$record['db_collation']) }}
</td>
<tr>
<td style="text-align:left">
{{ Form::label("db_connection_name","db_connection_name") }}
</td>
<td style="text-align:left">
{{ Form::text('db_connection_name',$record['db_connection_name']) }}
</td>
<tr>
<td style="text-align:left">
{{ Form::label("db_database","db_database") }}
</td>
<td style="text-align:left">
{{ Form::text('db_database',$record['db_database']) }}
</td>
<tr>
<td style="text-align:left">
{{ Form::label("db_default","db_default") }}
</td>
<td style="text-align:left">
{{ Form::text('db_default',$record['db_default']) }}
</td>
<tr>
<td style="text-align:left">
{{ Form::label("db_driver","db_driver") }}
</td>
<td style="text-align:left">
{{ Form::text('db_driver',$record['db_driver']) }}
</td>
<tr>
<td style="text-align:left">
{{ Form::label("db_host","db_host") }}
</td>
<td style="text-align:left">
{{ Form::text('db_host',$record['db_host']) }}
</td>
<tr>
<td style="text-align:left">
{{ Form::label("db_password","db_password") }}
</td>
<td style="text-align:left">
{{ Form::text('db_password',$record['db_password']) }}
</td>
<tr>
<td style="text-align:left">
{{ Form::label("db_prefix","db_prefix") }}
</td>
<td style="text-align:left">
{{ Form::text('db_prefix',$record['db_prefix']) }}
</td>
<tr>
<td style="text-align:left">
{{ Form::label("db_schema","db_schema") }}
</td>
<td style="text-align:left">
{{ Form::text('db_schema',$record['db_schema']) }}
</td>
<tr>
<td style="text-align:left">
{{ Form::label("db_username","db_username") }}
</td>
<td style="text-align:left">
{{ Form::text('db_username',$record['db_username']) }}
</td>
<tr>
<td style="text-align:left">
{{ Form::label("edit1_array","edit1_array") }}
</td>
<td style="text-align:left">
{{ Form::text('edit1_array',$record['edit1_array']) }}
</td>
<tr>
<td style="text-align:left">
{{ Form::label("edit_blade_hidden_snippet","edit_blade_hidden_snippet") }}
</td>
<td style="text-align:left">
{{ Form::text('edit_blade_hidden_snippet',$record['edit_blade_hidden_snippet']) }}
</td>
<tr>
<td style="text-align:left">
{{ Form::label("fields_name_value_array","fields_name_value_array") }}
</td>
<td style="text-align:left">
{{ Form::text('fields_name_value_array',$record['fields_name_value_array']) }}
</td>
<tr>
<td style="text-align:left">
{{ Form::label("field_name","field_name") }}
</td>
<td style='text-align:left'>
{{ Form::select('field_name',$lookups['field_name'] , $record['field_name']) }}
</td>
<tr>
<td style="text-align:left">
{{ Form::label("field_name_source_string","field_name_source_string") }}
</td>
<td style="text-align:left">
{{ Form::text('field_name_source_string',$record['field_name_source_string']) }}
</td>
<tr>
<td style="text-align:left">
{{ Form::label("function_name","function_name") }}
</td>
<td style="text-align:left">
{{ Form::text('function_name',$record['function_name']) }}
</td>
<tr>
<td style="text-align:left">
{{ Form::label("generated_files_folder","generated_files_folder") }}
</td>
<td style="text-align:left">
{{ Form::text('generated_files_folder',$record['generated_files_folder']) }}
</td>
<tr>
<td style="text-align:left">
{{ Form::label("getEdit2_include","getEdit2_include") }}
</td>
<td style="text-align:left">
{{ Form::text('getEdit2_include',$record['getEdit2_include']) }}
</td>
<tr>
<td style="text-align:left">
{{ Form::label("record_type","record_type") }}
</td>
<td style="text-align:left">
{{ Form::text('record_type',$record['record_type']) }}
</td>
<tr>
<td style="text-align:left">
{{ Form::label("report_containing_menu","report_containing_menu") }}
</td>
<td style="text-align:left">
{{ Form::text('report_containing_menu',$record['report_containing_menu']) }}
</td>
<tr>
<td style="text-align:left">
{{ Form::label("report_name","report_name") }}
</td>
<td style="text-align:left">
{{ Form::text('report_name',$record['report_name']) }}
</td>
<tr>
<td style="text-align:left">
{{ Form::label("report_query","report_query") }}
</td>
<td style="text-align:left">
{{ Form::text('report_query',$record['report_query']) }}
</td>
<tr>
<td style="text-align:left">
{{ Form::label("required_fields_array","required_fields_array") }}
</td>
<td style="text-align:left">
{{ Form::text('required_fields_array',$record['required_fields_array']) }}
</td>
<tr>
<td style="text-align:left">
{{ Form::label("required_fields_as_string_list","required_fields_as_string_list") }}
</td>
<td style="text-align:left">
{{ Form::text('required_fields_as_string_list',$record['required_fields_as_string_list']) }}
</td>
<tr>
<td style="text-align:left">
{{ Form::label("required_fields_required_array","required_fields_required_array") }}
</td>
<td style="text-align:left">
{{ Form::text('required_fields_required_array',$record['required_fields_required_array']) }}
</td>
<tr>
<td style="text-align:left">
{{ Form::label("snippet_name","snippet_name") }}
</td>
<td style="text-align:left">
{{ Form::text('snippet_name',$record['snippet_name']) }}
</td>
<tr>
<td style="text-align:left">
{{ Form::label("snippet_table","snippet_table") }}
</td>
<td style="text-align:left">
{{ Form::text('snippet_table',$record['snippet_table']) }}
</td>
<tr>
<td style="text-align:left">
{{ Form::label("snippet_table_key_field_name","snippet_table_key_field_name") }}
</td>
<td style="text-align:left">
{{ Form::text('snippet_table_key_field_name',$record['snippet_table_key_field_name']) }}
</td>
<tr>
<td style="text-align:left">
{{ Form::label("table_name","table_name") }}
</td>
<td style="text-align:left">
{{ Form::text('table_name',$record['table_name']) }}
</td>
