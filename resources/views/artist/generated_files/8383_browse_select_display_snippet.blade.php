
<td class='text_align_left select_pink' >
{{ Form::label('', $record['report_name']) }}
</td>

<td class='text_align_left select_pink' >
{{ Form::label('', $record['id']) }}
</td>

<td class='text_align_left select_pink' >
{{ Form::textarea('business_rules_field_name_array', $record['business_rules_field_name_array']) }}
</td>

<td class='text_align_left select_pink' >
{{ Form::textarea('query_field_name_array', $record['query_field_name_array']) }}
</td>
