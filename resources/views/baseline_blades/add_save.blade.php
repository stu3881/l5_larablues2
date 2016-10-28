<tr>
<td style="text-align:left">
{{ Form::label('TaskName1','TaskName1') }}
</td>
<td style="text-align:left">
{{ Form::text('TaskName1','') }}
</td>
<tr>
<td style="text-align:left">
{{ Form::label('shift_id','shift_id') }}
</td>
<td style='text-align:right'>
{{ Form::select('shift_id',array('0'=>'First shift','1'=>'Second shift','2'=>'Third shift','3'=>'Saturday setup')) }}
</td>
<tr>
<td style="text-align:left">
{{ Form::label('active_for_current_show','active_for_current_show') }}
</td>
<td style='text-align:right'>
{{ Form::select('active_for_current_show',array('1'=>'active','0'=>'inactive')) }}
</td>
