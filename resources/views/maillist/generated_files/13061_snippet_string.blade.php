<tr>
<td style="text-align:left">
{{ Form::label("FirstName","FirstName") }}
</td>
<td style="text-align:left">
{{ Form::text('FirstName',$record['FirstName']) }}
</td>
</tr>
<tr>
<td style="text-align:left">
{{ Form::label("LastName","LastName") }}
</td>
<td style="text-align:left">
{{ Form::text('LastName',$record['LastName']) }}
</td>
</tr>
<tr>
<td style="text-align:left">
{{ Form::label("Email","Email") }}
</td>
<td style="text-align:left">
{{ Form::text('Email',$record['Email']) }}
</td>
</tr>
<tr>
<td style="text-align:left">
{{ Form::label("Flags","Flags") }}
</td>
<td style="text-align:left">
{{ Form::text('Flags',$record['Flags']) }}
</td>
</tr>
