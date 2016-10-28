<tr>
<td style="text-align:left">
{{ Form::label("business_rules_field_name_array","business_rules_field_name_array") }}
</td>
<td style="text-align:left">
{{ Form::text('business_rules_field_name_array',$record['business_rules_field_name_array']) }}
</td>
<tr>
<td style="text-align:left">
{{ Form::label("field_name","field_name") }}
</td>
<td style='text-align:left'>
{{ Form::select('field_name',$lookups['field_name'] , $record['field_name']) }}
</td>
