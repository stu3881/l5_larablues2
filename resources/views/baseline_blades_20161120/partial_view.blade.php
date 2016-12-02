
<?php 

//var_dump($field_names_array);var_dump($snippets_array);
//var_dump($record);
/*
	2016-11-15 
	if the snippets array contains "<td>"  and "</td>"
	this displays all of them horizontally

	if the snippets array contains "<tr><td>"  and "</td></tr>"
	this displays all of them vertically
*/
/*
	pass me:
	1. an array of snippets (just 2 to start)
	2. an array of field_names
	3. array containing the data e'g' $record

		{{ $record[$name] }}
		<?php echo($snippets_array[2]);?>

		<?php echo($snippets_array[0]);?>
		{{ $record["$name"] }}
		<?php echo($snippets_array[1]);?>
		.$record['table_name']
*/
var_dump($snippets_array);//var_dump($record);exit("partial_view exit 6");
//echo($passed_to_view_array);


?>
	@foreach ($field_names_array as $name)
		<?php echo($snippets_array[0].$record[$name].$snippets_array[1]);?>
	@endforeach
	
			
		
	
	



