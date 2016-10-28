
<?php 

//var_dump($record);
echo($laravel_snippets_array);

//exit("partial_view exit 25"); 
?>

				$j = count($laravel_snippets_array) / 3;
				@for ($i=0; $i<count($laravel_snippets_array); $j++){		
					echo($laravel_snippets_array[$i]);
					{{ $laravel_snippets_array[$i+1] }}
					echo($laravel_snippets_array[$i+2]);
				@endfor
