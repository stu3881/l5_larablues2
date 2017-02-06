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






	public function debug_exit($file,$line,$exit=1) {
		echo " "."in ".substr($file,strripos ($file , "/")+1)." on line **".$line." ";
		if ($exit){
			exit(" exiting");
		}
	}
	
	public function build_and_execute_query(
        $working_arrays,
        $bypassed_field,
        $query_relational_operators_array) {
        //echo("<br>build_and_execute_query");
        //var_dump($working_arrays['ppv_define_query']);$this->debug_exit(__FILE__,__LINE__,10);
        //
        // *******
        // this guy does a lot
        // *****
        //$fieldName_r_o_value_array);

        $field_name_array_name = $working_arrays['ppv_define_query']['field_name_array']['field_name'];
        $field_name_array      = $working_arrays['ppv_define_query'][$field_name_array_name];
        $r_o_array_name        = $working_arrays['ppv_define_query']['field_name_array']['r_o'];
        //$r_o_array             = $working_arrays['ppv_define_query'][$r_o_array_name];
        $r_o_array             =$working_arrays['ppv_define_query']['query_r_o_array_values'];

       $value_array_name      = $working_arrays['ppv_define_query']['field_name_array']['value'];
       $value_array           = $working_arrays['ppv_define_query'][$value_array_name];

        //$this->debug_exit(__FILE__,__LINE__,0);var_dump($query_relational_operators_array);var_dump($field_name_array);
        //var_dump($field_name_array);var_dump($r_o_array);
        //var_dump($value_array);$this->debug_exit(__FILE__,__LINE__,10);
        //echo 'DB::connection( '.$this->db_data_connection.')->table( '.$this->model_table.') ';
        $first_time = 0;
        $dash_gt = " ->";
        $dash_gt = " query->where";
        //$query = MiscThing::
        $query = DB::connection($this->db_data_connection)->table($this->model_table);
        echo 'DB::connection( '.$this->db_data_connection.')->table( '.$this->model_table.') ';
        $executing_distinct = 0;
        foreach ($field_name_array as $index=>$field_name) {
            $value = $field_name;
           if ($field_name <> $bypassed_field){
                $r_o = $r_o_array [$index];
                $v = $value_array[$index];
                //echo("<BR>");$this->debug_exit(__FILE__,__LINE__,0);
                //echo("rrr ".$field_name.'*'.$r_o.'*'.$v.'*');
                switch ($r_o) {
                case "=":
                case "<>":
                case ">":
                case "<":
                case "<=":
                case ">=":
                if ($first_time ) {
                    $query = MiscThing::where($field_name,$r_o,$v);
                    echo(' MiscThing::where('.$field_name.' '.$r_o.'"'.$v.'")');
                    $first_time = 0;
                    //echo("first time");$this->debug_exit(__FILE__,__LINE__,0);
                }
                else{
                   //echo ($dash_gt.'where( '.$field_name.' '.$r_o.' '.$v);//exit (' exit 155');
                    //$query_string .= '->where('.$field_name.','.$r_o.','.$v.')';
                    $query->where($field_name,$r_o,$v);
                }
                break;
        
            case "whereBetween":
                break;
            } // end switch
        
            switch ($r_o) {
                 case "orderBy":
                      $aord = "ASC";
                      if ($first_time) {
                        $query = MiscThing::orderBy($value,$aord);
                        echo(' MiscThing::orderBy('.$value.','.$aord.')');
                        $first_time = 0;
                    }
                    else{
                        $query->orderBy($value);
                        echo(' ->orderBy('.$value.','.$aord.')');
                    }
                    break;
                case "orderByDesc":
                    $aord = "DESC";
                    if ($first_time) {
                         $query = MiscThing::orderBy($value,$aord);
                         echo(' MiscThing::orderBy('.$value.','.$aord.')');
                        $first_time = 0;
                    }
                    else
                    {
                        $query->orderBy($value,$aord);
                        echo(' ->orderBy('.$value.','.$aord.')');
                    }
                    break;
                case "distinct":
             		$executing_distinct = 1;
             		$distinct_value = $value;
                    $query->distinct();
                    echo(" ->distinct()");
                   
                    break;
                case "xgetArray":
                    //$query->get();
                    break;
                  
                case "join":
                    //DB::table('name')->join('table', 'name.id', '=', 'table.id')
                    //->select('name.id', 'table.email');
                case "whereBetween":
                    break;
            } // end switch
        } // end of not = "not_used"
        
    }  // end foreach
 
    if ($first_time) {
        //$this->debug_exit(__FILE__,__LINE__,10);
        return("");
    }
    //echo ("<br>executing query");
    if ($executing_distinct == 1){
    	echo("->get([".$distinct_value."])");
    	return $query->get(['record_type']);
    }
    else {
    	echo("->get()");
    	return $query->get();
    }
    
    
    //return  (array) $query;
    }   // end of build_and_execute_query

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
	
	public function build_validation_array(
		$business_rules_relational_operators,
		$field_name_array,
		$r_o_array,
		$value_array)
	{
		//var_dump($business_rules_relational_operators);
		//var_dump($field_name_array);var_dump($r_o_array);var_dump($value_array);$this->debug_exit(__FILE__,__LINE__,0);
		//csrf_token();
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
					//echo("*<BR>".'adding '.$field_name." to update_array");$this->debug_exit(__FILE__,__LINE__,0);
					$separator = "";
					$update_array[$field_name] = "";	
					//var_dump($update_array);
				}
				//var_dump($field_name_array);var_dump($r_o_array);var_dump($value_array);
				//echo("<BR>".$r_o_array[$index]);$this->debug_exit(__FILE__,__LINE__,0);
				//echo("<BR>".$business_rules_relational_operators[$r_o_array[$index]]);
				$translated_ro_array_index = $business_rules_relational_operators[$r_o_array[$index]];
				//$translated_ro_array_index = $business_rules_relational_operators[$index];
				$v =  $value_array[$index];

				//echo("<BR>".'$translated_ro_array_index '); echo($translated_ro_array_index); $this->debug_exit(__FILE__,__LINE__,0);
				$var = $translated_ro_array_index.$v;
				//echo("*<BR>".$var);$this->debug_exit(__FILE__,__LINE__,0);
				// most use the name for syntax but a few need adjusting
				switch ($translated_ro_array_index) {
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
					echo("default");
						//$var = $r_o_array[$index].$v;
						break;
				} // end switch
				$update_array[$field_name] .= $separator.$var;
				//echo('$update_array[$field_name]'.$update_array[$field_name]);
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
	

	
	public function get_generated_snippets() {
		//echo 'get_generated_snippets 838';//exit("exit");
		//2014-10-13 modified query to only get 

//var_dump($ConnectionsQuery);$this->debug_exit(__FILE__,__LINE__,1);
//var_dump($ConnectionsQuery)

		$array = array();
		$arrx  = DB::connection($this->db_snippet_connection)->table($this->snippet_table)
		->where('record_type', 		'=', 'table_snippets')
		->where('table_name',		'=',  $this->model_table)
		->get();
		//var_dump($arrx);
		//print_r($array);
		//exit("exit 292");
		if ($arrx) {
			//$array1 = (array) $arrx[0];
			foreach($arrx as $name=>$value) {
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




}
