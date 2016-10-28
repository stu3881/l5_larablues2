<tr>
<td style="text-align:left">
{{ Form::label("v_index","v_index") }}
</td>
<td style="text-align:left">
{{ Form::text('v_index',$record['v_index']) }}
</td>
<tr>
<td style="text-align:left">
{{ Form::label("v_member","v_member") }}
</td>
<td style="text-align:left">
{{ Form::text('v_member',$record['v_member']) }}
</td>
<tr>
<td style="text-align:left">
{{ Form::label("v_name","v_name") }}
</td>
<td style="text-align:left">
{{ Form::text('v_name',$record['v_name']) }}
</td>
<tr>
<td style="text-align:left">
{{ Form::label("v_notes","v_notes") }}
</td>
<td style='text-align:left'>
{{ Form::select('v_notes',$lookups['v_notes'] , $record['v_notes']) }}
</td>
