<tr>
<td style="text-align:left">
{{ Form::label("email","email") }}
</td>
<td style="text-align:left">
{{ Form::text('email',$data_array_name['email']) }}
</td>
</tr>
<tr>
<td style="text-align:left">
{{ Form::label("v_assign","v_assign") }}
</td>
<td style="text-align:left">
{{ Form::text('v_assign',$data_array_name['v_assign']) }}
</td>
</tr>
<tr>
<td style="text-align:left">
{{ Form::label("v_flag","v_flag") }}
</td>
<td style="text-align:left">
{{ Form::text('v_flag',$data_array_name['v_flag']) }}
</td>
</tr>
<tr>
<td style="text-align:left">
{{ Form::label("v_member","v_member") }}
</td>
<td style="text-align:left">
{{ Form::text('v_member',$data_array_name['v_member']) }}
</td>
</tr>
<tr>
<td style="text-align:left">
{{ Form::label("v_name","v_name") }}
</td>
<td style="text-align:left">
{{ Form::text('v_name',$data_array_name['v_name']) }}
</td>
</tr>
<tr>
<td style="text-align:left">
{{ Form::label("v_notes","v_notes") }}
</td>
<td style='text-align:left'>
{{ Form::select('v_notes',$lookups['v_notes'] , $data_array_name['v_notes']) }}
</td>
</tr>
<tr>
<td style="text-align:left">
{{ Form::label("v_phone","v_phone") }}
</td>
<td style="text-align:left">
{{ Form::text('v_phone',$data_array_name['v_phone']) }}
</td>
</tr>
