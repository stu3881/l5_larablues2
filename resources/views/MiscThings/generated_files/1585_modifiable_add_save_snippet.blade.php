<tr>
<td style="text-align:left">
{{ Form::label("field_name","field_name") }}
</td>
<td style='text-align:left'>
{{ Form::select('field_name',$lookups['field_name'] , $record['field_name']) }}
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
{{ Form::label("table_name","table_name") }}
</td>
<td style="text-align:left">
{{ Form::text('table_name',$record['table_name']) }}
</td>
