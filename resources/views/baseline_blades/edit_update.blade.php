<tr>
<td style="text-align:left">
{{ Form::label('active_for_current_show','active_for_current_show') }}
</td>
<td style='width:30px'>
{{ Form::select('active_for_current_show',array('1'=>'active','0'=>'inactive')) }}
<tr>
<td style="text-align:left">
{{ Form::label('TaskName1','TaskName1') }}
</td>
<td style="text-align:left">
{{ Form::text('TaskName1',  $record['TaskName1']) }}
</td>
