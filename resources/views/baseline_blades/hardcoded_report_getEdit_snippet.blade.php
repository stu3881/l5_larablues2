<tr>
<td style="text-align:left">
{{ Form::label('repert_name','report_name') }}
</td>
<td style="text-align:left">
{{-- Form::text('report_name',  $record[0]['report_name']) --}}
{{ Form::text('report_name',  $record[0]->report_name) }}
		{{ Form::hidden('what_we_are_doing'						,'updating_report_name') }}
		{{ Form::hidden('edit4_option'							,'field_list_select') }}	
		{{ Form::hidden('report_key'							, Input::get('report_key')) }}

</td>
</tr>
