<?php
namespace App\Http\Controllers;

use App\Models\MiscThing;
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
            $snippet_table = "";

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




    public function debugx($parmstr,$file,$line,$function) {
        $parma = str_split($parmstr);
        //var_dump($parma);exit('xit58 deh');
        foreach ($parma as $index=>$value) {
            if ($index == 0) {
                if ($value){
                    echo ('<BR>stopping: ');    
                }
                else{
                    echo ('<BR>');     
                }
            }
            if ($index == 1) {
                if ($value){
                    echo (' at '.$line);    
                }
            }
            if ($index == 2) {
                if ($value){
                    echo (' in method: ' .$function);    
                }
            }
            if ($index == 3) {
               if ($value){
                   $i0 = strripos($file,"/")+1;
                   echo (" in file: ".substr($file,$i0));    
               }
            }
       } // end foreach
       if ($parma[0]) exit();
    }

    public function debug0($file,$line,$function) {
       // echo ('<BR>'.$file. ' at line: '.$line.' in method: ' .$function);
       //echo ('<BR>'. $line.' in method: ' .$function.' of file '.$file);
       //echo ('<BR>'. $line.' in method: ' .$function);
               $i0 = strripos($file,"/")+1;
       echo ('<BR>'. $line.' in method: ' .$function." file: ".substr($file,$i0));
     }

    public function debug1($file,$line,$function) {
       //echo ('<BR>'. ' at line: '.$line.' in method: ' .$function.' of file '.$file);
        $i0 = strripos($file,"/")+1;
       echo ('<BR>stopping: '. $line.' in method: ' .$function." file: ".substr($file,$i0));
       exit();
     }

    public function debug2($file,$line,$function) {
       //echo ('<BR>'. ' at line: '.$line.' in method: ' .$function.' of file '.$file);
       echo ('<BR>line: '. $line.' in method: ' .$function);
       //exit();
     }
    public function debug4($file,$line,$function) {
       //echo ('<BR>'. ' at line: '.$line.' in method: ' .$function.' of file '.$file);
        $i0 = strripos($file,"/");
       echo ('<BR>line '.$line.' in method: ' .$function." file: ".substr($file,$i0).":<BR> ");
       //exit();
     }


    public function debug3($file,$line,$function) {
       //echo ('<BR>'. ' at line: '.$line.' in method: ' .$function.' of file '.$file);
       echo ('<BR>'. $line." ");
       
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
  
            

    public function blade_gen_radio_button_list($report_key,$objOrArray) {
        //echo ('<br>blade_gen_radio_button_list<br><br>'.$report_key);$this->debug_exit(__FILE__,__LINE__,10);
//blade_gen_simple_add
        $fnam = $this->view_files_prefix."/".$this->generated_files_folder."/".$report_key.'_browse_select_field_names_row.blade.php';
        File::put($fnam, $this->blade_gen_radio_button_list_field_names_row($this->model,$_REQUEST["to"]));
       //echo ('<br>blade_gen_radio_button_list<br><br>'.$report_key);$this->debug_exit(__FILE__,__LINE__,10);

        $fnam = $this->view_files_prefix."/".$this->generated_files_folder."/".$report_key.'_browse_select_display_snippet.blade.php';
        $objOrArray = "object";
        File::put($fnam,$this->blade_gen_radio_button_list_data_rows($this->model,$_REQUEST["to"],'version1',$objOrArray));
        //echo ('<br>blade_gen_radio_button_list<br><br>'.$report_key);$this->debug_exit(__FILE__,__LINE__,10);
   }
  
     
    public function blade_gen_simple_add($report_key,$field_name_array) {
        //echo ('<br>blade_gen_modifiable_fields_add<br><br>');
        var_dump($field_name_array);$this->debug_exit(__FILE__,__LINE__,0);


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
	

    public function convert_string_variables_to_variables($str0) {
        if (stripos($str0,'$this->')=== 0){
            $str1 = substr($str0,7);
            return $this->$str1;
            //$this->debug1(__FILE__,__LINE__,__FUNCTION__);
        }
        else {
            return $str0;
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
        $query_relational_operators_array[] =  "like";		
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
	
    /*
    // Basic Join Statement DB::table('users')
          ->join('contacts', 'users.id', '=', 'contacts.user_id')
          ->join('orders', 'users.id', '=', 'orders.user_id')
          ->select('users.id', 'contacts.phone', 'orders.price')
          ->get();
    */



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

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
       //
        $this->validate($request, 
            [ 
        'record_type' => 'required',
        'report_name' => 'required',
        'report_query' => 'required',
        'bypassed_field_name' => 'required',
        'report_containing_menu' => 'required'
        ]);

        $miscThingUpdate=$request->all(); // important!!
        $miscThing=MiscThing::find($id);
        $miscThings->update($miscThingUpdate);
 
       return redirect('miscThings');
    }



}
