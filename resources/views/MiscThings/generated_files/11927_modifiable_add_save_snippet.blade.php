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
