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
{{ Form::label("record_type","record_type") }}
</td>
<td style="text-align:left">
{{ Form::text('record_type',$record['record_type']) }}
</td>
</tr>
<tr>
<td style="text-align:left">
{{ Form::label("value","value") }}
</td>
<td style="text-align:left">
{{ Form::text('value',$record['value']) }}
</td>
</tr>
<tr>
<td style="text-align:left">
{{ Form::label("name","name") }}
</td>
<td style="text-align:left">
{{ Form::text('name',$record['name']) }}
</td>
</tr>
<tr>
<td style="text-align:left">
{{ Form::label("table_name","table_name") }}
</td>
<td style="text-align:left">
{{ Form::text('table_name',$record['table_name']) }}
</td>
</tr>
<tr>
<td style="text-align:left">
{{ Form::label("node_name","node_name") }}
</td>
<td style="text-align:left">
{{ Form::text('node_name',$record['node_name']) }}
</td>
</tr>
<tr>
<td style="text-align:left">
{{ Form::label("table_reporting_active","table_reporting_active") }}
</td>
<td style='text-align:left'>
{{ Form::select('table_reporting_active',$lookups['table_reporting_active'] , $data_array_name['table_reporting_active']) }}
</td>
</tr>
