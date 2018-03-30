<tr>
<td style="text-align:left">
{{ Form::label("record_type","record_type") }}
</td>
<td style="text-align:left">
{{ Form::text('record_type',$record['record_type']) }}
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
{{ Form::label("db_snippet_connection","db_snippet_connection") }}
</td>
<td style="text-align:left">
{{ Form::text('db_snippet_connection',$record['db_snippet_connection']) }}
</td>
<tr>
<td style="text-align:left">
{{ Form::label("db_data_connection","db_data_connection") }}
</td>
<td style="text-align:left">
{{ Form::text('db_data_connection',$record['db_data_connection']) }}
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
{{ Form::label("db_database","db_database") }}
</td>
<td style="text-align:left">
{{ Form::text('db_database',$record['db_database']) }}
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
{{ Form::label("db_password","db_password") }}
</td>
<td style="text-align:left">
{{ Form::text('db_password',$record['db_password']) }}
</td>
<tr>
<td style="text-align:left">
{{ Form::label("db_charset","db_charset") }}
</td>
<td style='text-align:left'>
{{ Form::select('db_charset',$lookups['db_charset'] , $record['db_charset']) }}
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
{{ Form::label("db_prefix","db_prefix") }}
</td>
<td style="text-align:left">
{{ Form::text('db_prefix',$record['db_prefix']) }}
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
{{ Form::label("generated_files_folder","generated_files_folder") }}
</td>
<td style="text-align:left">
{{ Form::text('generated_files_folder',$record['generated_files_folder']) }}
</td>
