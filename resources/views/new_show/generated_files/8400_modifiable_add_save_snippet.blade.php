<tr>
<td style="text-align:left">
{{ Form::label("business_rules_field_name_array","business_rules_field_name_array") }}
</td>
<td style="text-align:left">
{{ Form::text('business_rules_field_name_array',$record['business_rules_field_name_array']) }}
</td>
<tr>
<td style="text-align:left">
{{ Form::label("business_rules_r_o_array","business_rules_r_o_array") }}
</td>
<td style='text-align:left'>
{{ Form::select('business_rules_r_o_array',$lookups['business_rules_r_o_array'] , $record['business_rules_r_o_array']) }}
</td>
<tr>
<td style="text-align:left">
{{ Form::label("business_rules_value_array","business_rules_value_array") }}
</td>
<td style="text-align:left">
{{ Form::text('business_rules_value_array',$record['business_rules_value_array']) }}
</td>
