<tr>
<td style="text-align:left">
{{ Form::select('join_type[]',$working_arrays['maintain_query_joins']['lookups']['join_type'],$working_arrays['maintain_query_joins']['field_name_array'][0]) }}
</td>
<td style="text-align:left">
{{ Form::select('joinee_table_names[]',$working_arrays['maintain_query_joins']['lookups']['joinee_table_names'],$working_arrays['maintain_query_joins']['field_name_array'][0]) }}
</td>
<td style="text-align:left">
{{ Form::select('joinor_field_name[]',$working_arrays['maintain_query_joins']['lookups']['joinor_field_name'],$working_arrays['maintain_query_joins']['field_name_array'][0]) }}
</td>
<td style="text-align:left">
{{ Form::select('r_o[]',$working_arrays['maintain_query_joins']['lookups']['r_o'],$working_arrays['maintain_query_joins']['field_name_array'][0]) }}
</td>
<td style="text-align:left">
{{ Form::select('joinee_field_name[]',$working_arrays['maintain_query_joins']['lookups']['joinee_field_name'],$working_arrays['maintain_query_joins']['field_name_array'][0]) }}
</td>
</tr>

<tr><td>
{{Form::select('name', array('key' => 'value','pussy' => 'twat'), 'key', array('class' => 'name'))}}</td></tr>