<tr>
<td style="text-align:left">
{{ Form::label("field_name","field_name") }}
</td>
<td style='text-align:left'>
{{ Form::select('field_name',$lookups['field_name'] , $record['field_name']) }}
</td>
