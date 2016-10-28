<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use Storage;
use Illuminate\Support\Facades\Schema; 

use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\View;
use App\Http\Requests;

use DB;

//use App\Http\Controllers\Schema;
//use Illuminate\Database\Schema;

class DEHBaseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */


	public function __construct() {
		/*
		$this->beforeFilter(function() {
			View::share('catnav', Category::all());
			}
		);
		*/
			$crlf = "\r\n";
	        $bypassed_field_name = "not_used";

	}

	/**
	 * Setup the layout used by the controller.
	 *
	 * @return void
	 */
	protected function setupLayout()
	{
		if ( ! is_null($this->layout))
		{
			$this->layout = View::make($this->layout);
		}
	}


	public function add_to_name_value_array_string($name,$value) {
		$string = "'".$name ."' => '". $value. "' , ";
		return $string;

	}
	
	public function advanced_query_getEdit_blade_gen_new($no_of_rows){
		// this generates the code to create a three column table 
		// the first two are pulldowns with a selected value
		// the last one is a single field
		// ***	
		// IT'S ALL JUST STRINGS!
		// ***
		// This is what your input view will look like the next time you load it

		$crlf = "\r\n";
		$strx = "";
		$j = -1;
		for ($i=0; $i<($no_of_rows-1); $i++){
			$j++;
			$strx .=
				"<tr>".$crlf; // start a new row
			$strx .= // first field is always field_name lookup
				"<td style='text-align:left'>".$crlf.
				//"{{ Form::select('field_name_array[]', $"."first_lookup_array_name,$"."field_name_array[".$j."]) }}".$crlf.
				"{{ Form::select('field_name_array[]', $"."first_lookup_array,$"."field_name_array[".$j."]) }}".$crlf.
				//"{{ Form::select('field_name_array[]', ".$lookups['field_name'].",".$field_name_array[$j].") }}".$crlf.
				"</td>".$crlf;
			$strx .= // second field is always relational operator
					"<td style=\"text-align:left\">".$crlf.
					"{{ Form::select('r_o_array[]', $"."second_lookup_array,$"."r_o_array[".$j."]) }}".$crlf.
					"</td>".$crlf;
			$strx .= // third field is always user supplied value there ain't no lookup
				"<td style=\"text-align:left\">".$crlf.
				"{{ Form::text('value_array[]', $"."value_array[".$j."]) }}".$crlf.
				"</td>".$crlf;
			$strx .=
			"</tr>".$crlf;  // end the row
		}  // end for
		return $strx;		
	}

	
	public function advanced_query_getEdit_blade_gen(
		$no_of_extra_rows,
		$key_field_value,
		$report_snippets_array,
		$lookups,
		$two_mbr_names_for_lookups,
		$field_name_array,
		$r_o_array,
		$value_array)
		{
		//echo '<br>advanced_query_getEdit_blade_gen';
		//print_r($report_snippets_array);
		//var_dump($field_name_array);
		//var_dump($lookups['field_name']);
		$lookups['field_name'] = array_combine($lookups['field_name'], $lookups['field_name']);
		
		//var_dump($lookups['field_name']);$this->debug_exit(__FILE__,__LINE__,1);

		//var_dump($r_o_array);
		//echo (count($r_o_array)."<br>");
		//echo (count($field_name_array)."<br>");
		//exit("exit 45");
		$no_of_rows = count($r_o_array);
		$crlf = "\r\n";
		$strx = "";
		$j = -1;
		for ($i=0; $i<($no_of_rows-1); $i++){
			$j++;
			$strx .=
				"<tr>".$crlf; // start a new row
			$strx .= // first field is always field_name lookup
				"<td style='text-align:left'>".$crlf.
				//"{{ Form::select('field_name_array[]', $"."first_lookup_array_name,$"."field_name_array[".$j."]) }}".$crlf.
				"{{ Form::select('field_name_array[]', $"."first_lookup_array,$"."field_name_array[".$j."]) }}".$crlf.
				//"{{ Form::select('field_name_array[]', ".$lookups['field_name'].",".$field_name_array[$j].") }}".$crlf.
				"</td>".$crlf;
			$strx .= // second field is always relational operator
					"<td style=\"text-align:left\">".$crlf.
					"{{ Form::select('r_o_array[]', $"."second_lookup_array,$"."r_o_array[".$j."]) }}".$crlf.
					"</td>".$crlf;
			$strx .= // third field is always user supplied value there ain't no lookup
				"<td style=\"text-align:left\">".$crlf.
				"{{ Form::text('value_array[]', $"."value_array[".$j."]) }}".$crlf.
				"</td>".$crlf;
			$strx .=
			"</tr>".$crlf;  // end the row
		}  // end for
		return $strx;		
	}


	public function business_rules_getEdit_blade_gen($no_of_whens)
	{
		//$lookups['field_name'] = json_decode($lookups['field_name']);
		//$lookups['business_rules'] = json_decode($lookups['business_rules']);
		//echo '<br>business_rules_getEdit_blade_gen<br>';var_dump($lookups);exit("exit 91");
		//$lookups['field_name'] = array_combine($lookups['field_name'], $lookups['field_name']);
		
		$crlf = "\r\n";
		$strx = "";
		$j = -1;
		for ($i=0; $i<($no_of_whens); $i++){
			$j++;
			$strx .=
			"<tr>".$crlf; // start a new row
			$strx .= // first field is always field_name lookup
			"<td style='text-align:left'>".$crlf.
			//"{{ Form::select('field_name_array[]', $"."first_lookup_array_name,$"."field_name_array[".$j."]) }}".$crlf.
			"{{ Form::select('field_name_array[]', $"."first_lookup_array,$"."field_name_array[".$j."],array('type' => 'numeric')) }}".$crlf.
			"</td>".$crlf;
			$strx .= // second field is always relational operator
			"<td style=\"text-align:left\">".$crlf.
			"{{ Form::select('r_o_array[]', $"."second_lookup_array,$"."r_o_array[".$j."],array('type' => 'numeric')) }}".$crlf.
			"</td>".$crlf;
			$strx .= // third field is always user supplied value there ain't no lookup
			"<td style=\"text-align:left\">".$crlf.
			"{{ Form::text('value_array[]', $"."value_array[".$j."]) }}".$crlf.
			"</td>".$crlf;
			$strx .=
			"</tr>".$crlf;  // end the row
		}  // end for
		return $strx;
	}

	public function advanced_query_ppv_execute($two_mbr_names_for_lookups,$lookups,$first_lookup_array,$second_lookup_array,$value_array) {
// *******
// this guy does a lot
// *****
	//var_dump($first_lookup_array);var_dump($second_lookup_array);var_dump($value_array);
	//echo("advanced_query_ppv_execute");var_dump($lookups);$this->debug_exit(__FILE__,__LINE__,1);

	$query = DB::connection($this->db_snippet_connection)->table($this->snippet_table);

	$first_lookup_array = array_combine($first_lookup_array,$first_lookup_array);
	//echo('<br><br>$lookups[$two_mbr_names_for_lookups[1]');print_r($lookups[$two_mbr_names_for_lookups[1]]);
	//$r_o_array 				= Input::get('r_o_array');
	$array 						= array(); 
	//echo("133 lookups array: <br>");print_r($first_lookup_array);print_r($x);print_r($lookups['field_name']);
	//exit("<br> exit 133");
	$save_value = "";
	$j = -1;		
	foreach ($first_lookup_array as $index=>$value) {
		$j++;
		//echo('<br>135<br>');
		//print_r($lookups[$two_mbr_names_for_lookups[0]]);
		//echo('<br>$first_lookup_array<br>');print_r($first_lookup_array);
		//echo('<br>$lookups[$two_mbr_names_for_lookups[0]<br>');print_r($lookups[$two_mbr_names_for_lookups]);
		//echo("133 lookups array: <br>");print_r($lookups['field_name']);
		//exit("exit264");
		if ($value <> $this->bypassed_field_name){
			//$a = $lookups[$two_mbr_names_for_lookups[0]][$first_lookup_array[$index]];
			//$r_o = $lookups[$two_mbr_names_for_lookups[1]][$second_lookup_array[$j]];
			$r_o = $second_lookup_array[$j];
			$v = $value_array[$j];
			//echo('*r_o*');print_r($r_o);//exit("exit264");
			//echo('*v*');print_r($v);exit("exit264");
			switch ($r_o) {
			case "=":
			case "<>":
			case ">":
			case "<":
			case "<=":
			case ">=":
				//$query .= " ->where('".$value ."', '". 
				//$second_lookup_array[$r_o_array[$index]]." ', '". $value_array[$index]."') ";
				echo ' ->where( '.$value.' '.$r_o.' '.$v;//exit (' exit 155');
				//$query_string .= '->where('.$value.','.$r_o.','.$v.')';
				$query->where($value,$r_o,$v);
				break;
		
			case "whereBetween":
				break;
			} // end switch
		
			switch ($r_o) {
				case "orderBy":
					$aord = "ASC";
					$query->orderBy($value);
					echo(' orderBy('.$value.','.$aord.')');//exit("xit226");
					break;
				case "orderByDesc":
					$aord = "DESC";
					$query->orderBy($value,$aord);
					echo(' orderBy('.$value.','.$aord.')');//exit("xit226");
					break;
				case "distinct":
					
					$query->distinct($value);
					echo("->distinct($value) ");//exit("xit226");
					break;
				case "xgetArray":
					switch (Input::get('coming_from')) {
						case "advanced_query":
							//exit("xit205");
							$query->get();
							break;
						default:
							$query->get();
						break;
					}
				case "join":
					//DB::table('name')->join('table', 'name.id', '=', 'table.id')
					//->select('name.id', 'table.email');
				case "whereBetween":
					break;
			} // end switch
		} // end of not = "not_used"
		
	}  // end foreach

	//echo("query string= ".$query_string);exit(' 211');	
	return $query->get();
	//return  (array) $query;
	}	

	public function advanced_query_ppv_get_data	($report_key) {
		echo $report_key;
		$report_snippets =
		$this->get_snippet_by_key_field(
		$this->snippet_table,
		$this->snippet_table_key_field_name,
		$report_key
		);
		//var_dump($report_snippets);exit("156");
		echo("advanced_query_ppv_get_data");var_dump($this->node_name);$this->debug_exit(__FILE__,__LINE__,1);

		if (!$report_snippets){
			exit ("bad calll in change advanced_query_ppv_get_data	");
		}
		else{
			$returned_list = $this->advanced_query_ppv_execute(
				'two_mbr_names_for_lookups',
				'lookups',
				json_decode($report_snippets->query_field_name_array,1),
				json_decode($report_snippets->query_r_o_array,1),
				json_decode($report_snippets->query_value_array,1)
				);
			$array = array();
			//var_dump($returned_list);exit("169");
					
			foreach ($returned_list as $list){
				$array[] = $list->model_table;
			}
		}
		return $array;
	}	
	
	
public function simple_query_ppv_build(
	
	$field_name_array,
	$ro_array,
	$value_array) {
	// *******
	// this guy does a lot
	// *****
	//var_dump($field_name_array);var_dump($ro_array);var_dump($value_array);
	//echo("<br>simple_query_ppv_build ".$this->db_data_connection."*".$this->db_snippet_connection."*");		$this->debug_exit(__FILE__,__LINE__,0);
	// start to build query string

	$query = DB::connection($this->db_data_connection)->table($this->model_table);
	$save_value = "";
	$j = -1;		
	foreach ($field_name_array as $index=>$value) {
		$j++;
		if ($value <> $this->bypassed_field_name){
			$r_o = $ro_array[$j];
			$v = $value_array[$j];
			//echo('*r_o*');print_r($r_o);//exit("exit264");
			//echo('*v*');print_r($v);exit("exit264");
			switch ($r_o) {
			case "=":
			case "<>":
			case ">":
			case "<":
			case "<=":
			case ">=":
				$v = $this->convert_dollar_this_string($v);
				$crlf = "\r\n";
				$query->where($value,$r_o,$v);
				break;
		
			case "whereBetween":
				break;
			} // end switch
		
			switch ($r_o) {
				case "orderBy":
					$aord = "ASC";
					$query->orderBy($value);
					echo(' orderBy('.$value.','.$aord.')');//exit("xit226");
					break;
				case "orderByDesc":
					$aord = "DESC";
					$query->orderBy($value,$aord);
					echo(' orderBy('.$value.','.$aord.')');//exit("xit226");
					break;
				case "distinct":
					//echo($value);$this->debug_exit(__FILE__,__LINE__,1);
					
					$query->distinct($value);
					
					break;
				case "xgetArray":
					switch (Input::get('coming_from')) {
						case "advanced_query":
							//exit("xit205");
							$query->get();
							break;
						default:
							$query->get();
						break;
					}
				case "join":
					//DB::table('name')->join('table', 'name.id', '=', 'table.id')
					//->select('name.id', 'table.email');
				case "whereBetween":
					break;
			} // end switch
		} // end of not = "not_used"
		
	}  // end foreach
	$query->get();
	return $query;
	var_dump($query);$this->debug_exit(__FILE__,__LINE__,1);
	}
	
	public function business_rules_ppv_build_them($business_rules_relational_operators,$field_name_array,$r_o_array,$value_array){
		//var_dump($business_rules_relational_operators);
		///var_dump($field_name_array);var_dump($r_o_array);var_dump($value_array);$this->debug_exit(__FILE__,__LINE__,0);
		//csrf_token();
		//echo(" business_rules_ppv_build_them ");
		//echo('$field_name_array<br>');print_r($field_name_array);exit("exit 220");
		//asort($field_name_array);
		$update_array = array();
		$save_value = "";
		$j = -1;
		foreach ($field_name_array as $index=>$field_name) {
			$j++;
			if ($field_name <> $this->bypassed_field_name) { // skip not_used
				// this builds an array of field names and business_rules 
				//$update_array[$field_name] = $relational_operator.$value_array[$index];
				if (!array_key_exists($field_name,$update_array)) {
					// the first time a field name appears. (it can repeat)
					$separator = "";
					$update_array[$field_name] = "";	
					//var_dump($field_name_array);var_dump($r_o_array);var_dump($value_array);$this->debug_exit(__FILE__,__LINE__,0);

				}
				//var_dump($field_name_array);var_dump($r_o_array);var_dump($value_array);
				//echo($r_o_array[$index]);$this->debug_exit(__FILE__,__LINE__,0);

				$v =  $value_array[$index];
				switch ($r_o_array[$index]) {
					case "date_format:YYYY-MM-DD":
						$var = "date_format:".$v;
						break;
					case "email":
						$var = "email".$v;
						break;
					case "after:YYYY-MM-DD":
						$var = "after:".$v;
						break;
					case "in:foo,bar,...":
						$var = "in:".$v;
						break;
					case "min:value":
						$var = "min:".$v;
						break;
					case "max:value":
						$var = "max:".$v;
						break;
					default:
						$var = $r_o_array[$index].$v;
						break;
				} // end switch
				$update_array[$field_name] .= $separator.$var;
				$separator = "|";
			} // end of 'IS used'
		}  // end foreach
		foreach ($update_array as $name=>$value) {
			// the whole thing has to be surrounded with quotes
			//$update_array[$name] = $value."'";
		}
		//var_dump($update_array);$this->debug_exit(__FILE__,__LINE__,1);
		return $update_array;
	}
	
	
	
	public function filter_nulls($which_array_name,$no_of_blank_entries,$array){
	
		//echo 'filter_nulls'.$no_of_blank_entries;exit("exit 72");
		//echo"<br>arrays <br>";print_r($field_name_array);exit('exit 100');
		//$a1 = array_values($two_mbr_names_for_lookups['first_array']);
		//echo"<br>array <br>";print_r($array);exit('eexit 167');
		$j = -1;
		$no_of_whens = count($array);
		$how_many = $no_of_blank_entries;
		$k = $no_of_blank_entries + count($array);
		for ($i=0; $i<($k); $i++){
			$j++;
			switch ($which_array_name) {
			case "field_name_array":
				if (!isset($array[$j])){
					//$array[$j] = $lookups[$two_mbr_names_for_lookups['first_lookup_array_name']][$this->snippet_table_key_field_name];
					$array = array_fill($j, $how_many, 0);
				}	
				break;
			case "r_o_array":
				if (!isset($array[$j])){
					$array = array_fill($j, $how_many, 0);
				}	
				break;
			case "value_array":
				if (!isset($array[$j])){
					$array = array_fill($j, $how_many, "a");
									}	
				break;
			} // end switch
		}  // end foreach		
		//echo"<br>arrays <br>";print_r($array);exit('exit bc191');
		return $array;
	}
	
	public function advanced_query_getEdit_snippet_gen($model,$field_name_array) {
	//echo 'advanced_query_getEdit_snippet_gen';print_r($field_name_array);exit("exit 303");
		// ****
		// cloned from modifiable but different
		$crlf = "\r\n";
		$strx = "";
		$j = -1;
		$stry = "xxx";
		for ($i=0; $i<($no_of_whens-1); $i++){
			echo $i."i<br>";
			foreach ($query_field_name_array as $name=>$value){
				$j++;
			echo $name."name<br>";
				$strx .=
				"<tr>".$crlf;

				// first one is field names
				$strx .=
					"<td style='text-align:left'>".$crlf.
					"{{ Form::select('" .$name. "',". $column_names_array[$name].",  $name) }}".$crlf.
					"</td>".$crlf;
				}
			"</tr>".$crlf;
		} // end for i to $no_of_whens
		echo $strx."*";
		return $strx;
	}

	
	
	
	public function build_name_value_array_from_query($query_response,$key_name,$value_name) {
		//echo 'build_name_value_array_from_query';//exit("exit 99");
		$array1 = array();
		foreach ($query_response as $misc){
			$array1[$misc->$key_name] = $misc->$value_name;
		}

		return $array1;
	}

	public function build_name_value_array_string_from_query($query_response,$key_name,$value_name) {
		//echo 'build_name_value_array_string_from_query';//exit("exit 99");
		$array_str = "array(";
		foreach ($query_response as $misc){
			$array_str .= "'". $misc->$key_name ."'=>'". $misc->$value_name."',";
		}
		$array_str = substr($array_str,0,-1);
		$array_str .= ")";
		//echo 'build_name_value_array_string_from_query';print_r($array_str);//exit("exit 31");
		return $array_str;
	}

	public function browse_select_blade_gen($model,$field_name_array,$version) {
		//echo '<br>browse_select_blade_gen<br><br>';$this->debug_exit(__FILE__,__LINE__,10);

		$crlf = "\r\n";
		switch ($version)	{

			case "version1":
				$stry = "$"."record['";
				$strx = "";
				foreach($field_name_array as $index=>$field_name) {
					$strx .= $crlf;
					$strz = $stry . $field_name."']";
					$strx .= "<td class='text_align_left select_pink' >".$crlf.
							"{{ Form::label('', ". $strz. ") }}".$crlf.
							"</td>".$crlf;
				}
				return $strx;
			case "version2":
				//echo("browse_select_blade_gen");$this->debug_exit(__FILE__,__LINE__,1);
				$stry = "$"."record['";
				$strx = "";
				foreach($field_name_array as $index=>$field_name) {
					$strx .= $crlf;
					$strz = $stry . $field_name."']";
					$strx .= "<td class='text_align_left select_pink' >".$crlf.
							"{{ ".$strz. " }}".$crlf.
							"</td>".$crlf;
				}
			
				return $strx;
				break;
			case "version3":
				$array_name_string = "$"."record[\'";
				$array = array();
				$prefix_str = "<td class=\'text_align_left select_pink\' >".$crlf;
				$suffix_str = $crlf . "</td>" . $crlf;
				foreach($field_name_array as $index=>$field_name) {
					$data_str 	= $array_name_string . $field_name . "\']";
					$array[] = $prefix_str;
					//$array[] = $data_str;
					$array[] = $suffix_str;
				}
			case "version4":
				$array_name_string = "$"."record['";
				$array = array();
				$prefix_str = "<td class='text_align_left select_pink' >";
				$suffix_str = "</td>" ;
				//foreach($field_name_array as $index=>$field_name) {
				//	$data_str 	= $array_name_string . $field_name . "']";
					$array[] = $prefix_str;
				//	$array[] = $data_str;
					//$array[] = "xxx";
					$array[] = $suffix_str;
				//}
				//echo("browse_select_blade_gen");var_dump($array);$this->debug_exit(__FILE__,__LINE__,1);
				return $array;
				break;
			}
	}
	

	
	public function build_column_names_array_indexed($tbl_name) {
		//echo ('build_column_names_array'.$tbl_name);exit("exit 99");
		// this might be only for a conversion

		$column_names_array = array();
		$columns = (array) Schema::getColumnListing($tbl_name);
		sort($columns);
		//var_dump($column_names_array);$this->debug_exit(__FILE__,__LINE__,1);
		return $columns;
	}
	
	
	public function build_column_names_array($tbl_name) {
		//echo ('build_column_names_array'.$tbl_name);exit("exit 99");
		$column_names_array = array();
		$columns = Schema::getColumnListing($tbl_name);
		sort($columns);
		$columns = array_combine($columns, $columns);
		return $columns;

	}


	public function build_column_names_array1($tbl_name,$ppv_array_names,$what_we_are_doing) {
		//echo ('build_column_names_array'.$tbl_name);exit("exit 99");
		$column_names_array = array();
		$columns = Schema::getColumnListing($tbl_name);
		sort($columns);
		echo("column_names->");$this->debug_exit(__FILE__,__LINE__,0);var_dump($columns);
		$columns = array_combine($columns, $columns);
		echo("column_names->");$this->debug_exit(__FILE__,__LINE__,0);
		var_dump($columns);var_dump($ppv_array_names);echo($what_we_are_doing);
		if (array_key_exists($what_we_are_doing,$ppv_array_names)) {
			if (!array_key_exists("not_used",$columns)) {
				//array_unshift($columns, "not_used", "not_used");
				$columns = array_merge(array("not_used"=>"not_used"),  $columns);
			}
		}
		return $columns;

	}

	
	public function browse_select_blade_files_gen($report_key) {
		//echo ('<br>browse_select_blade_files_gen<br><br>'.$report_key);$this->debug_exit(__FILE__,__LINE__,10);

		$fnam = $this->view_files_prefix."/".$this->generated_files_folder."/".$report_key.'_browse_select_field_names_row.blade.php';
		File::put($fnam, $this->browse_select_field_names_row_gen($this->model,$_REQUEST["to"]));
		
		$fnam = $this->view_files_prefix."/".$this->generated_files_folder."/".$report_key.'_browse_select_display_snippet.blade.php';
		//print_r($_REQUEST["to"]);exit('exit258');
		File::put($fnam,$this->browse_select_blade_gen($this->model,$_REQUEST["to"],'version1'));
	}
		
	public function browse_select_load_lookup_arrays() {
		//echo 'browse_select_load_lookup_arrays';print_r($_REQUEST);print_r($nv_array);exit("exit 172");
		$nv_array = array(); 
		foreach ($_REQUEST['to'] as $value){
			$nv_array [$value] = $value;
		}
		$array = array();
		//$array ['browse_select_display_snippet'] 			= $this->browse_select_display_snippet_gen($this->model,$_REQUEST["to"]);
		$array ['browse_select_display_snippet'] 			= "";
		$array ['browse_select_array'] 						= json_encode($nv_array);
		$array ['merge_browse_select_and_modify_arrays']	= json_encode(array_merge ((array) $_REQUEST["to"],$this->generated_snippets_array['modifiable_fields_array']));
		$array ['lookup_name_value_array_gen_by_table'] 	= json_encode($this->lookup_name_value_array_gen_by_table($this->model_table));
		//print_r($array);exit("exit 184");
		$this->generated_snippets_array_update($key_field_name,$key_value,$array);
		return;
	}
	
	public function browse_select_snippets_gen_by_report($key_field_name,$key_value) {
		//echo 'browse_select_snippets_gen_by_report';print_r($_REQUEST);exit("exit 172");
		$nv_array = array(); 
		foreach ($_REQUEST['to'] as $value){
			$nv_array [$value] = $value;
		}
		$array = array();
		//$array ['browse_select_display_snippet'] 				= $this->browse_select_display_snippet_gen($this->model,$_REQUEST["to"]);
		$array ['browse_select_display_snippet'] 			= "";
		$array ['browse_select_array'] 									= json_encode($nv_array);
		$array ['merge_browse_select_and_modify_arrays']= json_encode(array_merge ((array) $_REQUEST["to"],$this->generated_snippets_array['modifiable_fields_array']));
		$array ['lookup_name_value_array_gen_by_table'] = json_encode($this->lookup_name_value_array_gen_by_table($this->model_table));
		//print_r($array);exit("exit 184");
		$this->generated_snippets_array_update($key_field_name,$key_value,$array);
		return;
	}
	public function add_delete_add_file_as_string($file_name,$file_as_string) {
		//echo($file_name." add_delete_add_file_as_string ");$this->debug_exit(__FILE__,__LINE__,0);
		if (is_file($file_name)){
			unlink($file_name); // delete it
		}
		$handle = fopen($file_name, "w");
		fwrite($handle, $file_as_string);
	}
	
	
	public function diff_arrays($lookups,$field_name_array) {
		$new_name_array = array();
		foreach ($field_name_array as $name=>$value){
			if (array_key_exists($name,$lookups)) {
				$new_name_array[$name] = "new_" . $name;
				//echo ("<BR>"."match ".$name);				
			}
		}
		//print_r($new_name_array);//exit("exit 513");
		return $new_name_array;
	}
	

	public function generate_by_list_name($field_name_list_array,$table_name) {
		//echo ('generate_by_list_name ');var_dump($field_name_list_array);var_dump(Input::all());
		//$this->debug_exit(__FILE__,__LINE__,10);
		// *****
		// these lists are for specific purposes so specific tasks have to be performed
		// i.e a modified field might need to have pulldowns generated whereas
		// a browse would be more straight forward
		// *****''
		$crlf = "\r\n";
		$what_we_are_doing = Input::get('what_we_are_doing');
		//echo '<br>modifiable_fields_blade_files_gen '.$what_we_are_doing.' ';$this->debug_exit(__FILE__,__LINE__,10);
		switch ($what_we_are_doing) {
			case "modifiable_fields_array":
			case "maintain_modifiable_fields":
				//echo '<br>modifiaInput::get('report_key')ble_fields_blade_files_gen '.$what_we_are_doing.' ';$this->debug_exit(__FILE__,__LINE__,10);
				// these next two are getting (copied first) moved to the edit to insure we have latest generate_by_list_name
				$this->lookup_name_value_snippets_gen($table_name);				//$this->debug_exit(__FILE__,__LINE__,0);
				$this->modifiable_fields_snippets_gen($this->snippet_table_key_field_name,Input::get('report_key'));
				$this->modifiable_fields_blade_files_gen(Input::get('report_key'));

				return View::make($this->model_table.'.index')
				->with('generated_snippets_array',$this->generated_snippets_array);
				break;
			case "browse_select_array":
			case "maintain_browse_fields":
				//echo '<br>modifiable_fields_blade_files_gen<br><br>';var_dump(Input::all());$this->debug_exit(__FILE__,__LINE__,10);
				$this->browse_select_snippets_gen_by_report($this->snippet_table_key_field_name,Input::get('report_key'));
				//echo ('<br>modifiable_fields_blade_files_gen<br><br>'.Input::get('report_key'));$this->debug_exit(__FILE__,__LINE__,10);
				$this->browse_select_blade_files_gen(Input::get('report_key'));
				//echo '<br>modifiable_fields_blade_files_gen<br><br>';$this->debug_exit(__FILE__,__LINE__,10);
				return View::make($this->node_name.'.edit1')
				->with('generated_snippets_array',$this->generated_snippets_array);
				break;
			//case "ppv_define_query":
			case "ppv_define_business_rules":
			case "required_fields_array":
				//echo 'required_fields_array';print_r($field_name_list_array);exit("exit 316");
				$this->required_fields_snippets_gen_by_report($this->snippet_table_key_field_name,Input::get('report_key'));
				//$this->required_fields_blade_files_gen(Input::get('report_key'));
				return View::make($this->node_name.'.edit1')
				->with('generated_snippets_array',$this->generated_snippets_array);
				break;
		}	
		//$this->debug_exit(__FILE__,__LINE__,1);

		return View::make($this->node_name.'.edit2_default_browse')
		->with('message', 'no definition in generate_by_list_name silly!');
		
		
	}
	
	public function gen_lookup_name_value_array_data($table_name) {
		echo 'gen_lookup_name_value_array_data';$this->debug_exit(__FILE__,__LINE__,0);

		$fields_with_lookup = 
		DB::connection($this->db_snippet_connection)->table($this->snippet_table)
		->where('record_type',	'=','lookup_name_value_array_data')
		->where('table_name',		'=', $table_name)
		->get(array('field_name','lookup_name_value_array'));
		var_dump($fields_with_lookup);$this->debug_exit(__FILE__,__LINE__,10);

		foreach ($fields_with_lookup as $arrayx) {
			$array = array();
			$array1 = json_decode($arrayx->lookup_name_value_array,0);
			foreach ($array1 as $key=>$value) {
				//print_r($key);print_r($value);exit("exit 323");
				//$key = "'".$key."'";
				$key = strval($key);
				$array[$key] = $value;
			}
			
		}
		//$return_array[$arrayx->field_name] = $array;
		return $array;
	}
	
	
	public function gen_update_snippet($model,$field_name_array) {
		//echo 'gen_update_snippet';print_r($field_name_array);exit("exit 99");
		$crlf = "\r\n";
		//$crlf = "";
		$loop = "";
		foreach($field_name_array as $index=>$name) {
			if ($name == $this->snippet_table_key_field_name) {
				$id = Input::get($name);
			}
			else {
				$loop .= "$".$model ."->".$name. "= Input::get($name); ".$crlf;
			}
		}
		$strx = "";
		$strx .= "$".$model ." = new ". ucfirst($model) ."; ".$crlf;
		$strx .= $loop;
		$strx .= "$".$model ."->save();";
		$this->generated_snippets_update('modifiable_fields_putUpdate',$strx);
			// ******************
	}
	
	
	
	public function build_modifiable_find_save_array($model,$field_name_array) {
		//echo 'build_modifiable_find_save_array';print_r($field_name_array);exit("exit 113");
		$array1 = array();
		foreach($field_name_array as $index=>$name) {
			$array1[$name] = Input::get($name);
		}
		return $array1;
	}

	
	public function getEdit_snippet_gen() {
		//echo 'getEdit_snippet_gen';print_r($field_name_array);exit("exit 298");
		/*
		 it determines which fields have lookup based on the field_name occurring in a name_value_definition
		 and embeds all the lookup arrays * 
		*/
		$crlf = "\r\n";
		foreach ($field_name_array as $name0=>$value0) {
			$name_value_pair =
			DB::connection($this->db_snippet_connection)->table($this->snippet_table)
			->where('record_type','=','name_value_definition')
			->where('table_name','=',$this->model_table)
			->where('field_name','=',$name0)
			->get(array('name','value'));
			if ($name_value_pair){
				$array = array();
				foreach ($name_value_pair as $name=>$value) {
					$array[$name] = $value;
				}
				echo("<br>inner foreach array<br>".json_encode($array).$name."<br>");
				//print_r($array);
				//echo("<br>saving it all<br>");print_r($array);exit("exit 321");
				$query2 = DB::connection($this->db_snippet_connection)->table($this->snippet_table)
				->where('record_type','=','lookup_name_value_array_data')
				->where('table_name','=',$this->model_table)
				->where('field_name','=',$name0)
				->update(array('lookup_name_value_array_string'=>json_encode($array)));
				//print_r($array);echo("nope hhp<br>");//exit("exit 321");
			}
		}
		//return ;
		$record_table_name = $this->model_table;
		$lookups = $this->merge_lookups_into_single_array($record_table_name,$this->model_table);
		//echo ('<br>$lookups<br>');print_r($lookups);exit('exit 654');
		// $lookups is an array of field_names that have lookup help for this table
			
		return View::make($this->model_table.'.edit')
		//->with('record',(array) $response[0]);
		//->with('no_of_whens'						,$no_of_whens)
		->with('key_field_value'					,$key_field_value)
		->with('report_snippets_array'				,$report_snippets_array)
		->with('generated_files_folder'				,$this->generated_files_folder)
		->with('lookups'							,$lookups)
		->with('report_key'							,$report_snippets_array[$this->snippet_table_key_field_name])
		->with('field_name_array'					,$report_snippets_array['selected_business_rules_field_name_array'])
		->with('r_o_array'							,$report_snippets_array['business_rules'])
		->with('value_array'						,$report_snippets_array['selected_business_rules_value_array'])
		->with('two_mbr_names_for_lookups',$two_mbr_names_for_lookups)
		;
		
	}
	
	public function lookup_name_value_array_gen_by_table($table_name) {
		//echo 'lookup_name_value_array_gen_by_table<br>';//exit("exit 113");
		//print_r($array);exit("lookup_name_value_array_gen_by_table"."exit 669");
		/*
		 builds an array of field_names that have lookup help 
		*/
		$crlf = "\r\n";
		$return_array = array();
		$fields_with_lookup = DB::connection($this->db_snippet_connection)->table($this->snippet_table)
		->where('record_type',		'=','lookup_name_value_array_data')
		->where('table_name',		'=', $table_name)
		->get(array('field_name','lookup_name_value_array'));
		foreach ($fields_with_lookup as $arrayx) {
			//print_r($arrayx);exit("exit 323");
			//print_r($arrayx->field_name);exit("exit 549");
			$array = array();
			$array1 = json_decode($arrayx->lookup_name_value_array);
			//print_r($array1);//exit("exit 552");
			/*foreach ($array1 as $key=>$value) {
				print_r($key);print_r($value);exit("exit 554");
				//$key = "'".$key."'";
				$key = strval($key);
				$array[$key] = $value;
			}*/
			//print_r($key);print_r($value);exit("exit 559");
			$return_array[$arrayx->field_name] = $array;
		}
		//print_r($return_array);exit("exit 333");
		return $return_array;
	}
	
	
	public function initialize_empty_files($report_key) {
		//echo $this->view_files_prefix.':::initialize_empty_files';print_r($report_key);
		//exit("exit 436");
	
		$fnam = $this->view_files_prefix."/".$this->generated_files_folder."/".$report_key.'_advanced_getEdit_snippet.blade.php';
		File::put($fnam, "");
		//$this->debug_exit(__FILE__,__LINE__,0);

		$fnam = $this->view_files_prefix."/".$this->generated_files_folder."/".$report_key.'_modifiable_fields_getEdit_snippet.blade.php';
		File::put($fnam, "");
	
		$fnam = $this->view_files_prefix."/".$this->generated_files_folder."/".$report_key.'_modifiable_fields_putUpdate_snippet.blade.php';
		File::put($fnam, "");
	
		$fnam = $this->view_files_prefix."/".$this->generated_files_folder."/".$report_key.'_modifiable_add_save_snippet.blade.php';
		File::put($fnam, "");
	
		$fnam = $this->view_files_prefix."/".$this->generated_files_folder."/".$report_key.'_modifiable_add_save_add_snippet.blade.php';
		File::put($fnam, "");
	
		$fnam = $this->view_files_prefix."/".$this->generated_files_folder."/".$report_key.'_browse_select_field_names_row.blade.php';
		File::put($fnam, "");
	
		$fnam = $this->view_files_prefix."/".$this->generated_files_folder."/".$report_key.'_browse_select_display_snippet.blade.php';
		//print_r($_REQUEST["to"]);exit('exit258');
		File::put($fnam,"");
	
		return ;
	
	}
	
		
	public function insure_node_name_directory($node_name,$view_files_prefix){		
		//echo 'insure_node_name_directory'.'*'.$node_name.'*'.$view_files_prefix.'*';//exit("exit 436");
		$dir = $view_files_prefix."/".$node_name;
		//echo "<BR>".$dir;
		//exit("exit 436");
		//$dir = "/var/www/htdocs/larablues/app/views/";
		//echo "<BR>".$dir;exit("exit 436");
		// Open a known directory, and proceed to read its contents
		if (is_dir($dir)) { 
			//echo "<BR><BR>*".$dir . ' it is a directory';exit("758".'insure_node_name_directory');	
		}
		else {
			echo 'creating directory: '.$dir;
			mkdir($dir,0776);
			//exit("758".'insure_node_name_directory');
		}
		//exit("758".insure_node_name_directory);		
		return ;
	}
	
	public function merge_lookups_into_single_array($record_table_name,$table_name) {
		//echo 'merge_lookups_into_single_array'.$table_name;exit("exit 113");
		// every field in a table for which there is lookup help stores the data in a lookup_name_value_array_data record_type
		
		$crlf = "\r\n";
		$fields_with_lookup = DB::connection($this->db_snippet_connection)->table($this->snippet_table)
		->where('table_name','=',$table_name)
		->where('record_type','=','lookup_name_value_array_data')
		->get(array('field_name','lookup_name_value_array','lookup_name_value_array_indexed'));
		$array = array();
		//var_dump($fields_with_lookup);$this->debug_exit(__FILE__,__LINE__,0);
		foreach ($fields_with_lookup as $fields_with_lookup) {
			switch ($fields_with_lookup->field_name) {
				case "field_name":
					//$array[$fields_with_lookup->field_name] = json_decode($fields_with_lookup->lookup_name_value_array_indexed,true);
					$array[$fields_with_lookup->field_name] = json_decode($fields_with_lookup->lookup_name_value_array,true);
					break;
				default:
					$array[$fields_with_lookup->field_name] = json_decode($fields_with_lookup->lookup_name_value_array,true);
					break;
			}	
	
			if ($record_table_name <> $table_name){
				$fields_with_lookupx = DB::connection($this->db_snippet_connection)->table($this->snippet_table)
				->where('table_name','=',$record_table_name)
				->where('field_name','=','field_name')
				->where('record_type','=','lookup_name_value_array_data')
				->get(array('field_name','lookup_name_value_array','lookup_name_value_array_indexed'));
				//print_r($fields_with_lookupx[0]->lookup_name_value_array);exit('772');
				if ($fields_with_lookupx){
					$array['field_name'] = json_decode($fields_with_lookupx[0]->lookup_name_value_array,true);
				}
			}	
		} // end for
		//print_r($array);exit('772');
		return $array;
	}
	

	
	public function merge_lookups_ppv_into_single_array($two_mbr_names_for_lookups,$table_name) {
		//echo 'merge_lookups_ppv_into_single_array';print_r($two_mbr_names_for_lookups);
		//exit("exit 113");
		// every field in a table for which there is lookup help stores the data in a lookup_name_value_array_data record_type
		
		//$two_mbr_names_for_lookups = array("field_name", "relational_operators_array");
		//2015-01-25 added above for test
		//$array = array();
		//$array[] = 'lookup_name_value_array_indexed';
		//	print_r($two_mbr_names_for_lookups);echo($table_name);exit('exit 751');
		//print_r($table_name);exit('752');
		//	echo('<br><br>');
		$array = array("field_name","lookup_name_value_array_indexed");
		if($fields_with_lookup = DB::connection($this->db_snippet_connection)->table($this->snippet_table)
			->where('record_type','=','lookup_name_value_array_data')
			->where('table_name','=',$table_name)
			->whereIn('field_name', $two_mbr_names_for_lookups)
			//->whereIn('field_name', $two_mbr_names_for_lookups)->get($array))
			//->where('field_name','=', 'field_name')
			//->where('field_name','=', $two_mbr_names_for_lookups[0])
			//->orwhere('field_name','=', $two_mbr_names_for_lookups[1])
			//->get($array))
			->get($array))
			//->get())
		{
			//print_r($two_mbr_names_for_lookups);
		}
			
		$array = array();
		$j=0;
		foreach ($fields_with_lookup as $fields_with_lookupx) {
			$array[$two_mbr_names_for_lookups[$j]] = json_decode($fields_with_lookupx->lookup_name_value_array_indexed,true);
			//echo ('<br><br>j= '.$j);print_r($fields_with_lookupx->lookup_name_value_array_indexed);
			$j++;
		}
		//print_r($array);exit("exit 656");
		return $array;
	}
	
	
	public function debug_exit($file,$line,$exit=1) {
		echo " "."in ".substr($file,strripos ($file , "/")+1)." on line **".$line." ";
		if ($exit){
			exit(" exiting");
		}
	}

	
	public function _get($field_name) { // no
		//echo 'lookup_name_value_array_get';print_r($field_name_array);exit("exit 113");
		//print_r($field_name);exit("exit 292");
		//$this->debug_exit();

		$crlf = "\r\n";
		$array = array();
		if (
		$records = DB::connection($this->db_snippet_connection)->table($this->snippet_table)
		->where('record_type','=','lookup_name_value_array_data')
		->where('table_name','=',$this->model_table)
		->where('field_name','=',$field_name)
		->get(array('lookup_name_value_array'))) {
			$array = json_decode($records[0]->lookup_name_value_array);
		}
		return $array;
	}
	
	
	public function lookup_name_value_array_rebuild_as_array($name0,$table_name) {
		//echo 'lookup_name_value_array_rebuild_as_array';print_r($name0);print_r($table_name);
		//exit("exit 298");
		$crlf = "\r\n";
		//print_r($name0);print_r($value0);echo("nope hhp<br>");exit("exit 321");			
		$name_value_pair = DB::connection($this->db_snippet_connection)->table($this->snippet_table)
		->where('record_type',	'=','name_value_definition')
		->where('table_name',		'=', $table_name)
		->where('field_name',		'=', $name0)
		->get(array('name','value'));
		if ($name_value_pair){
			//echo("<br><br>for ");print_r($name0);
			$array = array();
			foreach ($name_value_pair as $name=>$value) {
				//echo("<br><br>vsplookup_name_value_array<br>");print_r($value);echo(" **value*name** ");print_r($name);
				$value0 = (string) $value->value;
				$array[$value0] =  $value->name;
				//$array[$value->name] =  $value->value;
				//echo("<br>".$name.$value->value);
				//echo("<br>".$name.$value );
			}
		//echo("<br>867 lookup_name_value_array_rebuild_as_array<br>");
		//exit("exit 868");
			return $array;
		} 
	}
	
	public function lookup_name_value_array_rebuild_as_string($field_name,$table_name) {
		//echo 'lookup_name_value_array_rebuild_as_string';print_r($field_name);exit("exit 566");
		$crlf = "\r\n";
		$name_value_pairs = DB::connection($this->db_snippet_connection)->table($this->snippet_table)
		->where('record_type','=','name_value_definition')
		->where('table_name','=',$table_name)
		->where('field_name','=',$field_name)
		->get(array('name','value'));
		
		if ($name_value_pairs){
			//echo 'lookup_name_value_array_rebuild_as_string';print_r($field_name);exit("exit 575");
			return $this->array_rebuild_as_string($name_value_pairs);
		}
	}
	
	public function array_rebuild_as_string($name_value_pairs) {
		//echo 'array_rebuild_as_string';print_r($name_value_pairs);//exit("exit 586");
		//dd($name_value_pairs);
			$string = "array(";
			foreach ($name_value_pairs as $name_value_pair) {
				$string .= "'".$name_value_pair->value  ."'=> '". $name_value_pair->name."',";
			}
			$string .= ")";
			return $string;
	}
	
	public function array_nv_rebuild_as_string($nv_array) {
		//echo 'array_rebuild_as_string';print_r($name_value_pairs);//exit("exit 586");
		//dd($name_value_pairs);
		$string = "array(";
		foreach ($nv_array as $name=>$value) {
			$string .= "'".$name ."'=> '". $value ."',";
		}
		$string .= ")";
		return $string;
	}

	
	public function array_nv_rebuild_indexed($nv_array) {
		//echo 'array_nv_rebuild_indexed 688';print_r($nv_array);//exit("exit 586");
		$array = array();
		foreach ($nv_array as $key=>$value){
			$array[]= $value;
		}
		return $array;
	}
	
	
	public function modifiable_fields_view_snippet_str_gen($field_name_array,$lookups,$data_array){
		//echo 'modifiable_fields_view_snippet_str_gen';
		// this generates the code to create the table 
		// for the modifiable fields view

		// IT'S ALL JUST STRINGS!
		// ***
		// This is what your input view will look like the next time you load it
		//$field_name_array = array_values($field_name_array);

		//print_r(Input::all());exit("890");
		$crlf = "\r\n";
		$strx = "";
		//$new_name_array = array();
		//$record_table_name = $this->model_table;
		//$lookups = $this->merge_lookups_into_single_array($record_table_name,$table_name);
		
		// $lookups is an array of field_names that have lookup help for this table
		//echo ('<br>$lookups<br>');print_r($lookups);
		//exit('exit 930x');	
		//print_r($field_name_array);exit("exit 592");
		$field_ctr = -1;
		foreach($field_name_array as $index=>$fieldx) {
			$field_ctr ++;
			//echo"<br>name: ";print_r($fieldx);
			$strx .=
			"<tr>".$crlf;
			if ($fieldx != $this->snippet_table_key_field_name){ // never update key
	
				$strx .=
				"<td style=\"text-align:left\">".$crlf.
				"{{ Form::label(\"$fieldx\",\"$fieldx\") }}".$crlf.
				"</td>".$crlf;
				//echo("<br><br>".$fieldx);$this->debug_exit(__FILE__,__LINE__,0);
				//var_dump($field_name_array);var_dump($lookups);$this->debug_exit(__FILE__,__LINE__,0);
				//var_dump($lookups);var_dump($field_name_array);var_dump(Input::all());$this->debug_exit(__FILE__,__LINE__,10);
				if (array_key_exists($fieldx,$lookups)) {
					$strx .=
					"<td style='text-align:left'>".$crlf.
					"{{ Form::select('".$fieldx. "',$"."lookups['".$fieldx."'] , $". "data_array_name" . "['".$fieldx."']) }}".$crlf.
					//"{{ Form::select('" .$fieldx. "',". $lookups[$fieldx].",  $"."record['".$fieldx."']) }}".$crlf.
						
					"</td>".$crlf;
				}
				else {
					//echo 'NOT in lookup array (OK)';$this->debug_exit(__FILE__,__LINE__,0);
					// actually, this is most likely
					$strx .=
					"<td style=\"text-align:left\">".$crlf.
					"{{ Form::text('".$fieldx."',$". "data_array_name['".$fieldx."']) }}".$crlf.
					//"{{ Form::text('".$fieldx."','xxx') }}".$crlf.
					"</td>".$crlf;
				}
			}
			$strx .= "</tr>".$crlf;
		}
		return $strx;
	}	
	
	
	public function modifiable_fields_add_save_blade($add_or_not,$table_name,$model,$field_name_array,$data_array_name) {
		echo 'modifiable_fields_add_save_blade';
		var_dump($field_name_array);$this->debug_exit(__FILE__,__LINE__,0);

		//print_r(Input::all());exit("890");
		$crlf = "\r\n";
		$strx = "";
		$new_name_array = array();
		$record_table_name = $this->model_table;
		$lookups = $this->merge_lookups_into_single_array($record_table_name,$table_name);
		
		// $lookups is an array of field_names that have lookup help for this table
		//echo ('<br>$lookups<br>');print_r($lookups);
		//exit('exit 930x');	
		//print_r($field_name_array);exit("exit 592");
		$field_ctr = -1;
		foreach($field_name_array as $index=>$fieldx) {
			$field_ctr ++;
			//echo"<br>name: ";print_r($fieldx);
			$strx .=
			"<tr>".$crlf;
			if ($fieldx != $this->snippet_table_key_field_name){ // never update key
	
				$strx .=
				"<td style=\"text-align:left\">".$crlf.
				"{{ Form::label(\"$fieldx\",\"$fieldx\") }}".$crlf.
				"</td>".$crlf;
				//echo"<br><br>944 ";print_r($fieldx);//echo"<br><br>";print_r($lookups);echo"<br><br>";//exit('exit 907');
				if (array_key_exists($fieldx,$lookups)) {
					//if (in_array($fieldx,$lookups)) {
					//echo"<br>".$fieldx.$data_array_name." is in lookup array<br>";print_r($lookups[$fieldx]);
					//exit ("<br>926");
					$strx .=
					"<td style='text-align:left'>".$crlf.
					//"{{ Form::select('$fieldx',$lookups[$fieldx]) }}".$crlf;
					//"{{ Form::select(".$fieldx.",".$lookups[$fieldx].",".$fieldx.") }}".$crlf.
					//"{{ Form::select($"."field_name ,$"."lookups[$"."field_name]".", $".$data_array_name."[$"."field_name]) }}".$crlf.
					"{{ Form::select('".$fieldx. "',$"."lookups['".$fieldx."'] , $". $data_array_name . "['".$fieldx."']) }}".$crlf.
					//"{{ Form::select('" .$fieldx. "',". $lookups[$fieldx].",  $"."record['".$fieldx."']) }}".$crlf.
						
					"</td>".$crlf;
					if ($add_or_not == 'add_save_add'
					&&
					$fieldx != "field_name"){
						
						// a pulldown field needs the ability to add a new value
						$labelxx = "or add a new value for ". $fieldx;
						
						$new_name_array[$fieldx] = "new_".$fieldx;
						$strx .=
						"</tr>".$crlf.
						"<tr>".$crlf.
						"<td style=\"text-align:left\">".$crlf. 
						"{{ Form::label('abc','".$labelxx."') }}".$crlf.
						"</td>".$crlf;
					
						$strx .=
						"<td style=\"text-align:left\">".$crlf.
						"{{ Form::text('".$new_name_array[$fieldx]."',''". ") }}".$crlf.
						"</td>".$crlf;
						
					}
				}
				else {
					//echo NOT in lookup array (OK)';$this->debug_exit(__FILE__,__LINE__,0);
					// actually, this is most likely
					$strx .=
					"<td style=\"text-align:left\">".$crlf.
					"{{ Form::text('".$fieldx."',$". $data_array_name . "['".$fieldx."']) }}".$crlf.
					"</td>".$crlf;
				}
			}
			"</tr>".$crlf;
		}
		$this->new_name_array = $new_name_array;
		print_r($new_name_array);
		//exit ("<br>956");
		return $strx;
	}
	
	
	
	public function modifiable_fields_getEdit_blade_gen($table_name,$model,$field_name_array) {
		//echo 'modifiable_fields_getEdit_blade_gen';print_r($field_name_array);exit("exit 72");
		$crlf = "\r\n";
		$strx = "";
		$record_table_name = $this->model_table;
		$lookups = $this->merge_lookups_into_single_array($record_table_name,$table_name);
		// $lookups is an array of field_names that have lookup help for this table
		
		//echo ('<br>$lookups<br>');print_r($lookups);exit('exit 654');
	
		//print_r($task_shift_array);exit('exit 30');
	
		//$stry = "$"."record->";
		$stry = "$"."record['";
		foreach($field_name_array as $index=>$name) {
			$strx .=
			"<tr>".$crlf;
	
			$strz = $stry . $name."']";
	//xzx
			$strx .=
			"<td style=\"text-align:left\">"."   ".$crlf.
	
			"{{ Form::label('$name','$name') }}".$crlf.
			"</td>".$crlf;
			//print_r($name);print_r($lookups);echo"<br><br>";exit('exit 630');
			//if (array_key_exists($name,$lookups)) {
			// ***********
			// important!
			//***********
			if (in_array($name,$lookups)) {
				//dd($lookups[$name]);
				$strx .=
				"<td style='text-align:left'>".$crlf.
				"{{ Form::select('" .$name. "',". $lookups[$name].",  $"."record['".$name."']) }}".$crlf.
				"</td>".$crlf;
			}
			else {
				if (stripos($name,'array')> 0
				||
				stripos($name,'query')> 0){
					$strx .=
					"<td class='text_align_left select_pink' >".$crlf.
					"{{ Form::textarea('".$name."', ". $strz. ") }}".$crlf.
					//			Form::textarea('name', $value, array('class' => 'name'));
					"</td>".$crlf;
				}
				else {
					$strx .=
					"<td style=\"text-align:right\"> ".$crlf.
					"{{ Form::text('".$name."',  $"."record['".$name."']) }}".$crlf.
					"</td>".$crlf;
					//print_r($index);print_r($name);echo"<br><br>";//exit('exit 990');
				}
			}
			"</tr>".$crlf;
		}
		return $strx;
	}				
					
	public function modifiable_fields_putUpdate_gen($model,$field_name_array) {
		echo 'modifiable_fields_putUpdate_gen';$this->debug_exit(__FILE__,__LINE__,0);

			$crlf = "\r\n";
		//$crlf = "";
		$strx = "DB::connection($this->db_data_connection)->table('".$this->model. "s')".
		"->where(Input::get('key_field_name'),'=',Input::get('key_field_value'))" .$crlf;
				$loop = "->update(array(".$crlf;
						foreach($field_name_array as $index=>$name) {
						if ($name != $this->snippet_table_key_field_name){
						$loop .= "'". $name . "' => Input::get('" . $name ."'),".$crlf;
						}
		}
		$loop = substr($loop,0,-3);
		$loop .= "));".$crlf;
		$strx .= $loop;
		return $strx;
	}
	
	
	
	
			public function modifiable_fields_update_array_include_gen($model,$field_name_array) {
					//echo 'modifiable_fields_update_array_include_gen';print_r($field_name_array);exit("exit 99");
				$nv_array = array();
				foreach ($_REQUEST['to'] as $value){
				$nv_array [$value] = $value;
				}
				$crlf = "\r\n";
				$crlf = "";
				$format = 'string';
				switch ($format) {
				case "array":
					$array = array();
					foreach($field_name_array as $index=>$name) {
					$array[$name] = Input::get($name);
					}
					break;
				case "string":
					$array_str = "";
					$array_str = "array(";
						foreach($field_name_array as $index=>$name) {
			 		$array_str .= "'".$name."'=>'".Input::get($name)."',".$crlf;
				}
	 		$array_str = substr($array_str,0,-3).")";
	 		//print_r($array_str);exit("exit 172");
	 		return $array_str;
			break;
			}
	
		}
		
	public function build_and_execute_query(
		$fieldName_r_o_value_array,
		$bypassed_field,
		$query_relational_operators_array
		) {
		//var_dump(Input::all());//var_dump($value_array);

		//echo("build_and_execute_query<br><br>"); $this->debug_exit(__FILE__,__LINE__,0);
		// *******
		// this guy does a lot
		// *****
		//var_dump($first_lookup_array);var_dump($second_lookup_array);var_dump($value_array);
		//$this->debug_exit(__FILE__,__LINE__,0);;var_dump($fieldName_r_o_value_array );//var_dump($second_lookup_array);var_dump($value_array);
		$query = DB::connection($this->db_data_connection)->table($this->model_table);
		echo 'DB::connection( '.$this->db_data_connection.')->table( '.$this->model_table.') ';
		foreach ($fieldName_r_o_value_array[0] as $index=>$value) {
		
		if ($value <> $bypassed_field){
			$r_o = $query_relational_operators_array[$fieldName_r_o_value_array[1][$index]]
;
			$v = $fieldName_r_o_value_array[2][$index];
			//echo($r_o);
			switch ($r_o) {
			case "=":
			case "<>":
			case ">":
			case "<":
			case "<=":
			case ">=":
				echo ' ->where( '.$value.' '.$r_o.' '.$v;//exit (' exit 155');
				//$query_string .= '->where('.$value.','.$r_o.','.$v.')';
				$query->where($value,$r_o,$v);
				break;
		
			case "whereBetween":
				break;
			} // end switch
		
			switch ($r_o) {
				case "orderBy":
					$aord = "ASC";
					$query->orderBy($value);
					echo(' ->orderBy('.$value.','.$aord.')');//exit("xit226");
					break;
				case "orderByDesc":
					$aord = "DESC";
					$query->orderBy($value,$aord);
					echo(' orderBy('.$value.','.$aord.')');//exit("xit226");
					break;
				case "distinct":
					
					$query->distinct($value);
					echo(" ->distinct($value) ");//exit("xit226");
					break;
				case "xgetArray":
					switch (Input::get('coming_from')) {
						case "advanced_query":
							//exit("xit205");
							$query->get();
							break;
						default:
							$query->get();
						break;
					}
				case "join":
					//DB::table('name')->join('table', 'name.id', '=', 'table.id')
					//->select('name.id', 'table.email');
				case "whereBetween":
					break;
			} // end switch
		} // end of not = "not_used"
		
	}  // end foreach

	echo("->get()");	
	return $query->get();
	//return  (array) $query;
	}	// end of advanced query ppv new



		public function ppv_derive_no_of_blank_entries($field_name_array,$bypassed_field_name,$no_of_blank_entries){
			//var_dump(Input::all());//$this->debug_exit(__FILE__,__LINE__,1);
			//var_dump(Input::all());
			$value_count_array = array_count_values($field_name_array);
			echo('$pop_or_fill_ctr');var_dump($value_count_array);var_dump(Input::all());$this->debug_exit(__FILE__,__LINE__,1);
			if (array_key_exists($bypassed_field_name,$field_name_array)){ 
				$pop_or_fill_ctr = $no_of_blank_entries -$value_count_array[$bypassed_field_name];
				if ($no_of_blank_entries > $value_count_array[$bypassed_field_name]){
					$pop_or_fill_ctr = $no_of_blank_entries - $value_count_array[$bypassed_field_name];
					$p_or_f = "f";
				}
				else{
					$pop_or_fill_ctr = $value_count_array[$bypassed_field_name] -  $no_of_blank_entries;
					$p_or_f = "p";
				}
			}
			else { 
				$pop_or_fill_ctr = $no_of_blank_entries;
				$p_or_f = "f";
			}
			echo($pop_or_fill_ctr);$this->debug_exit(__FILE__,__LINE__,1);
			return $pop_or_fill_ctr;
		}
		
		public function ppv_pad_blade_arrays($working_arrays,$what_we_are_doing,$bypassed_string){
			$j = -1;
			foreach ($working_arrays[$what_we_are_doing]['field_name_array'] as $field_name=>$array_name){
				$j++;
				if ($j == 0){
					$x = json_encode(Input::get('field_name_array'));
					$arr[$array_name] = $x;
					//echo($x.' * '.$j.' * '.$array_name.' * '.json_encode(Input::get('field_name_array')));
				}
				if ($j == 1){
					$x = json_encode(Input::get('r_o_array'));
					$arr[$array_name] = $x;
					
				}
				if ($j == 2){
					$x = json_encode(Input::get('value_array'));
					$arr[$array_name] = $x;
					
				}
			
			}

		}


		public function ppv_encode_blade_arrays($working_arrays,$what_we_are_doing){
			$j=-1;
			foreach ($working_arrays[$what_we_are_doing]['field_name_array'] as $field_name=>$array_name){
				$j++;
				if ($j == 0){
					$x = json_encode(Input::get('field_name_array'));
					$arr[$array_name] = $x;
					//echo($x.' * '.$j.' * '.$array_name.' * '.json_encode(Input::get('field_name_array')));
				}
				if ($j == 1){
					$x = json_encode(Input::get('r_o_array'));
					$arr[$array_name] = $x;
					
				}
				if ($j == 2){
					$x = json_encode(Input::get('value_array'));
					$arr[$array_name] = $x;
					
				}
			
			}

		}

		public function ppv_pop_or_fill_array($array,$ppv_default_value,$pop_or_fill_ctr,$pop_or_fill) {		
			//echo ' ppv_pop_or_fill_array ';var_dump($array);$this->debug_exit(__FILE__,__LINE__,1);
			for ($i=0; $i<($pop_or_fill_ctr); $i++){		
				if ($pop_or_fill == 'p'){
					echo ("pop");
					array_pop($array);
				}else{
					echo("pad");
					$array[] = $ppv_default_value;
				}
			}
			//var_dump($array);$this->debug_exit(__FILE__,__LINE__,1);
			return json_encode($array);
		}



		public function ppv_pad_array($array,$ppv_default_value,$pop_or_fill_ctr,$pop_or_fill) {		
			//$array[] = $insert; echo("*************");
			echo ' ppv_pad_array ';var_dump($array);$this->debug_exit(__FILE__,__LINE__,0);
			for ($i=0; $i<($pop_or_fill_ctr); $i++){		
				if ($pop_or_fill == 'p'){
					//print_r($array);echo"**".count($array).$a;
					array_pop($array);
				}else{
					$array[] = $ppv_default_value;
				}
			}
			return json_encode($array);
		}

		public function ppv_for_loop($field_name_array,$arr0,$search_str,$pop_or_fill) {		
			// the ppv_for_loop goes thru a list of array_names
		 	// only the first occurrence is used to test for strings
			// initially, we want to clean up a mistake and delete not_used values 
			$j = -1;
			$arr1 = array();
			foreach($field_name_array as $index=>$array_name) {
				$j++;
				//echo($index);var_dump($array_name);$this->debug_exit(__FILE__,__LINE__,0);
				if ($j == 0) { // only the first time thru
					$value_count_array = array_count_values($arr0[$array_name]);
					//$arr = array_count_values($Input::get([$array_name]);
					//var_dump($value_count_array);var_dump($arr0[$array_name]);echo($search_str);$this->debug_exit(__FILE__,__LINE__,0);
					if (array_key_exists($search_str,$value_count_array)){ 
						$pop_or_fill_ctr = $value_count_array[$search_str];
					//var_dump($pop_or_fill_ctr);var_dump($arr0[$array_name]);echo($search_str.'**'.$pop_or_fill_ctr);$this->debug_exit(__FILE__,__LINE__,1);
						$pop_or_fill = "p";echo ' ppv_for_loop ';	
					}
					//var_dump($arr0[$array_name]);echo($search_str);$this->debug_exit(__FILE__,__LINE__,10);
				}   // only the first time thru
				$arr1[$array_name] = $arr0[$array_name];
				for ($i=0; $i<($pop_or_fill_ctr); $i++){		
					array_pop($arr1[$array_name]);
				}

				//$arr0[$array_name] = $this->ppv_pad_array($arr0[$array_name],$ppv_default_values[$j],$pop_or_fill_ctr,$pop_or_fill);
	

			} // end for
			//var_dump($arr1);$this->debug_exit(__FILE__,__LINE__,10);
			return $arr1;

		}


		public function ppv_pop_arrays_by_value($array,$ppv_default_value,$pop_or_fill_ctr,$pop_or_fill) {		
			//$array[] = $insert; echo("*************");
			echo ' ppv_pop_arrays_by_value ';var_dump($array);echo ' ttttth ';
			for ($i=0; $i<($pop_or_fill_ctr); $i++){		
				if ($pop_or_fill == 'p'){
					//print_r($array);echo"**".count($array).$a;
					array_pop($array);
				}else{
					$array[] = $ppv_default_value;
				}
			}
			return json_encode($array);
		}

		public function ppv_build_update_array_new($field_name_array,$no_of_blank_entries,$input_array_names,$ppv_default_values){
			// 
			// three arrays from the Input form are matched with their corresponding daatabase field names
			// the arrays must be resized to insure there's some room for growth
			// the 'advanced update' snippet needs to be generated but only needs to know how many entries
			// the arrays need to be encoded in the array we return

			// ***
			//var_dump(Input::all());$this->debug_exit(__FILE__,__LINE__,1);
			echo ' ppv_build_update_array_new ';
			//var_dump($field_name_array);
			$this->debug_exit(__FILE__,__LINE__,0);
			//var_dump(Input::all());//$this->debug_exit(__FILE__,__LINE__,1);
			$input_array_names = array('field_name_array','r_o_array','value_array');
			// these are the names on the input form 
			$ppv_default_values = array('not_used',0,' ');

			$arr0 = array();
			$j = -1;
			foreach($field_name_array as $index=>$array_name) {
				// this matches up theworking_arrays  field names with the data on the input form
				$j++;
				$derived_name = $index ."_array";
				$arr0[$array_name] = Input::get($derived_name);
			}
	
			$j = -1;
			
			foreach($arr0 as $index=>$array_name) {
				$j++;
				//echo($index);var_dump($array_name);$this->debug_exit(__FILE__,__LINE__,10);

				if ($j == 0) { // only the first time thru
					$pop_or_fill = "f";
					$field_name_usage_array = array_count_values($array_name);
					//$field_name_usage_array = array_count_values($Input::get([$array_name]);
					//var_dump($field_name_usage_array);$this->debug_exit(__FILE__,__LINE__,10);
					if (array_key_exists($this->bypassed_field_name,$field_name_usage_array)){ 
						// there are some bypassed entries
						//echo("popped entries");var_dump($array_name);$this->debug_exit(__FILE__,__LINE__,1);
						if ($field_name_usage_array[$this->bypassed_field_name] > $this->no_of_blank_entries){ 
							$pop_or_fill = "p";	
							$pop_or_fill_ctr = $field_name_usage_array[$this->bypassed_field_name] - $this->no_of_blank_entries ;
						}
						else {
							if ($field_name_usage_array[$this->bypassed_field_name] == $this->no_of_blank_entries ){
								$pop_or_fill_ctr = 0;
							}
							else{
								$pop_or_fill_ctr = $this->no_of_blank_entries - $field_name_usage_array[$this->bypassed_field_name]  ;
							}
						
						}
					}
					else {
						$pop_or_fill_ctr = $this->no_of_blank_entries;
					}
				}   // only the first time thru
				$arr0[$index] = $this->ppv_pop_or_fill_array($array_name,$ppv_default_values[$j],$pop_or_fill_ctr,$pop_or_fill);
	
			

			} // end for
			var_dump($pop_or_fill_ctr);var_dump($arr0);echo($pop_or_fill_ctr.$pop_or_fill);$this->debug_exit(__FILE__,__LINE__,0);
			return $arr0;
		}	
		

		public function ppv_just_pad($three_arrays,$what_we_are_doing,$no_of_blank_entries,$ppv_default_values){

			//echo($index);var_dump($array_name);$this->debug_exit(__FILE__,__LINE__,0);			//var_dump(			$ppv_default_values = array('not_used',0,' ');
			$j = -1;
			//$this->debug_exit(__FILE__,__LINE__,0);
			for ($i=0; $i<($no_of_blank_entries); $i++){
				$j = -1;
				foreach($three_arrays as $index=>$array_name) {
					$j++;
					//$array_name[] = $ppv_default_values[$j];
					$three_arrays[$index][] = $ppv_default_values[$j];
				} 
			}	
			return $three_arrays;
		}


		public function ppv_room_for_growth_new($field_name_array,$what_we_are_doing,$no_of_blank_entries,$input_array_names,$ppv_default_values){
			// 
			//var_dump(Input::all());$this->debug_exit(__FILE__,__LINE__,1);
			// ***
			echo ' ppv_room_for_growth_new ';var_dump($field_name_array);echo ' ttttth ';
			var_dump(Input::all());//$this->debug_exit(__FILE__,__LINE__,1);
			$input_array_names = array('field_name_array','r_o_array','value_array');
			// these are the names on the input form 
			$ppv_default_values = array('not_used',0,' ');
			$arr0 = array();
			$j = -1;
			
			foreach($field_name_array as $index=>$array_name) {
				$j++;
				$derived_name = $index ."_array";
				
			$arr0[$array_name] = Input::get($derived_name);
			}
			//echo('$arro');var_dump($arr0);$this->debug_exit(__FILE__,__LINE__,0);
			//$this->debug_exit(__FILE__,__LINE__,0);
			$j = -1;
			foreach($field_name_array as $index=>$array_name) {
				$j++;
				//echo($index);var_dump($array_name);$this->debug_exit(__FILE__,__LINE__,0);

				if ($j == 0) { // only the first time thru
					$arr = array_count_values($arr0[$array_name]);
					//$arr = array_count_values($Input::get([$array_name]);
					//var_dump($arr);$this->debug_exit(__FILE__,__LINE__,10);
					if (array_key_exists($this->bypassed_field_name,$arr0[$array_name])){ 
						// there are some bypassed entries
						echo("popped entries");var_dump($array_name);$this->debug_exit(__FILE__,__LINE__,1);
						if ($arr[$this->bypassed_field_name] > $this->no_of_blank_entries){ 
							$pop_or_fill = "p";echo ' ppppppp_____ppppppppp ';	
							$pop_or_fill_ctr = $this->no_of_blank_entries - $arr[$this->bypassed_field_name] ;
						}
					}
					else {
						//echo('$arro');
						// no room for more entries
						$pop_or_fill = "f";echo ' ffffffff ';	
						$pop_or_fill_ctr = $this->no_of_blank_entries;
					}
				}   // only the first time thru
				$arr0[$array_name] = $this->ppv_pad_array($arr0[$array_name],$ppv_default_values[$j],$pop_or_fill_ctr,$pop_or_fill);
	
			//$this->debug_exit(__FILE__,__LINE__,0);

			} // end for
			//var_dump($arr0);
			return $arr0;
		}	
		
		public function ppv_room_for_growth($type,$no_of_blank_entries,$array){
			//echo 'ppv_room_for_growth';print_r($array);//exit("exit 113");
			end($array);
			//print_r($array);exit("exit 113");
			for ($i=0; $i<($no_of_blank_entries); $i++){		
				if ($type == 'not_used'){
					//print_r($array);echo"**".count($array).$a;
					$array[] = $type;
				}
			if ($type == 'zero'){
					//print_r($array);echo"**".count($array).$a;
					$array[] = 0;
				}
				if ($type == 'blank'){
					//echo 'blank';//print_r($array);//exit("exit 113");
					$array[] = "";
				}
			}
			return $array;
		}
		
		
		public function print_array_indexes($array) {
			//echo 'build_lookups_array_string';print_r($field_name_array);exit("exit 113");
			/*
			 * all the lookup tables are stored at the table level
			* this puts them all together into an array of string arrays
			*/
			foreach($array as $index=>$value) {
				echo("<BR>");print_r($index);
			}
			return;
		}
		
		
		public function build_lookups_array_string() {
			//echo 'build_lookups_array_string';print_r($field_name_array);exit("exit 113");
			/*
			* all the lookup tables are stored at the table level
			* this puts them all together into an array of string arrays
			*/
			$crlf = "\r\n";
			//$crlf = "";
			$lookup_array = array();
			$lookup_fields = DB::connection($this->db_snippet_connection)->table($this->snippet_table)
			->where('record_type','=','lookup_name_value_array_data')
			->get(array('field_name','lookup_name_value_array_string'));
			foreach($lookup_fields as $nv) {
				$lookup_array[$nv->field_name] = $nv->lookup_name_value_array_string;
				
			}
			//echo("<BR>lookup_array<BR>");print_r($lookup_array);exit("exit 341");
			return $lookup_array;
		}
			
	
	public function build_edit_view_lookup_array($model,$field_name_array) {

		//echo 'build_edit_view_lookup_array';print_r($field_name_array);exit("exit 113");
		/*
		 * all the lookup tables are stored at the table level
		 * this puts them all together in a single array
		 */
		$crlf = "\r\n";
		//$crlf = "";
		$lookup_array = array();
		$lookup_fields = DB::connection($this->db_snippet_connection)->table($this->snippet_table)
		->where('record_type','=','lookup_name_value_array_data')
		->get(array('field_name','lookup_name_value_array_string'));
			foreach($lookup_fields as $name=>$value) {
				$lookup_array[$name] = $value;
			}
		//echo '<br>build_edit_view_lookup_array<br><br>';var_dump($lookup_array);$this->debug_exit(__FILE__,__LINE__,10);
		return $lookup_array;
	}
	
	
	public function build_file_of_modifiable_fields($model,$field_name_array) {
		//echo 'build_file_of_modifiable_fields';//exit("exit");
		$crlf = "\r\n";
		//$crlf = "";
		$arrx = array();
		foreach($field_name_array as $index=>$name) {
			$arrx[$name] = "$name";
		}
		$arrx = json_encode($arrx);
		$file_name = $this->public_files_prefix . $model.'s/modifiable_fields_select_array.php';
		//echo $file_name;exit('exit 154');
		//File::put($file_name, $arrx);
		$this->add_delete_add_file_as_string($file_name,$arrx);
		return;
	}
	
	public function generated_snippets_update($name,$value) {
		//echo 'generated_snippets_update'.$value;exit("exit 285");
		$arrx  = DB::connection($this->db_snippet_connection)->table($this->model_table)
		->where('function_name', 	'=', 'getEdit4')
		->where('record_type', 		'=', 'generated_snippets')
		->where('snippet_name', 	'=', 'snippet_name')
		->where('table_name',			'=',  $this->model_table)
		->update(array($name => $value));
		return;
	}
	
	public function generated_snippets_array_update($key_field_name,$key_value,$array) {
		//echo 'generated_snippets_array_update';exit("exit 285");
		$arrx  = DB::connection($this->db_snippet_connection)->table($this->snippet_table)
		->where($key_field_name, 	'=', $key_value)
		->update($array);
		return;
	}
	
	public function get_generated_snippets() {
		//echo 'get_generated_snippets 838';//exit("exit");
		//2014-10-13 modified query to only get 
		$array = array();
		$arrx  = DB::connection($this->db_snippet_connection)->table($this->snippet_table)
		->where('record_type', 		'=', 'table_snippets')
		->where('table_name',		'=',  $this->model_table)
		->get();
		//print_r($arrx[0]);
		//print_r($array);
		//exit("exit 292");
		if ($arrx) {
			$array1 = (array) $arrx[0];
			foreach($array1 as $name=>$value) {
				if (stripos($name,'array')> 0){
					$array[$name] 	= (array) json_decode($value);
				}
				else {
					$array[$name] 	= $value;
				}
			}
		}
		//print_r($array);exit("exit 1162");

		return $array;
	}
	
	
	public function get_generated_snippets_for_tasks() {
		//echo 'get_generated_snippets_for_tasks 1167';//exit("exit");
		//2014-10-13 modified query to only get
		$array = array();
		$arrx  = DB::connection($this->db_snippet_connection)->table($this->snippet_table)
		->where('record_type', 		'=', 'generated_snippets')
		->where('table_name',			'=',  $this->model_table)
		->get();
		//print_r($arrx[0]);
		//print_r($array);exit("exit 1175");
		if ($arrx) {
			$array1 = (array) $arrx[0];
			foreach($array1 as $name=>$value) {
				if (stripos($name,'array')> 0){
					$array[$name] 	= (array) json_decode($value);
				}
				else {
					$array[$name] 	= $value;
				}
			}
		}
		//print_r($array);exit("exit 292");
	
		return $array;
	}
	public function get_generated_snippets_by_report_key($record_key) {
		//echo 'get_generated_snippets_by_report_key';//exit("exit");
		//2014-10-13 modified query to only get 
		$array = array();
		if ($arrx  = DB::connection($this->db_snippet_connection)->table($this->snippet_table)
		->where($this->snippet_table_key_field_name,'=', $record_key)
		->where('table_name',			'=',  $this->model_table)
		->get()){
			$array1 = (array) $arrx[0];
			foreach($array1 as $name=>$value) {
				if (stripos($name,'array')> 0){
					$array[$name] 	= (array) json_decode($value);
				}
				else {
					$array[$name] 	= $value;
				}
			}
		}

		return $array;
	}
	
	public function decode_generated_snippets_by_record_type($record_type) {
		echo 'decode_generated_snippets_by_record_type';//exit("exit");
		$arrx  = DB::connection($this->db_snippet_connection)->table($this->snippet_table)
		->where('function_name', 	'=', 'getEdit4')
		->where('record_type', 		'=', $record_type)
		->where('table_name',			'=',  $this->model_table)
		->get();
		//print_r($arrx[0]);
		//print_r($array);exit("exit 292");
		$array = array();
		//$array1 = (array) $arrx[0];
		foreach($arrx as $name=>$value) {
			if (stripos($name,'array')> 0){
				$array[$name] 	= (array) json_decode($value);
			}
			else {
				$array[$name] 	= $value;
			}
		}
		//print_r($array);exit("exit 292");
	
		return $array;
	}
	
	
	
	
	public function decode_generated_snippets_by_report($arrx) {
		//echo 'decode_generated_snippets_by_report';exit("exit 1436");
		//print_r($arrx[0]);
		
		$array = array();
		if ($arrx) {
			$array = array();
			$array1 = (array) $arrx;
			foreach($array1 as $name=>$value) {
				if (stripos($name,'array')> 0){
					$array[$name] 	= (array) json_decode($value);
				}
				else {
					$array[$name] 	= $value;
				}
			}
		}
		return $array;
	}
	
	
	
	
	public function modifiable_fields_blade_files_gen($report_key) {
		echo '<br>modifiable_fields_blade_files_gen<br><br>';
		//$this->debug_exit(__FILE__,__LINE__,1);
		$nv_array = array();
		foreach ($_REQUEST['to'] as $value){
			$nv_array [$value] = $value;
		}
		

		$fnam = $this->view_files_prefix."/".
		$this->generated_files_folder."/".$report_key.'_modifiable_fields_getEdit_snippet.blade.php';
		//File::put($fnam, $this->modifiable_fields_getEdit_blade_gen($this->model_table,$this->model,$nv_array));
		$this->add_delete_add_file_as_string($fnam,$this->modifiable_fields_getEdit_blade_gen($this->model_table,$this->model,$nv_array));
		echo '<br>AFTER modifiable_fields_blade_files_gen<br><br>';
		
		$fnam = $this->view_files_prefix."/".$this->generated_files_folder."/".$report_key.'_modifiable_fields_putUpdate_snippet.blade.php';
		$this->add_delete_add_file_as_string($fnam,$this->modifiable_fields_putUpdate_gen($this->model,$nv_array));
		
		$fnam = $this->view_files_prefix."/".$this->generated_files_folder."/".$report_key.'_modifiable_add_save_snippet.blade.php';
		$this->add_delete_add_file_as_string($fnam,$this->modifiable_fields_add_save_blade('add_save',$this->model_table,$this->model,$nv_array,'record'));
	 
		$fnam = $this->view_files_prefix."/".$this->generated_files_folder."/".$report_key.'_modifiable_add_save_add_snippet.blade.php';
		$this->add_delete_add_file_as_string($fnam,$this->modifiable_fields_add_save_blade('add_save_add',$this->model_table,$this->model,$nv_array,'record'));
		
		
	}
	

	public function lookup_name_value_snippets_gen($table_name) {
		//echo('<br>1366 lookup_name_value_snippets_gen');
		//print_r(Input::all());exit('<br>1366 exit lookup_name_value_snippets_gen');
		//print_r(Input::get('to'));exit('<br>1367 exit lookup_name_value_snippets_gen');
		/*
		 
		 READ THIS TO REFRESH YOURSELF ON WHAT ALL THIS ROUTINE DOES!
		 
		 whenever modifiable_fields_list changes, we update the lookup data for the table
		 
		 one lookup_name_value_array_data for each field that has records where
		 record_type = name_value_definition

		 lookup_name_value_array and lookup_name_value_array_string 
		 are the two fields that have to be built  
	     always delete existing lookup_name_value_array_data for table
	     stored at the table (not report) level
		*/

		$response1 = DB::connection($this->db_snippet_connection)->table($this->snippet_table)
		->where('table_name','=', $table_name)
		->where('record_type','=','lookup_name_value_array_data')
		->delete();
		
		// this one is just for the field_names which i can get from the database easier
		// we end up needing it to define the advanced query
		$name_value_pairs = $this->build_column_names_array($table_name);
		$array = array();
		$array ['table_name'] 						= $table_name;
		$array ['record_type'] 						= "lookup_name_value_array_data";
		$array ['field_name'] 						= "field_name";
		// difference (see prev line)				************   
		//print_r($name_value_pairs);//exit('exit1305');
		$array ['lookup_name_value_array'] 			= json_encode($name_value_pairs);
 		$array ['lookup_name_value_array_string']	= $this->array_nv_rebuild_as_string($name_value_pairs);
 		$array ['lookup_name_value_array_indexed']	= json_encode($this->array_nv_rebuild_indexed($name_value_pairs));
 		DB::connection($this->db_snippet_connection)->table($this->snippet_table)->insert($array);
 		//print_r($array ['lookup_name_value_array_indexed']);
 		//var_dump($array);
 		//exit('<br>exit1411');

 		// this one is just for the relational_operators which is easier to hardcode
		// we end up needing it to define the advanced query
		$query_relational_operators_array = $this->build_query_relational_operators_array();
		
		$array = array();
		$array ['table_name'] 			= $table_name;
		$array ['record_type'] 			= "lookup_name_value_array_data";
		$array ['field_name'] 			= 'relational_operators_array';
		// difference (see prev line)	  **************************   
		$array ['lookup_name_value_array_indexed'] 		= json_encode($query_relational_operators_array);
		DB::connection($this->db_snippet_connection)->table($this->snippet_table)->insert($array);
		
		$business_rules_relational_operators = $this->build_business_rules_relational_operators();
		
		$array = array();
		$array ['table_name'] 										= $table_name;
		$array ['record_type'] 										= "lookup_name_value_array_data";
		$array ['field_name'] 										= 'business_rules_r_o_array';
		// difference (see prev line)								**************************   
		$array ['lookup_name_value_array_indexed']= json_encode($business_rules_relational_operators);
 		DB::connection($this->db_snippet_connection)->table($this->snippet_table)->insert($array);
 		
 		// *****
 		// This builds the lookup_name_value_array_data record for every field defined with a
		// name_value_definition record_type
 		// *****
 		//if (array_key_exists("field_name",$lookups)) {
 			
 		//exit($table_name.'exit1497');
 		 	
 		$response0 = DB::connection($this->db_snippet_connection)->table($this->snippet_table)
 		->where('table_name','=', $table_name)
 		->where('record_type','=','name_value_definition')
 		->distinct('field_name')
 		->get(array('field_name','table_name'));
 		// every field for which there is lookup help
 		// defined via name_value_definition
 		foreach($response0 as $response){
 			//echo('echo modifiable_fields_snippets_gen');
 			//echo("<br>".$response->field_name.' *e* '.$table_name);//exit('exit modifiable_fields_snippets_gen');
 			//exit('exit1511');
 	 		$arrayto = (array) Input::get('to');
	 		if (in_array('table_name',$arrayto)) {
	 			//echo("table_name we got one");
	 			//print_r($arrayto);exit("1515".$response->table_name."we got one");
	 			$table_name = $response->table_name;
	 		}
	 		$array = array();
 			$array ['table_name'] 						= $table_name;
 			$array ['record_type'] 						= "lookup_name_value_array_data";
 			$array ['field_name'] 						= $response->field_name;
 			$array ['lookup_name_value_array'] 			= json_encode($this->lookup_name_value_array_rebuild_as_array($response->field_name,$table_name));
 			$array ['lookup_name_value_array_string']	= $this->lookup_name_value_array_rebuild_as_string($response->field_name,$table_name);
 			//print_r($array ['lookup_name_value_array']);//exit('exit modifiable_fields_snippets_gen');
 			//exit('exit1105');
 			DB::connection($this->db_snippet_connection)->table($this->snippet_table)->insert($array);
 		}
 		//exit('exit1528');
 		
		return;
	}

	public function gen_lookup_name_value_array_datax($table_name) {
		
 		$response0 = DB::connection($this->db_snippet_connection)->table($this->snippet_table)
 		->where('table_name','=', $table_name)
 		->where('record_type','=','name_value_definition')
 		//->distinct('field_name')
 		->get(array('field_name','table_name','name','value'));
 		//var_dump($response0); $this->debug_exit(__FILE__,__LINE__,10);
 		// every field for which there is lookup help
 		// defined via name_value_definition
 		$array = array();
 		foreach($response0 as $response){
 			$array [$response->field_name][$response->name]	= $response->value;
 		}
 		return $array;
	}




	public function build_query_relational_operators_array() {
		$query_relational_operators_array = array();
		$query_relational_operators_array[] =  "=";
		$query_relational_operators_array[] =  "<>";
		$query_relational_operators_array[] =  "<";
		$query_relational_operators_array[] =  "<=";
		$query_relational_operators_array[] =  ">";
		$query_relational_operators_array[] =  ">=";
		$query_relational_operators_array[] =  "join";
		$query_relational_operators_array[] =  "where";
		$query_relational_operators_array[] =  "whereBetween";
		$query_relational_operators_array[] =  "whereIn";
		$query_relational_operators_array[] =  "whereNotIn";
		$query_relational_operators_array[] =  "whereNull";
		$query_relational_operators_array[] =  "whereNotNull";
		$query_relational_operators_array[] =  "groupBy";
		$query_relational_operators_array[] =  "orderBy";
		$query_relational_operators_array[] =  "orderByDesc";
		$query_relational_operators_array[] =  "getArray";
		$query_relational_operators_array[] =  "distinct";
		return $query_relational_operators_array;
	}
	
	public function build_business_rules_relational_operators() {
		$business_rules_relational_operators	= 		array();
		$business_rules_relational_operators[] =		"required";
		$business_rules_relational_operators[] =		"accepted";
		$business_rules_relational_operators[] =		"active_url";
		$business_rules_relational_operators[] =		"after:YYYY-MM-DD";
		$business_rules_relational_operators[] =		"before:YYYY-MM-DD";
		$business_rules_relational_operators[] =		"alpha";
		$business_rules_relational_operators[] =		"alpha_dash";
		$business_rules_relational_operators[] =		"alpha_num";
		$business_rules_relational_operators[] =		"array";
		$business_rules_relational_operators[] =		"between:1,10";
		$business_rules_relational_operators[] =		"confirmed";
		$business_rules_relational_operators[] =		"date";
		$business_rules_relational_operators[] =		"date_format:YYYY-MM-DD";
		$business_rules_relational_operators[]	= 		"different:fieldname";
		$business_rules_relational_operators[] =		"digits:value";
		$business_rules_relational_operators[] =		"digits_between:min,max";
		$business_rules_relational_operators[] =		"boolean";
		$business_rules_relational_operators[] =		"email";
		$business_rules_relational_operators[] =		"exists:table,column";
		$business_rules_relational_operators[] =		"image";
		$business_rules_relational_operators[] =		"in:foo,bar,...";
		$business_rules_relational_operators[] =		"not_in:foo,bar,...";
		$business_rules_relational_operators[] =		"integer";
		$business_rules_relational_operators[] =		"numeric";
		$business_rules_relational_operators[] =		"ip";
		$business_rules_relational_operators[] =		"max:value";
		$business_rules_relational_operators[] =		"min:value";
		$business_rules_relational_operators[] =		"mimes:jpeg,png";
		$business_rules_relational_operators[] =		"regex:[0-9]";
		$business_rules_relational_operators[] =		"required_if:field,value";
		$business_rules_relational_operators[] =		"required_with:foo,bar,...";
		$business_rules_relational_operators[] =		"required_with_all:foo,bar,...";
		$business_rules_relational_operators[] =		"required_without:foo,bar,...";
		$business_rules_relational_operators[] =		"required_without_all:foo,bar,...";
		$business_rules_relational_operators[] =		"same:field";
		$business_rules_relational_operators[] =		"size:value";
		$business_rules_relational_operators[] =		"timezone";
		$business_rules_relational_operators[] =		"unique:table,column,except,idColumn";
		$business_rules_relational_operators[] =		"url";
		return $business_rules_relational_operators;
	}
	
	
	public function modifiable_fields_snippets_gen($key_field_name,$key_value) {
		//print_r($_REQUEST["to"]);exit('exit modifiable_fields_snippets_gen');
		//print_r(Input::all());exit('exit modifiable_fields_snippets_gen');
		if (array_key_exists('to',Input::all())) {
			$nv_array = array();
			$nv_array 	= array_combine(Input::get('to'), Input::get('to'));
		}	
		$array = array();
		$array ['modifiable_fields_update_array_include']
		= json_encode($this->modifiable_fields_list_gen($this->model,$nv_array));
		$array ['modifiable_fields_putUpdate'] 		= $this->modifiable_fields_putUpdate_gen($this->model,$nv_array);
		$array ['modifiable_add_save_snippet'] 		= $this->modifiable_fields_add_save_blade('add_save',$this->model_table,$this->model,$nv_array,'record');
		$array ['modifiable_fields_array']			= json_encode($nv_array);
		$array ['modifiable_fields_list'] 			= $this->modifiable_fields_list_gen($this->model,$nv_array);
		//print_r($array);print_r(Input::all());exit('1441 exit modifiable_fields_snippets_gen');
		

		$this->update_miscThings_for_add_save($this->model,$nv_array);
		//$this->update_miscThings_for_add_save builds those postCreate records
		$this->modifiable_fields_list_gen($this->model,$nv_array);
		//this gets saved as modifiable.  maybe it makes sure it's refreshed
		$this->build_edit_view_lookup_array($this->model_table,$nv_array);
		//print_r($nv_array);exit('exit build_edit_view_lookup_array 1451');
		//this builds an array of fields for which there is lookup help
	
		//print_r($array);exit('exit 519');
		$this->generated_snippets_array_update($key_field_name,$key_value,$array);
	}
	
	
	public function randomize_field_name($key_field_name,$rtrim,$field_name,$table_name) {
		//print_r($_REQUEST["to"]);exit('exit required_fields_snippets_gen_by_report');
		$DB_query =	DB::connection($this->db_data_connection)->table($table_name)
		->get(array($key_field_name,$field_name));
		if ($DB_query){
			foreach ($DB_query as $key=>$value) {
				$new_value = $value;
				//$query2 = DB::table($table_name)
				//->where($key_field_name,'=',$key)
				//->update(array($field_name=>$new_value));
				echo('<br>new_value'.$value);//exit("exit 321");
			} // end for
		}
	}
	
	public function required_fields_snippets_gen_by_report($key_field_name,$key_value) {
		//print_r($_REQUEST["to"]);exit('exit required_fields_snippets_gen_by_report');
		$nv_array = array();
		foreach ($_REQUEST['to'] as $value){
			$nv_array [$value] = $value;
		}
		$array = array();
		$array ['required_fields_array']					= json_encode($nv_array);
		$array ['required_fields_required_array']	= json_encode($this->required_fields_rules_gen($nv_array));
		$this->generated_snippets_array_update($key_field_name,$key_value,$array);
	}
	
	public function required_fields_rules_gen($nv_array) {
		//print_r($nv_array);print_r($_REQUEST["to"]);exit('exit required_fields_snippets_gen_by_report');
		$nv_array = array();
		foreach ($_REQUEST["to"] as $value){
			$nv_array [$value] = 'required';
		}
		//print_r($nv_array);exit('exit required_fields_rules_gen');exit('exit 823');
		return $nv_array;
	}
	
	
	public function generated_snippets_get_decoded_field($field) {
		echo 'generated_snippets_get_decoded_field';//exit("exit");
		$arrx  = DB::connection($this->db_snippet_connection)->table($this->snippet_table)
		->select($field)
		->where('function_name', 	'=', 'getEdit4')
		->where('record_type', 		'=', 'generated_snippets')
		->where('snippet_name', 	'=', 'snippet_name')
		->where('table_name',			'=',  $this->model_table)
		->get();
		foreach($arrx as $array) {
			return json_decode($array->$field);
		}
	}
	
	public function update_miscThings_for_add_save($model,$field_name_array) {
	//public function build_post_create_array_strings($model,$field_name_array) {
		//echo 'update_miscThings_for_add_save';//exit("exit 99");
		$array = array();
		$function_name 					= "postCreate";
		$array['record_type'] 			= "generated_snippets";
		$snippet_name 					= 'build_array_for_add';
		DB::connection($this->db_snippet_connection)->table($this->snippet_table)
		->where('function_name', 	'=', 'postCreate')
		->where('record_type', 		'=', 'generated_snippets')
		->where('snippet_name', 	'=', 'build_array_for_add')
		->where('table_name',			'=',  $this->model_table)
		->delete();

		$array['function_name'] = $function_name;
		$array['snippet_name']	= $snippet_name;
		$array['table_name']		= $this->model_table;
		foreach($field_name_array as $name=>$value) {
			$array['field_name'] 	= $value;
			$array['field_name_source_string'] 	= Input::get($name);
			DB::connection($this->db_snippet_connection)->table($this->snippet_table)->insert($array);
		}
		return;
	}
	
	public function get_gen_dist($skip = 0, $take = 0) {
		//copied in separately
		$countries = Country::skip($skip)->take($take)->get();
		foreach ($countries as $country) {
			DB::statement(DB::raw('CALL dist_proc(' . $country->id . ');'));
		}
	}
	
	public function build_rebuild_model($model) {
		echo 'build_rebuild_model';exit("exit 99");
		$crlf = "\r\n";
		//$crlf = "";
		$middle_of_file_name = "required_";
		$filex = $this->public_files_prefix.$middle_of_file_name.$model.'s.php';
		$strx = "
			<?php
			class ".ucfirst($this->model)." extends Eloquent {
			protected \$table = '".$this->model."s';".
	
			"protected \$fillable = array('TaskName1');".$crlf;
			//$file_name .= "/required_";
			//$str1 = File::get($filex);
			//'TaskName1'=>'required|min:3');
			//'PermanentTask'=>'required|min:1'
			//'price'=>'required|numeric',
			//'availability'=>'integer',
			//'image'=>'required|image|mimes:jpeg,jpg,bmp,png,gif'
	
			$file_name = $this->public_files_prefix . "/required_" . $model."s.php";
			File::get($file_name);
			$strx .= "
			public static ".
			File::get($file_name).$crlf."}";
				
			File::put(app_path().'/Models/'.ucfirst($this->model).".php",$strx);
		}
	
	public function build_required_fields_snippets($model,$field_name_array) {
		echo 'build_required_fields_snippets';//exit("exit 99");
		$crlf = "\r\n";
		//$crlf = "";

			$strx = "$"."rules = array( ";
		foreach($field_name_array as $name=>$value) {
			$strx .= "'" .$value. "' => ". " 'required', ";
		}
		$strx  = substr($strx,0,-2);
		$strx .= ");";
		$file_name = $this->public_files_prefix . "/required_" . $model."s.php";
		File::put($file_name, $strx);
		
		$strx = "<?php " . $strx . " ?>";
		$file_name = $this->public_files_prefix . "/php_required_" . $model."s.php";	
		File::put($file_name, $strx);
		return;
	}
		
	public function define_browse_select_fields() {
	}
	
	public function modifiable_fields_define() {
		//echo '*'."<br>modifiable_fields_define"."*";//exit('exit');
		$edit4_return_option = "modifiable_fields_snippets_gen";
		$to_array = $this->generated_snippets_array['modifiable_fields_array'];
		
		$column_names_array = $this->generated_snippets_array['fields_name_value_array'];
		$diff_array = array_diff($column_names_array,$to_array);
		//print_r($to_array);print_r($diff_array);exit('exit527');
		}
	
		public function browse_select_field_names_row_gen($model,$field_name_array) {
		//echo '<br>browse_select_field_names_row_gen';//exit("exit 99");
		$crlf = "\r\n";
		//$crlf = "";
		$strx = "<tr>". $crlf;
		$strx .= "<td>". "#"."</td>". $crlf;
		foreach($field_name_array as $name=>$value) {
			$strx .= "<td>" . $value . "</td>". $crlf;
		}
		$strx .= "</tr>". $crlf;

		return $strx;
	}
	
	
	public function modifiable_fields_array_gen($model,$array_in) {
		//echo 'modifiable_fields_array_gen';exit("exit");
		$arrx = array();
		foreach($array_in as $index=>$name) {
			$arrx[$name] = $name;
		}
		//print_r($arrx);exit("656");
		return $arrx;	
	}
	
			
		public function modifiable_fields_list_gen($model,$array_in) {
			$list = "";
			foreach($array_in as $index=>$name) {
				$list .= $name.",";
			}
			return $list;
		}
		
		public function return_name_null_array($field_names_array) {
			//print_r($field_names_array);var_dump($field_names_array);exit("1690");
			$array = array();
			foreach($field_names_array as $name=>$value) {
				$array[$name] = "";
				//$array[$name] = " ";
			}
			//print_r($array);exit("1698");
			return $array;
		}
		
		public function return_partial_array_from_array_and_list($array_in,$field_names_array) {
			//echo("<br><br>");
			//var_dump($field_names_array);
			//print_r($array_in);
			
			$array = array();
			foreach($field_names_array as $name=>$value) {
				if ($name <> $this->key_field_name){
					$array[$name] = $array_in[$name];
				}
			}
			//print_r($array);exit("1698");
			return $array;
		}
		
		public function stored_procedure_stuff() {
		//echo("stored_procedure_stuff");print_r(Input::all());exit("exit 1864");
		echo("stored_procedure_stuff");//print_r(Input::all());
	
		//	name_value_definition
		// *****
		// *****
		// ***** advanced_query_1
		// *****
		// *****
		// *************************
		// this code has to start in col 1?	
		$sql = <<<SQL
DROP PROCEDURE IF EXISTS sp_advanced_query_hhp;
CREATE PROCEDURE sp_advanced_query_hhp()
BEGIN
SELECT * from  miscThings
WHERE table_name ='miscThings'
AND
			record_type='name_value_definition'
ORDER BY id DESC
;
END
SQL;
			DB::connection()->getPdo()->exec($sql);
		//$result = DB::select('call getLibraryList(?)',array($email));
			/*
			 // *****
			// *****
			// ***** advanced_query_0
			// *****
			// *****
		
			$sql = <<<SQL
			DROP PROCEDURE IF EXISTS sp_advanced_query_0;
			CREATE PROCEDURE sp_advanced_query_0(
					IN _table_name VARCHAR(32),
					IN _record_type VARCHAR(32)
			)
			DB::connection()->getPdo()->exec($sql);
			// *****
			// *****
			// ***** advanced_query_0
			// *****
			// *****
			
			$sql = <<<SQL
			DROP PROCEDURE IF EXISTS sp_advanced_query_0;
			CREATE PROCEDURE sp_advanced_query_0(
					IN _table_name VARCHAR(32),
					IN _record_type VARCHAR(32)
			)
			SQL;
			DB::connection()->getPdo()->exec($sql);
			// *****
			// *****
			// ***** this_works
			// *****
			// *****
			$sql = <<<SQL
			DROP PROCEDURE IF EXISTS sp_advanced_query_this_works;
			CREATE PROCEDURE sp_advanced_query_this_works(
					IN _record_type VARCHAR(32)
			)
			SQL;
			DB::connection()->getPdo()->exec($sql);
			// *****
			$sql = <<<SQL
			DROP PROCEDURE IF EXISTS sp_hhp_tag;
			DROP PROCEDURE IF EXISTS sp_hhp_tag1;
			CREATE PROCEDURE sp_hhp_tag1(IN _name VARCHAR(32))
			BEGIN
			INSERT INTO `tags`(`name`) VALUES(_name);
			END
			SQL;
			DB::connection()->getPdo()->exec($sql);
		
		
			$sql = <<<SQL
			DROP PROCEDURE IF EXISTS sp_advanced_query_old;
			CREATE PROCEDURE sp_advanced_query_old(
					IN _n0 VARCHAR(32)
					IN _v0 VARCHAR(32)
					IN _n1 VARCHAR(32)
					IN _v1 VARCHAR(32)
			)
			BEGIN
			SELECT *
			FROM 'miscThings'
			where(`_n0`='_v0')
			AND(`_n1`='_v1')
			orderBy('field_name')
			END
			SQL;
			DB::connection()->getPdo()->exec($sql);
			
*/
		
		}
			

	public function test_json_encode() {
		//echo 'test_json_encode';exit("exit 99");
		$array = array('aaa','bbbb','cccc','dddd');
		//echo 'before single quote';print_r($array);
		$j0 = json_encode($array);
		echo 'a single quote';print_r($j0);
		
		$array = array("aaa","bbbb","cccc","dddd");
		//echo '<br>before double quote';print_r($array);
		$j0 = json_encode($array);
		echo '<br>after double quote';print_r($j0);
		//exit("exit 1750");
		$s1 = 'v:["0","1","1","0"]';
		//"/[^a-zA-Z0-9 ']/"
		//print_r($s1);
		echo"xxxxxxxx<br>";
		print_r ( preg_replace('/[^0-9,\]\[]/', '', $s1));
		
		$array = array(
				'aaa'=>'aaa',
				'bbb'=>'bbb',
				'ccc'=>'ccc',
				'ddd'=>'ddd',);
		
		$s1 = 'v:["0","1","1","0"]';
		//"/[^a-zA-Z0-9 ']/"
		//print_r($s1);
		echo"xxxxxxxx<br>";
		print_r ( preg_replace('/[^0-9,\]\[]/', '', $s1));
		
		//$nn = preg_replace("/([^0-9\/+]+)/", "", $string );
		//print_r (preg_replace('/[^a-zA-Z0-9 ",/]','', $s1));
		
		//$integerIDs = array_map('intval', explode(',', $string));
		
		
	//$integerIDs = array_map( 'intval', array_filter( explode(',', $string), 'is_numeric' ) );	
		
		//print_r($array);
		echo"xxxxxxxxxxxxxxx<br>";
		$array2 = json_encode($array);echo"<br>";
		print_r($array2);echo"<br>";
		$array3 = json_decode($array2);echo"<br>";
		print_r($array3);echo"<br>";
		print_r($array3->bbb);
		$array4 = (array) $array3;
		print_r($array4['ccc']);
		//print_r(json_encode($array));echo"<br>";
		$array = array();
		$array[] = 0;
		$array[] = 1;
		$array[] = 1;
		$array[] = 0;
		echo"<br>array:";print_r($array);echo"<br>";
		$array1 = json_encode($array);
		echo"<br>json_encode:";print_r(json_encode($array));
		echo"<br>array1";print_r($array1);
		//		print_r($array);echo"<br>";
		exit('exit test_json_encode 1727');
	}

	/* *********************************************
	 * *********************************************
	 * copied from newMiscThingsController 4/15/15
	 * *******************************************
	 * *******************************************
	 * 
	 */
	public function select_fields_for_list($edit4_return_option) {
		echo 'select_fields_for_list<br>';print_r($_REQUEST);echo "edit4_return_option:".$edit4_return_option;//exit('exit');
	
		$x = $this->node_name.".select_fields";
		return View::make($x)
		->with(Input::all())
		->with('generated_snippets_array',$this->generated_snippets_array)
		->with('edit4_option',$edit4_return_option)
		->with('encoded_column_names_array',json_encode($this->build_column_names_array($this->model_table)));
	}
	
	
	
	
	public function build_report_snippets_array($key_field_name,$key_field_value) {
		//echo("<br><br>build_report_snippets_array");//print_r(Input::all());
		//exit(" exit 91");
		//$field_name_array = (array) json_decode(Input::get('encoded_field_name_array'));
		//unset($field_name_array[$key_field_name]);
		//$field_name_array = $field_name_array;
	$report_snippets_array = array();
		$response = DB::connection($this->db_snippet_connection)->table($this->snippet_table)
		->where($this->snippet_table_key_field_name, '=', $key_field_value)
		->get();
		if ($response){
		//echo($this->db_snippet_connection.$this->snippet_table.$this->snippet_table_key_field_name.$key_field_value)	;		$this->debug_exit(__FILE__,__LINE__,1);

			//echo("<br><br>build_report_snippets_array 2161");
			$report_snippets_array 	= $this->decode_generated_snippets_by_report($response[0]);
			$report_snippets_array = $this->merge_table_snippets_into_array($report_snippets_array);
			$lookups_array = $report_snippets_array['lookup_name_value_array'];
		}
		//var_dump($report_snippets_array);$this->debug_exit(__FILE__,__LINE__,1);
		return $report_snippets_array;
	}


	
	public function one_time_rename_file_mask($table_name,$node_name,$view_files_prefix,$old_mask,$new_mask) {
		//echo ("one_time_rename_file_mask".$view_files_prefix);
		//var_dump(Input::all());
		//$this->debug_exit(__FILE__,__DIR__,10);

		$path_to_files = $view_files_prefix;
		if ($handle = opendir($path_to_files)) {
			//echo "Directory handle: $handle\n";
			/* This is the correct way to loop over the directory. */
			while (false !== ($file_name = readdir($handle))) {
				$i = stripos("x".$file_name,$old_mask); // haystack, needle
				if ($i >0) {
					$new_file_name = $view_files_prefix.str_ireplace($old_mask, $new_mask, $file_name);
					//echo $view_files_prefix.$file_name . " will be renamed to ". $new_file_name."<br>";
					if (rename($view_files_prefix.$file_name,$new_file_name)){
						echo $view_files_prefix.$file_name . " renamed to ". $new_file_name."<br>";
					}
				}
			}
			closedir($handle);
		}
	} // end one_time_rename_file_mask	


	public function clean_orphan_files($table_name,$node_name,$view_files_prefix) {
		//$this->clean_orphan_files($this->model_table,$this->app_path);
		//$field_name_array = (array) json_decode(Input::get('encoded_field_name_array'));
		//echo "xxxx".$view_files_prefix."xxxx".$node_name;exit('xit2001');
		$path_to_files = $view_files_prefix."/".$this->generated_files_folder;
		if ($handle = opendir($path_to_files)) {
			//echo "Directory handle: $handle\n";
			//echo "Entries:\n";
			$stra = "xxx";
			$active_report_ids = $this->get_active_reports_for_table();
			/* This is the correct way to loop over the directory. */
			while (false !== ($entry = readdir($handle))) {
				$i = strpos($entry,'_');
				if ($i >0) {
					$stra = substr($entry,0,$i);
					if (is_numeric($stra)){
						if (in_array($stra,$active_report_ids)){
							//echo $entry . " will not be deleted"."<br>";
						}
						else {
							echo $path_to_files."/".$entry . " will be deleted"."<br>";
							unlink($path_to_files."/".$entry);
						}
					}
				}
			}
			closedir($handle);
		}
	} // end clean_orphan_files
	
	
	public function convert_index_to_name_value($index_array,$name_value_array) {
		$array = array();
		//($name_value_array);
		//echo("<br><br>array 2088");print_r($index_array);
		//var_dump($name_value_array);
		//exit("2082");
		//unset ($index_array);
		$count_1 = count($name_value_array);
		echo count($index_array);
		
		foreach ($index_array as $index) {
			$snippet_table_key_field_name = $this->snippet_table_key_field_name;
			$array [$name_value_array[$index]] = $name_value_array[$index];
			//$array [] = $name_value_array[$index];
		}
		
		//echo("<br><br>array 2108");var_dump($array);exit("2108");
		return $array;
	}
	public function establish_reporting_for_table(
			$from_folder,
			$to_folder,
			$from_folder_prefix,
			$to_folder_prefix,
			$file_mask) {
	
		$sql = ('show tables');
		$tables = DB::select($sql);
		$current_database = Config::get('database.connections.mysql.database');
		$strx = "Tables_in_";
		$str = $strx.$current_database;
		$from_array = array();
		foreach ($tables as $table){
			//echo($table->$str."<br>");
			$from_array [$table->$str] = $table->$str;
		}
		//var_dump($from_array);
			
		//echo '$this->get_table_names_already_defined();';
		$to_array = array();
		$response0 = DB::connection($this->db_snippet_connection)->table($this->snippet_table)->distinct('table_name')->get(array('table_name'));
		foreach($response0 as $response){
			$to_array[$response->table_name] = $response->table_name;
		}
		$from_array = array_diff($from_array,$to_array);
		//var_dump($from_array);
			
		$node = "newNode";
		//echo '$this->get_route_model_snippet($model,$model_table);';
		$begin_string = "BEGIN_CLONED_STRING";
		$end_string = "END_CLONED_STRING";
		$node_name = 'new_node';
		$controller_name = 'new_node_Controller';
		$full_dsn_path = $this->routes_path."/routes.php";
		//$old_code = file_get_contents($full_dsn_path);
		$old_code =  File::get($full_dsn_path);
		//print_r($old_code);
		//echo("*".$begin_string."*");
		//echo("*".$end_string."*");
		$sb = stripos($old_code,$begin_string);
		$se = stripos($old_code,$end_string);
		$s0=$s1=$s2=0;
		if (($sb>0)&&($se>$sb)){
			$s0=substr($old_code,0,$sb);
			$s1 = "//".substr($old_code,$sb,$se-$sb);
			$s2 = substr($old_code,$se);
			$s1 = str_ireplace("miscThings", $node_name, $s1);
			$s1 = str_ireplace("nclude
					", $controller_name, $s1);
			// we're using a 'live controller as the model
			$new_code = $old_code.$s1;
		}
		$backup_dsn_path = $this->routes_path."/routes.php.backup";
		File::put($backup_dsn_path, $old_code);
		File::put($full_dsn_path, $new_code);
		//exit('3040 exit');
		echo('$this->get_mvc_model_snippets();');
		$model = "NewModel";
		$model_table = "newModels";
			
		// use an input form to load the controller and the views
			
		//echo '$this->get_route_model_snippet($model,$model_table);';
		$full_dsn_path = app_path()."/Models/MiscThing.php";
		//$new_code = file_get_contents($full_dsn_path);
		$new_code =  File::get($full_dsn_path);
		print_r($new_code);
		//echo($new_code.$full_dsn_path);
		$new_code = str_replace("miscThings", $model_table, $new_code);
		$new_code = str_replace("MiscThing", ucfirst($model), $new_code);
	
	
		var_dump($new_code);
		exit('3040 exit');
	}	
	public function get_active_reports_for_table() {
	$array = array();
	$response = DB::connection($this->db_snippet_connection)->table($this->snippet_table)
	->where('record_type','=','report_definition')
	->where('table_name','=',$this->model_table)
	->get(array($this->snippet_table_key_field_name));
	if ($response){
		foreach ($response as $record) {
			$snippet_table_key_field_name = $this->snippet_table_key_field_name;
			$array [] = $record->$snippet_table_key_field_name;
		}
	}
	//echo("<br><br>array 98");var_dump($array);exit("98");
	return $array;
	}

   public function get_db_connection_data($connection,$table) {
        echo ("get_db_connection_data ".$connection.$table);$this->debug_exit(__FILE__,__LINE__,1);
  
        $queryx = DB::connection($connection)->table($table)
        ->where('db_connection_name','=',$connection)
        ->where('record_type','=','database_connection')
        ->get();
 //return $queryx;
        $this->db_connection_name              = $queryx[0]->db_connection_name;
        $this->db_snippet_connection           = $queryx[0]->db_snippet_connection;
        $this->n               = $queryx[0]->db_data_connection;
        $this->model                           = $queryx[0]->model;
        $this->model_table                     = $queryx[0]->model_table;
        $this->snippet_table                   = $queryx[0]->snippet_table;
        $this->node_name                       = $queryx[0]->node_name ;
        $this->backup_node                     = $queryx[0]->backup_node;
        $this->generated_files_folder          = $queryx[0]->generated_files_folder;
        $this->key_field_name                  = $queryx[0]->key_field_name;
        $this->bypassed_field_name             = $queryx[0]->bypassed_field_name;     
        //$this->no_of_blank_entries             = $queryx[0]->no_of_blank_entries;   
         echo($this->db_snippet_connection. $this->db_data_connection );var_dump($queryx);$this->debug_exit(__FILE__,__LINE__,0);
         return $queryx;

  
    }


	
	public function getAdd() {
		//print_r(Input::all());
		//	{{ Form::hidden('coming_from','edit1_define_new_report) }}
		$this->make_sure_table_snippet_exists($this->model_table);
		$record_table_name = $this->model_table;
		$lookups = $this->merge_lookups_into_single_array($record_table_name,$this->model_table);
		$coming_from = Input::get('coming_from');
		//echo($coming_from);exit('x70');
		switch ($coming_from) {
		case "edit1_define_new_report":
			//echo(Input::get('coming_from'));
			$field_name_array 					= array();
			$field_name_array['report_name'] 	= 'report_name';
			$field_name_array['table_name']		= 'table_name';
			$field_name_array['record_type']	= 'record_type';
			$encoded_field_name_array			= json_encode($field_name_array);
			json_decode(Input::get('encoded_field_name_array'),1);
			$record = array();
			$record = $this->return_name_null_array($field_name_array);
			return View::make($this->node_name . ".add")
			//->with('report_key'						,$report_key)
			->with('coming_from'					,$coming_from)
			->with('table_name'						,$this->model_table)
			->with('node_name'						,$this->node_name)
			->with('generated_files_folder'			,Input::get('generated_files_folder'))
			//->with('encoded_lookups'				,json_encode($lookups))
			//->with('encoded_field_name_array'		,json_encode($field_name_array))
			->with('encoded_record'					,json_encode($record))
			;
			break;
		case "edit2_add_new_record":
			//echo('get add 77 '.Input::get('coming_from'));
			$field_name_array = json_decode(Input::get('encoded_field_name_array'),1);
			unset($field_name_array[$this->snippet_table_key_field_name]);
			$report_key = Input::get('report_key');
			//echo($report_key);exit('x90');

			$old_name_new_name_array = $this->diff_arrays($lookups,$field_name_array);
			$encoded_old_name_new_name_array = json_encode($old_name_new_name_array);
			// *****
			// old_name_new_name IS the field_names_with_lookup_array
			// *****
			$record = $this->return_name_null_array($field_name_array);
			//echo('<br>$record<br>');var_dump($record);exit('1');

			break;
		case "merge_lookups_into_single_array":
			//echo(Input::get('coming_from'));
			//exit("getAdd exit 87");

			//$record = array();
			break;
		default:
			//echo(Input::get('coming_from'));
			//$record = array();
			//$record = $this->return_name_null_array($field_name_array);
			break;
		}
		$coming_from = Input::get('coming_from');
		switch ($coming_from) {
		case "merge_lookups_into_single_array":
			echo('<br>101'.Input::get('coming_from'));
			//exit("getAdd exit 87");
			break;
		case "edit2_add_new_record":
			//echo('2nd switch '.Input::get('coming_from'));
			//print_r($record);exit("getAdd exit 107");
			//exit("getAdd exit 104");
			//print_r(Input::all());exit("getAdd exit 107");
			//print_r(Input::all());exit("getAdd exit 107");
	
			//print_r($coming_from);
			//print_r($this->get_generated_snippets_by_report_key(Input::get('report_key')));
			//print_r(json_decode($this->get_generated_snippets_by_report_key(Input::get('report_key'))['business_rules']));exit("xit 118");
			//print_r(x);
			$show=0;
			if ($show){
				//$this->showAddVariables('exit');
				$this->showAddVariables('');
			}
		return View::make($this->node_name . ".add")
			->with('report_key'						,$report_key)
			->with('coming_from'					,$coming_from)
			->with('table_name'						,$this->model_table)
			->with('node_name'						,$this->node_name)
			->with('snippet_table'					,$this->snippet_table)
			->with('snippet_table_key_field_name'	,$this->snippet_table_key_field_name)
			->with('encoded_lookups'				,json_encode($lookups))
			->with('encoded_field_name_array'		,json_encode($field_name_array))
			->with('encoded_record'					,json_encode($record))
			->with('encoded_old_name_new_name_array',json_encode($old_name_new_name_array))
			->with('encoded_generated_snippets_array',json_encode($this->get_generated_snippets_by_report_key(Input::get('report_key'))))
			;
			// encoded stuff input to post create
			break;
		default:
			//echo('<br>121'.Input::get('coming_from').'<br>121');
			//exit("getAdd exit 87");
			break;
		}
	}

	
	public function getEdit() {
		/*
		everybody pass the data and the field list??
		2014-11-01 advanced_query is considerably different than other edits so we
		moved the switch to the top (we've already got the record we're editting)
		*/
		//var_dump(Input::all());
		//print_r($use_table_in_record.Input::all());
		//echo('getEdit ');$this->debug_exit(__FILE__,__LINE__,0);
		//echo("<br><br>getEdit start82".$this->model_table.$this->snippet_table_key_field_name."*");print_r(Input::all());
		//exit("getEdit exit 2826");
		switch (Input::get('coming_from')) {
		case "advanced_query":
		case "business_rules":
			$this->debug_exit(__FILE__,__LINE__,1);

			$this->putEdit5(Input::all());
			break;
		}
		$key_field_value = Input::get('key_field_value');
		$field_name_array = (array) json_decode(Input::get('encoded_field_name_array',1));
		//echo("<br><br>getEdit start172");var_dump($field_name_array);exit("getEdit exit 172");
		unset($field_name_array[$this->snippet_table_key_field_name]);
		$field_name_array = $field_name_array;

		//echo("<br><br>getEdit start82"."*".$this->snippet_table."*".$this->model_table."*".$this->snippet_table_key_field_name."*");print_r(Input::all());//exit("getEdit exit 244");
		$response = DB::connection($this->db_snippet_connection)->table($this->snippet_table)
		->where($this->snippet_table_key_field_name, '=', Input::get('report_key'))
		->get();
		if ($response){
			$report_snippets_array 	= $this->decode_generated_snippets_by_report($response[0]);
			$report_snippets_array = $this->merge_table_snippets_into_array($report_snippets_array);
			//$lookups_array = $report_snippets_array['lookup_name_value_array'] ;
			$record_table_name = $this->model_table;
			$lookups_array = $this->merge_lookups_into_single_array($record_table_name,$this->model_table);
			//echo ('2851 ');//var_dump($report_snippets_array);var_dump($response[0]);
			var_dump(Input::all());$this->debug_exit(__FILE__,__DIR__,0);
			
			$report_snippets_array['modifiable_fields_list'] = $response[0]->modifiable_fields_list;
			//print_r($lookups_array);echo(Input::get('coming_from'));exit('exit MT177 ');
			//print_r($response[0]->modifiable_fields_list);
			//exit('exit MT177 ');  

			switch (Input::get('coming_from')) {
			case "edit2_edit_button":
				var_dump($field_name_array);var_dump(Input::all());$this->debug_exit(__FILE__,__DIR__,1);
			case "edit1":
				//$field_name_array = (array) $field_name_array;
				$field_name_array =  json_decode(Input::get('field_name_array'));
				var_dump($field_name_array);var_dump(Input::all());$this->debug_exit(__FILE__,__DIR__,1);
				unset($field_name_array[$this->snippet_table_key_field_name]);
				//$lookups_array = $report_snippets_array['lookup_name_value_array'];
				$encoded_field_name_array = Input::get('encoded_field_name_array');
				$encoded_required_fields_required_array = $report_snippets_array['required_fields_required_array'];
				$response = DB::connection($this->db_snippet_connection)->table($this->snippet_table)
					->where($this->snippet_table_key_field_name, '=', Input::get('key_field_value'))->get($encoded_field_name_array);
				if ($response){
					exit('exit MT177 ');

					return View::make($this->node_name.'.edit')
					->with('report_snippets_array',$report_snippets_array)
					->with('lookups', $lookups_array)
					->with('snippet_table_key_field_name', $this->snippet_table_key_field_name)
					->with('model_table', $this->model_table)
					->with('node_name', $this->node_name)
					->with('snippet_table', $this->snippet_table)
					->with('update_table', $this->snippet_table)
					->with('encoded_field_name_array', $encoded_field_name_array)
					->with('field_name_array', $field_name_array)
					->with('encoded_required_fields_required_array', $encoded_required_fields_required_array)
					->with('record',$response[0])
					;
				}
				else {
					exit ("core arrays have not been built yet");
				}
				break;
			case "edit2":
				$this->debug_exit(__FILE__,__LINE__,0);

			//case "edit2_klone_edit":
				//exit("<br><br>xit getEdit edit2");
				//print_r(Input::all());exit("getEdit2 exit 2218");
				
				$record_table_name = Input::get('record_table_name');
				
				//print_r("<br>coming_from: ".Input::get('coming_from'));//exit('exit 139 ');
				$lookups = $this->merge_lookups_into_single_array($record_table_name,$record_table_name);
				//$lookups = $this->merge_lookups_into_single_array($record_table_name,$this->model_table);
				//echo ("<br>lookups: <br>");print_r($lookups);//exit('exit 2239 ');

				//echo ("<br>report_snippets_array: <br>");print_r($report_snippets_array);
				//exit('exit 2239 ');
				//print_r(Input::get('coming_from'));
				//var_dump($lookups);exit('exit 139 ');
				
				//$this->print_array_indexes($lookups);exit("exit 141");
				//$field_name_array = json_decode($encoded_field_name_array,1);
				$field_name_array = $report_snippets_array['modifiable_fields_array'];
				unset($field_name_array[$this->snippet_table_key_field_name]);
				$encoded_field_name_array = (string) json_encode($field_name_array);
				$encoded_required_fields_required_array = $report_snippets_array['required_fields_required_array'];
				//echo"xxx";print_r(Input::get('coming_from'));//exit('exit 154 ');
				$response = DB::connection($this->db_data_connection)->table($this->model_table)
					->where($this->key_field_name, '=', Input::get('key_field_value'))->get();
				if ($response){
					//echo(" 2270 ".'<br>$field_name_array<br>');print_r($field_name_array);print_r($response[0]);
					exit('exit 155 ');
					return View::make($this->node_name.'.edit')
					->with('report_snippets_array',$report_snippets_array)
					->with('lookups', $lookups)
					->with('model_table', $this->model_table)
					->with('snippet_table', $this->snippet_table)
					->with('update_table', $this->model_table)
					->with('generated_files_folder', $this->generated_files_folder)
					->with('node_name', $this->node_name)
					->with('encoded_field_name_array', $encoded_field_name_array)
					->with('field_name_array', $field_name_array)
					->with('encoded_required_fields_required_array', $encoded_required_fields_required_array)
					->with('record',(array) $response[0]);
				}
				return redirect('admin/'.$this->node_name.'/edit1')
					->with('message', 'record not found');
				break;
			case "edit2_klone_edit":
				// get the record you're cloning
				//echo('edit2_klone_edit');print_r($report_snippets_array);exit('exit 146 ');
				$field_name_array = $report_snippets_array['modifiable_fields_array'];
				echo('getEdit.coming_from=edit2_klone_edit');//print_r(Input::all());
					
				//print_r($report_snippets_array['modifiable_fields_list']);
				//print_r($field_name_array);
				//exit('exit 2296 ');
				unset($field_name_array[$this->key_field_name]);
				$encoded_field_name_array = (string) json_encode($field_name_array);
				$response2 = DB::connection($this->db_data_connection)->table($this->model_table)
					->where($this->key_field_name, '=', Input::get('key_field_value'))->get();
				if ($response2){
					$array = array();
					foreach ($field_name_array as $name=>$value) {
						$array [$name] = $response2[0]->$value;
						//echo("<br><br>array 158".$name.' '.$array [$name]);
					}
				}
				//echo("<br><br>array 158");print_r($array);exit('167');
				$q = DB::connection($this->db_data_connection)->table($this->model_table)->insert($array);
				//echo("<br><br>klone created".$record_table_name);
				$lookups = $this->merge_lookups_into_single_array($record_table_name,$record_table_name);
				$encoded_required_fields_required_array = "";
				$key_field_value = (DB::connection($this->db_data_connection)->table($this->model_table)->max($this->key_field_name));
				//echo("<br><br>Input before flash ".print_r(Input::all())."<br> ");
				//Input::flash();
				Input::merge(array('key_field_value' => $key_field_value));
				echo("<br><br>klone created ".$record_table_name);
				//print_r($field_name_array.Input::all());
				//exit('exit 2316 ');
				//$key_field_value = (DB::connection($this->db_data_connection)->table($this->model_table)->max($this->key_field_name));
		$field_name_array = array();
		//$field_name_array["$this->snippet_table_key_field_name"] 	= $this->snippet_table_key_field_name;
		$field_name_array['report_name'] 						= 'report_name';
		$field_name_array[$this->snippet_table_key_field_name] 	= $this->snippet_table_key_field_name;
		// get all report records
		$db_result = DB::connection($this->db_snippet_connection)->table($this->snippet_table)
		->where('record_type','='	,'report_definition')
		->where('table_name','='	,$this->model_table)
		->where('node_name','='		,$this->node_name)
		->orderBy('report_name'		,'asc')
		//->take(6)
		->get($field_name_array);
		return View::make($this->node_name.'.edit1')
			->with('report_snippets_array'					,$report_snippets_array)
			->with('lookups'								, $lookups)
			->with('model_table'							, $this->model_table)
			->with('snippet_table'							, $this->snippet_table)
			->with('snippet_table_key_field_name'			, $this->snippet_table_key_field_name)
			->with('update_table'							, $this->model_table)
			->with('generated_snippets_array'				, $this->generated_snippets_array)
			->with('generated_files_folder'					, $this->generated_files_folder)
			->with('all_records'							, $db_result)
			->with('node_name'								, $this->node_name)
			->with('encoded_field_name_array'				, $encoded_field_name_array)
			->with('field_name_array'						, $field_name_array)
			->with('encoded_required_fields_required_array'	, $encoded_required_fields_required_array)
			//->with('record',(array) $response[0])
			->with('record',Input::all())
			->with('message', 'record Created');
				break;
			}	// end switch (Input::get('coming_from')
				//echo("<br><br>getEdit 182");
		}
	}
		public function getEdit1() {
		echo('getEdit1*');echo($this->snippet_table_key_field_name);$this->debug_exit(__FILE__,__LINE__,0);
		//var_dump($this->field_name_list_array);
//$this->field_name_list_array = (array) $this->initialize_field_name_list_array();
       //$this->field_name_list_array_first_index = $field_name_list_array_first_index;
		$field_name_array = array();
		//$field_name_array["$this->snippet_table_key_field_name"] 	= $this->snippet_table_key_field_name;
		$field_name_array['report_name'] 						= 'report_name';
		$field_name_array[$this->snippet_table_key_field_name] 	= $this->snippet_table_key_field_name;
		
		// get all report definitions
		$db_result = DB::connection($this->db_snippet_connection)->table($this->snippet_table)
		->where('record_type','='	,'report_definition')
		->where('table_name','='	,$this->model_table)
		->where('node_name','='		,$this->node_name)
		->orderBy('report_name'		,'asc')
		//->take(6)
		->get();
		//echo("node_name ".$this->node_name);var_dump($db_result);$this->debug_exit(__FILE__,__LINE__,1);

		$this->debug_exit(__FILE__,__LINE__,0);
		return View::make($this->node_name.'.edit1')
		//return View::make($this->node_name.'.edit1')
			->with('all_records'				,$db_result)
			->with('encoded_report_description'	,json_encode($db_result))
			->with('node_name'					,$this->node_name)
			->with('snippet_table_key_field_name',$this->snippet_table_key_field_name)
			->with('snippet_table'					,$this->snippet_table)
			;
		}
			
		public function Edit2defaultBrowse() {
			echo("Edit2defaultBrowse");$this->debug_exit(__FILE__,__LINE__,1);
			// this is the new browse
			//First get the report_record
		}	


		public function load_array_for_query_from_working_array($working_arrays) {
			$arr = array();
			foreach($working_arrays['ppv_define_query']['field_name_array'] as $name=>$array_name){
				$arr[] = $working_arrays['ppv_define_query'][$array_name]; 
			}	
			return $arr;		
		}	


		public function simple_snippet_connection_query_by_key($key_field_value,$type) {
			//echo("getEdit2".$key_field_value);
			echo($this->key_field_name);$this->debug_exit(__FILE__,__LINE__,1);
			if ($db_result = DB::connection($this->db_data_connection)->table($this->model_table)
			->where($this->key_field_name ,'=',$key_field_value)
			->get()) {
				switch ($type) {
					case 'obj':
						return $db_result;
						break;
					case 'array':
						return $db_result = json_decode(json_encode($dbresult),1);
						break;
					default:
						return $db_result;
						break;
				}
			}
			else{
				$this->debug_exit(__FILE__,__LINE__,1);
			}

		}	



		public function simple_data_connection_query_by_key($key_field_value,$type) {
			//echo("simple_data_connection_query_by_key *".$key_field_value."*".$type."*");
			//echo($this->key_field_name);$this->debug_exit(__FILE__,__LINE__,1);
			if ($db_result = DB::connection($this->db_data_connection)->table($this->model_table)
			->where($this->key_field_name ,'=',$key_field_value)
			->get()) {
				switch ($type) {
					case 'obj':
						return $db_result;
						break;
					case 'array':
						return $db_result = json_decode(json_encode($db_result),1);
						break;
					default:
						return $db_result;
						break;
				}
			}
			else{
				echo($this->db_data_connection." * ".$this->model_table." * ".$this->key_field_name." * ".$key_field_value);
				$this->debug_exit(__FILE__,__LINE__,1);
			}

		}	
		public function decode_object_field_to_array($obj,$field_name) {
			//echo("decode_object_field_to_array".$obj->$field_name);var_dump($obj);$this->debug_exit(__FILE__,__LINE__,0);
			$x = json_decode($obj->$field_name,1);
			if (is_array($x)){
				return $x;
			}
			return null;
		}	


		public function tst0($Input) {
			$Inputo = (object) $Input;
			$a = 'encoded_modifiable_fields_array';
			//echo("tst0");var_dump($Input);$this->debug_exit(__FILE__,__LINE__,1);
			$modifiable_fields_array = $this->decode_object_field_to_array($Inputo,$a);
			//echo("tst0");var_dump($modifiable_fields_array);var_dump($Input);echo("tst0");
			$b = array_intersect_key($Input, $modifiable_fields_array);
			//var_dump($b);

			//$this->debug_exit(__FILE__,__LINE__,1);
		}	

	public function refresh_data_record_if_adding($what_we_are_doing,$data,$modifiable_fields_array) {
		//var_dump($what_we_are_doing);$this->debug_exit(__FILE__,__LINE__,1);
		switch ($what_we_are_doing) { 
			case "adding_a_data_record":
			case "edit2_default_add":
				$db_result = array();
				foreach ($modifiable_fields_array as $name=> $value) {
					$db_result[0][$value] = "";
				}
				break;
			case "editing_a_data_record":
			case "edit2_default_edit":
			case "edit2new":
				$key_value = Input::get('data_key');
				$db_result = $this->simple_data_connection_query_by_key($key_value,'array');
				break;
			}
			//var_dump($db_result);$this->debug_exit(__FILE__,__LINE__,1);
			return $db_result;
	}



	public function Edit2new() {
		echo("Edit2new");var_dump(Input::all());$this->debug_exit(__FILE__,__LINE__,0);
	}




	public function putEdit2new() {
		echo("putEdit2new");$this->debug_exit(__FILE__,__LINE__,0);
		//var_dump(Input::all());
		if (!empty(Input::get('what_we_are_doing'))) {
			$what_we_are_doing = Input::get('what_we_are_doing');	
			echo($what_we_are_doing);
			switch ($what_we_are_doing) { 
				
			case "edit2_default_update":
				//var_dump(Input::all());
				//$this->debug_exit(__FILE__,__LINE__,1);
				$business_rules_array = 
				$this->business_rules_ppv_build_them(
					$this->build_business_rules_relational_operators(),
					json_decode(Input::get('encoded_business_rules_field_name_array'),1),
					json_decode(Input::get('encoded_business_rules_r_o_array'),1),
					json_decode(Input::get('encoded_business_rules_value_array'),1));
var_dump(Input::all());$this->debug_exit(__FILE__,__LINE__,1);
				$validator = Validator::make(Input::all(), $business_rules_array); //update
				if ( $validator->fails() ) {
					$errors = $validator->messages();
					//$this->debug_exit(__FILE__,__LINE__,1);
					//return redirect()->back(); 
					//return redirect('public/admin/'.$this->node_name.'/edit2new')
					return View::make($this->node_name.'/edit2new')
						//->with('passed_to_view_array'	,$passed_to_view_array);			

					//->withErrors($errors)
					->withInput();
					  //return $validator->errors()->all();
					//return back()->withErrors($errors)->withInput();
				}
				
				var_dump(Input::all());$this->debug_exit(__FILE__,__LINE__,1);
				$a = 'encoded_modifiable_fields_array';
				$Inputo = json_decode(json_encode(Input::all()),0);
				$modifiable_fields_array = $this->decode_object_field_to_array($Inputo,$a);
				$modifiable_fields_name_values = array_intersect_key(Input::all(), $modifiable_fields_array);
				//var_dump($b);
				//var_dump(Input::all());$this->debug_exit(__FILE__,__LINE__,1);
				switch (Input::get('coming_from')) {
					
					case "edit2_browse_add_button":
						$updatex  = DB::connection($this->db_data_connection)->table($this->model_table)
							->insert($modifiable_fields_name_values);
						break;
					case "edit2_edit_button":
						$updatex  = DB::connection($this->db_data_connection)->table($this->model_table)
							->where($this->key_field_name, 	'=', Input::get('data_key'))
							->update($modifiable_fields_name_values);
						break;
				}


				return redirect('admin/'.$this->node_name.'/edit1')
				->with('message', 'record updated')
				->with('message', 'validation has been bypassed');
				break;
				case "edit2_default_add":
				case "edit2new":
					//This should be just like edit except blank data array?
				case "edit2_default_edit":

					//var_dump(Input::all()); $this->debug_exit(__FILE__,__LINE__,1);

				case "editing_a_data_record":
					//var_dump(Input::all()); $this->debug_exit(__FILE__,__LINE__,1);
					$report_definition 	= $this->execute_query_by_report_no(Input::get('report_key'));
					$modifiable_fields_array = $this->decode_object_field_to_array($report_definition[0],'modifiable_fields_array');

					//$arrr0 = $this->gen_lookup_name_value_array_data($this->model_table);
					$lookups_array['field_name'] = $this->build_column_names_array($this->model_table);

					//var_dump($lookups_array); $this->debug_exit(__FILE__,__LINE__,0);

					$xxx_array = $this->gen_lookup_name_value_array_datax($this->model_table);
					//$lookups_array = $this->gen_lookup_name_value_array_datax('shows');
					$lookups_array = array_merge($lookups_array,$xxx_array);
					//var_dump(Input::all());var_dump($lookups_array); $this->debug_exit(__FILE__,__LINE__,1);
					//$data = $db_result[0];
					$data = "";
					$db_result  = $this->refresh_data_record_if_adding($what_we_are_doing,$data,$modifiable_fields_array); 

					//var_dump($modifiable_fields_array);
					//var_dump($lookups_array);
					//var_dump($db_result);$this->debug_exit(__FILE__,__LINE__,01);

					$snippet_string = $this->modifiable_fields_view_snippet_str_gen($modifiable_fields_array,
						$lookups_array,$db_result[0]);

					$fnam = $this->view_files_prefix."/".$this->generated_files_folder."/".Input::get('report_key').'_snippet_string.blade.php';
					$this->add_delete_add_file_as_string($fnam,$this->modifiable_fields_view_snippet_str_gen($modifiable_fields_array,
						$lookups_array,$db_result[0]));

				//case "adding_a_data_record":)

					$strx		= json_encode($db_result);
					//$db_result = json_encode($db_result);
					//$db_result = json_decode($db_result,1);
					//echo "<br><br>".$snippet_string;$this->debug_exit(__FILE__,__LINE__,1);
					//var_dump($snippet_string);var_dump($db_result); $this->debug_exit(__FILE__,__LINE__,1);
					
					$passed_to_view_array = array();
					//$passed_to_view_array['input'] = 'x';
					//$passed_to_view_array['input'] 				= Input::all();
					$passed_to_view_array['encoded_modifiable_fields_array'] = json_encode($modifiable_fields_array);
					$passed_to_view_arra2newy['data_key'] 						= Input::get('data_key');
					$passed_to_view_array['encoded_input'] 					= Input::get('encoded_input');
					$passed_to_view_array['snippet_name'] 					='_modifiable_fields_getEdit_snippet';
					$passed_to_view_array['report_definition']				= $report_definition[0];
					$passed_to_view_array['record'] 						= $db_result[0];
					$passed_to_view_array['encoded_report_definition'] 		= json_encode($report_definition[0]);		
					$passed_to_view_array['snippet_string'] 				= $snippet_string;		
					$passed_to_view_array['lookups_array'] 					= $lookups_array;		
					echo("*".Input::get('coming_from')."*");$this->debug_exit(__FILE__,__LINE__,0);
					return View::make($this->node_name.'/edit2new')
						->with('passed_to_view_array'	,$passed_to_view_array);			
						break;				

					default:
						$this->debug_exit(__FILE__,__LINE__,1);
						break;
				}
		}	
	}


	public function getEdit2() {
		
		//echo(Input::get('what_we_are_doing'));
		echo("getEdit2<br>");//var_dump(Input::all());$this->debug_exit(__FILE__,__LINE__,0);

		// this is the new browse
		//First get the report_record
		if (!empty(Input::get('what_we_are_doing'))) {
			$what_we_are_doing = Input::get('what_we_are_doing');				
			switch ($what_we_are_doing) { 
				case "edit2_edit_button":
				case "editing_a_data_record":
					var_dump(Input::all()); $this->debug_exit(__FILE__,__LINE__,1);
					$report_definition 	= $this->execute_query_by_report_no(Input::get('report_key'));
					
					$modifiable_fields_array = $this->decode_object_field_to_array($report_definition,'modifiable_fields_array');
					$ppv_array_names 	= array('ppv_define_query','ppv_define_business_rules');
					$working_arrays 	= $this->working_arrays_construct($report_definition,$ppv_array_names,$what_we_are_doing);
					var_dump($report_definition);$this->debug_exit(__FILE__,__LINE__,10);
					$fieldName_r_o_value_array = $this->load_array_for_query_from_working_array($working_arrays);
					$query_relational_operators_array = $this->build_query_relational_operators_array();
					$key_value = Input::get('data_key');
					var_dump($key_value);var_dump(Input::all());$this->debug_exit(__FILE__,__LINE__,10);
					$db_result = $this->simple_snippet_connection_query_by_key($key_value,'obj');
					$strx		= json_encode($db_result);

					//$db_result = json_encode($db_result);
					//$db_result = json_decode($db_result,1);
					var_dump($db_result); $this->debug_exit(__FILE__,__LINE__,1);

					$passed_to_view_array = array();
					//$passed_to_view_array['input'] = 'x';
					//$passed_to_view_array['input'] 				= Input::all();
					$passed_to_view_array['encoded_input'] 		= Input::get('encoded_input');
					$passed_to_view_array['snippet_name'] 		='_modifiable_fields_getEdit_snippet';
					$passed_to_view_array['report_definition']	= $report_definition[0];
					$passed_to_view_array['record'] 		= json_decode($strx,1);
					$passed_to_view_array['encoded_report_definition'] = json_encode($report_definition[0]);		
					//$passed_to_view_array['key_field_name'] 	=$this->key_field_name;
					//$passed_to_view_array['all_records_obj'] 		= $db_result;
					//$passed_to_view_array['generated_files_folder'] 		= $this->generated_files_folder;

					return View::make($this->node_name.'/edit2new')
						->with('passed_to_view_array'	,$passed_to_view_array);			
						break;				

				case "edit2_build_default_browse":
					$report_definition 	= $this->execute_query_by_report_no(Input::get('report_key'));
					$ppv_array_names 	= array('ppv_define_query','ppv_define_business_rules');
					$working_arrays 	= $this->working_arrays_construct($report_definition,$ppv_array_names,$what_we_are_doing);
					//var_dump($report_definition);$this->debug_exit(__FILE__,__LINE__,10);
					$fieldName_r_o_value_array = $this->load_array_for_query_from_working_array($working_arrays);
					//var_dump($working_arrays); $this->debug_exit(__FILE__,__LINE__,1);
					$query_relational_operators_array = $this->build_query_relational_operators_array();

					$db_result = $this->build_and_execute_query($fieldName_r_o_value_array,$this->bypassed_field_name,$query_relational_operators_array);
					//$db_result = json_encode($db_result);
					//$db_result = json_decode($db_result,1);
					//var_dump($report_definition[0]->modifiable_fields_array); var_dump($db_result); $this->debug_exit(__FILE__,__LINE__,1);
					$laravel_snippets_array = $this->browse_select_blade_gen(
						$this->model,
						json_decode($report_definition[0]->modifiable_fields_array,1),
						'version4');
					//var_dump($browse_select_loop_str); $this->debug_exit(__FILE__,__LINE__,1);
					$passed_to_view_array = array();
					//$passed_to_view_array['input'] = 'x';
					$passed_to_view_array['input'] 				= Input::all();
					$passed_to_view_array['encoded_input'] 		= json_encode(Input::all());
					$passed_to_view_array['snippet_name'] 		='_browse_select_display_snippet';
					$passed_to_view_array['report_definition']	= $report_definition[0];
					$passed_to_view_array['encoded_report_definition'] =json_encode($report_definition[0]);				
					$passed_to_view_array['key_field_name'] 	= $this->key_field_name;
					$passed_to_view_array['all_records_obj'] 	= $db_result;
					$strx										= json_encode($db_result);
					//$passed_to_view_array['browse_select_loop_str'] 		= $browse_select_loop_str;
					$passed_to_view_array['all_records'] 		= json_decode($strx,1);
					$passed_to_view_array['field_names_array'] 	= $working_arrays['maintain_browse_fields']['browse_select_array'];
					/* 
    array (size=3)
      'field_name_array' => 
        array (size=1)
          'field_name' => string 'browse_select_array' (length=19)
      'browse_select_array' => 
        array (size=7)
          'id' => string 'id' (length=2)
          'table_name' => string 'table_name' (length=10)
          'field_name' => string 'field_name' (length=10)
          'name' => string 'name' (length=4)
          'value' => string 'value' (length=5)
          'record_type' => string 'record_type' (length=11)
          'controller_name' => string 'controller_name' (length=15)
	*/





					$passed_to_view_array['generated_files_folder'] = $this->generated_files_folder;
					$passed_to_view_array['encoded_business_rules_field_name_array'] = $report_definition[0]->business_rules_field_name_array;
					$passed_to_view_array['encoded_business_rules_r_o_array'] = $report_definition[0]->business_rules_r_o_array;
					$passed_to_view_array['encoded_business_rules_value_array'] = $report_definition[0]->business_rules_value_array;
					//var_dump($passed_to_view_array['all_records']); $this->debug_exit(__FILE__,__LINE__,1);
					//var_dump($laravel_snippets_array); $this->debug_exit(__FILE__,__LINE__,1);
					$passed_to_view_array['snippets_array'] = $laravel_snippets_array;

					return View::make($this->node_name.'.edit2_default_browse')
						->with('passed_to_view_array'	,$passed_to_view_array);	

						break;
					default:
						echo("what_we_are_doing<br>".$what_we_are_doing);
						var_dump(Input::all());$this->						echo("*".Input::get('coming_from')."*");$this->debug_exit(__FILE__,__LINE__,1);
						break;
				}
		}
	}


		public function getEdit2nuold() {
			
			//echo(Input::get('what_we_are_doing'));
			echo("getEdit2nuold");var_dump(Input::all());$this->debug_exit(__FILE__,__LINE__,0);
			// this is the new browse
			//First get the report_record
			if (!empty(Input::get('what_we_are_doing'))) {
				$what_we_are_doing = Input::get('what_we_are_doing');				
				switch ($what_we_are_doing) { 
					case "editing_a_data_record":
					case "edit_selected_record":
						//var_dump(Input::all());var_dump($report_definition[0]); 
						//var_dump($db_result); 
						//$this->debug_exit(__FILE__,__LINE__,1);
					break;
					case "edit2_build_default_browse":
						$report_definition 			= $this->execute_query_by_report_no(Input::get('report_key'));
						$ppv_array_names 	= array('ppv_define_query','ppv_define_business_rules');
						$working_arrays 	= $this->working_arrays_construct($report_definition,$ppv_array_names,$what_we_are_doing);
						$errors = array();
						$message = "";
						if ($report_definition){
							//var_dump($report_definition);echo(Input::get('report_key'));$this->debug_exit(__FILE__,__LINE__,1);
							if (is_null($report_definition[0]->browse_select_array) ){
								$errors['browse error1'] = 'must define browse-fields first (use key-edit button)';
								$message = $errors['browse error1'] ."<br>";
							}
							if (is_null($report_definition[0]->query_field_name_array) ){
								$errors['browse error2'] = 'must define query first (use key-edit button)';
								$message .= $errors['browse error2'];
							}
							if (count($errors)> 0){
								//exit('exit 2469');
								$field_name_array = array();
								$generated_snippets_array = array();
								//return View::to($this->node_name . "/edit1")
								return redirect('admin/'.$this->node_name.'/edit1')
									->with('snippet_table'					, $this->snippet_table)
									->with('model_table'					, $this->model_table)
									->with('node_name'						, $this->node_name)
									->with('generated_files_folder'			, $this->generated_files_folder)
									->with('field_name_array'				, $field_name_array)
									->with('snippet_table_key_field_name'	, $this->snippet_table_key_field_name)
									->with('message'						, $message)
									->withErrors($errors);
				 			}
				 		} // end of if report_definition
						break;
					default:
						echo("*".Input::get('coming_from')."*");$this->debug_exit(__FILE__,__LINE__,1);
						break;
				}

				/***********************
				$arr = array();
				foreach($working_arrays['ppv_define_query']['field_name_array'] as $name=>$array_name){
					$arr[] = $working_arrays['ppv_define_query'][$array_name]; 
				}			
				//var_dump($arr); $this->debug_exit(__FILE__,__LINE__,1);	
				$query_relational_operators_array = $this->build_query_relational_operators_array();
			 
				$db_result = $this->build_and_execute_query($arr,$this->bypassed_field_name,$query_relational_operators_array);
				$db_result = json_encode($db_result);
				$db_result = json_decode($db_result,1);
				**********************/
				//var_dump(Input::all());var_dump($report_definition[0]); var_dump($db_result); $this->debug_exit(__FILE__,__LINE__,1);
				return View::make($this->node_name.'.edit')
					->with('input'						,Input::all())
					->with('encoded_input'				,json_encode(Input::all()))
					//->with('all_records'				,$db_result)
					//->with('snippet_name'				,'_modifiable_fields_getEdit_snippet')
					->with('snippet_name'				,'_browse_select_display_snippet')
					->with('report_snippets_array'			,$report_definition[0])
					->with('encoded_report_definition'	,json_encode($report_definition[0]))				
					->with('key_field_name'				,$this->key_field_name)
					//->with('record_key'					,Input::get('record_key'))
					
					//->with('model_table'				,$this->model_table)
					;			
		}
	}

	public function getEdit2defaultBrowse() {
			//var_dump(Input::all());
			echo("getEdit2defaultBrowse");$this->debug_exit(__FILE__,__LINE__,1);
			// this is the new browse
			//First get the report_record
			if (!empty(Input::get('what_we_are_doing'))) {
				$what_we_are_doing = Input::get('what_we_are_doing');				
				switch ($what_we_are_doing) {
					case "edit2_build_default_browse":
						$report_definition 			= $this->execute_query_by_report_no(Input::get('report_key'));
						$ppv_array_names 	= array('ppv_define_query','ppv_define_business_rules');
						$working_arrays 	= $this->working_arrays_construct($report_definition,$ppv_array_names,$what_we_are_doing);
						$errors = array();
						$message = "";
						if ($report_definition){
							//var_dump($report_definition[0]);echo(Input::get('report_key').$key_field_value.$key_field_name);$this->debug_exit(__FILE__,__LINE__,1);
							if (is_null($report_definition[0]->browse_select_array) ){
								$errors['browse error1'] = 'must define browse-fields first (use key-edit button)';
								$message = $errors['browse error1'] ."<br>";
							}
							if (is_null($report_definition[0]->query_field_name_array) ){
								$errors['browse error2'] = 'must define query first (use key-edit button)';
								$message .= $errors['browse error2'];
							}
							if (count($errors)> 0){
								//exit('exit 2469');
								$field_name_array = array();
								$generated_snippets_array = array();
								//return View::to($this->node_name . "/edit1")
								return redirect('admin/'.$this->node_name.'/edit1')
									->with('snippet_table'					, $this->snippet_table)
									->with('model_table'					, $this->model_table)
									->with('node_name'						, $this->node_name)
									->with('generated_files_folder'			, $this->generated_files_folder)
									->with('field_name_array'				, $field_name_array)
									->with('snippet_table_key_field_name'	, $this->snippet_table_key_field_name)
									->with('message'						, $message)
									->withErrors($errors);
				 			}
				 		} // end of if report_definition
						break;
					default:
						echo("*".Input::get('coming_from')."*");$this->debug_exit(__FILE__,__LINE__,1);
						break;
				}
				$arr = array();
				foreach($working_arrays['ppv_define_query']['field_name_array'] as $name=>$array_name){
					$arr[] = $working_arrays['ppv_define_query'][$array_name]; 
				}			
				//var_dump($arr); $this->debug_exit(__FILE__,__LINE__,1);	
				$query_relational_operators_array = $this->build_query_relational_operators_array();
			 
				$db_result = $this->build_and_execute_query($arr,$this->bypassed_field_name,$query_relational_operators_array);
				$db_result = json_encode($db_result);
				$db_result = json_decode($db_result,1);
				//var_dump(Input::all());
				var_dump($report_definition[0]); 
				//var_dump($db_result); $this->debug_exit(__FILE__,__LINE__,1);
				return View::make($this->node_name.'.edit2_default_browse')
					->with('Input input'						,Input::all())
					->with('all_records'				,$db_result)
					->with('report_definition'			,$report_definition[0])
					
					//->with('record_key'					,Input::get('record_key'))
					//->with('model_table'				,$this->model_table)
					;			
		}
	}





		public function putEdit3() {
			//echo 'getEdit3';print_r(Input::all());exit("exit 39");
			return View::make('admin/'.$this->node_name.'.edit3')
			->with(Input::all());
		}


		public function working_arrays_construct($record,$ppv_array_names,$what_we_are_doing) {
			//echo("working_arrays_construct");
			$working_arrays 	= $this->working_arrays_build($record);
			$working_arrays 	= $this->working_arrays_populate($working_arrays,$record);
			$column_names 		= $this->build_column_names_array($this->model_table);
			$working_arrays 	= $this->working_arrays_populate_lookups($working_arrays,$column_names);
			//echo("working_arrays_construct");var_dump($working_arrays);$this->debug_exit(__FILE__,__LINE__,1);
			$working_arrays 	= $this->working_arrays_pad_rows_for_growth($ppv_array_names,$working_arrays);
			switch ($what_we_are_doing) {
				case "edit2_build_default_browse":
					//just need assignments from record
					//$this->debug_exit(__FILE__,__LINE__,0);var_dump($working_arrays);$this->debug_exit(__FILE__,__LINE__,1);
	
					break;
				default:
					//$column_names 		= $this->build_column_names_array($this->model_table);
					//$working_arrays 	= $this->working_arrays_populate_lookups($working_arrays,$column_names);
					//echo("working_arrays_construct");var_dump($working_arrays);$this->debug_exit(__FILE__,__LINE__,1);
					break;

			}
			return $working_arrays;
		}

		public function working_arrays_pad_rows_for_growth($ppv_array_names,$working_arrays) {
			
			foreach ($ppv_array_names as $what_we_are_doing){
				//var_dump($working_arrays );$this->debug_exit(__FILE__,__LINE__,0);
				$pop_or_fill = "f";
				$fill_ctr = $this->no_of_blank_entries;
				//echo(count($working_arrays[$what_we_are_doing]['field_name_array']));$this->debug_exit(__FILE__,__LINE__,01);
				foreach ($working_arrays[$what_we_are_doing]['field_name_array'] as $field_name=>$array_name){
					//each of these has the name of one of the arrays we're processing
	 				//$this->debug_exit(__FILE__,__LINE__,0);echo($field_name.'**'.'<br>'); //var_dump($array_name);
	 				if ($field_name == 'field_name'){
	 					//echo($array_name.' * this is a field_name*<br>');
	 					$pop_or_fill = "f";
	 					// this column decides the size of the arrays
		 				if (is_array($working_arrays[$what_we_are_doing][$array_name])){
		 					$arr = array_count_values($working_arrays[$what_we_are_doing][$array_name]);
		 					//$this->debug_exit(__FILE__,__LINE__,0);
		 					//echo('*&*'.count($working_arrays[$what_we_are_doing]['field_name_array']).'*&*'.'bypassed_field_name = '.$this->bypassed_field_name .'***');
		 					//$this->debug_exit(__FILE__,__LINE__,0);
		 					//var_dump($working_arrays[$what_we_are_doing][$array_name] );
		 					if (array_key_exists($this->bypassed_field_name, $arr)) {
		 						//echo('there are already bypassed entries in array'.$arr[$this->bypassed_field_name] .'***');
		 						if ($arr[$this->bypassed_field_name] > $this->no_of_blank_entries){ 
		 							// correcting an old error
		 							$pop_or_fill = "p";
		 							$pop_ctr = $arr[$this->bypassed_field_name] - $this->no_of_blank_entries -1;
		 							//echo ('pop ctr '.$pop_ctr);
		 						}
								if ($arr[$this->bypassed_field_name] < $this->no_of_blank_entries){ $pop_or_fill = "f";}
									$fill_ctr = $arr[$this->bypassed_field_name] - $this->no_of_blank_entries;
								}
						else{ 
							$fill_ctr = $this->no_of_blank_entries;
		 					//echo('there are no bypassed entries in array'.$this->no_of_blank_entries);
		 					$this->debug_exit(__FILE__,__LINE__,0);

							$pop_or_fill = "f";
							//$this->debug_exit(__FILE__,__LINE__,1);
						}
					}
				} // end of 'field_name' process
				if ($pop_or_fill == "p"){
					for ($i=0; $i<($pop_ctr); $i++){
						//echo($this->bypassed_field_name);var_dump($working_arrays[$what_we_are_doing][$array_name]);
						array_pop($working_arrays[$what_we_are_doing][$array_name]);
					}
				}
				if ($pop_or_fill == "f"){
					for ($i=0; $i<($fill_ctr); $i++){
						$working_arrays[$what_we_are_doing][$array_name][] = 'not_used';
					}
				}
			}
			//var_dump($working_arrays );$this->debug_exit(__FILE__,__LINE__,0);

			//var_dump($working_arrays[$what_we_are_doing]);$this->debug_exit(__FILE__,__LINE__,1);
			return $working_arrays;
		}
		}	

		public function working_arrays_build($record) {
			//echo("working_arrays_build");
			//var_dump($record);//exit("exit 39");
	       	$working_arrays = array();
	        //$working_arrays['maintain_modifiable_fields']['field_name']  	= 'modifiable_fields_array';
	        //$working_arrays['maintain_modifiable_fields'][]					= 'modifiable_fields_array';
	        $working_arrays
	        	['advanced_edit_functions']		= array(
	        	'maintain_modifiable_fields'	=> 'maintain_modifiable_fields',
	        	'maintain_browse_fields'		=> 'maintain_browse_fields',
	        	'ppv_define_query'				=> 'ppv_define_query',
	        	'advanced_menu_fields_list'		=> 'advanced_menu_fields_list',
	        	'ppv_define_business_rules'		=> 'ppv_define_business_rules'
	        	);
	        $working_arrays
	        	['advanced_menu_fields_list']['field_name_array']			= array(
	        	'report_name'		=> 'report_name'
	        	);

	        $working_arrays
	        	['maintain_modifiable_fields']['field_name_array']			= array(
	        	'field_name'		=> 'modifiable_fields_array'
	        	);

	        //$working_arrays['maintain_browse_fields']['field_name']   	= 'browse_select_array';
	        //$working_arrays['maintain_browse_fields'][]   				= 'browse_select_array';
	        $working_arrays
	        	['maintain_browse_fields']['field_name_array']			= array(
	        	'field_name'		=> 'browse_select_array'
	        	);


	        $working_arrays
	        	['ppv_define_query']['field_name_array']		= array(
	        	'field_name'=>'query_field_name_array',
	        	'r_o'		=> 'query_r_o_array',
	        	'value'		=> 'query_value_array'
	        	);

	        $working_arrays
	        	['ppv_define_business_rules']['field_name_array']		= array(
	        	'field_name'=>'business_rules_field_name_array',
	        	'r_o'		=> 'business_rules_r_o_array',
	        	'value'		=> 'business_rules_value_array'
	        	);
			return($working_arrays);
		}


		public function working_arrays_populate_lookups($working_arrays,$columns) {
			$working_arrays['maintain_modifiable_fields']['lookups']['field_names']	= $columns;
			$working_arrays['maintain_browse_fields']['lookups']['field_names']		= $columns;
			$working_arrays['ppv_define_query']['lookups']['field_names']			= 
				array_merge(array("not_used"=>"not_used"),  $columns);
			//var_dump($working_arrays );$this->debug_exit(__FILE__,__LINE__,1);

			$query_relational_operators_array = $this->build_query_relational_operators_array();
	        $working_arrays['ppv_define_query']['lookups']['relational_operators']  = $query_relational_operators_array;
	        $working_arrays['ppv_define_query']['lookups'][0]						=  
				array_merge(array("not_used"=>"not_used"),  $columns);
	        $working_arrays['ppv_define_query']['lookups'][1]  						= $query_relational_operators_array;

	        $business_rules_relational_operators = $this->build_business_rules_relational_operators();
			$working_arrays['ppv_define_business_rules']['lookups']['field_names']			= 
				array_merge(array("not_used"=>"not_used"),  $columns);
	        $working_arrays['ppv_define_business_rules']['lookups']['relational_operators'] = $business_rules_relational_operators;
	        $working_arrays['ppv_define_business_rules']['lookups'][0]						= 
				array_merge(array("not_used"=>"not_used"),  $columns);
	        $working_arrays['ppv_define_business_rules']['lookups'][1]  					= $business_rules_relational_operators;
			return $working_arrays;			//
		}


		public function working_arrays_populate($working_arrays,$record) {
			//echo("working_arrays_build");
			//$report_snippets = json_encode($report_snippets);
						//$record = json_decode($report_snippets,1);
			$record = json_encode($record);
			$record = json_decode($record,1);
			//var_dump($working_arrays);$this->debug_exit(__FILE__,__LINE__,1);
			//var_dump($working_arrays['advanced_edit_functions']);$this->debug_exit(__FILE__,__LINE__,1);
									 
			foreach($working_arrays['advanced_edit_functions'] as $name=>$value){
			   //var_dump($working_arrays);	$this->debug_exit(__FILE__,__LINE__,1);
			    //echo("# 00 * ".$value);
				foreach($working_arrays[$value]['field_name_array'] as $field_name){
				    //echo("*11 *".$field_name);
					$working_arrays[$value][$field_name] = $this->getEdit8_decode_array_to_array($record,$field_name);
    			}
			}
			//var_dump($working_arrays);$this->debug_exit(__FILE__,__LINE__,1);
			$working_arrays['ppv_define_query']['lookups']['field_names']				= '';
	        $working_arrays['ppv_define_query']['lookups']['relational_operators']  = '';
	        $working_arrays['ppv_define_query']['lookups'][0]						= '';
	        $working_arrays['ppv_define_query']['lookups'][1]  						= '';

			$working_arrays['ppv_define_business_rules']['lookups']['field_names']				= '';
	        $working_arrays['ppv_define_business_rules']['lookups']['relational_operators']  = '';
	        $working_arrays['ppv_define_business_rules']['lookups'][0]						= '';
	        $working_arrays['ppv_define_business_rules']['lookups'][1]  						= '';
			$working_arrays = $this->getEdit8_array_node_to_array($working_arrays);

			//var_dump($working_arrays);$this->debug_exit(__FILE__,__LINE__,1);
			return($working_arrays);
			
		}
	
		public function putEdit41() {
			//case "maintain_modifiable_fields":
			//case "maintain_browse_fields":
			//case "ppv_define_query":
			//case "ppv_define_business_rules":
			//$this->debug_exit(__FILE__,__LINE__,0);var_dump(Input::all());
			$record 					= json_decode(Input::get('encoded_record'),1);
			$column_names_array 		= json_decode(Input::get('encoded_column_names'),1);
			$working_arrays 			= json_decode(Input::get('encoded_working_arrays'),1);
			//$record = json_decode(Input::get('encoded_record'));
			//var_dump(Input::all());$this->debug_exit(__FILE__,__LINE__,0);
			//var_dump(Input::all());var_dump($record);$this->debug_exit(__FILE__,__LINE__,10);
			$node 		= $this->node_name;

			if (!empty(Input::get('what_we_are_doing'))) {

				//echo("putEdit41");$this->debug_exit(__FILE__,__LINE__,0);var_dump(Input::all());
				$what_we_are_doing = Input::get('what_we_are_doing');				
				switch ($what_we_are_doing) {
													
						
					case "updating_report_name":
						var_dump(Input::all());$this->debug_exit(__FILE__,__LINE__,1);
					case "displaying_advanced_edits_screen":
						//var_dump($record);$this->debug_exit(__FILE__,__LINE__,0);
						// we do all the io in the first case 'displaying_advanced_edits_screen'
						// and pass encoded strings to the other buttons who cycle them around as Input
						$record 			= $this->execute_query_by_report_no(Input::get('report_key'));
						//$record = json_encode($record);
						//$record = json_decode($record,1);
						$ppv_array_names = array('ppv_define_query','ppv_define_business_rules');
						$working_arrays 	= $this->working_arrays_construct($record,$ppv_array_names,$what_we_are_doing);
						//$this->debug_exit(__FILE__,__LINE__,0);var_dump($working_arrays);$this->debug_exit(__FILE__,__LINE__,1);
						return View::make($this->model_table.'.edit_name_advanced_edits')
							->with('record'								,(array) $record)
							->with('encoded_record'						,json_encode($record))
							->with('encoded_working_arrays'				,json_encode($working_arrays))
							//->with('encoded_column_names'				,json_encode($column_names))	
							->with('node_name'							,$this->node_name)
							->with('model_table'						,$this->model_table)
							->with('snippet_table'						,$this->snippet_table)
						;
						break;
					case "maintain_modifiable_fields":
					case "maintain_browse_fields":


						switch (Input::get('edit4_option')) {
							case "field_list_select":
								$column_names_array = $working_arrays[$what_we_are_doing]['lookups']['field_names'];
								//var_dump($working_arrays[$what_we_are_doing]);$this->debug_exit(__FILE__,__LINE__,1);
								$index2 = $working_arrays[$what_we_are_doing]['field_name_array']['field_name'];
								$to_array = $working_arrays[$what_we_are_doing][$index2];
								$from_array = array_diff($column_names_array,$to_array);
								//$this->debug_exit(__FILE__,__LINE__,0);var_dump($to_array);
								//var_dump(Input::all());$this->debug_exit(__FILE__,__LINE__,1);
								return View::make($this->model_table.'.select_fields')
									->with('Input'								,Input::all())					
									//->with('edit4_return_option'				,'field_list_save')
									->with('what_we_are_doing'   				,$what_we_are_doing)
									->with('from_array'							,$from_array)
									->with('to_array'							,$to_array)
									->with('node_name'							,$this->node_name)
									->with('model_table'						,$this->model_table)
									->with('encoded_record'						,Input::get('encoded_record'))
									->with('encoded_column_names'				,Input::get('encoded_column_names'))
									->with('encoded_working_arrays'				,Input::get('encoded_working_arrays'))
									->with('message',''
									);
								break;	
							case "update_field_list":
								$nv_array = array();
								if (array_key_exists('to',Input::all())) {
									$nv_array 	= array_combine(Input::get('to'), Input::get('to'));
								}									
								$encoded_nv_array = json_encode($nv_array);
								$edit4_return_option = "field_list_save";
								var_dump(Input::all());$this->debug_exit(__FILE__,__LINE__,0);

								$updatex  = DB::connection($this->db_snippet_connection)->table($this->snippet_table)
								->where($this->snippet_table_key_field_name, 	'=', $record[0][$this->snippet_table_key_field_name])
								->update(array($working_arrays[$what_we_are_doing]['field_name_array']['field_name']=>$encoded_nv_array));

								//t41
								$this->generate_by_list_name($nv_array,$this->model_table);
								//echo ("t41 generate_by_list_name ");$this->debug_exit(__FILE__,__LINE__,0);
								return redirect('admin/'.$this->node_name.'/edit1')
								->with('message', 'record updated');
								break;					
						} 
					case "ppv_define_query":
					case "ppv_define_business_rules":
						echo ("t41 ppv ");
						//$this->debug_exit(__FILE__,__LINE__,0);var_dump(Input::all());$this->debug_exit(__FILE__,__LINE__,0);
						$what_we_are_doing = Input::get('what_we_are_doing');				
						switch ($what_we_are_doing) {
							case "ppv_define_query":
								$blade_routine							= "advanced_query_getEdit_blade_gen_new";
								$blade_name								= "_advanced_query_getEdit_blade";
								break;
							case "ppv_define_business_rules":
								$blade_routine							= "business_rules_getEdit_blade_gen";
								$blade_name								= "_business_rules_getEdit";
								break;
						}
						switch (Input::get('edit4_option')) {
							case "field_list_select":
								//$this->debug_exit(__FILE__,__LINE__,0);var_dump(Input::all());$this->debug_exit(__FILE__,__LINE__,0);
								echo (Input::get('edit4_option'));
								$record_array				= json_decode(Input::get('encoded_record'),1);
								$record_obj					= json_decode(Input::get('encoded_record'),0);
								$column_names_array 		= json_decode(Input::get('encoded_column_names'),1);
								$working_arrays 			= json_decode(Input::get('encoded_working_arrays'),1);
								//$this->debug_exit(__FILE__,__LINE__,0);var_dump($working_arrays);
								//var_dump($working_arrays[$what_we_are_doing]);$this->debug_exit(__FILE__,__LINE__,1);
								//$this->debug_exit(__FILE__,__LINE__,0);//var_dump($working_arrays[$what_we_are_doing]['field_name_array']);
								//var_dump($working_arrays[$what_we_are_doing]);
								//$this->debug_exit(__FILE__,__LINE__,1);
								$field_name				= $working_arrays[$what_we_are_doing]['field_name_array']['field_name'];
								$r_o 					= $working_arrays[$what_we_are_doing]['field_name_array']['r_o'];
								$value 					= $working_arrays[$what_we_are_doing]['field_name_array']['value'];
								$field_name_array		= $working_arrays[$what_we_are_doing][$field_name];
								$r_o_array				= $working_arrays[$what_we_are_doing][$r_o];
								$value_array			= $working_arrays[$what_we_are_doing][$value];
								$no_of_rows = count($field_name_array);  //any of the three will do
								
								$filename = $this->views_files_path."/".$this->generated_files_folder."/".Input::get('report_key').
								$blade_name.'.blade.php';
								$ppv_default_values = array('not_used',0,' ');

								$three_arrays = array($field_name_array,$r_o_array,$value_array);
								if (count($field_name_array)==0){
									$three_arrays = $this->ppv_just_pad($three_arrays,$what_we_are_doing,$this->no_of_blank_entries,$ppv_default_values);
									$field_name_array = $three_arrays[0];	
									$r_o_array  = $three_arrays[1];
									$value_array  = $three_arrays[2];
								//echo($what_we_are_doing);var_dump($three_arrays);$this->debug_exit(__FILE__,__LINE__,1);

								}

							switch ($what_we_are_doing) {
								case "ppv_define_query":
									if (!File::exists($filename)){
										$blade_routine							= "advanced_query_getEdit_blade_gen_new";
										$blade_name								= "_advanced_query_getEdit_blade";
										$tst1 = 0;
										if ($tst1){
											$this->getEdit_ppv_write_blade_new(
												Input::get('report_key'),
												$filename,
												5,
												$blade_routine,
												$blade_name);
										echo('one time fix reset $tst1 ');var_dump(Input::all());$this->debug_exit(__FILE__,__LINE__,1);
										}
									}
									break;
								case "ppv_define_business_rules":
									$blade_routine							= "business_rules_getEdit_blade_gen";
									$blade_name								= "_business_rules_getEdit";
									$tst1 = 0;
									if ($tst1){
										$this->getEdit_ppv_write_blade_new(
											Input::get('report_key'),
										$filename,
										4,
										$blade_routine,
										$blade_name);
										echo('one time fix reset $tst1 ');var_dump(Input::all());$this->debug_exit(__FILE__,__LINE__,1);
									}
								break;
							}

								// 
								//var_dump($working_arrays);var_dump($field_name_array);var_dump($r_o_array);var_dump($value_array);$this->debug_exit(__FILE__,__LINE__,1);
								//var_dump(Input::all());$this->debug_exit(__FILE__,__LINE__,1);

								return View::make($this->node_name.'.ppv_update')
									->with('working_arrays'						,$working_arrays)
								    ->with('Input'								,Input::all())
									->with('record'								,$record_array)
									->with('encoded_record'						,Input::get('encoded_record'))
									->with('encoded_working_arrays'				,Input::get('encoded_working_arrays'))

									->with('generated_files_folder'				,$this->generated_files_folder)			
									->with('record2'							,$record_obj)
									->with('node_name'							,$this->node_name)
									->with('coming_from'						,'edit1')
									->with('first_lookup_array'					,$working_arrays[$what_we_are_doing]['lookups'][0])
									->with('second_lookup_array'				,$working_arrays[$what_we_are_doing]['lookups'][1])
									->with('field_name_array'					,$field_name_array)
									->with('r_o_array'							,$r_o_array)
									->with('value_array'						,$value_array)
									;
			
								break;
							case "update_field_list":
								//var_dump(Input::all());$this->debug_exit(__FILE__,__LINE__,1);
								$working_arrays = json_decode(Input::get('encoded_working_arrays'),1);
								$input_array_names = array('field_name_array','r_o_array','value_array');
								//var_dump($working_arrays[$what_we_are_doing]['field_name_array']);$this->debug_exit(__FILE__,__LINE__,1);
								$no_of_blank_entries = $this->no_of_blank_entries;
								//$no_of_blank_entries = 0;
								$ppv_default_values = array('not_used',0,' ');

								//$arr = $this->ppv_for_loop($working_arrays[$what_we_are_doing]['field_name_array'],$working_arrays[$what_we_are_doing],$this->bypassed_field_name,'p');
								//$arrx = $this->ppv_pop_arrays_by_value($working_arrays[$what_we_are_doing]['field_name_array'],$ppv_default_value,$pop_or_fill_ctr,$pop_or_fill);
								//var_dump($arrx);$this->debug_exit(__FILE__,__LINE__,1);
								//var_dump($working_arrays[$what_we_are_doing]);$this->debug_exit(__FILE__,__LINE__,1);
								$arr0 = $this->ppv_build_update_array_new($working_arrays[$what_we_are_doing]['field_name_array'],$no_of_blank_entries,$input_array_names,$ppv_default_values);

								//$this->debug_exit(__FILE__,__LINE__,0);var_dump($arr0);$this->debug_exit(__FILE__,__LINE__,1);

								//$arr = $this->ppv_room_for_growth_new($working_arrays[$what_we_are_doing]['field_name_array'],$what_we_are_doing,$no_of_blank_entries,$input_array_names,$ppv_default_values);		
								//echo ("&& ".$no_of_blank_entries." &&");
								//var_dump(Input::all());
								//$arr = $this->ppv_pop_arrays_by_value($array,$ppv_default_value,$pop_or_fill_ctr,$pop_or_fill);


								//$this->debug_exit(__FILE__,__LINE__,0);var_dump($arr0);$this->debug_exit(__FILE__,__LINE__,1);
							
						
								//var_dump($working_arrays);						
								//$this->debug_exit(__FILE__,__LINE__,0);var_dump($arr);$this->debug_exit(__FILE__,__LINE__,1);
								// ***
								// UPDATE the database
								// ***
								$updatex  = DB::connection($this->db_snippet_connection)->table($this->snippet_table)
								->where($this->snippet_table_key_field_name, 	'=', Input::get('report_key'))
								->update($arr0);
								// ***
								// CREATE query edit blade
								//		$this->debug_exit(__FILE__,__LINE__,0);var_dump(Input::all());

								//var_dump($arr0);
								//$arr0 = json_encode($arr0);$arr0 = json_decode($arr0,1);
								$this->my_ctr = 6;
								$no_of_rows = $this->my_ctr;  //any of the three will do
								$rows = $this->my_ctr;
								$filename = $this->views_files_path."/".$this->generated_files_folder."/".Input::get('report_key').$blade_name.'.blade.php';
								//$rows = count($arr)+ $this->no_of_blank_entries;
								$this->getEdit_ppv_write_blade_new(
									Input::get('report_key'),
									$filename,
									$rows,
									$blade_routine, // e.g. advanced_query_getEdit_blade_gen_new
									$blade_name  // e.g. advanced_query_getEdit_blade_gen_new
									)
									;
								return redirect('admin/'.$this->node_name.'/edit1')
								->with('message', 'record updated');
								break;			
								
							
					case "ppv_define_business_rules":
							var_dump(Input::all());$this->debug_exit(__FILE__,__LINE__,1);
					
						break;

					default:
							//var_dump(Input::all());$this->debug_exit(__FILE__,__LINE__,1);

							echo("fell out the bottom: at ");var_dump(Input::all());$this->debug_exit(__FILE__,__LINE__,1);
							break;

				
				} // end of what_we_are_doing is not blank							


		}//else{exit("exit3026");}

		}
	}


		
	
		public function putEdit4() {
			//$record = json_decode(Input::get('encoded_record'));
			//var_dump(Input::all());
			//var_dump($record);$this->debug_exit(__FILE__,__LINE__,1);
			$node 		= $this->node_name;

			if (!empty(Input::get('what_we_are_doing'))) {

				//var_dump(Input::all());$this->debug_exit(__FILE__,__LINE__,0);
				$what_we_are_doing = Input::get('what_we_are_doing');				
				switch (Input::get('what_we_are_doing')) {
					case "displaying_advanced_edits_screen":
						// we do all the io in the first case 'displaying_advanced_edits_screen'
						$this->execute_query_by_report_no(Input::get('report_key'));
						
						//$this->working_arrays_construct($record);
						$this->debug_exit(__FILE__,__LINE__,0);var_dump($working_arrays);$this->debug_exit(__FILE__,__LINE__,1);
						return View::make($this->model_table.'.edit_name_advanced_edits')
							->with('record'								,(array) $report_snippets)
							->with('encoded_record'						,json_encode($report_snippets))
							->with('encoded_working_arrays'	,json_encode($working_arrays))
							->with('encoded_column_names'				,json_encode($column_names))	
							->with('node_name'							,$this->node_name)
							->with('model_table'						,$this->model_table)
							->with('snippet_table'						,$this->snippet_table)
						;
					case "maintain_modifiable_fields":
					case "maintain_browse_fields":
					//$this->debug_exit(__FILE__,__LINE__,0);var_dump(Input::all());
						$record 					= json_decode(Input::get('encoded_record'),1);
						$column_names_array 		= json_decode(Input::get('encoded_column_names'),1);
						$working_arrays 	= json_decode(Input::get('encoded_working_arrays'),1);
						switch (Input::get('edit4_option')) {
							case "field_list_select":
								//var_dump($working_arrays);
								var_dump($working_arrays[$what_we_are_doing]['field_name']);
								//var_dump($record);
								//$this->debug_exit(__FILE__,__LINE__,1);
								//$to_array = $this->getEdit8_return_decoded_array($record [0][$working_arrays[$what_we_are_doing]['field_name']]);
								$to_array = $working_arrays[$what_we_are_doing]['field_name'];
								$from_array 				= array_diff($column_names_array,$to_array);
								//$this->debug_exit(__FILE__,__LINE__,0);var_dump($to_array);
								return View::make($this->model_table.'.select_fields')
								->with(Input::all())					
								->with('edit4_return_option'				,'field_list_save')
								->with('what_we_are_doing'   				,Input::get('what_we_are_doing'))
								->with('from_array'							,$from_array)
								->with('from_array'							,$from_array)
								->with('to_array'							,$to_array)
								->with('node_name'							,$this->node_name)
								->with('model_table'						,$this->model_table)
								->with('encoded_record'						,Input::get('encoded_record'))
								->with('encoded_column_names'				,Input::get('encoded_column_names'))
								->with('encoded_working_arrays'	,Input::get('encoded_working_arrays'))
								->with('message','');
								break;
							case "update_field_list":
								$nv_array = array();
								if (array_key_exists('to',Input::all())) {
									$nv_array 	= array_combine(Input::get('to'), Input::get('to'));
								}									
								$encoded_nv_array = json_encode($nv_array);
								$edit4_return_option = "field_list_save";
								//var_dump(Input::all());$this->debug_exit(__FILE__,__LINE__,1);
								$updatex  = DB::connection($this->db_snippet_connection)->table($this->snippet_table)
								->where($this->snippet_table_key_field_name, 	'=', Input::get('report_key'))
								->update(array($working_arrays[$what_we_are_doing]['field_name_array']['field_name']=>$encoded_nv_array));

								$this->generate_by_list_name($nv_array,$this->model_table);
								// above generates snippets etc 
								return redirect('admin/'.$this->node_name.'/edit1')
								->with('message', 'record updated');
								break;					
						}  // end of edit4_options inside modifiable and browse		

					case "ppv_define_query":
					case "ppv_define_business_rules":
						$record_array				= json_decode(Input::get('encoded_record'),1);
						$record_obj					= json_decode(Input::get('encoded_record'),0);
						//var_dump(json_decode(Input::get('encoded_record'),0));$this->debug_exit(__FILE__,__LINE__,1);
						//var_dump($record_array);$this->debug_exit(__FILE__,__LINE__,1);
						$column_names_array 		= json_decode(Input::get('encoded_column_names'),1);
						$working_arrays 	= json_decode(Input::get('encoded_working_arrays'),1);

						//($record_obj);$this->debug_exit(__FILE__,__LINE__,1);
						//var_dump($working_arrays);$this->debug_exit(__FILE__,__LINE__,0);
						/*
						$this->putEdit4_for_ppvs(
							$record_array				= $record_array,
							$column_names_array 		= $column_names_array,
							$working_arrays 	= $working_arrays,
							Input::all()
							);
						*/	
						//var_dump(Input::all());$this->debug_exit(__FILE__,__LINE__,1);
						//var_dump($working_arrays);$this->debug_exit(__FILE__,__LINE__,1);


					// *****
					$ppv_3_field_names['first_pulldown'] 			=  
						$working_arrays[Input::get('what_we_are_doing')][0];
					$ppv_3_field_names['second_pulldown'] 			= 
						$working_arrays[Input::get('what_we_are_doing')][1];
					$ppv_3_field_names['values'] 					= 
						$working_arrays[Input::get('what_we_are_doing')][2];
					$encoded_ppv_field_names_array 					= json_encode($ppv_3_field_names);

					$lookups = array();
					$lookups['field_name'] = $column_names_array;
					$lookups['r_o'] = $this->build_business_rules_relational_operators();
					$two_mbr_names_for_lookups 		= array();
					$two_mbr_names_for_lookups[] 	= 'field_name';
					$two_mbr_names_for_lookups[] 	= 'r_o';

					//		->with('second_lookup_array'	,$working_arrays[Input::get('what_we_are_doing')][$lookups[$two_mbr_names_for_lookups[1]]])

					//var_dump($working_arrays[Input::get('what_we_are_doing')]);
					echo("lookups");var_dump($lookups);$this->debug_exit(__FILE__,__LINE__,1);
						//return View::make($this->node_name.'.edit5')
						return View::make($this->node_name.'.ppv_update')

							->with('working_arrays'						,'$working_arrays')
						    ->with('Input'											,Input::all())
							->with('encoded_column_names'							,Input::get('encoded_column_names'))
							->with('encoded_working_arrays'				,Input::get('encoded_working_arrays'))
							->with('encoded_record'									,Input::get('encoded_record'))
							->with('column_names_array'								,$column_names_array)
							->with('record'										,$record_array)
							->with('record2'									,$record_obj)
						
							->with('node_name'										,$this->node_name)
							
							->with('coming_from'									,'edit1')
							//->with('lookups'										,$lookups)
							->with('first_lookup_array'								,$lookups[$two_mbr_names_for_lookups[0]])
							//->with('second_lookup_array'	,$lookups[$two_mbr_names_for_lookups[1]])
							->with('second_lookup_array'							,$lookups[$two_mbr_names_for_lookups[1]])
							->with('r_o_array'	,$working_arrays[Input::get('what_we_are_doing')][1])
							//->with('second_lookup_array'							,$lookups[$two_mbr_names_for_lookups[1]])
							//->with('two_mbr_names_for_lookups'						,$two_mbr_names_for_lookups)
							->with('generated_files_folder'			,$this->generated_files_folder)
							->with('report_key'										,$record_array[0][$this->snippet_table_key_field_name])
							->with('field_name_array'								,$working_arrays[Input::get('what_we_are_doing')][0])
							//->with('relational_operators_array'						,$working_arrays[Input::get('what_we_are_doing')][1])
							->with('value_array'										,$working_arrays[Input::get('what_we_are_doing')][2])
							//->with('encoded_ppv_field_names_array'					,$encoded_ppv_field_names_array)
							
							;

						break;
					default:
						//var_dump(Input::all());$this->debug_exit(__FILE__,__LINE__,1);

						echo("fell out the bottom: ");var_dump(Input::all());$this->debug_exit(__FILE__,__LINE__,1);
						break;

				
				} // end of what_we_are_doing is not blank
		}//else{exit("exit3026");}







			switch (Input::get('edit4_option')) {
				case "programmer_utilities_menu":
					//echo '*'.$this->node_name."*";exit('exit');
					return View::make($this->node_name.'/programmer_utilities_menu')
					->with('model_table'	,$this->model_table)
					->with('table_name'		,$this->model_table)
					->with('node_name'		,$this->node_name)
					->with('snippet_table'	,$this->snippet_table)
					->with('snippet_table'	,$this->snippet_table)
					;
					break;
				case "field_list_edit":
					var_dump(Input::all());
					//	$this->debug_exit(__FILE__,__LINE__,1);
					
					//echo "<br>field_list_edit";exit('exit 298');
					// *****
					// thes variables have been hidden in button forms
					// the from array is actually the full list minus what's already been selected
					// the form where the button is has to have this stuff pre loaded
					// so this is with getEdit (the main edit screen)
					// you know, the one with the buttons!
					// *****					

					$edit4_return_option = "field_list_save";
					$column_names_array = (array) $this->build_column_names_array($this->model_table);
					//$to_array = (array) $generated_snippets_array[$report_snippet_array_name];
					//unset($to_array['70']);
					//unset($to_array[70]);
					//array_pop($to_array);
					$from_array = array_diff($column_names_array,$to_array);
					var_dump($to_array);var_dump($from_array);		$this->debug_exit(__FILE__,__LINE__,0);

					return View::make($this->node_name.'.select_fields')
					->with(Input::all())					

					
					->with('edit4_return_option'		,'field_list_save')
					->with('from_array'					,$from_array)
					->with('to_array'					,$to_array)
					->with('message','');
					break;
		
				case "randomize_field_name":
					// *****
					//
					// *****
					//echo "<br>randomize_field_name";print_r(Input::all());exit('exit 2619');
					$key_field = "v_index";
					$this->randomize_field_name(
							$key_field,
							Input::get('rtrim'),
							Input::get('field_name'),
							Input::get('table_name')
					);
		
					return redirect('admin/'.$this->node_name.'/edit1')
					->with('message', 'record updated');
					break;
				case "randomize_field_name":
					// *****
					//
					// *****
					echo "<br>randomize_field_name";print_r(Input::all());exit('exit 2619');
					$table_name = "tasks";
					$this->lookup_name_value_snippets_gen($table_name);
					return redirect('admin/'.$this->node_name.'/edit1')
					->with('nmessage', 'record updated');
					break;
				case "refresh_lookup_tables":
					// *****
					//
					// *****
					echo "<br>refresh_lookup_tables";print_r(Input::all());exit('exit 2619');
					$table_name = "xxtasks";
					$this->lookup_name_value_snippets_gen($table_name);
					return redirect('admin/'.$this->node_name.'/edit1')
					->with('message', 'record updated');
					break;

				case "update_field_list":
					var_dump(Input::all());$this->debug_exit(__FILE__,__LINE__,1);
				case "field_list_save":
					var_dump(Input::all());$this->debug_exit(__FILE__,__LINE__,1);
					// they hit save from the select_fields blade

					if (array_key_exists('to',Input::all())) {
						$nv_array = array();
						$nv_array 	= array_combine(Input::get('to'), Input::get('to'));
					if ($update) {
						$new_array = json_encode($new_array);
						$updatex  = DB::connection($this->db_snippet_connection)->table($this->snippet_table)
						->where('id', 	'=', $response->id)
						->update(array('business_rules_r_o_array'=>$new_array));
					}	
						//var_dump($nv_array);$this->debug_exit(__FILE__,__LINE__,1);
						$this->generate_by_list_name($nv_array,$this->model_table);
						return redirect('admin/'.$this->node_name.'/edit1')
						->with('message', 'record updated');
					}else {
						$message = "you need some fields on the right";
						$field_name_array = array();
						//$column_names_array = $this->generated_snippets_array['fields_name_value_array'];
						$column_names_array = (array) $this->build_column_names_array($this->model_table);
						// different things get done depending on what (field_name) array we're updating
						// generate_by_list_name
						$diff_array = $column_names_array;
		
						return View::make($this->node_name.'.select_fields')
						->with(Input::all())
						->with('generated_snippets_array',$this->generated_snippets_array)
						->with('edit4_return_option'		,'field_list_save')
						->with('table_name'					,$this->generated_snippets_array['table_name'])
						->with('node_name'					,$this->node_name)
						->with('model_table'				,$this->model_table)
						->with('snippet_table'				,$this->snippet_table)
						->with('from_array',$diff_array)
						->with('to_array',$field_name_array)
						->with('message',$message);
		

					}
					break;
				case "gen_select_by_report":
					echo "<br>gen_select_by_report";exit('exit');
					//echo 'getEdit4:';print_r(Input::all());exit('237 exit');
					$edit4_return_option = "browse_select_snippets_gen_by_report";
					$column_names_array = (array) $this->build_column_names_array($this->model_table);
					//echo"column_names_array<br><br>";print_r($column_names_array);exit('181 exit');
					$to_array = (array) json_decode(Input::get('encoded_to_array'));
					$from_array = array_diff($column_names_array,$to_array);
						
					//print_r(Input::get('encoded_field_name_array'));exit("exit 191");
					//print_r($to_array);exit("xexit 191");
						
					//return View::make($x)
					//print_r(Input::all());exit("exit 191");
					return View::make($this->node_name.'.select_fields')
					->with(Input::all())
					->with('generated_snippets_array',$this->generated_snippets_array)
					->with('edit4_return_option',$edit4_return_option)
					->with('table_name'					,$this->generated_snippets_array['table_name'])
					->with('node_name'					,$this->node_name)
					->with('model_table'				,$this->model_table)
					->with('snippet_table'				,$this->snippet_table)
					->with('from_array',$from_array)
					->with('to_array',$to_array)
					->with('message','');
					//->with('column_names_array', $column_names_array)
					break;
				case "browse_select_snippets_gen_by_report":
					//print_r(Input::all());exit("exit 191");
						
					$this->browse_select_snippets_gen_by_report($this->snippet_table_key_field_name,Input::get('key_field_value'));
					$this->browse_select_blade_files_gen(Input::get('key_field_value'));
					return View::make($this->node_name.'.index')
					->with('generated_snippets_array',$this->generated_snippets_array);
					break;
		
				case "modifiable_fields_snippets_gen_by_report":
					//echo '<br>modifiable_fields_snippets_gen_by_report<br><br>';
					//print_r($_REQUEST);echo '<br>modifiable_fields_snippets_gen_by_report<br><br>';exit("exit 161");
					$this->modifiable_fields_snippets_gen($this->snippet_table_key_field_name,Input::get('key_field_value'));
					$this->modifiable_fields_blade_files_gen(Input::get('key_field_value'));
					return View::make($this->node_name.'.index')
					->with('generated_snippets_array',$this->generated_snippets_array);
					break;
		
				case "build_required_fields_include":
					echo 'build_required_fields_include'.$_REQUEST["edit4_option"]."*";//exit('exit');
					$middle_of_file_name = "required_fields_array_";
					//$this->save_fields_name_value_array($this->model,$_REQUEST["to"],$middle_of_file_name);
					$this->build_required_fields_snippets($this->model,$_REQUEST["to"]);
					$this->build_rebuild_model($this->model);
					return View::make($this->node_name.'.index');
					break;
		
				case "define_browse_select_fields":
					//echo "<br>define_browse_select_fields";exit('exit');
					$edit4_return_option = "browse_select_snippets_gen_by_report";
					$column_names_array = (array) $this->build_column_names_array($this->model_table);
					//echo"315:";echo"315:";print_r($column_names_array);exit('217exit');
					$browse_select_array = $this->generated_snippets_array['browse_select_array'];
					//print_r($browse_select_array);exit('217exit');
					$diff_array = array_diff($column_names_array,$browse_select_array);
					return View::make($this->node_name.'.select_fields')
					->with(Input::all())
					->with('generated_snippets_array',$this->generated_snippets_array)
					->with('edit4_return_option',$edit4_return_option)
					->with('table_name'					,$this->generated_snippets_array['table_name'])
					->with('node_name'					,$this->node_name)
					->with('model_table'				,$this->model_table)
					->with('snippet_table'				,$this->snippet_table)
					->with('from_array',$diff_array)
					->with('to_array',$browse_select_array)
					->with('message','');
					break;
		
				case "modifiable_fields_define":
					echo '*'."<br>modifiable_fields_define"."*";exit('exit');
					$edit4_return_option = "modifiable_fields_snippets_gen";
		
					$column_names_array = (array) $this->build_column_names_array($this->model_table);
					$field_name_array = $this->generated_snippets_array['modifiable_fields_array'];
					$diff_array = array_diff($column_names_array,$field_name_array);
		
					return View::make($this->node_name.'.select_fields')
					->with(Input::all())
					->with('generated_snippets_array',$this->generated_snippets_array)
					->with('edit4_return_option',$edit4_return_option)
					->with('table_name'					,$this->generated_snippets_array['table_name'])
					->with('node_name'					,$this->node_name)
					->with('model_table'				,$this->model_table)
					->with('snippet_table'				,$this->snippet_table)
					->with('from_array',$diff_array)
					->with('to_array',$field_name_array)
					->with('message','');
					break;
				case "modifiable_fields_define_by_report":
					echo '*'."<br>modifiable_fields_define_by_report"."*";exit('exit');
					$generated_snippets_array = (array) json_decode(Input::get('generated_snippets_array'));
					//print_r($generated_snippets_array);exit("exit256");
					//print_r($_REQUEST);exit("exit256");
					$edit4_return_option = "modifiable_fields_snippets_gen_by_report";
					$column_names_array = (array) $this->build_column_names_array($this->model_table);
					//$column_names_array = (array) $this->build_column_names_array($this->model_table);
					//print_r($column_names_array);exit('exit 225');
		
					$field_name_array = (array) $generated_snippets_array['modifiable_fields_array'];
					//print_r($field_name_array);exit('exit 225');
					$diff_array = array_diff($column_names_array,$field_name_array);
		
					return View::make($this->node_name.'.select_fields')
					->with(Input::all())
					->with('generated_snippets_array',$this->generated_snippets_array)
					->with('edit4_return_option',$edit4_return_option)
					->with('table_name'					,$this->generated_snippets_array['table_name'])
					->with('node_name'					,$this->node_name)
					->with('model_table'				,$this->model_table)
					->with('snippet_table'				,$this->snippet_table)
					->with('from_array',$diff_array)
					->with('to_array',$field_name_array)
					->with('message','');
					break;
				case "define_required_fields":
					//echo '*'.$_REQUEST["option"]."*";exit('exit');
					$edit4_return_option = "build_required_fields_include";
					$middle_of_file_name = "required_fields_array_";
					if (!File::exists($filex)){
						$to_array = array();
					}
					else {
						//	$to_array = array();
						$to_array = (array) json_decode(File::get($filex));
					}
					$column_names_array = (array) $this->build_column_names_array($this->model_table);
					//$diff_array = json_encode(array_diff($this->build_column_names_array($this->model_table),$to_array));
					$diff_array = json_encode(array_diff($column_names_array,$to_array));
					return View::make($this->node_name.'.select_fields')
					->with(Input::all())
					->with('edit4_return_option',$edit4_return_option)
					->with('table_name'					,$this->generated_snippets_array['table_name'])
					->with('node_name'					,$this->node_name)
					->with('model_table'				,$this->model_table)
					->with('snippet_table'				,$this->snippet_table)
					->with('encoded_column_names_array',json_encode($this->build_column_names_array($this->model_table)))
					->with('encoded_to_array',File::get($filex))
					->with('message','');
					break;
		
				case "back_to_edit_screen":
					//echo '*'.$_REQUEST["option"]."*";exit('exit');
					return View::make($this->node_name.'/programmer_utilities_menu');
					//->with('encoded_column_names_array',json_encode($this->build_column_names_array($this->model_table)));
					break;
			} // end switch
		}

	

		public function putEdit4_for_ppvs(
			$record, 
			$column_names_array, 	
			$working_arrays, 	
			$Input
			) {
	
			//echo("putEdit4_for_ppvs ".$Input['edit4_option']);$this->debug_exit(__FILE__,__LINE__,0);
			//var_dump($working_arrays);$this->debug_exit(__FILE__,__LINE__,0);
			//var_dump($Input['what_we_are_doing']);
			//echo($working_arrays[$Input['what_we_are_doing']][1]);var_dump($Input);
			//echo("**".$Input['what_we_are_doing']);//var_dump($Input);
			//$this->debug_exit(__FILE__,__LINE__,1);
			$edit4_option = $Input['edit4_option'];
			switch($edit4_option){			
				case "field_list_select":
				case "advanced_query":
					//$this->debug_exit(__FILE__,__LINE__,0);
					$two_mbr_names_for_lookups 		= array();
					$two_mbr_names_for_lookups[] 	= 'field_name';
					$two_mbr_names_for_lookups[] 	= 'r_o';
					//$lookups 						= $this->merge_lookups_ppv_into_single_array($two_mbr_names_for_lookups,$table_name);
					$lookups['field_name'] 			= $column_names_array;
					if (array_key_exists("field_name",$lookups)) {
						if (!array_key_exists("not_used",$lookups["field_name"])) {
							array_unshift($lookups['field_name'], "not_used");
							//prepend "not used" to top of the array

						}
					}
					$lookups['field_name'] 					= $column_names_array;

					$index2 = ($working_arrays[$Input['what_we_are_doing']][1]);
					//$array = $this->getEdit8_return_decoded_array($record [0][$index2]);
					//$lookups['relational_operators_array'] 	= array_combine($array, $array);
					$index2 = ($working_arrays[$Input['what_we_are_doing']][1]);
					$lookups['relational_operators_array'] 	= $index2;
			
					//$this->debug_exit(__FILE__,__LINE__,1);

					$blade_routine									= "
					_getEdit_blade_gen";
					$blade_name										= "_advanced_query_getEdit_blade";
					$ppv_3_field_names 								= array();
					// these are just their names
					$ppv_3_field_names['first_pulldown'] 			= 'query_field_name_array';
					$ppv_3_field_names['second_pulldown'] 			= 'query_r_o_array';
					$ppv_3_field_names['values'] 					= 'query_value_array';
					$encoded_ppv_field_names_array 					= json_encode($ppv_3_field_names);
					//print_r(($ppv_3_field_names['first_pulldown']));exit("2422exit");
					//print_r($lookups);exit("2422exit");
					//$x = $this->convert_index_to_name_value($array,$lookups['field_name']);
					//print_r($lookups['field_name']);exit("2422exit");
					//print_r($x);exit("2422exit");
					break;
				case "business_rules":
					//$this->debug_exit(__FILE__,__LINE__,0);
					// we use more abstract names to increase versatility
					$two_mbr_names_for_lookups 						= array();
					$two_mbr_names_for_lookups[] 					= 'field_name';
					$two_mbr_names_for_lookups[] 					= 'relational_operators_array';
					$lookups['field_name'] 			= $this->build_column_names_array($this->model_table);
					if (array_key_exists("field_name",$lookups)) {
						if (!array_key_exists("not_used",$lookups["field_name"])) {
							array_unshift($lookups['field_name'], "not_used");
							//prepend "not used" to top of the array

						}
					}
					$lookups['field_name'] 					= array_combine($lookups['field_name'], $lookups['field_name']);
					$business_rules_relational_operators 				= $this->build_business_rules_relational_operators();
					$lookups['relational_operators_array'] 	= array_combine($business_rules_relational_operators, $business_rules_relational_operators);
					$blade_routine							= "business_rules_getEdit_blade_gen";
					$blade_name								= "_business_rules_getEdit";
					$ppv_3_field_names 						= array();
					$ppv_3_field_names['first_pulldown'] 	= 'business_rules_field_name_array';
					$ppv_3_field_names['second_pulldown'] 	= 'business_rules_r_o_array';
					$ppv_3_field_names['values'] 			= 'business_rules_value_array';
					$encoded_ppv_field_names_array 			= json_encode($ppv_3_field_names);
					break;
			}
			$this->debug_exit(__FILE__,__LINE__,0);
			$array = ($working_arrays[$Input['what_we_are_doing']][1]);  // 1 is r_o
			$r_o_array		= $this->ppv_room_for_growth('not_used',$this->no_of_blank_entries,$array);
			//var_dump($r_o_array);var_dump($array);
			$lookups['relational_operators_array'] 	= $array;

			$array = ($working_arrays[$Input['what_we_are_doing']][2]);  // 2 is values array
			$value_array = $this->ppv_room_for_growth('not_used',$this->no_of_blank_entries,$array);
			$lookups['values_array'] 	= $array;

			//echo (phpversion());
			// ****************************
			// this is a little unusual because we don't build the edit snippet until you're trying to change it
			//$this->debug_exit(__FILE__,__LINE__,0);
			
			$this->getEdit_ppv_write_blade(
				Input::get('key_field_value'),
				$blade_routine,
				$blade_name,
				$this->no_of_blank_entries,
				$ppv_3_field_names,
				$lookups,
				$two_mbr_names_for_lookups,
				//$column_names_array,
				//$field_name_array,
				$r_o_array,
				$value_array,
				$record
			);
			
		}


		public function putEdit5() {
			echo("<br><br>putEdit5 dont use");//print_r(Input::all());
			$this->debug_exit(__FILE__,__LINE__,1);
			/*
				
			we need to tell it the names of the pulldown arrays we want to use and
			the names of the three fields in the database that we're concerned with
			(each is a json encoded array) contain the existing data (if any)
			build_report_snippets_array decodes them
			*/
			$report_snippets_array = $this->build_report_snippets_array($this->snippet_table_key_field_name,Input::get('key_field_value'));
			$table_name = $this->model_table;
			$coming_from = Input::get('coming_from');
			switch ($coming_from) {
				case "advanced_query":
					//$this->debug_exit(__FILE__,__LINE__,0);
					//$array 							= $report_snippets_array['query_field_name_array'];
					//print_r($report_snippets_array['query_field_name_array']);
					$two_mbr_names_for_lookups 		= array();
					$two_mbr_names_for_lookups[] 	= 'field_name';
					$two_mbr_names_for_lookups[] 	= 'relational_operators_array';
					//$lookups 						= $this->merge_lookups_ppv_into_single_array($two_mbr_names_for_lookups,$table_name);
					$lookups['field_name'] 			= $this->build_column_names_array($this->model_table);
					//print_r($lookups);exit("2430");
					if (array_key_exists("field_name",$lookups)) {
						if (!array_key_exists("not_used",$lookups["field_name"])) {
							array_unshift($lookups['field_name'], "not_used");
							//prepend "not used" to top of the array

						}
					}
					$lookups['field_name'] 					= array_combine($lookups['field_name'], $lookups['field_name']);
					$query_relational_operators_array 		= $this->build_query_relational_operators_array();
					$lookups['relational_operators_array'] 	= 
					array_combine($query_relational_operators_array, $query_relational_operators_array);



					$blade_routine									= "advanced_query_getEdit_blade_gen";
					$blade_name										= "_advanced_query_getEdit_blade";
					$ppv_3_field_names_array 								= array();
					$ppv_3_field_names_array['first_pulldown'] 			= 'query_field_name_array';
					$ppv_3_field_names_array['second_pulldown'] 			= 'query_r_o_array';
					$ppv_3_field_names['values'] 					= 'query_value_array';
					$encoded_ppv_field_names_array 					= json_encode($ppv_3_field_names);
					//print_r(($ppv_3_field_names['first_pulldown']));exit("2422exit");
					break;
				case "business_rules":
					$this->debug_exit(__FILE__,__LINE__,1);
					// we use more abstract names to increase versatility
					$two_mbr_names_for_lookups 						= array();
					$two_mbr_names_for_lookups[] 					= 'field_name';
					$two_mbr_names_for_lookups[] 					= 'relational_operators_array';
					$lookups['field_name'] 			= $this->build_column_names_array($this->model_table);
					if (array_key_exists("field_name",$lookups)) {
						if (!array_key_exists("not_used",$lookups["field_name"])) {
							array_unshift($lookups['field_name'], "not_used");
							//prepend "not used" to top of the array

						}
					}
					$lookups['field_name'] 					= array_combine($lookups['field_name'], $lookups['field_name']);
					$business_rules_relational_operators 				= $this->build_business_rules_relational_operators();
					$lookups['relational_operators_array'] 	= array_combine($business_rules_relational_operators, $business_rules_relational_operators);
					$blade_routine							= "business_rules_getEdit_blade_gen";
					$blade_name								= "_business_rules_getEdit";
					$ppv_3_field_names 						= array();
					$ppv_3_field_names['first_pulldown'] 	= 'business_rules_field_name_array';
					$ppv_3_field_names['second_pulldown'] 	= 'business_rules_r_o_array';
					$ppv_3_field_names['values'] 			= 'business_rules_value_array';
					$encoded_ppv_field_names_array 			= json_encode($ppv_3_field_names);
					break;
			}
			// ********************
			// everybody does this
			// ********************
			//$this->debug_exit(__FILE__,__LINE__,0);

			$field_name_array		= $this->ppv_room_for_growth('not_used',$this->no_of_blank_entries,$report_snippets_array[$ppv_3_field_names['first_pulldown']]);
			$r_o_array				= $this->ppv_room_for_growth('zero',$this->no_of_blank_entries,$report_snippets_array[$ppv_3_field_names['second_pulldown']]);
			$value_array			= $this->ppv_room_for_growth('blank',$this->no_of_blank_entries,$report_snippets_array[$ppv_3_field_names['values']]);
		
			//echo ("224 before write blade before edit 5");
			//print_r($field_name_array);
	
			//print_r($lookups);
			//print_r($field_name_array);
			//exit("224");
			//echo (phpversion());
			// ****************************
			// this is a little unusual because we don't build the edit snippet until you're trying to change it
			// ****************************
			/* ****************************** */
			//$this->debug_exit(__FILE__,__LINE__,0);
			$this->getEdit_ppv_write_blade(
				Input::get('key_field_value'),
				$blade_routine,
				$blade_name,
				$this->no_of_blank_entries,
				$ppv_3_field_names,
				$lookups,
				$two_mbr_names_for_lookups,
				$field_name_array,
				$r_o_array,
				$value_array,
				$report_snippets_array
			);
			/* ****************************/
			//echo ("<br>after write blade before edit 5<br><br>");print_r($lookups['field_name']);echo('<br>*$two_mbr_names_for_lookups*<br>');print_r($two_mbr_names_for_lookups[0]);echo("*<0  >1*");print_r($two_mbr_names_for_lookups[1]);
			//exit("2489");
			// **
			//echo('return View::make($t...edit5')	;		$this->debug_exit(__FILE__,__LINE__,0);

			return View::make($this->node_name.'.edit41')
			->with('coming_from'									,$coming_from)
			->with('model_table'									,$this->model_table)
			->with('snippet_table'									,$this->snippet_table)
			->with('node_name'										,$this->node_name)
			->with('generated_files_folder'							,$this->generated_files_folder)
			->with('key_field_value'								,Input::get('key_field_value'))
			->with('lookups'										,$lookups)
			->with('first_lookup_array'								,$lookups[$two_mbr_names_for_lookups[0]])
			->with('second_lookup_array'							,$lookups[$two_mbr_names_for_lookups[1]])
			->with('two_mbr_names_for_lookups'						,$two_mbr_names_for_lookups)
			->with('report_key'										,$report_snippets_array[$this->snippet_table_key_field_name])
			->with('field_name_array'								,$field_name_array)
			->with('r_o_array'										,$r_o_array)
			->with('value_array'									,$value_array)
			->with('encoded_ppv_field_names_array'					,$encoded_ppv_field_names_array)
			;
			break;
		
		}
		
		
		public function getEdit6() {
		/*
		getEdit6 is suppoed to be the programmer utilities menu
		*/
				
		$node 		= $this->node_name;
		

		echo ("<br>");var_dump(Input::all()) ;$this->debug_exit(__FILE__,__LINE__,0);
		switch (Input::get('edit6_option')) {
		case "add_additional_database_table":
			$button_title = "add new table_controller";
			// *********************************************
			// 8601 returns all defined table_controllers
			// Read the fucking documentation!!
			$report_key = 8601;
			//$this->debug_exit(__FILE__,__LINE__,1);
			$array1 = $this->advanced_query_ppv_get_data($report_key);
			// *********************************************
			$tables = DB::connection($this->db_data_connection)->select('SHOW TABLES');
			sort($tables);
			var_dump($tables);$this->debug_exit(__FILE__,__LINE__,1);

			$array = array();
			foreach($tables as $table)
			{
			      $array[$table->Tables_in_db_name] = $table->Tables_in_db_name;
			}
			echo ("<br>".var_dump($array).$this->db_connection_name);$this->debug_exit(__FILE__,__LINE__,0);

			//exit("exit 3241");
			//var_dump($array);exit("3993");
			return View::make($this->node_name.'
				.single_select_parms')
			->with('node_name'			,$this->node_name)
			->with('button_title'		,$button_title)
			->with('coming_from'		,'add_additional_database_table')
			->with('connection_array'	,$array)
			->with('current_connection'	,$this->model_table);
		echo ("<br>".var_dump($array).$this->db_connection_name);$this->debug_exit(__FILE__,__LINE__,1);
						
			break;
		case "convert_business_rules_r_o":
			echo ("<br>3217 edit6_option: ".Input::get('edit6_option')) ;
			echo ("<br>3217 this is supposed to be a test conversion ");
			echo ("<br>3217 do his as part of a test conversion to key=value for the ppv arrays");
			$field_name_being_converted = 
			$responses = DB::connection($this->db_snippet_connection)->table($this->snippet_table)
			->whereNotNULL('report_name')
			->where('record_type','=','report_definition')
			->get();
			//$array = array();
			foreach ($responses as $response) {
				echo('**');print_r($response->id);  
				//echo("<BR>report_def<BR>".$response->id);
				//$array = array();
				$array = json_decode($response->business_rules_r_o_array,1);
				if (!is_array($array)) {
					echo(' '.$response->report_name.' is not an array or null... bypassed');
					//exit("xit 3208");
				}
				else{
					$field_name_array = $this->build_business_rules_relational_operators();
					$new_array = array();
					$update= 1;  // prevent update of already converted
					foreach ($array as $value) {
						if (is_numeric($value)) {
							$new_array[] = $field_name_array[$value];
						}
						else{
							$update= 0;
						}
					}
					if ($update) {
						$new_array = json_encode($new_array);
						$updatex  = DB::connection($this->db_snippet_connection)->table($this->snippet_table)
						->where('id', 	'=', $response->id)
						->update(array('business_rules_r_o_array'=>$new_array));
					}	
				}
				}
				//exit('xit 3242');
				return;
				break;
		case "convert_business_rules_field_name_array":
			echo ("<br>3179 edit6_option: ".Input::get('edit6_option')) ;
			echo ("<br>3179 this is supposed to be a test conversion ");
			echo ("<br>3179 do his as part of a test conversion to key=value for the ppv arrays");
			//echo ("<br>query and volunteer are hardcoded for test");
			//exit("3180 exit");
			$field_name_being_converted = 'business_rules_field_name_array';
			$responses = DB::connection($this->db_snippet_connection)->table($this->snippet_table)
			->whereNotNULL('report_name')
			->where('record_type','=','report_definition')
			//->where('table_name','=','volunteer')
			->get();
			//$array = array();
			foreach ($responses as $response) {
				echo('<br>**');print_r($response->id);  
				//echo("<BR>report_def<BR>".$response->id);
				//$array = array();
				$array = json_decode($response->business_rules_field_name_array,1);
				if (!is_array($array)) {
					echo(' '.$response->report_name.' is not an array or null... bypassed');
					//exit("xit 3208");
				}
				else{
					$field_name_array = $this->build_column_names_array_indexed	($response->table_name);		
					if (!array_key_exists("not_used",$field_name_array)) {
						//array_unshift($field_name_array, "not_used");
					}
					//print_r($field_name_array);exit('xit 3227');
					$new_array = array();
					$update= 1;  // prevent update of already converted
					foreach ($array as $value) {
						if (is_numeric($value)) {
							$new_array[] = $field_name_array[$value];
						}
						else{
							$update= 0;
						}
					}
					echo("<BR><BR>");
					if ($update) {
						//print_r($new_array);echo('3227');
						$new_array = json_encode($new_array);
						//print_r($new_array);echo('3228');
						//exit('xit 3232');
						$updatex  = DB::connection($this->db_snippet_connection)->table($this->snippet_table)
						->where('id', 	'=', $response->id)
						->update(array($field_name_being_converted=>$new_array));
					}	
				}
				}
				//exit('xit 3242');
				return;
				break;
			case "programmer_utilities_menu":
				$this->node_name = 'main';
				//echo '*'.$this->node_name."*";exit('3386exit');
				return View::make($this->node_name.'/programmer_utilities_menu')
				->with('model_table'	,$this->model_table)
				->with('table_name'		,$this->model_table)
				->with('node_name'		,$this->node_name)
				->with('snippet_table'	,$this->snippet_table)
				;
				break;
			case "establish_reporting_for_table":
				//echo '*'.'establish_reporting_for_table'."*";exit('3134 exit');
				$from_folder				= "generated_files";
				$to_folder					= "demo1_backups";
				$from_folder_prefix			= app_path()."/views/miscThings/";
				$to_folder_prefix			= app_path()."/views/miscThings";
				$file_mask					= "1453";
				$this->establish_reporting_for_table(
					$from_folder,
					$to_folder,
					$from_folder_prefix,
					$to_folder_prefix,
					$file_mask);
				$this->get_all_table_names_in_database();
				DB::statement('xxdrop table users');
				$this->get_table_names_lready_defined();
				$this->get_route_model_snippet();
				$this->get_mvc_model_snippets();
				$this->pu_copy_folder_mask_to_new_folder(
						$from_folder,
						$to_folder,
						$from_folder_prefix,
						$to_folder_prefix,
						$file_mask);
				return View::make($this->node_name.'/programmer_utilities_menu')
				->with('model_table'	,$this->model_table)
				->with('table_name'		,$this->model_table)
				->with('node_name'		,$this->node_name)
				->with('snippet_table'	,$this->snippet_table)
				;
					
				break;
					
		case "backup_generated_reports_for_demo1":
			//echo '*'.'backup_generated_reports_for_demo1'."*";//exit('exit');
			$from_folder				= "generated_files";
			$to_folder					= "demo1_backups";
			$from_folder_prefix			= app_path()."/views/miscThings/";
			$to_folder_prefix			= app_path()."/views/miscThings";
			$file_mask					= "1453";
			$this->pu_copy_folder_mask_to_new_folder(
				$from_folder,
				$to_folder,
				$from_folder_prefix,
				$to_folder_prefix,
				$file_mask);
			// *****
			$from_folder				= "generated_files";
			$to_folder					= "demo1_backups";
			$from_folder_prefix			= app_path()."/views/new_tasks/";
			$to_folder_prefix			= app_path()."/views/new_tasks";
			$file_mask					= "7221";
			$this->pu_copy_folder_mask_to_new_folder(
				$from_folder,
				$to_folder,
				$from_folder_prefix,
				$to_folder_prefix,
				$file_mask);
			// *****
			$from_folder				= "generated_files";
			$to_folder					= "demo1_backups";
			$from_folder_prefix			= app_path()."/views/new_tasks/";
			$to_folder_prefix			= app_path()."/views/new_tasks";
			$file_mask					= "8373";
			$this->pu_copy_folder_mask_to_new_folder(
				$from_folder,
				$to_folder,
				$from_folder_prefix,
				$to_folder_prefix,
				$file_mask);
			return View::make($this->node_name.'/programmer_utilities_menu')
			->with('model_table'	,$this->model_table)
			->with('table_name'		,$this->model_table)
			->with('node_name'		,$this->node_name)
			->with('snippet_table'	,$this->snippet_table)
			;
			break;
		case "restore_generated_reports_for_demo1":
			//echo '*'.'restore_generated_reports_for_demo1'."*";exit('exit');
			$to_folder					= "generated_files";
			$from_folder				= "demo1_backups";
			$from_folder_prefix			= app_path()."/views/miscThings/";
			$to_folder_prefix			= app_path()."/views/miscThings";
			$file_mask					= "1453";
			$this->pu_copy_folder_mask_to_new_folder(
				$from_folder,
				$to_folder,
				$from_folder_prefix,
				$to_folder_prefix,
				$file_mask);
			//echo '2878 '.'restore_generated_reports_for_demo1'."*";//exit('exit');
			$to_folder					= "generated_files";
			$from_folder				= "demo1_backups";
			$from_folder_prefix			= app_path()."/views/new_tasks/";
			$to_folder_prefix			= app_path()."/views/new_tasks";
			$file_mask					= "7221";
			$this->pu_copy_folder_mask_to_new_folder(
				$from_folder,
				$to_folder,
				$from_folder_prefix,
				$to_folder_prefix,
				$file_mask);
			$to_folder					= "generated_files";
			$from_folder				= "demo1_backups";
			$from_folder_prefix			= app_path()."/views/new_tasks/";
			$to_folder_prefix			= app_path()."/views/new_tasks";
			$file_mask					= "8373";
			//echo '2894 '.'backup_generated_reports_for_demo1'."*";//exit('exit');
				
			$this->pu_copy_folder_mask_to_new_folder(
				$from_folder,
				$to_folder,
				$from_folder_prefix,
				$to_folder_prefix,
				$file_mask);
			return;
			break;
					
		case "backup_generated_reports_for_demo2":
			//echo '*'.'backup_generated_reports_for_demo1'."*";exit('exit');
			$from_folder				= "generated_files";
			$to_folder					= "demo1_backups2";
			$from_folder_prefix			= app_path()."/views/miscThings/";
			$to_folder_prefix			= app_path()."/views/miscThings";
			$file_mask					= "1453";
			$this->pu_copy_folder_mask_to_new_folder(
				$from_folder,
				$to_folder,
				$from_folder_prefix,
				$to_folder_prefix,
				$file_mask);
			$from_folder				= "generated_files";
			$to_folder					= "demo1_backups2";
			$from_folder_prefix			= app_path()."/views/new_tasks/";
			$to_folder_prefix			= app_path()."/views/new_tasks";
			$file_mask					= "7221";
			$this->pu_copy_folder_mask_to_new_folder(
				$from_folder,
				$to_folder,
				$from_folder_prefix,
				$to_folder_prefix,
				$file_mask);
			$from_folder				= "generated_files";
			$to_folder					= "demo1_backups2";
			$from_folder_prefix			= app_path()."/views/new_tasks/";
			$to_folder_prefix			= app_path()."/views/new_tasks";
			$file_mask					= "8373";
			$this->pu_copy_folder_mask_to_new_folder(
				$from_folder,
				$to_folder,
				$from_folder_prefix,
				$to_folder_prefix,
				$file_mask);
			return View::make($this->node_name.'/programmer_utilities_menu')
			->with('model_table'	,$this->model_table)
			->with('table_name'		,$this->model_table)
			->with('node_name'		,$this->node_name)
			->with('snippet_table'	,$this->snippet_table)
			;
			
			break;
		case "restore_generated_reports_for_demo2":
			//echo '*'.'restore_generated_reports_for_demo2'."*";exit('exit');
			$to_folder					= "generated_files";
			$from_folder				= "demo1_backups2";
			$from_folder_prefix			= app_path()."/views/miscThings/";
			$to_folder_prefix			= app_path()."/views/miscThings";
			$file_mask					= "1453";
			$this->pu_copy_folder_mask_to_new_folder(
				$from_folder,
				$to_folder,
				$from_folder_prefix,
				$to_folder_prefix,
				$file_mask);
			$to_folder					= "generated_files";
			$from_folder				= "demo1_backups2";
			$from_folder_prefix			= app_path()."/views/new_tasks/";
			$to_folder_prefix			= app_path()."/views/new_tasks";
			$file_mask					= "7221";
			$this->pu_copy_folder_mask_to_new_folder(
				$from_folder,
				$to_folder,
				$from_folder_prefix,
				$to_folder_prefix,
				$file_mask);
			$to_folder					= "generated_files";
			$from_folder				= "demo1_backups2";
			$from_folder_prefix			= app_path()."/views/new_tasks/";
			$to_folder_prefix			= app_path()."/views/new_tasks";
			$file_mask					= "8373";
			$this->pu_copy_folder_mask_to_new_folder(
				$from_folder,
				$to_folder,
				$from_folder_prefix,
				$to_folder_prefix,
				$file_mask);
			return View::make($this->node_name.'/programmer_utilities_menu')
			->with('model_table'	,$this->model_table)
			->with('table_name'		,$this->model_table)
			->with('node_name'		,$this->node_name)
			->with('snippet_table'	,$this->snippet_table)
			;
			break;
					
		case "hide_name_value_data_for_demo1":
			$response1 = DB::connection($this->db_snippet_connection)->table($this->snippet_table)
			->where('table_name', '=', 'tasks')
			->where('field_name', '=', 'shift_id')
			->where('record_type', '=', 'name_value_definition')
			->update(array('record_type' => 'name_value_definition_hidden'));
			if ($response1) {
			echo(' restore_generated_reports_for_demo1');
			}
			else {
			echo(' hide_name_value_data_for_demo1 failed');
			}
			return View::make($this->node_name.'/display_demo_1')
			->with('model_table'	,$this->model_table)
			->with('table_name'		,$this->model_table)
			->with('node_name'		,$this->node_name)
			->with('snippet_table'	,$this->snippet_table)
			;
			break;
		case "restore_name_value_data_for_demo1":
				$response1 = DB::connection($this->db_snippet_connection)->table($this->snippet_table)
				->where('table_name', '=', 'tasks')
				->where('record_type', '=', 'name_value_definition_hidden')
				->update(array('record_type' => 'name_value_definition'));
				if ($response1) {
					echo(' hidden data_for_demo1 restored');
				}
				else {
					echo(' hidden data_for_demo1 restore failed');
				}
				return View::make($this->node_name.'/display_demo_1')
				->with('model_table'	,$this->model_table)
				->with('table_name'		,$this->model_table)
				->with('node_name'		,$this->node_name)
				->with('snippet_table'	,$this->snippet_table)
				;
				break;
					
		case "display_demo_1":
			//echo 'getEdit4:'.$this->node_name;print_r(Input::all());
			//print_r($this->model_table);
			//exit('getEdit4 2792 exit');
					
			$array = array('miscThings','new_show','tasks','volunteer');
			//$array = array('miscThings');
			//return View::make('admin/'.$this->node_name.'/display_demo_1')
			return View::make($this->node_name.'/display_demo_1')
			->with('model_table'	,$this->model_table)
			->with('table_name'		,$this->model_table)
			->with('node_name'		,$this->node_name)
			->with('snippet_table'	,$this->snippet_table)
			;
			break;
		case "restore_from_baseline":
			$array = array('miscThings','new_show','tasks','volunteer');
			//$array = array('miscThings');
			$set_stuff = "
			SET CHARACTER_SET_CLIENT=utf8;
			SET CHARACTER_SET_RESULTS=utf8;
			SET collation_connection = utf8_unicode_ci";
			foreach ($array as $name) {
				//echo($name);exit('2801');
				$path = app_path();
				$i = stripos(app_path(),'/app');
				if ($i > 0){
					$path = substr(app_path(),0,$i+1);
					$path .= 'public/baseline_sql/'.'stu3881_main_'.$name.'_baseline.sql';
					//echo $path;exit('2809');
				}
				$sql = file_get_contents($path);
				$sql .= $set_stuff;
				$response1 = DB::connection()->getPdo()->exec($sql);
				//echo("<br>2814 restore db<br>");print_r(DB::getQueryLog());exit("exit803");
				echo('restoring: '.$name);
				if ($response1) {
					echo($path .$sql.' <br>');
					echo($name.' baseline restored');
				}
				else {
					//echo($name.' baseline restore failed');		
				}
			}
			//echo '*'.'restore_generated_reports_for_demo1'."*";exit('exit');
			$to_folder					= "generated_files";
			$from_folder				= "demo1_backups";
			$from_folder_prefix			= app_path()."/views/miscThings/";
			$to_folder_prefix			= app_path()."/views/miscThings";
			$file_mask					= "1453";
			$this->pu_copy_folder_mask_to_new_folder(
					$from_folder,
					$to_folder,
					$from_folder_prefix,
					$to_folder_prefix,
					$file_mask);
			$to_folder					= "generated_files";
			$from_folder				= "demo1_backups";
			$from_folder_prefix			= app_path()."/views/new_tasks/";
			$to_folder_prefix			= app_path()."/views/new_tasks";
			$file_mask					= "7221";
			$this->pu_copy_folder_mask_to_new_folder(
					$from_folder,
					$to_folder,
					$from_folder_prefix,
					$to_folder_prefix,
					$file_mask);
			$to_folder					= "generated_files";
			$from_folder				= "demo1_backups";
			$from_folder_prefix			= app_path()."/views/new_tasks/";
			$to_folder_prefix			= app_path()."/views/new_tasks";
			$file_mask					= "8373";
			$this->pu_copy_folder_mask_to_new_folder(
					$from_folder,
					$to_folder,
					$from_folder_prefix,
					$to_folder_prefix,
					$file_mask);
			return;
			break;
				
			return View::make($this->node_name.'/programmer_utilities_menu')
			->with('model_table'	,$this->model_table)
			->with('table_name'		,$this->model_table)
			->with('node_name'		,$this->node_name)
			->with('snippet_table'	,$this->snippet_table)
			->with('snippet_table'	,$this->snippet_table)
			;
				
			break;
		case "create_baseline_redirects":
			//echo '*'.'create_baseline_redirects'."*";exit('exit');
			//$hardcoded_node = "miscThings";
			//$model_table 	= "miscThings";
			$hardcoded_node = "new_miscThings";
			$model_table 	= "miscThings";
			//$hardcoded_node = "new_show";
			//$hardcoded_node = "volunteer";
			$view_files_prefix 				= app_path()."/views/".$hardcoded_node;
			$backup_node					= $this->backup_node;
			$backup_directory				= $view_files_prefix."/".$backup_node;
			if (!file_exists($backup_directory)){
				$this->pu_gen_files_special_purpose(
				"backup_path_to_new_directory",
				$hardcoded_node,
				$this->backup_node,
				$model_table,
				$view_files_prefix);
			}	
			if (file_exists($view_files_prefix."/".$this->backup_node)){
				$this->insure_node_name_directory($this->generated_files_folder,$this->view_files_prefix);		
				if (file_exists($view_files_prefix."/".$this->generated_files_folder)){
					//echo($view_files_prefix.$this->generated_files_folder." exists");exit("2747");
						
				}
				else{
					echo($view_files_prefix.$this->generated_files_folder." doesnt exists");exit("2747");
				}
				//echo($view_files_prefix.$this->generated_files_folder);exit("2742");
				$this->pu_gen_files_special_purpose(
				"create_baseline_redirects",
				$hardcoded_node,
				$this->backup_node,
				$model_table,
				$view_files_prefix);
				exit("2753");
				//$this->pu_gen_files_special_purpose("create_baseline_redirects","volunteer",$this->model_table,$this->node_name,$this->view_files_prefix);
				//$this->pu_gen_files_special_purpose("move_backup_files_to_new_directory","volunteer",$this->model_table,$this->node_name,$this->view_files_prefix);
			}	
			return View::make($this->node_name.'/programmer_utilities_menu')
			->with('model_table'	,$model_table)
			->with('table_name'		,$model_table)
			->with('node_name'		,$this->node_name)
			->with('snippet_table'	,$this->snippet_table)
			;
			
			break;
					
		case "programmer_utilities_menu":
			//echo '*'.$this->node_name."*";exit('exit');
			return View::make($this->node_name.'/programmer_utilities_menu')
			->with('model_table'	,$this->model_table)
			->with('table_name'		,$this->model_table)
			->with('node_name'		,$this->node_name)
			->with('snippet_table'	,$this->snippet_table)
			->with('snippet_table'	,$this->snippet_table)
			;
			
			break;
					
		case "field_list_edit":
			if (Input::get('edit6_option') == 'field_list_edit'){
				//print_r(Input::all());
				echo '**'.'2829 create_baseline_redirects'.Input::get('edit6_option')."*";
				$this->debug_exit(__FILE__,__LINE__,1);

				//exit('2755 exit');
			}
			//echo "<br>field_list_edit";exit('exit 298');
			// *****
			// thes variables have been hidden in button forms
			// the from array is actually the full list minus what's already been selected
			// the form where the button is has to have this stuff pre loaded
			// so this is with getEdit (the main edit screen)
			// you know, the one with the buttons!
			
			$edit4_return_option = "field_list_save";
			$record_table_name = Input::get('record_table_name');
			//echo ('*'.$record_table_name);exit('2820 exit');
			$column_names_array = (array) $this->build_column_names_array($this->model_table);
			//$column_names_array = (array) $this->build_column_names_array($record_table_name);
				
			// always start with a current copy of field names
			$report_snippet_array_name = Input::get('report_snippet_array_name');
			// everything else is stored in the generated_snippets_array
			$generated_snippets_array = (array) json_decode(Input::get('generated_snippets_array'));
			//echo 'getEdit4:';print_r($report_snippet_array_name);print_r($generated_snippets_array[$report_snippet_array_name]);exit('233 exit');
			$to_array = (array) $generated_snippets_array[$report_snippet_array_name];
			$from_array = array_diff($column_names_array,$to_array);
			
			return View::make($this->node_name.'.select_fields')
			->with(Input::all())
			->with('generated_snippets_array'	,$this->generated_snippets_array)
			->with('edit4_return_option'		,'field_list_save')
			->with('table_name'					,$this->generated_snippets_array['table_name'])
			->with('node_name'					,$this->node_name)
			->with('model_table'				,$this->model_table)
			->with('snippet_table'				,$this->snippet_table)
			->with('from_array'					,$from_array)
			->with('to_array'					,$to_array)
			->with('message','');			
			break;
		
		case "randomize_field_name":
			// *****
			//
			// *****
			//echo "<br>randomize_field_name";print_r(Input::all());exit('exit 2619');
			$key_field = "v_index";			
			$this->randomize_field_name(
				$key_field,
				Input::get('rtrim'),
				Input::get('field_name'),
				Input::get('table_name')
			);
						
			return redirect('admin/'.$this->node_name.'/edit1')
			->with('message', 'record updated');
			break;
		case "randomize_field_name":
			// *****
			//
			// *****
			echo "<br>randomize_field_name";print_r(Input::all());exit('exit 2619');
			$table_name = "tasks";
			$this->lookup_name_value_snippets_gen($table_name);
			return redirect('admin/'.$this->node_name.'/edit1')
			->with('message', 'record updated');
			break;

		case "back_to_edit_screen":
			//echo '*'.$_REQUEST["option"]."*";exit('exit');
			return View::make($this->node_name.'/programmer_utilities_menu');
				//->with('encoded_column_names_array',json_encode($this->build_column_names_array($this->model_table)));
			break;
		case "convert_single_array_query_r_o":
			echo ("<br>3179 edit6_option: ".Input::get('edit6_option')) ;
			echo ("<br>3179 this is supposed to be a test conversion ");
			echo ("<br>3179 do his as part of a test conversion to key=value for the ppv arrays");
			$field_name_being_converted = 
			$responses = DB::connection($this->db_snippet_connection)->table($this->snippet_table)
			->whereNotNULL('report_name')
			->where('record_type','=','report_definition')
			->get();
			//$array = array();
			foreach ($responses as $response) {
				echo('**');print_r($response->id);  
				//echo("<BR>report_def<BR>".$response->id);
				//$array = array();
				$array = json_decode($response->query_r_o_array,1);
				if (!is_array($array)) {
					echo(' '.$response->report_name.' is not an array or null... bypassed');
					//exit("xit 3208");
				}
				else{
					$field_name_array = $this->build_query_relational_operators_array();
					$new_array = array();
					$update= 1;  // prevent update of already converted
					foreach ($array as $value) {
						if (is_numeric($value)) {
							$new_array[] = $field_name_array[$value];
						}
						else{
							$update= 0;
						}
					}
					if ($update) {
						$new_array = json_encode($new_array);
						$updatex  = DB::connection($this->db_snippet_connection)->table($this->snippet_table)
						->where('id', 	'=', $response->id)
						->update(array('query_r_o_array'=>$new_array));
					}	
				}
				}
				//exit('xit 3242');
				return;
				break;
		case "convert_single_array_query_field_name":
			echo ("<br>3179 edit6_option: ".Input::get('edit6_option')) ;
			echo ("<br>3179 this is supposed to be a test conversion ");
			echo ("<br>3179 do his as part of a test conversion to key=value for the ppv arrays");
			echo ("<br>query and volunteer are hardcoded for test");
			//exit("3180 exit");
			$field_name_being_converted = 
			$responses = DB::connection($this->db_snippet_connection)->table($this->snippet_table)
			->whereNotNULL('report_name')
			->where('record_type','=','report_definition')
			//->where('table_name','=','volunteer')
			->get();
			//$array = array();
			foreach ($responses as $response) {
				echo('**');print_r($response->id);  
				//echo("<BR>report_def<BR>".$response->id);
				//$array = array();
				$array = json_decode($response->query_field_name_array,1);
				if (!is_array($array)) {
					echo(' '.$response->report_name.' is not an array or null... bypassed');
					//exit("xit 3208");
				}
				else{
					$field_name_array = $this->build_column_names_array_indexed	($response->table_name);		
					if (!array_key_exists("not_used",$field_name_array)) {
						array_unshift($field_name_array, "not_used");
						//prepend "not used" to top of the array

					}
					//print_r($field_name_array);exit('xit 3227');
					$new_array = array();
					$update= 1;  // prevent update of already converted
					foreach ($array as $value) {
						if (is_numeric($value)) {
							$new_array[] = $field_name_array[$value];
						}
						else{
							$update= 0;
						}
					}
					echo("<BR><BR>");
					if ($update) {
						//print_r($new_array);echo('3227');
						$new_array = json_encode($new_array);
						//print_r($new_array);echo('3228');
						//exit('xit 3232');
						$updatex  = DB::connection($this->db_snippet_connection)->table($this->snippet_table)
						->where('id', 	'=', $response->id)
						->update(array('query_field_name_array'=>$new_array));
					}	
				}
				}
				//exit('xit 3242');
				return;
				break;
		case "change_database_connection":
			echo("<br><br>getEdit6 ");var_dump(Input::all());
			//exit("exit 3195");
			/*******************************/
			// this gets you the report record which contains everything you need
			$report_snippets = 
			$this->get_snippet_by_key_field(
				$this->snippet_table,
				$this->snippet_table_key_field_name,
				8381
				);
			if (!$report_snippets){
				exit ("bad calll in change database connection"); 
			}
			else{
				//var_dump($report_snippets);
				//exit("exit 3830");
				//foreach ($report_snippets as $report_snippet){
				//var_dump($this->node_name);$this->debug_exit(__FILE__,__LINE__,1);
				$returned_list = $this->advanced_query_ppv_execute(
					'two_mbr_names_for_lookups',
					'lookups',
					json_decode($report_snippets->query_field_name_array,1),
					json_decode($report_snippets->query_r_o_array,1),
					json_decode($report_snippets->query_value_array,1)
				);
				//echo('<br>**<br>');var_dump($returned_list);		
				$array = array();
				foreach ($returned_list as $list){
					$array[$list->db_connection_name] = $list->db_connection_name;
					//echo($list->db_connection_name);
				}
				if(DB::connection()->getDatabaseName())
				{
				   //echo "conncted sucessfully to database ".DB::connection()->getDatabaseName();
				   //echo "conncted sucessfully to database ".DB::connection()->getName();
				}
			}				
            /*************************************************************/
			return View::make($this->node_name.'.single_select')
			->with('node_name'			,$this->node_name)
			->with('coming_from'		,'change_database_connection')
			->with('connection_array'	,$array)
			->with('current_connection'	,DB::connection()->getName())
			;
			//exit('xit 3880');

			break;
		case "update_database_config":
		case "maintain_database_connections":
			echo "maintain_database_connections ";var_dump(Input::all());
			// 8381
			//exit('3901');
			var_dump(Input::all());$this->debug_exit(__FILE__,__LINE__,1);
			$x = Input::get("db_connection_name_array");
			$name_array = array('db_connection_name'=>$x[5]);
			//echo ($name_array['db_connection_name']);exit("3907");
			$node = "";
			$action = "change_database_connection";
			$this->maintain_flat_files_for_db_connection($action,$node,"",$name_array,$name_array);
					
			return View::make($this->node_name.'/programmer_utilities_menu');
			break;
			
		case "table_controller_generators":
			$array = array();
			$x = Input::get("db_connection_name_array");
			$name_array = array('db_connection_name'=>$x[0]);
			//echo ($name_array['db_connection_name']);exit("3907");
			$node = "";
			$action = "table_controller_generators";
			$this->maintain_flat_files_for_db_connection($action,$node,"",$name_array,$name_array);
			$node = "";
			$action = "update";
			$this->maintain_flat_files_for_db_connection($action,$node,"",$name_array,$name_array);
			return View::make($this->node_name.'/programmer_utilities_menu');
			break;
			
		default:
			echo("The edit6_option: ".Input::get('edit6_option').' is unhandled at ');$this->debug_exit(__FILE__,__LINE__,1);
			break;
		} // end switch
	}


	public function getEdit7	() {
			// *****************
			//
			// build the query to generate the report from parameters retrieved from the database
			//		

			// ****************
		echo( "<br>getEdit7 ".$this->snippet_table.Input::get('key_field_value').$this->snippet_table_key_field_name);//$this->debug_exit(__FILE__,__LINE__,1);
		$report_snippets = $this->execute_query_by_report_no(Input::get('report_key'));
		if ($report_snippets){
			var_dump($report_snippets);$this->debug_exit(__FILE__,__LINE__,1);
			$two_mbr_names_for_lookups = array('field_name','relational_operators_array');
			$lookups = $this->merge_lookups_ppv_into_single_array($two_mbr_names_for_lookups,$this->model_table);
			$ppv_3_field_names 	= array();
			// we made the name more abstract to increase versatility
			$ppv_3_field_names['first_pulldown'] 	= 'query_field_name_array';
			$ppv_3_field_names['second_pulldown'] 	= 'query_r_o_array';
			$ppv_3_field_names['values'] 			= 'query_value_array';
			if (array_key_exists("field_name",$lookups)) {
				if (!array_key_exists("not_used",$lookups["field_name"])) {
					array_unshift($lookups['field_name'], "not_used");
					// put "not used" at top of the array
				}
			}

			$browse_select_array   		= json_decode($report_snippets[0]->browse_select_array,1);
			$field_name_array			= json_decode($report_snippets[0]->modifiable_fields_array,1);
			$use_table_in_record 		= false;
			if (in_array('table_name',$field_name_array)) {
				$use_table_in_record 		= true;
			}

			$encoded_business_rules		= $report_snippets[0]->business_rules;
			$encoded_field_name_array 	= $report_snippets[0]->modifiable_fields_array;
			$report_query  				= json_decode($report_snippets[0]->report_query,1);
			$advanced_query  			= $report_snippets[0]->advanced_query;
			$lookups_array  			= json_decode($report_snippets[0]->lookup_name_value_array,1);
			$browse_select_array   		= json_decode($report_snippets[0]->browse_select_array,1);
			$browse_select_field_count 	= count($browse_select_array) + 4;
			$modifiable_fields_list		= $report_snippets[0]->modifiable_fields_list;

			$merged_array				= array_merge($this->key_field_name_array, $browse_select_array);
			$encoded_field_name_array	= (string) json_encode(array_merge($this->key_field_name_array, $field_name_array));
			$field_name_array			= array_merge($this->key_field_name_array, $field_name_array);
			//var_dump($report_snippets);$this->debug_exit(__FILE__,__LINE__,0);
			$db_result = $this->advanced_query_ppv_execute(
				$two_mbr_names_for_lookups,
				$lookups,
				json_decode($report_snippets[0]->query_field_name_array,true),
				json_decode($report_snippets[0]->query_r_o_array,true),
				json_decode($report_snippets[0]->query_value_array,true)); 

				//foreach((array) $db_result as $db_result) {
				//	echo " %% ".$db_result->db_connection_name;  	
				//}

			}  // end of report_snippets

		//print_r($field_name_array);exit('exit 357 ');));
		//echo( "<br>getEdit7 ".$this->key_field_name);
		//var_dump($db_result);$this->debug_exit(__FILE__,__LINE__,0);
		$errors = array();
		$message = "";
		if ($report_snippets){
			if (is_null($report_snippets[0]->browse_select_array) ){
				$errors['browse error1'] = 'must define browse-fields first (use key-edit button)';
				$message = $errors['browse error1'] ."<br>";
			}
			if (is_null($report_snippets[0]->query_field_name_array) ){
				$errors['browse error2'] = 'must define query first (use key-edit button)';
				$message .= $errors['browse error2'];
			}
			if (count($errors)> 0){
				$field_name_array = array();
				$generated_snippets_array = array();
				return redirect('admin/'.$this->node_name.'/edit1')
				->with('snippet_table'					, $this->snippet_table)
				->with('model_table'					, $this->model_table)
				->with('node_name'						, $this->node_name)
				->with('generated_files_folder'			, $this->generated_files_folder)
				->with('field_name_array'				, $field_name_array)
				->with('snippet_table_key_field_name'	, $this->snippet_table_key_field_name)
				->with('message'						, $message)
				->withErrors($errors);
			}
		
		return View::make($this->node_name.'.edit2')
			->with('use_table_in_record'		,$use_table_in_record)
			->with('all_records'				,$db_result)
			->with('browse_select_field_count'	,$browse_select_field_count)
			->with('node_name'					,$this->node_name)
			->with('generated_files_folder'		,$this->generated_files_folder)
			->with('report_key'					,Input::get('report_key'))
			->with('model_table'				,$this->model_table)
			->with('key_field_name'				,$this->key_field_name)
			->with('key_field_value'			,Input::get('key_field_value'))
			->with('id'							,Input::get('key_field_value'))
			->with('app_path'					,app_path())
			->with('browse_select_array'		,$browse_select_array)

			;
		}
	}

	public function execute_query_by_report_no($report_no) {
		//echo 'execute_query_by_report_no'.$report_no;//exit("exit");
		//var_dump(Input::all());
		$response_array = DB::connection($this->db_snippet_connection)->table($this->snippet_table)
		->where($this->snippet_table_key_field_name, '=', $report_no)
		->get();
			//$this->debug_exit(__FILE__,__LINE__,1);var_dump($response_array);
		if ($response_array){
			return (array) $response_array;
		}
		else {
			echo 'you have a fatal error<br>';
			$this->debug_exit(__FILE__,__LINE__,1);
		}
	}


	public function getEdit8_build_ppv_3_array	() {
		// *****************
		// these parms will generate the report
		// ****************
		$ppv_3_field_names 	= array();
		// we made the name more abstract to increase versatility
		$ppv_3_field_names['first_pulldown'] 	= 'query_field_name_array';
		$ppv_3_field_names['second_pulldown'] 	= 'query_r_o_array';
		$ppv_3_field_names['values'] 			= 'query_value_array';
		return $ppv_3_field_names;
	}

	public function getEdit8_decode_object_array($obj,$fields_array) {
		// *****************
		// this converts encoded_strings to arrays
		// ****************
		foreach ($fields_array as $field) {
			if (is_null($obj[0]->$field))	{
				$obj[0]->$field =  (array) array();
			}else{
				$obj[0]->$field =  (array) json_decode($obj[0]->$field);
			}
		}
	}


	public function getEdit8_array_node_to_array($array) {
		// *****************
		// this converts encoded_strings to arrays
		// ****************

			$array['ppv_define_query']['lookups']['field_names']				= '';
	        $array['ppv_define_query']['lookups']['relational_operators']  = '';
	        $array['ppv_define_query']['lookups'][0]						= '';
	        $array['ppv_define_query']['lookups'][1]  						= '';
	        

			$array['ppv_define_query']['lookups']['field_names']			= '';
	        $array['ppv_define_query']['lookups']['relational_operators']  = '';
	        $array['ppv_define_query']['lookups'][0]						= '';
	        $array['ppv_define_query']['lookups'][1]  						= '';
	        

		foreach ($array as $field) {
			if (is_null($field))	{
				$array[$field] =  array();
			}
			/*
			else{
				$array[$field] =  json_decode($field);
			}
			*/
		}
		return $array;

		var_dump($arr);exit("xit 4420");
	}

	public function getEdit8_decode_array_to_array($record,$encoded_string) {
		// *****************
		// this converts encoded_strings to arrays
		// ****************

		//var_dump($encoded_string);
		if (is_null($record[0][$encoded_string]))	{
			$arr = array();
		}else{
			$arr =  (array) json_decode($record[0][$encoded_string],1);
		}
		return $arr;

		var_dump($arr);exit("xit 4420");
	}

public function getEdit8_ret(){
		// *****************
		// this converts encoded_strings to arrays
		// ****************
		$crlf = "\r\n";
		//echo("getEdit8_decode_object_to_array".$crlf.$crlf);
			//$encoded_string.$crlf.$crlf);
		//echo($encoded_string.$crlf.$crlf);
		//var_dump($obj);//exit("exit 39");

		if (is_null($obj[0]->$encoded_string))	{
			$arr = array();
		}else{
			$arr =  (array) json_decode($obj[0]->$encoded_string,1);
		}
		return $arr;

		//var_dump($arr);exit("xit 4420");
	}


	public function getEdit8_return_decoded_array($field) {
		// *****************
		// these parms will generate the report
		// ****************
		if (is_null($field))	{
			return array();
		}else{
			return (array) json_decode($field);
		}
	}

		public function getEdit8_return_encoded_array($field) {
		// *****************
		// these parms will generate the report
		// ****************
		$array = array();
		if (is_null($field))	{
			return json_encode($array);
		}else{
			return $field;
		}
	}


	public function getEdit8_adjust_lookups_table	($lookups) {
		// *****************
		// make sure "not used" is at the top of field names
		// ****************
		if (array_key_exists("field_name",$lookups)) {
			if (!array_key_exists("not_used",$lookups["field_name"])) {
				array_unshift($lookups['field_name'], "not_used");
				// put "not used" at top of field names
			}
		}
		return $lookups;
	}

	public function getEdit8	() {
		// *****************
		// build the query to retrieve the parameters necessary to generate the report 	
		// ****************
		$report_snippets = $this->execute_query_by_report_no(Input::get('report_key'));
		//echo("getEdit8");
		var_dump(Input::all());$this->debug_exit(__FILE__,__LINE__,1);
		//var_dump($report_snippets);$this->debug_exit(__FILE__,__LINE__,1);
		if (null !==(Input::get('what_we_are_doing'))) {
			//echo("getEdit8");var_dump(Input::all());$this->debug_exit(__FILE__,__LINE__,1);

			$what_we_are_doing = Input::get('what_we_are_doing');
			switch ($what_we_are_doing) {
				case "maintain_modifiable_fields":
					
					$strx = $this->field_name_list_array[$this->field_name_list_array_first_index]['field_name'];
					var_dump($strx);$this->debug_exit(__FILE__,__LINE__,1);

				case "maintain_browse_fields":	
					//echo ("* *".$strx)var_dump($to_array);
					//$this->debug_exit(__FILE__,__LINE__,0);
		
					$to_array = (array) json_decode($report_snippets[0]->$strx);
					//$to_array = (array) json_decode($to_str);
					//var_dump($to_array);$this->debug_exit(__FILE__,__LINE__,1);
					$edit4_return_option = "field_list_save";
					$column_names_array = (array) $this->build_column_names_array($this->model_table);
					$from_array = array_diff($column_names_array,$to_array);
					//var_dump($to_array);var_dump($from_array);		$this->debug_exit(__FILE__,__LINE__,0);
					//return View::make($this->node_name.'.select_fields')
					//return View::make($this->node_name.'.editU')
					return View::make($this->node_name.'.select_fields')
					->with(Input::all())					
					->with('edit4_return_option'		,'field_list_save')
					->with('from_array'					,$from_array)
					->with('node_name'					,$this->node_name)
					->with('table_name'					,$this->model_table)
					->with('to_array'					,$to_array)
					->with('record'						,$report_snippets)
					->with('message','');

				case "ppv_define_query":
				case "ppv_define_business_rules":
					$edit4_return_option = "field_list_save";
					$column_names_array = (array) $this->build_column_names_array($this->model_table);
					$from_array = array_diff($column_names_array,$to_array);
					//var_dump($to_array);var_dump($from_array);		$this->debug_exit(__FILE__,__LINE__,0);

					return View::make($this->node_name.'.select_fields')
					->with(Input::all())					
					->with('edit4_return_option'		,'field_list_save')
					->with('from_array'					,$from_array)
					->with('to_array'					,$to_array)
					->with('record'					,$record)
					->with('message','');
					break;					
					break;
				default:
					//echo("The edit4_option: ");$this->debug_exit(__FILE__,__LINE__,1);
					break;

			
			}
		}


		//$this->getEdit8_decode_object_array($report_snippets, $arraya);
		//echo("getEdit8");var_dump($report_snippets);var_dump(Input::all());$this->debug_exit(__FILE__,__LINE__,0);
		if ($report_snippets){
			$ppv_3_field_names 	= $this->getEdit8_build_ppv_3_array();
			$two_mbr_names_for_lookups = array('field_name','relational_operators_array');
			$lookups = $this->merge_lookups_ppv_into_single_array($two_mbr_names_for_lookups,$this->model_table);
			$lookups = $this->getEdit8_adjust_lookups_table($lookups);
			/*
			$query_field_name_array 		= $this->getEdit8_return_decoded_array($report_snippets[0]->query_field_name_array);
			$browse_select_array 			= $this->getEdit8_return_decoded_array($report_snippets[0]->browse_select_array);
			$field_name_array 				= $this->getEdit8_return_decoded_array($report_snippets[0]->modifiable_fields_array);
			$first_lookup_array 			= $this->getEdit8_return_decoded_array($report_snippets[0]->query_field_name_array);
			*/
			$lookups_array 			= $this->getEdit8_return_decoded_array($report_snippets[0]->lookup_name_value_array);
		//echo("getEdit8");var_dump($lookups_array);var_dump(Input::all());
		//$this->debug_exit(__FILE__,__LINE__,1);
			$this->field_name_list_array = (array) $this->field_name_list_array;
			$use_table_in_record 		= false;
			if (in_array('table_name',$this->field_name_list_array)) {
				$use_table_in_record 		= true;
			}

			$encoded_business_rules		= $report_snippets[0]->business_rules;
			$encoded_field_name_array 	= $report_snippets[0]->modifiable_fields_array;
			$report_query  				= json_decode($report_snippets[0]->report_query,1);
			$advanced_query  			= $report_snippets[0]->advanced_query;
			//$lookups_array  			= json_decode($report_snippets[0]->lookup_name_value_array,1);
			
			$browse_select_field_count 	= count($browse_select_array) + 4;
			$modifiable_fields_list		= $report_snippets[0]->modifiable_fields_list;

			$merged_array				= array_merge($this->key_field_name_array, $browse_select_array);
			$encoded_field_name_array	= (string) json_encode(array_merge($this->key_field_name_array, $field_name_array));
			$field_name_array			= array_merge($this->key_field_name_array, $field_name_array);
			$encoded_required_fields_required_array = $report_snippets[0]->required_fields_required_array;

			//var_dump($report_snippets);$this->debug_exit(__FILE__,__LINE__,1);
			$db_result = $this->advanced_query_ppv_execute(
				$two_mbr_names_for_lookups,
				$lookups,
				json_decode($report_snippets[0]->query_field_name_array,true),
				json_decode($report_snippets[0]->query_r_o_array,true),
				json_decode($report_snippets[0]->query_value_array,true)); 
			}  // end of report_snippets

		//print_r($field_name_array);exit('exit 357 ');));
		//echo( "<br>getEdit7 ".$this->key_field_name);
			$encoded_report_snippets = json_encode($report_snippets);
		
		echo( "<br>getEdit8 ");var_dump(Input::all());$this->debug_exit(__FILE__,__LINE__,1);
		
		return View::make($this->node_name.'.editU')
			->with('use_table_in_record'		,$use_table_in_record)
			->with('encoded_record'				,$encoded_report_snippets)
			//->with('record'						,$db_result)
			->with('browse_select_field_count'	,$browse_select_field_count)
			//->with('node_name'					,$this->node_name)
			//->with('generated_files_folder'		,$this->generated_files_folder)
			//->with('report_key'					,Input::get('report_key'))
			//->with('model_table'				,$this->model_table)
			//->with('key_field_name'				,$this->key_field_name)
			//->with('key_field_value'			,Input::get('key_field_value'))
			->with('id'							,Input::get('key_field_value'))
			->with('app_path'					,app_path())
			//->with('encoded_required_fields_required_array', $encoded_required_fields_required_array)
			->with('lookups'					,$lookups)
			->with('browse_select_array'		,$browse_select_array)

			;
			/*
			->with('update_table', $this->snippet_table)
			->with('encoded_field_name_array', $encoded_field_name_array)
			->with('field_name_array', $field_name_array)
			->with('encoded_required_fields_required_array', $encoded_required_fields_required_array)
			->with('record',$response[0])
			*/

		}




	public function xgetedit71() {
		echo('getedit71');
		$this->debug_exit(__FILE__,__LINE__,1);

	}

	public function get_report_snippets($report_snippets) {
		echo('get_report_snippets');
		var_dump($report_snippets);
		$this->debug_exit(__FILE__,__LINE__,1);
		$errors = array();
		$message = "";
		if ($report_snippets){
			if (is_null($report_snippets->browse_select_array) ){
				$errors['browse error1'] = 'must define browse-fields first (use key-edit button)';
				$message = $errors['browse error1'] ."<br>";
			}
			if (is_null($report_snippets[0]->query_field_name_array) ){
				$errors['browse error2'] = 'must define query first (use key-edit button)';
				$message .= $errors['browse error2'];
			}
			if (count($errors)> 0){
				$field_name_array = array();
				$generated_snippets_array = array();
				return redirect('admin/'.$this->node_name.'/edit1')
				->with('snippet_table'					, $this->snippet_table)
				->with('model_table'					, $this->model_table)
				->with('node_name'						, $this->node_name)
				->with('generated_files_folder'			, $this->generated_files_folder)
				->with('field_name_array'				, $field_name_array)
				->with('snippet_table_key_field_name'	, $this->snippet_table_key_field_name)
				->with('message'						, $message)
				->withErrors($errors);
			}
			return $report_snippets;
		}		
		//var_dump($report_snippets);
		//$this->debug_exit(__FILE__,__LINE__,1);
				
		
	}




		public function getMain() {
			/*
		
			we need to tell it the names of the pulldown arrays we want to use and
			the names of the three fields that we're concerned with
			three fields (each is an array) contain the existing data (if any)
			*/
			//echo("<br><br>getMain ");print_r(Input::all());
			//exit("getMain exit 91");
			switch (Input::get('edit6_option')) {
				//switch (Input::get('coming_from')) {
				case "programmer_utilities_menu":
					//$this->debug_exit(__FILE__,__LINE__,1);

					// we use more abstract names to increase versatility
					//echo ("after write blade before edit 5");print_r($lookups);print_r($two_mbr_names_for_lookups[0]);echo("**");print_r($two_mbr_names_for_lookups[1]);
					//exit("240");
					// **
					return View::make($this->node_name.'/programmer_utilities_menu')
					;
					break;
			}
		}

		public function getEdit_ppv_write_blade_new(
			$report_key,
			$filename,
			$no_of_rows,
			$blade_routine,
			$blade_name
			)
		{

			//working_arrays_pad_rows_for_growth
			 echo ('getEdit_ppv_write_blade_new'.$no_of_rows."*".$blade_routine.'**');$this->debug_exit(__FILE__,__LINE__,0);
			File::put($filename,$this->$blade_routine($no_of_rows));
			// e.g. $blade_routine = 'advanced_query_getEdit_blade_gen_new'
			echo ($no_of_rows."*".$blade_routine);$this->debug_exit(__FILE__,__LINE__,0);

			$fnam = $this->views_files_path."/".$this->generated_files_folder."/".$report_key.$blade_name.'.blade.php';
			File::put($fnam,$this->$blade_routine(
				$no_of_rows
				)
			);
			//echo "*".$blade_routine;$this->debug_exit(__FILE__,__LINE__,0);
			return;
		}
		

		public function getEdit_ppv_write_blade(
		$key_field_value,
		$blade_routine,
		$blade_name,
		$no_of_blank_entries,
		$ppv_3_field_names,
		$lookups,
		$two_mbr_names_for_lookups,
		$field_name_array,
		$r_o_array,
		$value_array,
		$report_snippets_array)
		{

		$report_table 		= $this->snippet_table;
		//echo'*$field_name_array*';print_r($key_field_value);print_r($field_name_array);exit("exit 285");
		$fnam = $this->views_files_path."/".$this->generated_files_folder."/".$key_field_value.$blade_name.'.blade.php';
		File::put($fnam,$this->$blade_routine(
			$this->no_of_blank_entries,
			$key_field_value,
			$report_snippets_array,
			$lookups,
			$key_field_value,
			$field_name_array,
			$r_o_array,
			$value_array,
			$two_mbr_names_for_lookups
			)
		);
		//echo "*".$blade_routine;$this->debug_exit(__FILE__,__LINE__,0);
		return;
		}
			public function get_snippet_by_key_field($table_name,$key_field_name,$key_field_value) {
		echo('get_snippet_by_key_field');
		$report_snippets = DB::connection($this->db_snippet_connection)->table($this->snippet_table)
		->where($this->snippet_table_key_field_name, 	'=', $key_field_value)
		->get();
		if (!$report_snippets){
			exit ("bad call in get_snippet_by_key_field");
		}
		else{
			//print_r($report_snippets[0]);exit('exit 179 ');
			return $report_snippets[0];
		}
	}

	public function get_report_query($table_name,$key_field_name,$key_field_value) {
		echo('get_report_query');
		$report_snippets = DB::connection($this->db_snippet_connection)->table($this->snippet_table)
		->where($this->snippet_table_key_field_name, 	'=', $key_field_value)
		->get();
		if (!$report_snippets){
			exit ("bad call in get_snippet_by_key_field");
		}
		else{
			//print_r($report_snippets[0]);exit('exit 179 ');
			return (array) $report_snippets;
		}
	}
 
	public function getIndex() {
	//var_dump($this->node_name);$this->debug_exit(__FILE__,__LINE__);
	//$this->debug_exit(__FILE__,__LINE__,0);

	return redirect($this->node_name.'/edit1');
	
	$result = DB::connection($this->db_snippet_connection)->table($this->snippet_table)
	->where('table_name','=',$this->model_table)
	->orderBy('record_type', 'asc')
	->get();
	if ($result){
	//exit("exit at 205 $this->model_table");
		$x = $this->node_name . ".index";
		return View::make($x)
		->with('snippet_table'					,$this->snippet_table)
		->with('model_table'					,$this->model_table)
		->with('node_name'						,$this->node_name)
		->with('generated_snippets_array'		,$this->generated_snippets_array)
		->with($this->model_table_index			, $result);
	}else {
	return redirect($this->node_name.'/add');
	}
}

public function getAdd1() {
//echo " getAdd1 "; exit(' exit getAdd1 ');
return View::make($this->node_name.'add1');
//Redirect::to($this->node_name.'/add1');
}

public function get_unassigned_index() {
	//echo " get_unassigned_index "; //exit(' exit get_unassigned_index ');
	$current_task_list =  DB::connection($this->db_data_connection)->table('maillist')
	->where('maillist.FirstName','like','%one%')
	->where('maillist.LastName','like','% no%')
	//leading space puts it at top of selection list
	//->take(5)
	->get(array(
			'maillist.id',
			'maillist.FirstName',
			'maillist.LastName'
			));
			foreach($current_task_list as $Task) {
			return $Task->id;
			echo "*".$Task->LastName."*".$Task->FirstName."*".$Task->id."*";
			echo " 443 get_unassigned_index "; //exit(' exit get_unassigned_index ');
	}
	echo " 445 get_unassigned_index "; exit(' exit get_unassigned_index ');

}

public function delete_task_for_current_show($id) {
	echo '</br>delete_task_for_current_show';//exit("exit ");
	// Included-Excluded is derived and is true if a record exists for that task in the CURRENT show
	// So, to exclude an included field, it must be deleted from current show
	// Conversely, to Include an excluded task, it must be added to current show with 0 for maillist.id
	$Shows = DB::connection($this->db_data_connection)->table('shows')
	->where('$this->model_table_index', '=', $id)
	->where('show_volunteer_link', '=', $this->current_show_volunteer_link)
	->delete();
	
	if ($Shows){
	return;
}

return redirect('admin/'.$this->node_name.'/index')
->with('message', 'Delete failed, please try again');
}

public function make_sure_table_snippet_exists($table) {
		//echo("PP".$this->db_data_connection);$this->debug_exit(__FILE__,__LINE__,0);

		if (!DB::connection($this->db_snippet_connection)->table($this->snippet_table)
				->where('record_type', '=', 'table_snippets')
				->where('table_name', '=', $table)
				->get()){
				$null_array = array();
				$encoded_null_array = json_encode($null_array);
				$array = array();
				$array['record_type'] 				= 'table_snippets';
				$array['table_name'] 				= $table;
				$array['browse_select_array'] 		= $encoded_null_array;
				$array['query_field_name_array'] 	= $encoded_null_array;
				$array['query_r_o_array'] 			= $encoded_null_array;
				$array['query_value_array'] 		= $encoded_null_array;
				DB::connection($this->db_snippet_connection)->table($this->snippet_table)
				->insert($array);
					
}
}

public function merge_table_snippets_into_array($report_snippets_array) {
//echo('merge_table_snippets_into_array');print_r(Input::all());print_r($this->model_table);exit("xit 108");
//echo('merge_table_snippets_into_array');print_r(Input::all());print_r($this->model_table);exit("xit 108");
// we've already got the report fields, now let's get them from the table record
	// currently, the only one we need is the lookup_name_value_array
	$lookup_name_value_array = array();
	$lookup_name_value_array['lookup_name_value_array'] = 'lookup_name_value_array';
	$db_result = DB::connection($this->db_snippet_connection)->table($this->snippet_table)
	->where('record_type','=','report_definition')
	->where('table_name','=',$this->model_table)
	->get($lookup_name_value_array);
	//print_r($db_result);exit("xit 158");
	if ($db_result){
		$lookup_name_value_array = (array) json_decode($db_result[0]->lookup_name_value_array);
		//print_r($lookup_name_value_array);//exit("xit 158");
		return array_merge($lookup_name_value_array, $report_snippets_array);
	}
	return $report_snippets_array;
	}

	public function postCreate() {
		echo("postCreate (in DEHBaseController<br>");

		//$this->showAddVariables('exit');
		//var_dump(Input::all());
		//print_r( Input::all());

		// *****
		// $report_snippets_array is an important array
		// *******
		$coming_from 						= Input::get('coming_from');
		$table_name 						= $this->model_table;
		//print_r($coming_from);exit("932");
		echo($coming_from);$this->debug_exit(__FILE__,__LINE__,1);
		switch ($coming_from) {
		case "edit1_define_new_report":
			//var_dump(Input::all());
			//$table_name 		
			$update_table 						= $this->snippet_table;
			$encoded_lookups					= Input::get('encoded_lookups');
			$field_name_array 					= array();
			$field_name_array['report_name'] 	= 'report_name';
			$field_name_array['table_name']		= 'table_name';
			$field_name_array['record_type']	= 'record_type';
			$field_name_array['node_name']		= 'node_name';
			//var_dump($field_name_array);exit("x947");
			$encoded_field_name_array			= json_encode($field_name_array);
			$encoded_record 					= Input::get('encoded_record');
			$encoded_old_name_new_name_array 	= Input::get('encoded_old_name_new_name_array');
			$encoded_generated_snippets_array 	= Input::get('encoded_generated_snippets_array');
	
			$lookups 							= json_decode($encoded_lookups,1);
			//$old_name_new_name_array 	= json_decode($encoded_old_name_new_name_array,1);
			$old_name_new_name_array 	= array()	;
			$generated_snippets_array 	= json_decode($encoded_generated_snippets_array,1);
			$my_business_rules		 	= array();
			//$record 					= $this->return_partial_array_from_array_and_list(Input::all(),$field_name_array);
			//$encoded_record 			= json_encode($record);
			//$report_key 				= $generated_snippets_array[$this->snippet_table_key_field_name];
			//$this->showAddVariables('continue');
			//var_dump($record);var_dump(Input::all());
			//exit("postCreate 949");

			break;
		case "edit2_add_new_record":
			$update_table 						= $this->model_table;
			$report_key 						= Input::get('report_key');
			$encoded_lookups					= Input::get('encoded_lookups');
			$encoded_lookups					= Input::get('encoded_lookups');
			$encoded_field_name_array			= Input::get('encoded_field_name_array');
			$encoded_record 					= Input::get('encoded_record');
			$encoded_old_name_new_name_array 	= Input::get('encoded_old_name_new_name_array');
			$encoded_generated_snippets_array 	= Input::get('encoded_generated_snippets_array');
			
			$lookups 							= json_decode($encoded_lookups,1);
			$field_name_array 					= json_decode($encoded_field_name_array,1);
			$old_name_new_name_array 			= json_decode($encoded_old_name_new_name_array,1);
			$generated_snippets_array 			= json_decode($encoded_generated_snippets_array,1);
			$record 							= $this->return_partial_array_from_array_and_list(Input::all(),$field_name_array);
			$report_snippets_array 				= $this->build_report_snippets_array($this->snippet_table_key_field_name,$report_key );
			if (is_null($report_snippets_array['business_rules'])){
				echo ("null");
				//exit('3037');
				$my_business_rules = array();
			}
			else {
				$my_business_rules		 		= json_decode($report_snippets_array['business_rules'],1);
			}
			
			//$this->showAddVariables('continue');
			//print_r($report_snippets_array);
			//print_r($my_business_rules);
			break;
		default:
			exit('unhandled $coming_from in post_create '.$coming_from);
			break;
		} // end switch
		//print_r($lookups);exit("lookups xexit 904");
		//		exit("xit 906");
		unset($field_name_array[$this->snippet_table_key_field_name]);
		$names = $field_name_array;
		foreach ($field_name_array as $name=>$value){
			$names[$name] = Input::get($value);
		}
		 $my_business_rules = array('report_name' => 'required|max:255');      
		
		$validator = Validator::make($names, $my_business_rules);  // create 
		//$validator = Validator::make($field_name_array, $my_business_rules);  // create 
		print_r($my_business_rules);
		if ($validator->passes()){
		// ***** VALIDATION PASS *****
		// ***************************
			echo("<br>validation passed<br>");var_dump($my_business_rules);
			//$this->debug_exit(__FILE__,__LINE__,1);
			//print_r(Input::all());
			//exit("postCreate 904");
			// *** new 3/12/2015
			$array = array();
			foreach($field_name_array as $name) {
				// make normal assignments for starters
				echo("<br>".$name);
				$array[$name] 	= Input::get($name);
				//echo ("<br>".$name);
				if (array_key_exists($name,$old_name_new_name_array)) {
					// pulldowns have to be handled differently  (select boxes)
					switch ($name) {
					case "field_name":
						// field_name uses an 'index-value' array so it gets 'translated'
						$array[$name] = $lookups['field_name'][Input::get($name)];
						break;
					default:
						// all other pulldowns are name=value and have a corresponding
						// 'new_value' field
						if (Input::get($old_name_new_name_array[$name]) > ""){
							$array[$name] 	= Input::get($old_name_new_name_array[$name]);
						}
						break;
					} // end switch
				} // end-if
			}  // end foreach
			//echo('<br>$array<br>');print_r($array);
			//exit("xexit 1016");
			
			$q = DB::connection($this->db_data_connection)->table($update_table)->insert($array);
			if ($q) {
				$this->insure_node_name_directory($this->generated_files_folder,$this->view_files_prefix);		
				$key_field_value = (DB::connection($this->db_snippet_connection)->table($this->snippet_table)->max($this->snippet_table_key_field_name));
				$this->initialize_empty_files($key_field_value);
				//print_r($key_field_value);exit('xit 923');
				$this->lookup_name_value_snippets_gen($table_name);				//$this->debug_exit(__FILE__,__LINE__,0);

				return redirect('admin/'.$this->node_name.'/edit1')
				->with('message', 'record Created');
			}
			else {
				echo('rrrrrrrrrrrrrrrrrrrrrrrrrr');exit("xexit 556");
				exit('926');
			}
		} // end of validator
		//echo("735");print_r(DB::getQueryLog());
		// ********************
		// ********************
		// VALIDATION FAILED
		// ********************
		// ********************
		if ( $validator->fails() ) {
			
			echo('failed validation');$this->debug_exit(__FILE__,__LINE__,1);
			$errors = $validator->messages();
		}
			echo('passed validation');$this->debug_exit(__FILE__,__LINE__,1);
		
		$field_name_array		= json_decode(Input::get('encoded_field_name_array'),1);
		unset($field_name_array[$this->snippet_table_key_field_name]);
		//print_r( $field_name_array);
		//print_r( Input::all());
		//echo("<br>validation failed<br>");exit("exit 995");
		//print_r($this->get_generated_snippets_by_report_key(Input::get('report_key')));exit("postCreate 973");
	
		// ********************
		//print_r($encoded_record);	exit("979");
		//print_r($errors);	exit("1035");
		//return redirect()->back()
		//return redirect($x)
		return View::make($this->node_name . ".add")
		->with('message', '745 Something went wrong add')
		->withErrors($errors)
		//->withInput()
		/* */
		->with('coming_from'					,$coming_from)
	
		->with('snippet_table'					,$this->snippet_table)
		->with('table_name'						,$this->model_table)
		->with('model_table'					,$this->model_table)
		->with('node_name'						,$this->node_name)
		->with('generated_files_folder'			,$this->generated_files_folder)
		
		->with('generated_files_folder'			,$this->generated_files_folder)
		->with('report_key'						,$report_key)
		->with('encoded_record'					,$encoded_record)
		->with('encoded_lookups'				,$encoded_lookups)
		->with('encoded_field_name_array'		,$encoded_field_name_array)
		->with('encoded_old_name_new_name_array',$encoded_old_name_new_name_array)
		->with('encoded_generated_snippets_array',$encoded_generated_snippets_array)
		;
	}


	public function postDestroy() {
		//var_dump($_REQUEST);//exit("postDestroy xexit 250");
		//$Response = Task::find(Input::get($this->snippet_table_key_field_name));
		//print_r(Input::all());exit("postDestroy xexit 560");
		switch (Input::get('coming_from')) {
		case "edit1":
			//$this->debug_exit(__FILE__,__LINE__,0);

			$Response = DB::connection($this->db_snippet_connection)->table($this->snippet_table)
			->where($this->snippet_table_key_field_name, '=', Input::get('key_field_value'))
			->delete();
			$this->clean_orphan_files($this->model_table,$this->node_name,$this->view_files_prefix);
			$this->lookup_name_value_snippets_gen($this->model_table);				//$this->debug_exit(__FILE__,__LINE__,0);
		
			break;
		case "edit2":
			$this->debug_exit(__FILE__,__LINE__,1);
			$Response = DB::connection($this->db_data_connection)->table($this->model_table)
			->where($this->key_field_name, '=', Input::get('key_field_value'))
			->delete();
			break;
		}
		
		if($Response) {
			return redirect('admin/'.$this->node_name.'/index')
			->with('model_table', $this->model_table)
			->with('snippet_table', $this->snippet_table)
			->with('node_name'					,$this->node_name)
			->with('message', $this->model_table.' Deleted');
		}
		else {
			return redirect('admin/'.$this->node_name.'/index')
			->with('model_table'	,$this->model_table)
			->with('snippet_table'	,$this->snippet_table)
			->with('node_name'		,$this->node_name)
			->with('message', 'Delete of '.$this->model_table.' failed, please try again');
			// ->with('message', 'Something went wrong, please try again');
		}
	}

	public function putUpdate() {
		echo("putUpdate still in use ". Input::get('coming_from'));$this->debug_exit(__FILE__,__LINE__,0);
		//var_dump(Input::all());
		//var_dump(Input::all());$this->debug_exit(__FILE__,__LINE__,1);
			        //$business_rules_relational_operators = $this->build_business_rules_relational_operators();
		$coming_from = Input::get('coming_from');
		switch ($coming_from) {
			case 'edit_name_advanced_edits':
				$report_key= "";
				//var_dump(Input::all());$this->debug_exit(__FILE__,__LINE__,1);
				$business_rules_field_name_array = array("report_name");
				$business_rules_r_o_array = array("required");
				$business_rules_value_array = array("");
				$business_rules_array = 
					$this->business_rules_ppv_build_them(
					$this->build_business_rules_relational_operators(),
					$business_rules_field_name_array,
					$business_rules_r_o_array,
					$business_rules_value_array);
				break;
			case 'edit2_browse_add_button':
				$report_key= "";
				$business_rules_array = 
					$this->business_rules_ppv_build_them(
					$this->build_business_rules_relational_operators(),
					json_decode(Input::get('encoded_business_rules_field_name_array'),1),
					json_decode(Input::get('encoded_business_rules_r_o_array'),1),
					json_decode(Input::get('encoded_business_rules_value_array'),1));

				break;
			case "edit2_edit_button":
				$business_rules_array = 
					$this->business_rules_ppv_build_them(
					$this->build_business_rules_relational_operators(),
					json_decode(Input::get('encoded_business_rules_field_name_array'),1),
					json_decode(Input::get('encoded_business_rules_r_o_array'),1),
					json_decode(Input::get('encoded_business_rules_value_array'),1));
				break;
		}

		$what_we_are_doing = Input::get('what_we_are_doing');
		//echo($what_we_are_doing);var_dump($business_rules_array);$this->debug_exit(__FILE__,__LINE__,1);
		switch ($what_we_are_doing) {			
			case 'updating_report_name':	
				//echo($what_we_are_doing);var_dump($business_rules_array);$this->debug_exit(__FILE__,__LINE__,1);
				$business_rules_field_name_array = array("report_name");
				$business_rules_r_o_array = array("required");
				$business_rules_value_array = array("");
				$business_rules_array = 
					$this->business_rules_ppv_build_them(
					$this->build_business_rules_relational_operators(),
					$business_rules_field_name_array,
					$business_rules_r_o_array,
					$business_rules_value_array);
	
			case "adding_a_data_record":
			case "edit2_default_add":
			case "edit2_default_update":
		//echo($what_we_are_doing);var_dump($business_rules_array);$this->debug_exit(__FILE__,__LINE__,1);
				$validator = Validator::make(Input::all(), $business_rules_array); //update
				if ( $validator->fails() ) {
					$errors = $validator->messages();
					//var_dump($errors);$this->debug_exit(__FILE__,__LINE__,1);
					return redirect('admin/'.$this->node_name.'/edit2new')
					->withErrors($errors)
					->withInput();
					  //return $validator->errors()->all();
					//return back()->withErrors($errors)->withInput();
	
				}
				var_dump(Input::all());$this->debug_exit(__FILE__,__LINE__,1);
				$a = 'encoded_modifiable_fields_array';
				$Inputo = json_decode(json_encode(Input::all()),0);
				$modifiable_fields_array = $this->decode_object_field_to_array($Inputo,$a);
				$modifiable_fields_name_values = array_intersect_key(Input::all(), $modifiable_fields_array);
				//var_dump($b);
				//var_dump(Input::all());$this->debug_exit(__FILE__,__LINE__,1);
				switch (Input::get('coming_from')) {
					case "edit2_browse_add_button":
						$updatex  = DB::connection($this->db_data_connection)->table($this->model_table)
							->insert($modifiable_fields_name_values);
						break;
					case "edit2_edit_button":
						$updatex  = DB::connection($this->db_data_connection)->table($this->model_table)
							->where($this->key_field_name, 	'=', Input::get('data_key'))
							->update($modifiable_fields_name_values);
						break;
				}


				return redirect('admin/'.$this->node_name.'/edit1')
				->with('message', 'record updated')
				->with('message', 'xx validation has been bypassed');
				break;

			case "updating_report_name":
				$edit4_return_option = "field_list_save";
				$arr = array();
				$updatex  = DB::connection($this->db_snippet_connection)->table($this->snippet_table)
				->where($this->snippet_table_key_field_name, 	'=', Input::get('report_key'))
				->update(array('report_name'=>Input::get('report_name')));

				return redirect('admin/'.$this->node_name.'/edit1')
				->with('message', 'record updated');
				break;	
			case "maintain_modifiable_fields":
			case "maintain_browse_fields":
				/*
				advanced_query_getEd			$nv_array = array();
				if (array_key_exists('to',Input::all())) {
					$nv_array 	= array_combine(Input::get('to'), Input::get('to'));
				}									
				$encoded_nv_array = json_encode($nv_array);
				*/
				$edit4_return_option = "field_list_save";

				$working_arrays = json_decode(Input::get('encoded_working_arrays'),1);
				$arr = array();
				foreach ($working_arrays[$what_we_are_doing]['field_name_array'] as $field_name=>$array_name){
					$arr[$array_name] = json_encode($working_arrays[$what_we_are_doing][$array_name]);
				}

				$this->debug_exit(__FILE__,__LINE__,0);var_dump($arr);$this->debug_exit(__FILE__,__LINE__,1);
				//var_dump(Input::all());$this->debug_exit(__FILE__,__LINE__,1);

				$updatex  = DB::connection($this->db_snippet_connection)->table($this->snippet_table)
				->where($this->snippet_table_key_field_name, 	'=', $record[0][$this->snippet_table_key_field_name])
				->update(array($working_arrays[$what_we_are_doing]['field_name']=>$encoded_nv_array));

				$this->generate_by_list_name($nv_array,$this->model_table);

				return redirect('admin/'.$this->node_name.'/edit1')
				->with('message', 'record updated');
				break;					

			case "ppv_define_query":
			case "ppv_define_business_rules":
				var_dump(Input::all());
				$working_arrays = json_decode(Input::get('encoded_working_arrays'),1);
				$arr = array();
				foreach ($working_arrays[$what_we_are_doing]['field_name_array'] as $field_name=>$array_name){
					$arr[$array_name] = json_encode($working_arrays[$what_we_are_doing][$array_name]);
				}

				//$this->debug_exit(__FILE__,__LINE__,0);var_dump($arr);$this->debug_exit(__FILE__,__LINE__,1);

				$updatex  = DB::connection($this->db_snippet_connection)->table($this->snippet_table)
				->where($this->snippet_table_key_field_name, 	'=', Input::get('report_key'))
				->update($arr);



				return redirect('admin/'.$this->node_name.'/edit1')
				->with('message', 'record updated');
				break;					

		}
	}

	public function putUpdateOld() {
		$what_we_are_doing = Input::get('what_we_are_doing');
		switch ($what_we_are_doing) {
			case "maintain_modifiable_fields":
			case "maintain_browse_fields":
				$nv_array = array();
				if (array_key_exists('to',Input::all())) {
					$nv_array 	= array_combine(Input::get('to'), Input::get('to'));
				}									
				$encoded_nv_array = json_encode($nv_array);
				$edit4_return_option = "field_list_save";
				//var_dump(Input::all());$this->debug_exit(__FILE__,__LINE__,1);

				$updatex  = DB::connection($this->db_snippet_connection)->table($this->snippet_table)
				->where($this->snippet_table_key_field_name, 	'=', $record[0][$this->snippet_table_key_field_name])
				->update(array($working_arrays[$what_we_are_doing]['field_name']=>$encoded_nv_array));

				$this->generate_by_list_name($nv_array,$this->model_table);

				return redirect('admin/'.$this->node_name.'/edit1')
				->with('message', 'record updated');
				break;					

			case "ppv_define_query":
			case "ppv_define_business_rules":
				//var_dump(Input::all());
				$working_arrays = json_decode(Input::get('encoded_working_arrays'),1);
				$arr = array();
				foreach ($working_arrays[$what_we_are_doing]['field_name_array'] as $field_name=>$array){
					$arr[$array] = $working_arrays[$what_we_are_doing][$array];
				}

				$this->debug_exit(__FILE__,__LINE__,0);var_dump($arr);$this->debug_exit(__FILE__,__LINE__,1);

				$updatex  = DB::connection($this->db_snippet_connection)->table($this->snippet_table)
				->where($this->snippet_table_key_field_name, 	'=', $record[0][$this->snippet_table_key_field_name])
				->update(array($working_arrays[$what_we_are_doing]['field_name']=>$encoded_nv_array));

				$this->generate_by_list_name($nv_array,$this->model_table);

				return redirect('admin/'.$this->node_name.'/edit1')
				->with('message', 'record updated');
				break;					

				//var_dump($record);$this->debug_exit(__FILE__,__LINE__,1);
				// we do all the io in the first case 'displaying_advanced_edits_screen'
				// and pass encoded strings to the other buttons who cycle them around as Input
				$record 			= $this->$execute_query_by_report_no(Input::get('report_key'));
				//$record = json_encode($record);
				//$record = json_decode($record,1);
				$ppv_array_names = array('ppv_define_query','ppv_define_business_rules');
				$working_arrays 	= $this->working_arrays_construct($record,$ppv_array_names,$what_we_are_doing);
				//$this->debug_exit(__FILE__,__LINE__,0);var_dump($working_arrays);$this->debug_exit(__FILE__,__LINE__,1);
				return View::make($this->model_table.'.edit_name_advanced_edits')
					->with('record'								,(array) $record)
					->with('encoded_record'						,json_encode($record))
					->with('encoded_working_arrays'				,json_encode($working_arrays))
					//->with('encoded_column_names'				,json_encode($column_names))	
					->with('node_name'							,$this->node_name)
					->with('model_table'						,$this->model_table)
					->with('snippet_table'						,$this->snippet_table)
				;
			case "maintain_modifiable_fields":
			return;
		}
		
		switch (Input::get('coming_from')) {
		case "advanced_query":
			//echo "<br>846 putUpdate<br>" ;exit(' exit 4027');
			$bypassed_field_name = $this->bypassed_field_name;
			$this->putUpdate_ppv(Input::get('coming_from'),Input::all(),$bypassed_field_name);
			//echo "<br>849 return from putUpdate_ppv<br>" ;exit("exit 849 putUpdate");
			//$this->debug_exit(__FILE__,__LINE__);

			return redirect('admin/'.$this->node_name.'/edit1')
			->with('message', 'record updated');
			break;
		case "business_rules":
			//$this->debug_exit(__FILE__,__LINE__);

			$this->putUpdate_ppv(Input::get('coming_from'),Input::all(),$this->bypassed_field_name);
			return redirect('admin/'.$this->node_name.'/edit1')
			->with('message', 'record updated');
			break;
		case "edit1":
			$this->generated_snippets_array 	= $this->get_generated_snippets();
			//print_r($this->generated_snippets_array);exit('exit putUpdate806');
			//echo "<br>784 putUpdate*" ;print_r(Input::all()) ;exit("exit 773 putUpdate");
			$field_name_array = array('report_name'=>Input::get('report_name'));
			//$field_name_array = Input::put('{"report_name":"report_name"}');
			//$field_name_array = (array) json_decode(Input::get('encoded_field_name_array'));
			//echo "784 putUpdate*" ;print_r($field_name_array) ;print_r(Input::all()) ;exit("exit 773 putUpdate");
			//unset($field_name_array[$this->snippet_table_key_field_name]);
			//$myrules = (array) json_decode(Input::get('encoded_required_fields_required_array'));
			$myrules = (array) json_decode('{"report_name":"required"}');
			//print_r($myrules) ;exit("exit 847 putUpdate");
			//print_r($this->generated_snippets_array['required_fields_required_array']) ;exit("exit 591 putUpdate");
			$validator = Validator::make($field_name_array, $myrules);
			if ( $validator->fails() ) {
				$errors = $validator->messages();
			}

			//echo "<br>x852 in putUpdate<br>" ;
			//exit("exit 773 putUpdate");
			break;

		default:
			//echo "<br>x852 in putUpdate<br>" ;print_r(Input::all()) ;
			//exit("exit putUpdate 848");
			//print_r($this->generated_snippets_array['modifiable_fields_array']) ;
			$this->generated_snippets_array 	= $this->get_generated_snippets();
			//print_r($this->generated_snippets_array);exit('exit putUpdate583');
			//echo "784 putUpdate*" ;print_r(Input::all()) ;exit("exit 773 putUpdate");
			$field_name_array = (array) json_decode(Input::get('encoded_field_name_array'));
			unset($field_name_array[$this->snippet_table_key_field_name]);

			//$myrules = array( 'updated_at' =>  'required');
			$myrules = (array) json_decode(Input::get('encoded_required_fields_required_array'));
			//print_r($myrules) ;exit("exit 847 putUpdate");
			//print_r($this->generated_snippets_array['required_fields_required_array']) ;exit("exit 591 putUpdate");
			$validator = Validator::make(Input::all(), $myrules); //update
			//print_r(MiscThing::all());exit("exit putUpdate590");
			break;
		}  // end of switch
		//echo "811 putUpdate*" ;print_r($validator->errors()); exit("*exit putUpdate");
		if ( $validator->fails() ) {
			$errors = $validator->messages();
			return redirect('admin/'.$this->node_name.'/edit')
			->with('table_name'				,$table_name)
			->with('generated_files_folder'	,$this->generated_files_folder)
			->with('report_key'				,$report_key)
			->with('business_rules'			,$business_rules)
			->with('message'				, 'Something failed the validation')
			->withErrors($validator->messages())
			->withInput();
		}
		
		//print_r($field_name_array['report_name']) ;print_r($field_name_array) ;exit("exit 792 putUpdate");

		//echo ' getEdit past validation<br> ';exit("exit 602");
		//print_r(Input::get('encoded_field_name_array_name'));exit("exit 407");
		$array = array();
		foreach ($field_name_array as $name=> $value) {
			if ($name != $this->snippet_table_key_field_name){
				$array [$name] = Input::get($value);
			}
		}
		//print_r($field_name_array);print_r($array);print_r(Input::all());
		//exit("exit putUpdate 3233");
		switch (Input::get('update_table')) {
		case $this->model_table:
			$response = DB::connection($this->db_data_connection)->table(Input::get('update_table'))->where($this->key_field_name,'=',Input::get('key_field_value'))
			->update($array);
			break;
		case $this->snippet_table:
			$response = DB::connection($this->db_data_connection)->table(Input::get('update_table'))->where($this->snippet_table_key_field_name,'=',Input::get('key_field_value'))
			->update($array);
			break;
		}
		//print_r(Input::all());exit("exit putUpdate 4487");
		$this->putUpdate_for_connection_flat_files(Input::all());
		
		print_r($field_name_array);print_r($array);
		//print_r(Input::all());
		//exit("exit putUpdate 3238".Input::get('update_table').Input::get('table_name'));
		$this->lookup_name_value_snippets_gen(Input::get('table_name'));
		//print_r($field_name_array);print_r($array);print_r(Input::all());
		//exit("exit putUpdate 3242");
		//print_r($array);print_r(Input::all());echo('xx'.$this->model_table);exit("exit putUpdate 869");
			//$this->debug_exit(__FILE__,__LINE__,0);

		 return redirect('admin/'.$this->node_name.'/edit1')
		->with('message', 'record updated');
	}
	
	public function putUpdate_for_connection_flat_files($values_array) {
		// certain record_types require that we save stuff
		var_dump($values_array);//$this->debug_exit(__FILE__,__LINE__,1);
		if (array_key_exists('record_type',$values_array)){
			switch ($values_array['record_type']) {
				case "database_connection":
					$array = json_decode($values_array['encoded_field_name_array'],1);
					unset($array[$this->snippet_table_key_field_name]);
	
					$extended_app_path = $this->storage_path."/connections/".$values_array['db_connection_name'];
					$this->make_sure_storage_connection_node_exists($extended_app_path,$array,$values_array);
					$action = "update";
					$node = "";
					//$this->maintain_flat_files_for_db_connection($action,$node,$extended_app_path,$array,$values_array);
	
					//exit("exit 4374 putUpdate");
					break;
						
				case "table_controller": 
					echo('putUpdate_for_connection_flat_files '.$values_array['record_type']);
					$field_names_array = json_decode($values_array['encoded_field_name_array'],1);
					unset($field_names_array[$this->snippet_table_key_field_name]);
					$connection_storage_directory = $this->storage_path.'/connections/'.$values_array['db_connection_name'];
						
					// *******************
					$action = "update_table_controller";
					$node = "controllers";
					$this->maintain_flat_files_for_db_connection($action,$node,$connection_storage_directory,$field_names_array,$values_array);
					echo('putUpdate_for_connection_flat_files '.$values_array['record_type']);
					$action = "update_table_controller";
					$node = "routes";
					$this->maintain_flat_files_for_db_connection($action,$node,$connection_storage_directory,$field_names_array,$values_array);
					$action = "update_table_controller";
					$node = "models";
					$this->maintain_flat_files_for_db_connection($action,$node,$connection_storage_directory,$field_names_array,$values_array);
					//$action = "update_table_controller";
					//$node = "controllers";
					//$this->maintain_flat_files_for_db_connection($action,$node,$connection_storage_directory,$field_names_array,$values_array);
					$action = "update_table_controller";
					$node = "views";
					$this->maintain_flat_files_for_db_connection($action,$node,$connection_storage_directory,$field_names_array,$values_array);
					//
					break;
						
			}
		}
		return;
	}
	
	public function mkdir_r($start_node,$dirName,$rights){
		$dirs = explode('/', $dirName);
		$dir=$start_node;
		foreach ($dirs as $part) {
			$dir.=$part.'/';
			if (!is_dir($dir) && strlen($dir)>0){
				mkdir($dir, $rights);
			}
		}
	}
	
	
	public function make_sure_storage_connection_node_exists($connection_storage_directory,$field_names,$field_values){
		if (!File::isDirectory($connection_storage_directory)) {
			//File::makeDirectory($connection_storage_directory);
			File::makeDirectory($connection_storage_directory,0777);
			File::makeDirectory($connection_storage_directory."/config");
			File::makeDirectory($connection_storage_directory."/models");
			File::makeDirectory($connection_storage_directory."/controllers");
			File::makeDirectory($connection_storage_directory."/views");
	
			$action = "initialize";  // INITIALIZES app/config app/models app/controllers and app/outes
			$node = "";
			$this->maintain_flat_files_for_db_connection($action,$node,$connection_storage_directory,$field_names,$field_values);
		}
		//exit("758".insure_node_name_directory);
		return ;
	}
	
	
	
	public function make_sure_table_controller_has_views_folder($extended_app_path,$field_names,$field_values){
		if (!File::isDirectory($extended_app_path."/views")) {
			File::makeDirectory($extended_app_path."/views");
		}
		if (!File::isDirectory($extended_app_path."/views/".$field_values['model_table'])) {
			echo $extended_app_path."/views/".$field_values['model_table'];//exit("tty");
			File::makeDirectory($extended_app_path."/views/".$field_values['model_table'],0777);
			File::makeDirectory($extended_app_path."/views/".$field_values['model_table']."/generated_files",0777);
					
			$infile = $this->storage_path."/baselines_for_generated_code/baseline_views_folder/baseline_view_pointers";
			$outfile = $extended_app_path."/views/".$field_values['model_table'];
			File::copyDirectory($infile,$outfile);
			 
			$infile = $this->storage_path."/baselines_for_generated_code/views/miscThings/generated_files";
			$outfile = app_path()."/views/".$field_values['model_table']."/generated_files";
			File::copyDirectory($infile,$outfile);
				
		}				
				
		
		return ;
	}
	
	
	public function maintain_flat_files_for_db_connection($action,$node,$connection_storage_directory,$field_names,$values_array){
		echo("maintain_flat_files_for_db_connection ");
		/*
		i know that we must maintain flat files
		*/
		//var_dump($field_names);
		//echo("field_names ");var_dump($field_names);
		//exit(" 4530");
		switch ($action) {
			case "table_controller_generators":
				// when a controller definition changes, a subset of what has to be done 
				// for a connection definition is required
				$node = "routes";
				$infile = $this->storage_path."/baselines_for_model_gens/Route.php";
				$insert_string = file_get_contents($infile);
				$insert_string = str_ireplace ('xxx_node_name', $values_array['node_name'] , $insert_string);
				$insert_string = str_ireplace ('xxx_controller_name', $values_array['controller_name'] , $insert_string);
				
				$infile = $this->routes_path."/routes.php";
				$current_routes_file = $this->routes_path."/routes.php";
				$infile = $this->current_routes_file;
				$file_as_string = file_get_contents($infile);
				$file_as_string = $this->anchor_boundaries_insert_replace(
					$file_as_string,
					$insert_string,
					"// GENERATED_CONTROLLERS_START_HERE",
					"// ".$values_array['node_name']." begin_generated_node",
					"// ".$values_array['node_name']." end_generated_node"
				);
				$outfile = $this->storage_path.'/connections/'.$values_array['db_connection_name']."/routes.php";
				File::put($outfile, $file_as_string);

				//
				$node = "config";
				//
				$node = "models";
				$infile = $this->storage_path."/baselines_for_model_gens/Model.php";
				$file_as_string = file_get_contents($infile);
				$file_as_string = str_ireplace ('$model_table', $values_array['model_table'] , $file_as_string  );
				$file_as_string = str_ireplace ('$model', $values_array['model'], $file_as_string );
				//echo ($file_as_string);
				$output_path_dsn = $this->storage_path.'/connections/'. $values_array['model_table'] .'/models/'.$values_array['model'].'.php';
				File::put($output_path_dsn, $file_as_string);
				//
				$node = "controllers";
				$str = "";
				foreach ($field_names as $field_name){
					$str .= "$".$field_name.' = "'.$values_array[$field_name].'", ';
				}
				$str = rtrim($str);
				$str = substr($str, 0, -1);
				$infile = $this->storage_path."/baselines_for_model_gens/Controller.php";
				$file_as_string = file_get_contents($infile);
				$file_as_string = str_ireplace ('$controller_name', $values_array['controller_name'] , $file_as_string  );
				$file_as_string = str_ireplace ('//generated_parameter_list', $str , $file_as_string );
				//echo ($file_as_string);
				$output_path_dsn = $this->storage_path.'/connections/'.$values_array['db_connection_name'].'/controllers/'.$values_array['controller_name'].'.php';
				File::put($output_path_dsn, $file_as_string);
				break;
				
			case "initialize":				
				echo ("initialize");//;exit(" 4585");
				// ***************
				$node =  "config";
					$extended_app_path = $this->storage_path."/connections/".$values_array['db_connection_name'];
				$infile = $this->storage_path."/baselines_for_model_gens/config/database.php";
				$outfile = $this->storage_path."/connections/".$values_array['db_connection_name']."/config/database.php";
				copy($infile,$outfile);
				$file_as_string = file_get_contents($outfile);
				$insert_string = "'default' => '".$values_array['db_connection_name']."',";
				$file_as_string = $this->anchor_boundaries_insert_replace(
					$file_as_string,
					$insert_string,
					"//define_default_connection_anchor",
					"//default_connection_start",
					"//default_connection_stop");
				$insert_string = $this->snippet_gen("database_connection",$field_names,$values_array);
				$file_as_string = $this->anchor_boundaries_insert_replace(
					$file_as_string,
					$insert_string,
					"// generated_connections_begin_here",
					"// ".$values_array['db_connection_name']."_connection_definition_start",
					"// ".$values_array['db_connection_name']."_connection_definition_stop"
					);
				//echo ("initialize");exit(" 4606");
				$insert_string = $this->snippet_gen("database_connection",$field_names,$values_array);
				$output_path_dsn = $this->storage_path.'/connections/'.$values_array['db_connection_name']."/config/database.php";
				File::put($output_path_dsn, $file_as_string);
						// ****************
				// ****************
				$node =  "models";
				$infile = $this->storage_path."/baselines_for_model_gens/Models";
				$outfile = $this->storage_path.'/connections/'.$values_array['db_connection_name']."/models";
				//File::cleanDirectory($outfile);
				File::copyDirectory($infile,$outfile);
				// ****************
				// ****************
				$node =  "controllers";
				$infile = $this->storage_path."/baselines_for_model_gens/baseline_controllers";
				$outfile = $this->storage_path.'/connections/'.$values_array['db_connection_name']."/controllers";
				File::cleanDirectory($outfile);
				File::copyDirectory($infile,$outfile);
				// ****************
				// ****************
				$node =  "routes";
				echo ("init routes file");
				$infile = $this->storage_path."/baselines_for_model_gens/routes.php";
				$file_as_string = file_get_contents($infile);
				$output_path_dsn = $this->storage_path.'/connections/'.$values_array['db_connection_name']."/routes.php";
				$this->add_delete_add_file_as_string($outfile,$file_as_string);
				// ****************
				// **************** "/storage/baselines_for_model_gens/baseline_views_folder/baseline_view_pointers"
				$node =  "views";
				
				$infile = $this->storage_path."/baselines_for_generated_code/baseline_views_folder/baseline_view_pointers";
				$outfile = $this->storage_path.'/connections/'.$values_array['db_connection_name']."/views/miscThings";
				File::copyDirectory($infile,$outfile);
				                   
				$infile = $this->storage_path."/baselines_for_generated_code/views/miscThings/generated_files";
				$outfile = $this->storage_path.'/connections/'.$values_array['db_connection_name']."/views/miscThings/generated_files";
				File::copyDirectory($infile,$outfile);
				//	   
				$infile = $this->storage_path."/baselines_for_generated_code/baseline_views_folder/baseline_view_pointers";
				$outfile = $this->storage_path.'/connections/'.$values_array['db_connection_name']."/views/volunteer";
				File::copyDirectory($infile,$outfile);
				$infile = $this->storage_path."/baselines_for_generated_code/views/volunteer/generated_files";
				$outfile = $this->storage_path.'/connections/'.$values_array['db_connection_name']."/views/volunteer/generated_files";
				
				//copy($infile."/*.php",$outfile);
				File::copyDirectory($infile,$outfile);
				break;
			case "update":
				switch ($node) {
					case "config":
						$infile = $this->storage_path."/connections/".$values_array['db_connection_name']."/config/database.php";
						$file_as_string = file_get_contents($infile);
						$insert_string = "'default' => '".$values_array['db_connection_name']."',";
						$file_as_string = $this->anchor_boundaries_insert_replace(
							$file_as_string,
							$insert_string,
							"//define_default_connection_anchor",
							"//default_connection_start",
							"//default_connection_stop");
						$output_path_dsn = $this->storage_path.'/connections/'.$values_array['db_connection_name']."/config/database.php";
						File::put($output_path_dsn, $file_as_string);
						//define_default_connection_anchor
						// 
						break;
					case "models":
						$infile = $this->storage_path."/baselines_for_model_gens/Model.php";
						$file_as_string = file_get_contents($infile);
						$file_as_string = str_ireplace ('$model_table', $values_array['model_table'] , $file_as_string  );
						$file_as_string = str_ireplace ('$model', $values_array['model'], Input::get('') , $file_as_string );
						//echo ($file_as_string);
						$output_path_dsn = $this->storage_path.'/connections/'. $values_array['model_table'] .'/models/'.$values_array['model'].'.php';
						File::put($output_path_dsn, $file_as_string);
						break;
					case "controllers":
						$str = "";
						foreach ($values_array_array as $name=>$value){
							//echo $name. " * ".Input::get($value);
							$str .= "$".$name.' = "'.Input::get($value).'", ';
						}
						$str = rtrim($str);
						$str = substr($str, 0, -1);
						//echo "<br><br>*".$str."*";
						$infile = $this->storage_path."/baselines_for_model_gens/Controller.php";
						$file_as_string = file_get_contents($infile);
						$file_as_string = str_ireplace ('$controller_name', Input::get('controller_name') , $file_as_string  );
						$file_as_string = str_ireplace ('//generated_parameter_list', $str , $file_as_string );
						//echo ($file_as_string);
						$output_path_dsn = $this->storage_path.'/connections/'.$values_array['db_connection_name'].'/controllers/'.$values_array['controller_name'].'Controller.php';
						File::put($output_path_dsn, $file_as_string);
						break;
					case "routes":
						break;
				}
				break;
			case "update_table_controller":
				echo("update_table_controller ".$node);//exit("exit 4737");
				switch ($node) {
					case "views":
						$extended_app_path = $this->storage_path.'/connections/'.$values_array['db_connection_name'];
						$this->make_sure_table_controller_has_views_folder($extended_app_path,$field_names,$values_array);
						$extended_app_path = app_path();
						$this->make_sure_table_controller_has_views_folder($extended_app_path,$field_names,$values_array);
						break;
					case "config":
						echo("config");//exit("exit 4789");
						
						break;
					case "models":
						$infile = $this->storage_path."/baselines_for_model_gens/Model.php";
						$file_as_string = file_get_contents($infile);
						$file_as_string = str_ireplace ('$model_table', $values_array['model_table'] , $file_as_string  );
						$file_as_string = str_ireplace ('$model', $values_array['model'], $file_as_string );
						//echo ($file_as_string);
						$outfile = $this->storage_path.'/connections/'. $values_array['db_connection_name'] .'/models/'.$values_array['model'].'.php';
						$this->add_delete_add_file_as_string($outfile,$file_as_string);
						
						$outfile = app_path().'/Models/'.$values_array['model'].'.php';
						//$this->add_delete_add_file_as_string($outfile,$file_as_string);
						echo("add_delete_add_file_as_string ".$outfile);//exit("exit 4757");
						break;
					case "controllers":
						$str = "";
						
						foreach ($field_names as $name){
							//echo $name. " * ".$values_array[$value);
							$str .= "$".$name.' = "'.$values_array[$name].'", ';
						}
						 
						$str = rtrim($str);
						$str = substr($str, 0, -1);
						$infile = $this->storage_path."/baselines_for_model_gens/Controller.php";
						$file_as_string = file_get_contents($infile);
						$file_as_string = str_ireplace ('$controller_name', $values_array['controller_name'] , $file_as_string  );
						$file_as_string = str_ireplace ('//generated_parameter_list', $str , $file_as_string );
						$outfile = $this->storage_path.'/connections/'.$values_array['db_connection_name'].'/controllers/'.$values_array['controller_name'].'.php';
						$this->add_delete_add_file_as_string($outfile,$file_as_string);
						
						$outfile = $this->controllers_path."/".$values_array['controller_name'].'.php';
						//$this->add_delete_add_file_as_string($outfile,$file_as_string);
						//echo("add_delete_add_file_as_string ".$outfile);exit("exit 4838");
						//echo("controllers ");exit("exit 4762");
						break;
					case "routes":
						//echo("add_delete_add_file_as_string "."routes ");exit("exit 4838");
						$infile = $this->storage_path."/baselines_for_model_gens/Route.php";
						$insert_string = file_get_contents($infile);
						$insert_string = str_ireplace ('xxx_node_name', $values_array['node_name'] , $insert_string);
						$insert_string = str_ireplace ('xxx_controller_name', $values_array['controller_name'] , $insert_string);
						//
						$infile = $this->routes_path."/routes.php";
						$file_as_string = file_get_contents($infile);
						$file_as_string = $this->anchor_boundaries_insert_replace(
						$file_as_string,
						$insert_string,
						"// GENERATED_CONTROLLERS_START_HERE",
						"// ".$values_array['node_name']." begin_generated_node",
						"// ".$values_array['node_name']." end_generated_node"
						);
						//echo "routes ".$insert_string;exit(' exit 4861');
						$outfile = $this->storage_path.'/connections/'.$values_array['db_connection_name']."/routes.php";
						$this->add_delete_add_file_as_string($outfile,$file_as_string);
						echo $outfile;
						//exit('exit 4856');
						$outfile = $this->routes_path."/routes.php";
						//$this->add_delete_add_file_as_string($outfile,$file_as_string);
						echo("add_delete_add_file_as_string ".$outfile);//exit("exit 4757");
						break;
				}
				break;
			case "change_database_connection":
				// ****************
				$node =  "controllers";
 			    $outfile = $this->DEHbase_controller_path ."BaseController.php";
        		$infile = $this->stored_connections_path. $values_array['db_connection_name']."/controllers/BaseController.php";

				if (File::exists($outfile)){
					unlink ($outfile);
					copy($infile,$outfile);
				}
				// ****************
				$node =  "config";
				$infile = $this->stored_connections_path."/".$values_array['db_connection_name']."/config/database.php";
	 			$outfile = $this->database_connection_config_path."database.php";
				//var_dump($infile);var_dump($outfile);$this->debug_exit(__FILE__,__LINE__,1);
				copy($infile,$outfile);
				// ****************
				$node =  "models";
				$infile = substr(app_path(),0,strlen(app_path())-4).'/storage/connections/'.$values_array['db_connection_name']."/models";
				$outfile = app_path()."/models";
				File::cleanDirectory($outfile);
				File::copyDirectory($infile,$outfile);
				// ****************
				// ****************
				$node =  "routes";
				$infile = substr(app_path(),0,strlen(app_path())-4).'/storage/connections/'.$values_array['db_connection_name']."/routes.php";
				$outfile = $this->routes_path."/routes.php";
				echo($infile."**".$outfile);
				$this->debug_exit(__FILE__,__LINE__,1);

				if (File::exists($outfile)){
					unlink ($outfile);
					copy($infile,$outfile);
				}
				//echo "we got here";exit("4725");
				
				break;
				
		}  // endswitch $action
		//exit("exit 4548");
		return;
	}

	
	public function convert_dollar_this_string($str_in){
		$needle = "this->";
		$i0 = stripos($str_in,$needle);
		if ($i0 > 0){
			//echo('found existing node'.$i0);//exit('2809');
			$i1 = strlen($needle);
			//$s1 = substr($str_in,0,$i0+$i1);
			$node = substr($str_in,$i0+$i1);
			$str_in = $this->$node;
			//echo $str_in;exit("4741");
		}
		//echo $str_in;exit("4740");
		return $str_in;
	}
	
	
	public function snippet_gen($action,$field_names,$values_array){
		$crlf = "\r\n";
		$str = "";
		switch ($action) {
			case "database_connection":
				//echo(db::getDefaultConnection());exit("4744");
				$result = DB::connection($this->db_snippet_connection)->table($this->snippet_table)->where('record_type','=','field_name_translation')->get($field_names);
				$result = (array) $result[0];
				$str .= "'".$values_array['db_connection_name']."'"." => array(".$crlf;
				unset($result["db_connection_name"]);
				unset($result["record_type"]);
				foreach ($result as $field_name => $translated_name){
					$str .= "'".$translated_name."' => '".$values_array[$field_name]."', ".$crlf;
				}
				$str .= "),".$crlf;
				break;
			case "routes":
				break;
		}
		return $str;
	}
	
	
				
	public function putUpdate_ppv($coming_from,$input,$bypassed_field_name) {
		// ppv stands for pulldown-pulldown-value which is the format we use to
		// define the advanced_query and business_rules 
		// we use the bypassed_field_name for first array
		// **********************
		//echo("<br>911 putUpdate_ppv<br>");//print_r($input);
		//exit("exit803");
		$field_name_array 	= Input::get('field_name_array');
		$r_o_array 			= Input::get('r_o_array');
		$value_array 		= Input::get('value_array');
		$ppv_3_field_names 	= json_decode(Input::get('encoded_ppv_field_names_array'));
		//print_r($ppv_3_field_names);
		$array = array();
		$names_array = json_decode(Input::get('first_lookup_array'),1);
		//print_r($field_name_array);
		//print_r($names_array);
		//exit("exit 4346");
		$a1 = $a2 = $a3 = array();
		$j = -1;
		$i = 0;
		foreach ($field_name_array as $value2){
			$j++;
			switch ($names_array[$value2]) {
			case $bypassed_field_name:
				break;
			default:
				$i++;
				$a1[] = $names_array[$value2];
				$a2[] = $r_o_array[$j];
				$a3[] = $value_array[$j];
				break;
			}
		}
		$int5 = (int) ($i/5);
		$xarray = array();
		$no_to_add = ($int5 * 5) - $i + 5;
		for ($i=0; $i<($no_to_add-1); $i++){
			$a1[] = $bypassed_field_name;
			$a2[] = $r_o_array[0];
			$a3[] = "";
		}
		$xarray[] = json_encode($a1);
		$xarray[1] = json_encode($a2);
		$xarray[2] = json_encode($a3);
		$ppv_3_field_names = (array) $ppv_3_field_names;
		$c = array_combine($ppv_3_field_names, $xarray);
		switch (Input::get('coming_from')) {
			case "advanced_query":
				break;
			case "business_rules":
				//print_r($c);//print_r(Input::all());
				//exit("exit 4258");
				$business_rules = $this->business_rules_ppv_build_them(
					$this->build_business_rules_relational_operators(),
					$field_name_array,
					$r_o_array,
					$value_array);
				$c['business_rules'] = json_encode($business_rules);
				break;
		}
		
		//echo('<br>953 $array<br>');
		//print_r($c);//print_r(Input::all());
		//exit("exit 4258");
		//echo("<br>966 response:<br>");print_r($response);print_r($array);
		$response = DB::connection($this->db_snippet_connection)->table($this->snippet_table)->where(Input::get('key_field_name'),'=',Input::get('key_field_value'))
		->update($c);
		//echo("<br>963 after update<br>");echo("<br>getQueryLog<br>");print_r(DB::getQueryLog());//echo("<br>966 after update<br>");
		//print_r($response);exit("(response) exit964");
		if($response) {
			//$this->debug_exit(__FILE__,__LINE__);
			return redirect('admin/'.$this->node_name.'/edit1')
			->with('message', 'record updated');
		}
		//$this->debug_exit(__FILE__,__LINE__);
	//	print_r(DB::getQueryLog());//exit("exit969");
		return redirect('admin/'.$this->node_name.'/edit1')
		->with('message', 'errors');

	}
	
	
	
	public function anchor_boundaries_insert_replace($file_as_string,$insert,$anchor,$boundary_start,$boundary_stop){
		//!! we may want to include or not include boundary start & stop strings
		// currently we strip them both.  if you want them, put them in the insert
		//
		//echo('anchor_boundaries_insert_replace');
		// this looks for the boundary start and stop strings and replaces what's in between them with $insert
		// if they don't exist, we create the boundary strings and wrap them around insert
		// and insert them immediately after the anchor string
		//echo ("length ".strlen($file_as_string));
		//echo("80:".substr($file_as_string,0,80));
		$crlf = "\r\n";
		$needle = $boundary_start;
		$i0 = stripos($file_as_string,$needle);
		//echo "***".$i0."***".$file_as_string."***".$needle."***";exit('4629');
		if ($i0 > 0){
			//echo('found existing node'.$i0);//exit('2809');
			$i1 = strlen($needle);
			$s1 = substr($file_as_string,0,$i0-1).$crlf;
			$needle = $boundary_stop;
			$i0 = stripos($file_as_string,$needle);
			if ($i0 > 0){
				//echo('found end node'.$i0);exit('2809');
				$i1 = strlen($needle);
				//$s2 = $crlf.$boundary_stop.$crlf.substr($file_as_string,$i0+$i1);
				$s2 = $crlf.substr($file_as_string,$i0+$i1);
			}
			else{
				exit("<br>we should have found ".$needle." but didnt<br>".$file_as_string."didnt find boundary stop 5056 ");
			}
		}
		else{  //fist time for this controller so we need to find the anchor
			$needle = $anchor;
			$i0 = stripos($file_as_string,$needle);
			if ($i0 > 0){
				$i1 = strlen($needle);
				//$s1 = substr($file_as_string,0,$i0-1).$crlf;
				//$s1 = substr($file_as_string,0,$i0+$i1).$crlf.$boundary_start.$crlf;
				$s1 = substr($file_as_string,0,$i0+$i1).$crlf;
				$s2 = $crlf.substr($file_as_string,$i0+$i1);
				//echo '*$s1*'.$s1.$model_route_as_string.'$s2'.$s2."***";exit('4650');
			}
			else {
				echo ("fatal error no anchor".$needle."<br>***<br>".$file_as_string."<br>***<br>");exit('<br>4653');
			}
	
		}
		//echo "<br>all three<br>".$s1.$insert.$s2;exit('<br> 4650');
		//echo($s1.$insert.$s2);
		//exit('<br>4653');
		return $s1.$insert.$s2;

	}
		
	public function set_current_show_volunteer_link() {
		//echo('set_current_show_volunteer_link');//exit("exit 332");
		$shows = DB::connection($this->db_data_connection)->table('shows')
		->where('record_type','=', 's')
		->orderBy('date', 'desc')
		->take(1)
		->get();
		$this->current_show_volunteer_link = $shows[0]->show_volunteer_link;
		return;
	}

	public function set_default_db_connection($fly_array) {
		$fly_array['default']='gohoooa';
		return $fly_array;
	}

	public function showAddVariables($exit) {
		//echo 'showAddVariables';exit("exit 1239");
		if (isset($errors)){
			echo("<br>**errors***<br>*****<br>");
			print_r($errors);
		}
			if (array_key_exists('coming_from',Input::all())){
			echo('<br>**coming_from***<br>*****<br>');
			print_r(Input::get('coming_from'));
		}

		if (isset($lookups)){
			echo('<br>**$lookups***<br>*****<br>');
			print_r($lookups);
		}
			//echo("<br>**1284***<br>*****<br>");
		if (isset($encoded_lookups)){
			echo("<br>**encoded_lookups***<br>*****<br>");
			print_r(Input::get('encoded_lookups'));
		}
		/*
		if (isset($field_name_array)){
			echo('<br>**$field_name_array***<br>*****<br>');
			print_r($field_name_array);
		}


		if (isset($coming_from)){
			echo('<br>**$coming_from***<br>*****<br>');
			print_r($coming_from);
		}

		if (isset($record)){
			echo('<br>**$record***<br>*****<br>');
			print_r($record);
		}

		if (isset($encoded_old_name_new_name_array)){
		echo("<br>*encoded_old_name_new_name_array****<br>*****<br>");
		print_r($encoded_old_name_new_name_array);
					}

		if (isset($table_name)){
			echo('<br>**$table_name***<br>*****<br>');
			print_r($table_name);
					}

		echo("<br>***f**<br>*****<br>");
		print_r($this->get_generated_snippets_by_report_key(Input::get('report_key')));
		echo("<br>**g***<br>*****<br>");
		print_r(Input::all());
		echo("<br>**h***<br>*****<br>");
		print_r(Input::get('report_key'));
		*/
		if ($exit == 'exit'){
			exit("stopped for display xexit 560");
		}
	}


	

	public function pu_copy_folder_mask_to_new_folder(
			$from_folder,
			$to_folder,
			$from_folder_prefix,
			$to_folder_prefix,
			$file_mask) {
		//echo 'pu_copy_folder_mask_to_new_folder';//exit("exit 39");
		$this->insure_node_name_directory($to_folder,$to_folder_prefix);
		//echo $view_files_prefix."/".$this->backup_node."<br>";exit("3644");
		if ($handle = opendir($from_folder_prefix.$from_folder)) {
			//echo "backup_path_to_new_directory " ."\n";
			//echo "<br>Directory handle: " .$handle ."\n";
			//echo "<br>Entries:".$to_folder_prefix."<br>";
			$i = 0;$k=0;
			$this->insure_node_name_directory($this->backup_node,$to_folder_prefix);
			//echo $to_folder_prefix."/".$this->backup_node."<br>";exit("3644");
			while (false !== ($entry = readdir($handle))) {
				/* This is the correct way to loop over the directory. */$process = true;
				$i = strpos("X".$entry,$file_mask);  // it starts at 0
				//echo('$i='.$i."*".$entry);
				if ($i >0) {
					$k++;
					//$this->pu_create_backups_before_redirect($this->backup_node,$path_to_files);
					$j = strpos($entry,$this->backup_node);
					$k = strlen($this->backup_node);
					$process = true;
					if (strpos($entry,'~')>0) {
						$process = false;
						echo $k. " skipping deleted file: ".$entry."<br>";
					}
					if ($process){
						$new_file_name = $to_folder_prefix ."/".$to_folder."/". $entry;
						$old_file_name = $from_folder_prefix .$from_folder."/". $entry;
						//echo $k. " this IS a backup file: ".$entry;
						//echo "<br>".'copying'."<br>".$old_file_name."<br>";
						//echo "<br>".'$new_file_name'."<br>".$new_file_name."<br>";
						//exit("3661");
						copy($old_file_name,$new_file_name);
					}
				}
				else {
					//echo "<br>bypass:".$entry."<br>";
				} // end if
			}  // end while
			closedir($handle);
		}  // end if good file handle
		//echo ('<br>4111');
		return;
	}
	
	
	
	public function pu_gen_files_special_purpose(
			$option,
			$node_name,
			$backup_node_name,
			$table_name,
			$view_files_prefix) {
		//echo("pu_gen_files_special_purpose".$option."*".$node."*".$table_name."*".$node_name."*".$view_files_prefix."*");
		//exit("3616");
		//$this->clean_orphan_files($this->model_table,);
		//$field_name_array = (array) json_decode(Input::get('encoded_field_name_array'));
		//$path_to_files = $view_files_prefix.$node;
		//$path_to_files							= $view_files_prefix."/".$node_name;
		//echo("pu_gen_files_special_purpose".$path_to_files."*".$option."*".$node_name."*".$table_name."*".$view_files_prefix."*");
		//exit("3616");
		$no_of_blade_files 						= 0;
		$no_of_backup_files_ceated 				= 0;
		$no_of_existing_back_up_files 			= 0;
		$files_encountered_with_existing_backup = 0;
		switch ($option) {
	
		case "backup_path_to_new_directory":
			if ($handle = opendir($view_files_prefix)) {
				//echo "backup_path_to_new_directory " ."\n";
				//echo "Directory handle: " .$handle ."\n";
				//echo "Entries:".$view_files_prefix."<br>";
				$i = 0;$k=0;
				$blade_suffix = 'blade.php';
				$this->insure_node_name_directory($this->backup_node,$view_files_prefix);
				//echo $view_files_prefix."/".$this->backup_node."<br>";exit("3644");
				while (false !== ($entry = readdir($handle))) {
					/* This is the correct way to loop over the directory. */
					$i = strpos($entry,$blade_suffix);
					if ($i >0) { 
						$no_of_blade_files++;
						$k++;
						//$this->pu_create_backups_before_redirect($this->backup_node,$path_to_files);
						$j = strpos($entry,$this->backup_node);
						$k = strlen($this->backup_node);
						$process = true;
						if (strpos($entry,'~')>0) {
							$process = false;
							//echo $k. " skipping deleted file: ".$entry."<br>";
						}
						if ($process){
							$no_of_existing_back_up_files++;
							$new_file_name = $view_files_prefix ."/".$backup_node_name."/". $entry;
							$file_name = $view_files_prefix ."/". $entry;
							//echo $k. " this IS a backup file: ".$entry;
							echo "<br>".'$file_name'."<br>".$file_name."<br>";
							echo "<br>".'$new_file_name'."<br>".$new_file_name."<br>";
							//exit("3661");
							copy($file_name,$new_file_name);
						}						
					}
					else {
						echo "bypass:".$entry."<br>";
					} // end if
				}  // end while
				closedir($handle);
				echo('$no_of_blade_files: '.$no_of_blade_files."</br>");
				echo('$files_encountered_with_existing_backup: '.$files_encountered_with_existing_backup."</br>");
				echo('$no_of_backup_files_ceated: '.$no_of_backup_files_ceated."</br>");
				echo('$no_of_existing_back_up_files: '.$no_of_existing_back_up_files."</br>");
			}  // end if good file handle
			break;
		case "create_baseline_redirects":
			if ($handle = opendir($view_files_prefix)) {
				echo "Directory handle:. $handle.\n";
				echo "Entries:".$view_files_prefix."<br>";
				//exit("3684");
				$i = 0;$k=0;
				while (false !== ($entry = readdir($handle))) {
					/* This is the correct way to loop over the directory. */
					$i = strpos($entry,'blade.php');
					if ($i >0) { 
						$no_of_blade_files++;
						$k++;
						$process = true;
						$j = strpos($entry,'~');
						if ($j >0) { 
							$process = false;
							echo $k. " skipping deleted file: ".$entry."<br>";
						}
						if($process){
							$this->debug_exit(__FILE__,__DIR__,10);

							$strx = "@include('../'.'baseline_blades/".substr($entry,0,$i-1)."')";
							$file_name = $view_files_prefix ."/". $entry;
							echo "creating/replacing: ".$file_name."<br><br>";
							//print_r($file_name);
							echo "with: ".$strx."<br>";
							//exit("3704");
							File::put($file_name, $strx);
							$files_encountered_with_existing_backup++;
						}
					}
					else {
						echo "bypass:".$entry."<br>";
					} // end if
				}  // end while
				closedir($handle);
				echo('$no_of_blade_files: '.$no_of_blade_files."</br>");
				echo('$files_encountered_with_existing_backup: '.$files_encountered_with_existing_backup."</br>");
				echo('$no_of_backup_files_ceated: '.$no_of_backup_files_ceated."</br>");
				echo('$no_of_existing_back_up_files: '.$no_of_existing_back_up_files."</br>");
			}  // end if good file handle
			break;
			
		default:
			echo ("bad option (". $option.") passed to pu_gen_files_special_purpose");exit('3532');
		} // end switch
		
	} // end pu_gen_files_special_purpose

	/**
	 * Copy a file, or recursively copy a folder and its contents
	 * @param       string   $source    Source path
	 * @param       string   $dest      Destination path
	 * @param       string   $permissions New folder creation permissions
	 * @return      bool     Returns true on success, false on failure
	 */
	function xcopy($source, $dest, $permissions = 0755)
	{
		// Check for symlinks
		if (is_link($source)) {
			return symlink(readlink($source), $dest);
		}
	
		// Simple copy for a file
		if (is_file($source)) {
			return copy($source, $dest);
		}
	
		// Make destination directory
		if (!is_dir($dest)) {
			mkdir($dest, $permissions);
		}
	
		// Loop through the folder
		$dir = dir($source);
		while (false !== $entry = $dir->read()) {
			// Skip pointers
			if ($entry == '.' || $entry == '..') {
				continue;
			}
	
			// Deep copy directories
			xcopy("$source/$entry", "$dest/$entry", $permissions);
		}
	
		// Clean up
		$dir->close();
		return true;
	

}  // end of class
























}
