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
{{ Form::label("value","value") }}
</td>
<td style="text-align:left">
{{ Form::text('value',$record['value']) }}
</td>
<tr>
<td style="text-align:left">
{{ Form::label("name","name") }}
</td>
<td style="text-align:left">
{{ Form::text('name',$record['name']) }}
</td>
<tr>
<td style="text-align:left">
{{ Form::label("advanced_query","advanced_query") }}
</td>
<td style="text-align:left">
{{ Form::text('advanced_query',$record['advanced_query']) }}
</td>
