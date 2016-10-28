
<?php 

//var_dump($field_names_array);var_dump($snippets_array);
//var_dump($record);

/*
	pass me:
	1. an array of snippets (just 2 to start)
	2. an array of field_names
	3. array containing the data e'g' $reports

		{{ $record[$name] }}
		<?php echo($snippets_array[2]);?>

		<?php echo($snippets_array[0]);?>
		{{ $record["$name"] }}
		<?php echo($snippets_array[1]);?>
		.$record['table_name']
*/
//var_dump($snippets_array);//var_dump($record);exit("partial_view exit 6");
//echo($passed_to_view_array);


?>
	@foreach ($field_names_array as $name)
		<?php echo($snippets_array[0].$record[$name].$snippets_array[1]);?>
	@endforeach
	
			
		
	
	



