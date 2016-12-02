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
