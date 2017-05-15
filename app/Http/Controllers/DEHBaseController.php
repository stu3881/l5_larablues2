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

     public function blade_gen_browse_select_field_names_row($model,$field_name_array) {
        //echo '<br>blade_gen_browse_select_field_names_row';//exit("exit 99");
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

       

    public function blade_gen_browse_select($report_key,$objOrArray) {
        //echo ('<br>blade_gen_browse_select<br><br>'.$report_key);$this->debug_exit(__FILE__,__LINE__,10);
//blade_gen_simple_add
        $fnam = $this->view_files_prefix."/".$this->generated_files_folder."/".$report_key.'_browse_select_field_names_row.blade.php';
        File::put($fnam, $this->blade_gen_browse_select_field_names_row($this->model,$_REQUEST["to"]));
       //echo ('<br>blade_gen_browse_select<br><br>'.$report_key);$this->debug_exit(__FILE__,__LINE__,10);

        $fnam = $this->view_files_prefix."/".$this->generated_files_folder."/".$report_key.'_browse_select_display_snippet.blade.php';
        $objOrArray = "object";
        File::put($fnam,$this->blade_gen_browse_select_data_rows($this->model,$_REQUEST["to"],'version1',$objOrArray));
        //echo ('<br>blade_gen_browse_select<br><br>'.$report_key);$this->debug_exit(__FILE__,__LINE__,10);
   }
  
     
    public function blade_gen_simple_add($report_key,$field_name_array) {
        //echo ('<br>blade_gen_modifiable_fields_add<br><br>');
        //var_dump($field_name_array);$this->debug_exit(__FILE__,__LINE__,10);


        $crlf = "\r\n";
        //$crlf = "";
        $left = '<div id="div_inside_update_active_tasks_button_bar" style="width:$width"> '. $crlf. 
                '<table id="table_inside_update_active_tasks" style="width:$width">'. $crlf.
                '<th></th>'. $crlf.
                '<tr>'. $crlf.
                '<td style="text-align:left">'. $crlf;
        

        $right = "
            </table>
        </div>";
        //var_dump($field_name_array);
        $mid = "";
        foreach($field_name_array as $name=>$value) {
            $mid .= "<tr>";
            $mid .=  '<td style="text-align:left">'. $crlf;
            $mid .= "{{ Form::label(\"$name\",\"$name\") }}".$crlf;
            $mid .= "</td>". $crlf;

            $mid .=  '<td style="text-align:left">'. $crlf;
            $mid .= "{{ Form::text(\"$name\",'') }}".$crlf;
            $mid .= "</td>". $crlf;
            $mid .= "</tr>";
                //echo("<br>".$name."**".$mid);$this->debug_exit(__FILE__,__LINE__,10);
        }


        $strx = $left. $mid. $right;
        return $strx;
        //echo($mid);$this->debug_exit(__FILE__,__LINE__,10);
                //var_dump($field_name_array);$this->debug_exit(__FILE__,__LINE__,10);

        $fnam = $this->view_files_prefix."/".$this->generated_files_folder.
        "/".$report_key.'_modifiable_fields_add.blade.php';
        //File::put($fnam, $this->blade_gen_modifiable_fields_add($this->model,$_REQUEST["to"]));
        File::put($fnam, $strx);
        /*
        $fnam = $this->view_files_prefix."/".$this->generated_files_folder."/".$report_key.'_blade_gen_simple_add.blade.php';
        $objOrArray = 'array';
        File::put($fnam,$this->blade_gen_simple_add($this->model,$_REQUEST["to"],'version1',$objOrArray));
         //echo ('<br>'. $fnam.'<br><br>'.$report_key);$this->debug_exit(__FILE__,__LINE__,10);
		*/

     }
  

    public function blade_gen_modifiable_fields_add($report_key,$field_name_array) {
        //echo ('<br>blade_gen_modifiable_fields_add<br><br>');
        //var_dump($field_name_array);$this->debug_exit(__FILE__,__LINE__,10);

        $crlf = "\r\n";
        //$crlf = "";
        $left = '<div id="div_inside_update_active_tasks_button_bar" style="width:$width"> '. $crlf. 
                '<table id="table_inside_update_active_tasks" style="width:$width">'. $crlf.
                '<th></th>'. $crlf.
                '<tr>'. $crlf.
                '<td style="text-align:left">'. $crlf;
        

        $right = "
            </table>
        </div>";
        //var_dump($field_name_array);
        $mid = "";
        foreach($field_name_array as $name=>$value) {
            $mid .= "<tr>";
            $mid .=  '<td style="text-align:left">'. $crlf;
            $mid .= "{{ Form::label(\"$name\",\"$name\") }}".$crlf;
            $mid .= "</td>". $crlf;

            $mid .=  '<td style="text-align:left">'. $crlf;
            $mid .= "{{ Form::text(\"$name\",'') }}".$crlf;
            $mid .= "</td>". $crlf;
            $mid .= "</tr>";
                //echo("<br>".$name."**".$mid);$this->debug_exit(__FILE__,__LINE__,10);
        }


        $strx = $left. $mid. $right;
        //echo($mid);$this->debug_exit(__FILE__,__LINE__,10);
                //var_dump($field_name_array);$this->debug_exit(__FILE__,__LINE__,10);

        $fnam = $this->view_files_prefix."/".$this->generated_files_folder.
        "/".$report_key.'_modifiable_fields_add.blade.php';
        //File::put($fnam, $this->blade_gen_modifiable_fields_add($this->model,$_REQUEST["to"]));
        File::put($fnam, $strx);
     }
 
    public function blade_gen_browse_select_data_rows($model,$field_name_array,$version,$objOrArray) {
        //echo '<br>blade_gen_browse_select_data_rows<br><br>';$this->debug_exit(__FILE__,__LINE__,10);

        $crlf = "\r\n";
        switch ($objOrArray)   {

            case "object":
                $stry = "$"."record->";
                $strx = "";
                foreach($field_name_array as $index=>$field_name) {
                    $strx .= $crlf;
                    $strz = $stry . $field_name;
                    $strx .= "<td class='text_align_left select_pink' >".$crlf.
                            "{{ Form::label('', ". $strz. ") }}".$crlf.
                            "</td>".$crlf;
                    }
                return $strx;
                break;
            case "array":
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
                break;

            }
        switch ($version)   {

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
                //echo("blade_gen_browse_select_data_rows");$this->debug_exit(__FILE__,__LINE__,1);
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
                    $data_str   = $array_name_string . $field_name . "\']";
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
                //  $data_str   = $array_name_string . $field_name . "']";
                    $array[] = $prefix_str;
                //  $array[] = $data_str;
                    //$array[] = "xxx";
                    $array[] = $suffix_str;
                //}
                //echo("blade_gen_browse_select_data_rows");var_dump($array);$this->debug_exit(__FILE__,__LINE__,1);
                return $array;
                break;
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
        $r_o_array             = $working_arrays['ppv_define_query'][$r_o_array_name];
     //var_dump($r_o_array);$this->debug_exit(__FILE__,__LINE__,0);        
     //var_dump($r_o_array);$this->debug_exit(__FILE__,__LINE__,10);
       $value_array_name      = $working_arrays['ppv_define_query']['field_name_array']['value'];
       $value_array           = $working_arrays['ppv_define_query'][$value_array_name];

        //$this->debug_exit(__FILE__,__LINE__,0);var_dump($query_relational_operators_array);var_dump($field_name_array);
        //var_dump($field_name_array);
       //var_dump($r_o_array);
        //var_dump($value_array);
        //$this->debug_exit(__FILE__,__LINE__,10);
        //echo 'DB::connection( '.$this->db_data_connection.')->table( '.$this->model_table.') ';
        $dash_gt = " ->";
        //$dash_gt = " query->where";
        //$query = MiscThing::
        $query = DB::connection($this->db_snippet_connection)->table($this->model_table);
        echo 'DB::connection( '.$this->db_snippet_connection.')->table( '.$this->model_table.') ';
        $executing_distinct = 0;
        foreach ($field_name_array as $index=>$field_name) {
            $value = $field_name;
           if ($field_name <> $bypassed_field){
                $r_o = $r_o_array [$index];
                $v = $value_array[$index];
                switch ($r_o) {
                case "=":
                case "<>":
                case ">":
                case "<":
                case "<=":
                case ">=":
             
                   echo ($dash_gt.'where( '.$field_name.' '.$r_o.' '.$v);//exit (' exit 155');
                    //$query_string .= '->where('.$field_name.','.$r_o.','.$v.')';
                    $query->where($field_name,$r_o,$v);
               
                break;
        

            } // end switch
        
            switch ($r_o) {
				//case  "join":
                case "join":
                    //DB::table('name')->join('table', 'name.id', '=', 'table.id')
                    //->select('name.id', 'table.email');		//case  "where":
            case "whereBetween":
            	$query->whereBetween($field_name,$value);
            	 echo(' ->whereBetween('.$field_name.','.$aord.')');
                break;
            case "whereNull":
            	$query->whereNull($field_name);
            	 echo(' ->whereNull('.$field_name.')');
                break;
            case "whereNotNull":
            	$query->whereNotNull($field_name);
            	 echo(' ->whereNotNull('.$field_name.')');
                break;
		case  "groupBy":
            	$query->groupBy($field_name);
            	 echo(' ->groupBy('.$field_name.')');
                break;
		//case  "getArray":
            	//$query->getArray($field_name);
            	// echo(' ->getArray('.$field_name.')');
                //break;



                //**************
                 case "orderBy":
                      $aord = "ASC";
                     
                        $query->orderBy($value);
                        echo(' ->orderBy('.$value.','.$aord.')');
                   
                    break;
                case "orderByDesc":
                    $aord = "DESC";
                   
                        $query->orderBy($value,$aord);
                        echo(' ->orderBy('.$value.','.$aord.')');
                    
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
                  


            } // end switch
        } // end of not = "not_used"
        
    }  // end foreach
 
    //echo ("<br>executing query");
    if ($executing_distinct == 1){
    	echo("->get(['".$distinct_value."'])");
    	return $query->get(['record_type']);
    }
    else {
    	echo("->get()");
    	return $query->get();
    }
    
    
    //return  (array) $query;
    }   // end of b uild_and_execute_query

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
		//$query_relational_operators_array[] =  "getArray";
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
		//var_dump($field_name_array);$this->debug_exit(__FILE__,__LINE__,0);
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
				//var_dump($field_name_array);var_dump($r_o_array);var_dump($value_array);echo("<BR>");$this->debug_exit(__FILE__,__LINE__,0);
				////echo("<BR>".$business_rules_relational_operators[$r_o_array[$index]]);
				//$translated_ro_array_index = $business_rules_relational_operators[$r_o_array[$index]];
				//* we used to use value as the index but we needed to use the index instead
				$translated_ro_array_index = $business_rules_relational_operators[$index];
				$translated_ro_array_index = $r_o_array[$index];
				$v =  $value_array[$index];

				//echo("<BR>".'$translated_ro_array_index '); echo($translated_ro_array_index); $this->debug_exit(__FILE__,__LINE__,10);
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

		//var_dump($update_array);$this->debug_exit(__FILE__,__LINE__,1);
		return $update_array;
	}
	
    public function snippet_gen_modifiable_fields($field_name_array,$lookups,$data_array){
        //echo 'snippet_gen_modifiable_fields';
        // this generates the code to create the table 
        // for the modifiable fields view

        // IT'S ALL JUST STRINGS!
        // ***
        // This is what your input view will look like the next time you load it
        //$field_name_array = array_values($field_name_array);
        $crlf = "\r\n";
        $strx = "";

        $field_ctr = -1;
        //var_dump($field_name_array);var_dump($lookups);$this->debug_exit(__FILE__,__LINE__,10);
        if (count($field_name_array)> 0){
        foreach($field_name_array as $index=>$fieldx) {
            $field_ctr ++;
            //echo"<br>name: ";print_r($fieldx);
            $strx .=
            "<tr>".$crlf;
            //$crlf;
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
                    "{{ Form::text('".$fieldx."',$". "record['".$fieldx."']) }}".$crlf.
                    //"{{ Form::text('".$fieldx."','xxx') }}".$crlf.
                    "</td>".$crlf;
                }
            }
            $strx .= "</tr>".$crlf;
            //$strx .= $crlf;
        } // end foreach
    } // end array has entries
        return $strx;
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
