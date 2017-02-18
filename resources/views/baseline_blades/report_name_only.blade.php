		

		<div id="div_inside_update_active_tasks_button_bar" style="width:$width">	
			<table id="table_inside_update_active_tasks" style="width:$width">
				<th></th>
				<tr>
				<td style="text-align:left">
					{{ Form::label('report_name','report_name') }}
				</td>
				<td style="text-align:left">
					{!! Form::text('report_name','',['class'=>'form-control']) !!}
					{!! Form::hidden('record_type','report_description') !!}
				</td>
				</tr>
			</table>
		</div>
