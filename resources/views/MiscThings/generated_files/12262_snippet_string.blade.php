<tr>
<td style="text-align:left">
{{ Form::label("table_name","table_name") }}
</td>
<td style="text-align:left">
{{ Form::text('table_name',$data_array_name['table_name']) }}
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
<td style="text-align:left">
{{ Form::label("name","name") }}
</td>
<td style="text-align:left">
{{ Form::text('name',$data_array_name['name']) }}
</td>
</tr>
<tr>
<td style="text-align:left">
{{ Form::label("value","value") }}
</td>
<td style="text-align:left">
{{ Form::text('value',$data_array_name['value']) }}
</td>
</tr>
<tr>
<td style="text-align:left">
{{ Form::label("record_type","record_type") }}
</td>
<td style="text-align:left">
{{ Form::text('record_type',$data_array_name['record_type']) }}
</td>
</tr>
