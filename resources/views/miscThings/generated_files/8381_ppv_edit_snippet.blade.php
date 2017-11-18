<tr>
<td style='text-align:left'>
{{ Form::select('field_name_array[]', $first_lookup_array,$field_name_array[0]) }}
</td>
<td style="text-align:left">
{{ Form::select('r_o_array[]', $second_lookup_array,$r_o_array[0]) }}
</td>
<td style="text-align:left">
{{ Form::text('value_array[]', $value_array[0]) }}
</td>
</tr>
