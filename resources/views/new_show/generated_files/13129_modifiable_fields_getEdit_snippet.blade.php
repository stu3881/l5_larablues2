<tr>
<td style="text-align:left"> xzx 
{{ Form::label('field_name','field_name') }}
</td>
<td style="text-align:right">xx
{{ Form::text('field_name',  $record['field_name']) }}
</td>
<tr>
<td style="text-align:left"> xzx 
{{ Form::label('record_type','record_type') }}
</td>
<td style="text-align:right">xx
{{ Form::text('record_type',  $record['record_type']) }}
</td>
<tr>
<td style="text-align:left"> xzx 
{{ Form::label('value','value') }}
</td>
<td style="text-align:right">xx
{{ Form::text('value',  $record['value']) }}
</td>
<tr>
<td style="text-align:left"> xzx 
{{ Form::label('name','name') }}
</td>
<td style="text-align:right">xx
{{ Form::text('name',  $record['name']) }}
</td>
<tr>
<td style="text-align:left"> xzx 
{{ Form::label('advanced_query','advanced_query') }}
</td>
<td class='text_align_left select_pink' >
{{ Form::textarea('advanced_query', $record['advanced_query']) }}
</td>
