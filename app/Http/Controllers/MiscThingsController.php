<?php

namespace App\Http\Controllers;

use App\Models\MiscThing;
use App\Http\Requests;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Schema; 
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\View;
use Illuminate\Http\Request;
use App\Http\Requests\StoreMiscThings;
//use App\Http\Controllers\Schema;

class MiscThingsController extends DEHBaseController
{
        public function __construct(
     
        /**/
        $record_type                    = "table_controller", 
        //$db_connection_name             = "blues_main", 
        $db_connection_name             = "", 
        $db_snippet_connection          = "",
        $db_data_connection             = "",
        //$db_snippet_connection          = "",
        $controller_name                = "miscThingsController", 
        $no_of_blank_entries            = "5", 
        $model                          = "MiscThing", 
        $model_table                    = "miscThings", 
        $node_name                      = "miscThings", 
        $snippet_table                  = "miscThings", 
        $snippet_table_key_field_name   = "id", 
        $backup_node                    = "backup_before_redirect_to_baseline", 
        $generated_files_folder         = "generated_files", 
        $key_field_name                 = "id", 
        $bypassed_field_name            = "not_used",
        $view_files_prefix = "",

        $field_list_array_name = "",
        $field_name_list_array = "",

        $field_name_lists_array = "",
        $field_name_list_array_first_index = "",
        $my_ctr                             = 0

        ) 
        {
        
        parent::__construct();
        //$this->debug_exit(__FILE__,__LINE__,0); echo(" entering constructor");

        //$snippet_table = "miscThings";
        //$defaultConnection = "localhost_stu3881_main";
        //$queryx = $this->get_db_connection_data($snippet_table,$defaultConnection);

        //$this->beforeFilter('csrf', array('on'=>'post'));
        //$this->beforeFilter('admin');
        $this->db_connection_name              = $db_connection_name;
        $this->db_data_connection              = $db_data_connection;
        $this->db_snippet_connection           = $db_snippet_connection;
        //$this->db_snippet_connection           = "";
       
        $this->model                            = $model;
        $this->model_table                      = $model_table;
        $this->snippet_table                    = $snippet_table;
        $this->snippet_table_key_field_name     = $snippet_table_key_field_name;
        $this->node_name                        = $node_name ;
        $this->backup_node                      = $backup_node;
        $this->generated_files_folder           = $generated_files_folder;
        $this->key_field_name                   = $key_field_name;
        $this->bypassed_field_name              = $bypassed_field_name;     
        $this->no_of_blank_entries              = $no_of_blank_entries;

        // these are derived
        $this->views_files_path     = substr(app_path(),0,strlen(app_path())-4)."/resources/views/".$this->node_name;
        $this->storage_path         = substr(app_path(),0,strlen(app_path())-4)."/storage";
        $this->controllers_path     = app_path()."/Http/Controllers";
        $this->routes_path          = app_path()."/Http";
        $this->key_field_array      = array($this->snippet_table_key_field_name=>$this->snippet_table_key_field_name);
        $this->make_sure_table_snippet_exists($this->model_table);
        //$this->debug_exit(__FILE__,__LINE__,0);
        $this->generated_snippets_array        = $this->get_generated_snippets();

       //config
        $this->database_connection_config_path = substr(app_path(),0,strlen(app_path())-4)."/config/";
        
        //controllers
        $node =  "controllers";
        $this->DEHbase_controller_path     = app_path()."/Http/Controllers/";
         $this->stored_connections_path = substr(app_path(),0,strlen(app_path())-4).'/storage/connections/'. $this->db_connection_name ;

        $this->my_ctr = $my_ctr;
        //routes

        // these are derived
 
        $this->view_files_prefix                = $this->views_files_path;
        $this->key_field_array                  = array($this->snippet_table_key_field_name=>$this->snippet_table_key_field_name);
        $this->key_field_name_array             = array($this->snippet_table_key_field_name=>$this->snippet_table_key_field_name);
        $this->make_sure_table_snippet_exists($this->model_table);
        //$this->debug_exit(__FILE__,__LINE__);
        $this->generated_snippets_array         = $this->get_generated_snippets();
        // generated_snippets are arrays that are generated when the properties



        $this->required_fields_array            = $this->generated_snippets_array['required_fields_array'];
        //echo $this->view_files_prefix ;exit ("exit in constructor");


        // THIS IS HOW WE CHANGE CONNECTIONS
 

        $MiscThing = new MiscThing;
        $MiscThing->setConnection("blues_main");
        $miscThings = MiscThing::where('record_type','=','table_controller')
            ->where('controller_name','='    ,"MiscThingsController")
            ->get();
        $this->db_snippet_connection            = $miscThings[0]->db_snippet_connection;
        $this->db_data_connection               = $miscThings[0]->db_data_connection;
        //echo("**".$this->db_snippet_connection ."**");
        //echo("**".$this->db_data_connection . $miscThings[0]->db_connection_name. "**");
        //var_dump($miscThings[0]);  

       
        $this->db_snippet_connection            = "blues_main";
        $this->db_data_connection               = "blues_main";
        //var_dump($ConnectionsQuery);$this->debug_exit(__FILE__,__LINE__,1);
       //$this->db_data_connection               = "gohoooa_stu3881_main";
        //above here work
        //$this->db_data_connection               = "localhost_stu3881_main";

       
        //$this->debug_exit(__FILE__,__LINE__,0);
        $this->field_name_lists_array = $field_name_lists_array;
        $this->field_name_list_array = "";
 
        // field_name_list_array defines the arrays depending on $what_we_are_doing
        // the first level index 
       //$this->field_name_list_array = (array) $this->initialize_field_name_list_array();
       $this->field_name_list_array_first_index = $field_name_list_array_first_index;
        //$this->debug_exit(__FILE__,__LINE__,0); echo(" leaving constructor");
 
    }



     /**
     * add_delete_add_file_as_string
     *
     */

    public function add_delete_add_file_as_string($file_name,$file_as_string) {
        //echo($file_name." add_delete_add_file_as_string ");$this->debug_exit(__FILE__,__LINE__,0);
        if (is_file($file_name)){
            unlink($file_name); // delete it
        }
        $handle = fopen($file_name, "w");
        fwrite($handle, $file_as_string);
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


    
        public function array_node_to_array($array) {
        // *****************
        // this converts encoded_strings to arrays
        // ****************

            $array['ppv_define_query']['lookups']['field_names']                = '';
            $array['ppv_define_query']['lookups']['relational_operators']  = '';
            $array['ppv_define_query']['lookups'][0]                        = '';
            $array['ppv_define_query']['lookups'][1]                        = '';
            

            $array['ppv_define_query']['lookups']['field_names']            = '';
            $array['ppv_define_query']['lookups']['relational_operators']  = '';
            $array['ppv_define_query']['lookups'][0]                        = '';
            $array['ppv_define_query']['lookups'][1]                        = '';
            

        foreach ($array as $field) {
            if (is_null($field))    {
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


    public function getEdit2defaultBrowse() {
           
            echo("getEdit2defaultBrowse");$this->debug_exit(__FILE__,__LINE__,1);
            // this is the new browse
            //First get the report_record
            if (!empty($request->Input('what_we_are_doing'))) {
                $what_we_are_doing = "edit2_build_default_browse";               
                switch ($what_we_are_doing) {
                    case "edit2_build_default_browse":
                        $report_definition          = $this->execute_query_by_report_no($request->Input('report_key'));
                
                        $ppv_array_names    = array('ppv_define_query','ppv_define_business_rules');
                        $working_arrays     = $this->working_arrays_construct($report_definition,$ppv_array_names,$what_we_are_doing);
                        $errors = array();
                        $message = "";
                        if ($report_definition){
                            //var_dump($report_definition[0]);echo($key_field_value.$key_field_name);$this->debug_exit(__FILE__,__LINE__,1);
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
                                    ->with('snippet_table'                  , $this->snippet_table)
                                    ->with('model_table'                    , $this->model_table)
                                    ->with('node_name'                      , $this->node_name)
                                    ->with('generated_files_folder'         , $this->generated_files_folder)
                                    ->with('field_name_array'               , $field_name_array)
                                    ->with('snippet_table_key_field_name'   , $this->snippet_table_key_field_name)
                                    ->with('message'                        , $message)
                                    ->withErrors($errors);
                            }
                        } // end of if report_definition
                        break;
                    default:
                        echo("*".$request->Input('coming_from')."*");$this->debug_exit(__FILE__,__LINE__,1);
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
                var_dump($db_result); $this->debug_exit(__FILE__,__LINE__,1);
                return View::make($this->node_name.'.edit2_default_browse')
                    ->with('Input input'                        ,Input::all())
                    ->with('all_records'                ,$db_result)
                    ->with('report_definition'          ,$report_definition[0])
                    
                    //->with('record_key'                   ,$request->Input('record_key'))
                    //->with('model_table'              ,$this->model_table)
                    ;           
        }
    }

     /**
     * Execute the query and show the report you just requested
     *
     * @return \Illuminate\Http\Response
     */

    public function execute_report_def_query($report_definition) {
        echo("execute_report_def_query<br>");
        //$this->debug_exit(__FILE__,__LINE__,10);
        //var_dump($report_definition);
        $errors = array();
        $message = "";
        $what_we_are_doing = "edit2_build_default_browse";
        if ($report_definition){
           $ppv_array_names    = array('ppv_define_query','ppv_define_business_rules');
           $working_arrays     = $this->working_arrays_construct($report_definition,$ppv_array_names,$what_we_are_doing);

            //var_dump($report_definition[0]);
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
                $this->debug_exit(__FILE__,__LINE__,1); 
                return redirect('admin/'.$this->node_name.'/edit1')
                    ->with('snippet_table'                  , $this->snippet_table)
                    ->with('model_table'                    , $this->model_table)
                    ->with('node_name'                      , $this->node_name)
                    ->with('generated_files_folder'         , $this->generated_files_folder)
                    ->with('field_name_array'               , $field_name_array)
                    ->with('snippet_table_key_field_name'   , $this->snippet_table_key_field_name)
                    ->with('message'                        , $message)
                    ->withErrors($errors);
            }
            else {
                $arr = array();
                foreach($working_arrays['ppv_define_query']['field_name_array'] as $name=>$array_name){
                    $arr[] = $working_arrays['ppv_define_query'][$array_name]; 
                }           
                //var_dump($arr); $this->debug_exit(__FILE__,__LINE__,1);   
                $query_relational_operators_array = $this->build_query_relational_operators_array();
                $db_result = $this->build_and_execute_query($arr,$this->bypassed_field_name,$query_relational_operators_array);
            }
        } // end of if report_definition


    }
public function build_and_execute_query($fieldName_r_o_value_array,
        $bypassed_field,
        $query_relational_operators_array) {
        echo("build_and_execute_query<br><br>");
        //var_dump($value_array);

        //echo("build_and_execute_query<br><br>"); 
        //$this->debug_exit(__FILE__,__LINE__,10);
        // *******
        // this guy does a lot
        // *****
        //var_dump($first_lookup_array);var_dump($second_lookup_array);var_dump($value_array);
        //$this->debug_exit(__FILE__,__LINE__,0);;
        //var_dump($fieldName_r_o_value_array );//var_dump($second_lookup_array);var_dump($value_array);
        //$this->debug_exit(__FILE__,__LINE__,10);//$query = DB::connection($this->db_data_connection)->table($this->model_table);
        //echo 'DB::connection( '.$this->db_data_connection.')->table( '.$this->model_table.') ';
        //$query = MiscThing::
        $first_time = true;
        $dash_gt = " ->";
        $dash_gt = " query->where";
        foreach ($fieldName_r_o_value_array[0] as $index=>$value) {
        if ($value <> $bypassed_field){
            $r_o = $query_relational_operators_array[$fieldName_r_o_value_array[1][$index]];
            $v = $fieldName_r_o_value_array[2][$index];
            //echo($r_o);
            switch ($r_o) {
            case "=":
            case "<>":
            case ">":
            case "<":
            case "<=":
            case ">=":
                 if ($first_time) {
                    $query = MiscThing::where($value,$r_o,$v);
                    $first_time = 0;
                }
                else{
                   echo ($dash_gt.'where( '.$value.' '.$r_o.' '.$v);//exit (' exit 155');
                    //$query_string .= '->where('.$value.','.$r_o.','.$v.')';
                    $query->where($value,$r_o,$v);
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
                        $first_time = 0;
                    }
                    else{
                        $query->orderBy($value);
                       echo(' ->orderBy('.$value.','.$aord.')');//exit("xit226");
                    }
                    break;
                case "orderByDesc":
                    $aord = "DESC";
                    if ($first_time) {
                         $query = MiscThing::orderBy($value,$aord);
                        $first_time = 0;
                    }
                    else
                    {
                        $query->orderBy($value,$aord);
                        echo(' orderBy('.$value.','.$aord.')');//exit("xit226");
                    }
                    break;
                case "distinct":
                   if ($first_time) {
                         $query = MiscThing::distinct($value);
                        $first_time = 0;
                        //$this->debug_exit(__FILE__,__LINE__,10);
                    }
                    else
                    {
                    $query->distinct($value);
                    echo(" ->distinct($value) ");//exit("xit226");
                    }
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

    echo("->get()->get()->get()->get()->get()->get()->get()->get()->get()");    
    $query->get();
    return $query;
    
    //return  (array) $query;
    }   // end of advanced query ppv new




     /**
     * Execute the query and show the report you just requested
     *
     * @return \Illuminate\Http\Response
     */

    public function browseEdit($id) {
        echo(" browseEdit<br>");
        var_dump($id);
        //$this->debug_exit(__FILE__,__LINE__,0);
        //var_dump($report_definition);
        $report_definition = MiscThing::where('id','=',$id)->get();
        $ppv_array_names = array('ppv_define_query','ppv_define_business_rules');
        $working_arrays     = $this->working_arrays_construct($report_definition,$ppv_array_names,$what_we_are_doing);
 
        $passed_to_view_array = $this->build_report_def_arrays($report_definition);
        //$this->debug_exit(__FILE__,__LINE__,0);
        //echo("<br> passed_to_view_array<br>");var_dump($passed_to_view_array);        $this->debug_exit(__FILE__,__LINE__,10);
       //var_dump((array) $report_definition[0]);        
  
       //$miscThings = MiscThing::where('report_name','=',C->report_name)->get();
 
        //$this->debug_exit(__FILE__,__LINE__,0);
        //$miscThings = $this->execute_report_def_query($report_definition);
   
        if($miscThings = MiscThing::distinct('record_type')->get()){
          //$miscThings = MiscThing::where($this->snippet_table_key_field_name, '=', $id)->get();
          //$this->debug_exit(__FILE__,__LINE__,0);   
          //echo("<br> report_name<br>".$miscThings[0]->report_name."**");
          //var_dump($miscThings[0]);
          //$this->debug_exit(__FILE__,__LINE__,10);  
        }
        


       $encoded_business_rules_field_name_array = array();
        $field_names_array = array();
        $data_array_name = array();
        $data_array_name ["report_name"] = $miscThings[0]->report_name;
        $data_array_name ["record_type"] = $miscThings[0]->record_type;
        if ($miscThings){
             
             return view('miscThings.edit2_default_browse',compact('miscThings'))
                ->with('model_table'                ,$this->model_table)
                ->with('generated_files_folder'    , $this->generated_files_folder)
                ->with('report_key'    , $id)
                ->with('field_names_array'    , $field_names_array)
                ->with('key_field_name'    , 'id')
                ->with('encoded_business_rules_field_name_array'    , $encoded_business_rules_field_name_array)
                //->with('data_array_name'    , $passed_to_view_array)
                ->with('data_array_name'    , $data_array_name)
                ->with('node_name'                  ,$this->node_name);
         //return view('miscThings.edit2_default_browse',$miscThings);
        }
        else {
            echo 'you have a fatal error<br>';
            $this->debug_exit(__FILE__,__LINE__,1);
        }
        //var_dump($report_definition[0]);       
       return view('miscThings.edit2_default_browse',$report_definition);
    }

    
    public function build_column_names_array($tbl_name) {
        //echo ('build_column_names_array'.$tbl_name);exit("exit 99");
        $column_names_array = array();
        $columns = Schema::getColumnListing($tbl_name);
        sort($columns);
        $columns = array_combine($columns, $columns);
        return $columns;

    }


    /**
     * get data necessary for reporting and load it into a single array
     * copied from putEdit2new
     *
     * @return array
     */

    public function build_report_def_arrays($report_definition) {
        //echo("build_report_def_arrays");$this->debug_exit(__FILE__,__LINE__,0);
        //var_dump($report_definition[0]);
        //$this->debug_exit(__FILE__,__LINE__,1);
        $modifiable_fields_array            = $this->decode_object_field_to_array($report_definition[0],'modifiable_fields_array');
        $lookups_array['field_name']        = $this->build_column_names_array($this->model_table);
        $xxx_array = $this->gen_lookup_name_value_array_datax($this->model_table);

        $lookups_array                      = array_merge($lookups_array,$xxx_array);
        $snippet_string                     = $this->modifiable_fields_view_snippet_str_gen($modifiable_fields_array,$lookups_array,$report_definition[0]);
        //$snippet_string is the html to display all the browse fields in <td>s across a line


        $fnam = 
        $this->view_files_prefix."/".$this->generated_files_folder."/".$report_definition[0]->id.'_snippet_string.blade.php';
        $this->add_delete_add_file_as_string($fnam,$this->modifiable_fields_view_snippet_str_gen($modifiable_fields_array,$lookups_array,$report_definition[0]));
        // is writing generated_files/{report_id}_snippet_string

        $passed_to_view_array = array();
        $passed_to_view_array        ['encoded_modifiable_fields_array'] = json_encode($modifiable_fields_array);
        $passed_to_view_array        ['report_name']                   = $report_definition[0]->report_name;
        $passed_to_view_arra2        ['data_key']                   = 'data_key';
        $passed_to_view_array        ['encoded_input']                  = 'encoded_input';
        $passed_to_view_array        ['snippet_name']                   ='_modifiable_fields_getEdit_snippet';
 
        //$passed_to_view_array        ['record']                         = $report_definition[0];
        //$passed_to_view_array        ['encoded_report_definition']      = json_encode($report_definition[0]);       
        $passed_to_view_array        ['snippet_string']                 = $snippet_string;      
        $passed_to_view_array        ['lookups_array']                  = $lookups_array;  
        return $passed_to_view_array;

    } 

        public function decode_array_to_array($record,$encoded_string) {
        // *****************
        // this converts encoded_strings to arrays
        // ****************

        //var_dump($encoded_string);
        if (is_null($record[0][$encoded_string]))   {
            $arr = array();
        }else{
            $arr =  (array) json_decode($record[0][$encoded_string],1);
        }
        return $arr;

        var_dump($arr);exit("xit 4420");
    }



        public function decode_object_field_to_array($obj,$field_name) {
            //echo("decode_object_field_to_array".$obj->$field_name);var_dump($obj);$this->debug_exit(__FILE__,__LINE__,0);
            $x = json_decode($obj->$field_name,1);
            if (is_array($x)){
                return $x;
            }
            return null;
        }   


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function execute_query_by_report_no($report_no) {
      //echo 'execute_query_by_report_no'.$report_no;//exit("exit");
      $response = MiscThing::where($this->snippet_table_key_field_name, '=', $report_no)
        ->get();
        if ($response){
           return $response;
        }
        else {
            echo 'you have a fatal error<br>';
            $this->debug_exit(__FILE__,__LINE__,1);
        }
    }


    public function gen_lookup_name_value_array_datax($table_name) {
        
        $response0 = MiscThing::where('table_name','=', $table_name)
        ->where('record_type','=','name_value_definition')
        ->get(array('field_name','table_name','name','value'));
        $array = array();
        foreach($response0 as $response){
            $array [$response->field_name][$response->name] = $response->value;
        }
        return $array;
    }


    public function getEdit8_array_node_to_array($array) {
        // *****************
        // this converts encoded_strings to arrays
        // ****************

            $array['ppv_define_query']['lookups']['field_names']                = '';
            $array['ppv_define_query']['lookups']['relational_operators']  = '';
            $array['ppv_define_query']['lookups'][0]                        = '';
            $array['ppv_define_query']['lookups'][1]                        = '';
            

            $array['ppv_define_query']['lookups']['field_names']            = '';
            $array['ppv_define_query']['lookups']['relational_operators']  = '';
            $array['ppv_define_query']['lookups'][0]                        = '';
            $array['ppv_define_query']['lookups'][1]                        = '';
            

        foreach ($array as $field) {
            if (is_null($field))    {
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
        if (is_null($record->$encoded_string))   {
            $arr = array();
        }else{
            $arr =  (array) json_decode($record->$encoded_string,1);
        }
        return $arr;

        var_dump($arr);exit("xit 4420");
    }

        public function getEdit_ppv_write_blade_new(
            $report_key,
            $filename,
            $no_of_rows,
            $blade_routine,
            $blade_name
            ){

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


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
 
    public function index(){
        //echo('index');$this->debug_exit(__FILE__,__LINE__,1);
        echo('index');$this->debug_exit(__FILE__,__LINE__,0);
        
        //var_dump($this->field_name_list_array);
       $record_type                    = "report_definition";
       $miscThings = MiscThing::where('record_type','=',$record_type)
         ->where('table_name','='    ,$this->model_table)
        ->where('node_name','='     ,$this->node_name)
        ->orderBy('report_name'     ,'asc')
        ->get();

        return view($this->node_name.'.indexReports',compact('miscThings'))
            ->with('all_records',$miscThings)
            ->with('encoded_report_description' ,json_encode($miscThings))
            ->with('node_name'                  ,$this->node_name)
            ->with('snippet_table_key_field_name',$this->snippet_table_key_field_name)
            ->with('snippet_table'                ,$this->snippet_table)
            ->with('model_table'                  ,$this->model_table)         
            ;
            
    }

     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function indexRecords() {
       echo(' indexRecords');$this->debug_exit(__FILE__,__LINE__,0);
        
        var_dump($this->node_name);
       $record_type                    = "report_definition";
       $miscThings = MiscThing::where('record_type','=',$record_type)
         ->where('table_name',  '='    ,$this->model_table)
        ->where('node_name',    '='    ,$this->node_name)
        ->orderBy('report_name','asc')
        ->get();

        return view($this->node_name.'.indexRecords',compact('miscThings'))
            ->with('encoded_report_description' ,json_encode($miscThings))
            ->with('node_name'                  ,$this->node_name)
            ->with('snippet_table_key_field_name',$this->snippet_table_key_field_name)
            ->with('snippet_table'               ,$this->snippet_table)
            ;
        }


     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function indexReports(REQUEST $request,$id) {
       $this->debug_exit(__FILE__,__LINE__,0);echo(' indexReports');
       //var_dump($request);
        var_dump($this->node_name);
       $record_type                    = "report_definition";
       $miscThings = MiscThing::where('record_type','=',$record_type)
         ->where('table_name',  '='    ,$this->model_table)
        ->where('node_name',    '='    ,$this->node_name)
        ->orderBy('report_name','asc')
        ->get();
       $ppv_array_names = array('ppv_define_query','ppv_define_business_rules');
       $what_we_are_doing = 'displaying_advanced_edits_screen';
       $working_arrays     = $this->working_arrays_construct($miscThings,$ppv_array_names,$what_we_are_doing);
       $record = $miscThings[0];
        return view($this->node_name.'.indexReports',compact('miscThings'))
            ->with('encoded_report_description' ,json_encode($miscThings))
            ->with('encoded_record'             ,json_encode($record))
             ->with('model_table'               ,$request->input('model_table'))
             ->with('id'                         ,$request->input('id'))

            ->with('encoded_working_arrays'     ,json_encode($working_arrays))
            ->with('record'                     ,$record)
            ->with('all_records'                ,$miscThings)
           
            ->with('report_key'                  ,$request->input('report_key'))
            ->with('node_name'                  ,$this->node_name)
            ->with('snippet_table_key_field_name',$this->snippet_table_key_field_name)
            ->with('snippet_table'               ,$this->snippet_table)
            ;
        }

      /**
     * modifiable_fields_view_snippet_str_gen
     *
     */
       
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
            //"<tr>".$crlf;
            $crlf;
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
            //$strx .= "</tr>".$crlf;
            $strx .= $crlf;
        }
        return $strx;
    }   


    /**
     * 4 functions maintain 4 entities
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function reportDefEdits(Request $request,$id){
        echo('<br>this is reportDefEdits '.'<br>this used to be putEdit41'.
            "<br>we moved it to indexReports");$this->debug_exit(__FILE__,__LINE__,10);
        echo("<br>id ".$id); 
}
    public function ppvEdit(Request $request, $id,$what_we_are_doing,$coming_from){
        echo('<br>this is reportDefMenuEdit node: '.$this->node_name);
        //echo("<br>we moved it to indexReports and then reportDefMenuEdit(here)");
        $this->debug_exit(__FILE__,__LINE__,10);
    }


    /**
     * 4 functions maintain 4 entities
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function reportDefMenuEdit(Request $request, $id,$what_we_are_doing,$coming_from){
        echo('<br>this is reportDefMenuEdit node: '.$this->node_name);
        //echo("<br>we moved it to indexReports and then reportDefMenuEdit(here)");
        //$this->debug_exit(__FILE__,__LINE__,0);
        
        echo("<br>".'* '.$id.' * '.$what_we_are_doing.' * '.$coming_from." ** "); 

        $miscThing=MiscThing::find($id);
        //var_dump($miscThing);
        $this->debug_exit(__FILE__,__LINE__,0);
    switch ($what_we_are_doing) {
        case "maintain_modifiable_fields":
        case "maintain_browse_fields":           
            $column_names_array = (array) $this->build_column_names_array($this->model_table);
            //var_dump($column_names_array);
            $ppv_array_names = array(
                'ppv_define_query',
                'ppv_define_business_rules');
            $working_arrays     = $this->working_arrays_construct(
                $miscThing,
                $ppv_array_names,
                $what_we_are_doing);

            $column_names_array = $working_arrays[$what_we_are_doing]['lookups']['field_names'];
            $index2 = $working_arrays[$what_we_are_doing]['field_name_array']['field_name'];
            $to_array = $working_arrays[$what_we_are_doing][$index2];
            $from_array = array_diff($column_names_array,$to_array);
            //$this->debug_exit(__FILE__,__LINE__,0);var_dump($to_array);
            //var_dump(Input::all());$this->debug_exit(__FILE__,__LINE__,1);
            //var_dump($working_arrays);$this->debug_exit(__FILE__,__LINE__,1);
            return view($this->model_table.'.select_fields'    ,compact('miscThing'))
                ->with('what_we_are_doing'                  ,$what_we_are_doing)
                ->with('from_array'                         ,$from_array)
                ->with('to_array'                           ,$to_array)
                ->with('node_name'                          ,$this->node_name)
                ->with('model_table'                        ,$this->model_table)
                ->with('encoded_record'                     ,$request->input('encoded_record'))
                ->with('encoded_column_names'               ,$request->input('encoded_column_names'))
                ->with('encoded_working_arrays'             ,$request->input('encoded_working_arrays'))
                ->with('message',''
                );
                break;  
        case "ppv_define_query":
        case "ppv_define_business_rules":
            $column_names_array = (array) $this->build_column_names_array($this->model_table);
            $ppv_array_names = array('ppv_define_query','ppv_define_business_rules');
            $working_arrays     = $this->working_arrays_construct($miscThing,$ppv_array_names,$what_we_are_doing);
            var_dump($working_arrays [$what_we_are_doing]);$this->debug_exit(__FILE__,__LINE__,0);
            
            $field_name_array_name = ($working_arrays[$what_we_are_doing]['field_name_array']['field_name']);
            $no_of_rows = count($working_arrays [$what_we_are_doing][$field_name_array_name]);
            //var_dump($no_of_rows);$this->debug_exit(__FILE__,__LINE__,1);

            switch ($what_we_are_doing) {
                case "ppv_define_query":
                    $blade_routine                          = "advanced_query_getEdit_blade_gen_new";
                    $blade_name                             = "_advanced_query_getEdit";
                    $filename = $this->views_files_path."/".$this->generated_files_folder."/".$id.$blade_name.'.blade.php';
                    echo($filename.'name>'.$blade_name.'routine>'.$blade_routine);
                    //* FIle
                    File::put($filename,$this->$blade_routine($no_of_rows));
                    //*
                    echo("<br>A".$blade_routine); 
                    break;         
                case "ppv_define_business_rules":
                    $blade_routine                          = "advanced_query_getEdit_blade_gen_new";
                    $blade_name                             = "_business_rules_getEdit";
                 
                    $filename = $this->views_files_path."/".$this->generated_files_folder."/".$id.$blade_name.'.blade.php';
                    echo($filename.'name>'.$blade_name.'routine>'.$blade_routine);
                   //* FIle
                   File::put($filename,$this->$blade_routine($no_of_rows));
                   //* 
                   echo("<br>B");  
                   break;        
                  
                }

            //var_dump($working_arrays);$this->debug_exit(__FILE__,__LINE__,1);
            $column_names_array = $working_arrays[$what_we_are_doing]['lookups']['field_names'];
           $column_names_array = array_combine(array_values($column_names_array),$column_names_array);
          
            //$working_arrays['ppv_define_query']['lookups']['field_names'] = array_values($a);
            //var_dump(array_values($a) );$this->debug_exit(__FILE__,__LINE__,1);

            //$working_arrays[$what_we_are_doing]['lookups']['field_names'],
             //$working_arrays[$what_we_are_doing]['lookups']['field_names']);
            //var_dump($column_names_array);$this->debug_exit(__FILE__,__LINE__,10);


            $field_name_array_name  = ($working_arrays[$what_we_are_doing]['field_name_array']['field_name']);
            $field_name_array       = ($working_arrays[$what_we_are_doing][$field_name_array_name]);
            $r_o_array_name         = ($working_arrays[$what_we_are_doing]['field_name_array']['r_o']);
            $r_o_array              = ($working_arrays[$what_we_are_doing][$r_o_array_name]);
            $value_array_name       = ($working_arrays[$what_we_are_doing]['field_name_array']['value']);
            $value_array            = ($working_arrays[$what_we_are_doing][$value_array_name]);
        
            echo ($what_we_are_doing);$this->debug_exit(__FILE__,__LINE__,0);
            return view($this->model_table.".ppv_update"    ,compact('miscThing'))
                ->with('what_we_are_doing'                  ,$what_we_are_doing)
                ->with('id'                                 ,$id)
                ->with('first_lookup_array'                 ,$working_arrays[$what_we_are_doing]['lookups'][0])
                ->with('second_lookup_array'                ,$working_arrays[$what_we_are_doing]['lookups'][1])
                ->with('field_name_array'                   ,$field_name_array)
                ->with('r_o_array'                          ,$r_o_array)
                ->with('value_array'                        ,$value_array)
                ->with('generated_files_folder'             ,$this->generated_files_folder)
                ->with('coming_from'                        ,$coming_from)
                ->with('node_name'                          ,$this->node_name)
                ->with('model_table'                        ,$this->model_table)
                ->with('message'                            ,'')
                ;
        }
       return view($this->node_name.'.reportDefMenuEdit'    ,compact('miscThing'))
        ->with('model'                            ,$this->model)
        ->with('node_name'                        ,$this->node_name)
        ->with('what_we_are_doing'                ,$what_we_are_doing)
        ->with('coming_from'                      ,$coming_from)
       ;
}


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function justModifiable($id,$working_arrays,$what_we_are_doing,$request)
    {
        //       
        $this->debug_exit(__FILE__,__LINE__,10);

        $x = "maintain_modifiable_fields";
        //switch (Input::get('edit4_option')) {
        switch ($x) {
            case "maintain_modifiable_fields":
            case "field_list_select":
            $what_we_are_doing = "maintain_modifiable_fields";
               $column_names_array = $working_arrays[$what_we_are_doing]['lookups']['field_names'];
                $index2 = $working_arrays[$what_we_are_doing]['field_name_array']['field_name'];
                $to_array = $working_arrays[$what_we_are_doing][$index2];
                $from_array = array_diff($column_names_array,$to_array);
                //$this->debug_exit(__FILE__,__LINE__,0);var_dump($to_array);
                //var_dump(Input::all());$this->debug_exit(__FILE__,__LINE__,1);
                 var_dump($working_arrays);$this->debug_exit(__FILE__,__LINE__,0);
                 return view($this->node_name.'.reportDefMenuEdit'    ,compact('miscThing'))
                    //->with('Input'                         ,Input::all())                  
                    //->with('edit4_return_option'              ,'field_list_save')
                    ->with('what_we_are_doing'                  ,$what_we_are_doing)
                    ->with('from_array'                         ,$from_array)
                    ->with('to_array'                           ,$to_array)
                    //->with('node_name'                          ,$this->node_name)
                    //->with('model_table'                        ,$this->model_table)
                    //->with('encoded_record'                     ,$request->input('encoded_record'))
                    //->with('encoded_column_names'               ,$request->input('encoded_column_names'))
                    //->with('encoded_working_arrays'             ,$request->input('encoded_working_arrays'))
                    ->with('message',''
                    );
                    var_dump($working_arrays);$this->debug_exit(__FILE__,__LINE__,0);
                break;  
            case "update_field_list":
                $nv_array = array();
                if (array_key_exists('to',Input::all())) {
                    $nv_array   = array_combine(Input::get('to'), Input::get('to'));
                }                                   
                $encoded_nv_array = json_encode($nv_array);
                $edit4_return_option = "field_list_save";
                var_dump(Input::all());$this->debug_exit(__FILE__,__LINE__,0);

                $updatex  = DB::connection($this->db_snippet_connection)->table($this->snippet_table)
                ->where($this->snippet_table_key_field_name,    '=', $record[0][$this->snippet_table_key_field_name])
                ->update(array($working_arrays[$what_we_are_doing]['field_name_array']['field_name']=>$encoded_nv_array));

               
                $this->generate_by_list_name($nv_array,$this->model_table);
                //echo ("t41 generate_by_list_name ");$this->debug_exit(__FILE__,__LINE__,0);
                return redirect('admin/'.$this->node_name.'/edit1')
                ->with('message', 'record updated');
                break;                  
        }       
    }




    public function show(REQUEST $request,$id)
    {
        //
        //var_dump($request);
        echo("who sent us here". " show ".$id); $this->debug_exit(__FILE__,__LINE__,10);
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $update = 0;  
        $miscThingsUpdate=$request->all(); // important!!
         if (isset($request->browse_select_array)){
            $update = 1; 
            $request->browse_select_array = $request->to;
            $miscThingsUpdate['browse_select_array'] = 
               array_combine($request->to,$request->to);
                $miscThingsUpdate['browse_select_array'] =
                json_encode($miscThingsUpdate['browse_select_array']); // important!!
        }
      if (isset($request->modifiable_fields_array)){
            $update = 1; 
            $request->modifiable_fields_array = $request->to;
            $miscThingsUpdate['modifiable_fields_array'] = 
               array_combine($request->to,$request->to);
            $miscThingsUpdate['modifiable_fields_array'] =
                json_encode($miscThingsUpdate['modifiable_fields_array']); // important!!
        }

        if (isset($request->query_field_name_array)){
            $update = 1; 
            //var_dump($request->field_name_array);$this->debug_exit(__FILE__,__LINE__,1);
            //var_dump($request);$this->debug_exit(__FILE__,__LINE__,1);
            // move the common screen names into the specific fields in the table
            //$request->query_field_name_array    =  
            array_combine($request->field_name_array,$request->field_name_array);
            $request->query_field_name_array    = json_encode($request->query_field_name_array);
            $miscThingsUpdate['query_field_name_array'] = $request->query_field_name_array;
       
           $request->query_r_o_array           = json_encode($request->r_o_array);
           $miscThingsUpdate['query_field_name_array'] = $request->query_field_name_array;

           $request->query_value_array         = json_encode($request->value_array);
           $miscThingsUpdate['query_field_name_array'] = $request->query_field_name_array;
 
        }
      if (isset($request->business_rules_field_name_array)){
            $update = 1; 
            $request->business_rules_field_name_array = $request->to;
            $request->business_rules_r_o_array = $request->to;
            $request->business_rules_value_array = $request->to;
            $miscThingsUpdate['modifiable_fields_array'] = 
               array_combine($request->to,$request->to);
                $miscThingsUpdate['modifiable_fields_array'] =
                json_encode($miscThingsUpdate['modifiable_fields_array']); // important!!
        }
 
        if ($update = 1){
            $miscThingsings=MiscThing::find($id);
            $miscThingsings->update($miscThingsUpdate);
        }
        return redirect('admin/miscThings');

        }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
    public function working_arrays_construct($record,$ppv_array_names,$what_we_are_doing) {
        //echo("working_arrays_construct");
        $working_arrays     = $this->working_arrays_build($record);
        $working_arrays     = $this->working_arrays_populate($working_arrays,$record);
        $column_names       = $this->build_column_names_array($this->model_table);
        $working_arrays     = $this->working_arrays_populate_lookups($working_arrays,$column_names);
        //var_dump($working_arrays);$this->debug_exit(__FILE__,__LINE__,1);
        $working_arrays     = $this->working_arrays_pad_rows_for_growth($ppv_array_names,$working_arrays);
        //var_dump($working_arrays[$what_we_are_doing]);$this->debug_exit(__FILE__,__LINE__,1);
        switch ($what_we_are_doing) {
            case "edit2_build_default_browse":
                //just need assignments from record
                //$this->debug_exit(__FILE__,__LINE__,0);var_dump($working_arrays);$this->debug_exit(__FILE__,__LINE__,1);

                break;
            default:
                //$column_names         = $this->build_column_names_array($this->model_table);
                //$working_arrays   = $this->working_arrays_populate_lookups($working_arrays,$column_names);
                //var_dump($working_arrays);$this->debug_exit(__FILE__,__LINE__,1);
                break;

        }
        //var_dump($working_arrays[$what_we_are_doing]);$this->debug_exit(__FILE__,__LINE__,0);
        var_dump($working_arrays);$this->debug_exit(__FILE__,__LINE__,0);
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
        //var_dump($working_arrays );$this->debug_exit(__FILE__,__LINE__,10);

        //var_dump($working_arrays[$what_we_are_doing]);$this->debug_exit(__FILE__,__LINE__,1);
        return $working_arrays;
        }
    }   

        public function working_arrays_build($record) {
            //echo("working_arrays_build");
            //var_dump($record);//exit("exit 39");
            $working_arrays = array();
            //$working_arrays['maintain_modifiable_fields']['field_name']   = 'modifiable_fields_array';
            //$working_arrays['maintain_modifiable_fields'][]                   = 'modifiable_fields_array';
            $working_arrays
                ['advanced_edit_functions']     = array(
                'maintain_modifiable_fields'    => 'maintain_modifiable_fields',
                'maintain_browse_fields'        => 'maintain_browse_fields',
                'ppv_define_query'              => 'ppv_define_query',
                'advanced_menu_fields_list'     => 'advanced_menu_fields_list',
                'ppv_define_business_rules'     => 'ppv_define_business_rules'
                );
            $working_arrays
                ['advanced_menu_fields_list']['field_name_array']           = array(
                'report_name'       => 'report_name'
                );

            $working_arrays
                ['maintain_modifiable_fields']['field_name_array']          = array(
                'field_name'        => 'modifiable_fields_array'
                );

             $working_arrays
                ['maintain_browse_fields']['field_name_array']          = array(
                'field_name'        => 'browse_select_array'
                );


            $working_arrays
                ['ppv_define_query']['field_name_array']        = array(
                'field_name'=>'query_field_name_array',
                'r_o'       => 'query_r_o_array',
                'value'     => 'query_value_array'
                );

            $working_arrays
                ['ppv_define_business_rules']['field_name_array']       = array(
                'field_name'=>'business_rules_field_name_array',
                'r_o'       => 'business_rules_r_o_array',
                'value'     => 'business_rules_value_array'
                );
            return($working_arrays);
        }


        public function working_arrays_populate_lookups($working_arrays,$columns) {
            $working_arrays['maintain_modifiable_fields']['lookups']['field_names'] = $columns;
            $working_arrays['maintain_browse_fields']['lookups']['field_names']     = $columns;
            $a = array_merge(array("not_used"=>"not_used"),  $columns);
            $working_arrays['ppv_define_query']['lookups']['field_names'] = array_values($a);
            //var_dump(array_values($a) );$this->debug_exit(__FILE__,__LINE__,1);

            $query_relational_operators_array = $this->build_query_relational_operators_array();
            $working_arrays['ppv_define_query']['lookups']['relational_operators']  = $query_relational_operators_array;
            $working_arrays['ppv_define_query']['lookups'][0]                       =  
                array_merge(array("not_used"=>"not_used"),  $columns);
            $working_arrays['ppv_define_query']['lookups'][1]                       = $query_relational_operators_array;

            $business_rules_relational_operators = $this->build_business_rules_relational_operators();
            $working_arrays['ppv_define_business_rules']['lookups']['field_names']          = 
                array_merge(array("not_used"=>"not_used"),  $columns);
            $working_arrays['ppv_define_business_rules']['lookups']['relational_operators'] = $business_rules_relational_operators;
            $working_arrays['ppv_define_business_rules']['lookups'][0]                      = 
                array_merge(array("not_used"=>"not_used"),  $columns);
            $working_arrays['ppv_define_business_rules']['lookups'][1]                      = $business_rules_relational_operators;
            return $working_arrays;         //
        }


        public function working_arrays_populate($working_arrays,$record) {
            //echo("working_arrays_build");
            //$report_snippets = json_encode($report_snippets);
                        //$record = json_decode($report_snippets,1);
            $record = json_encode($record);
            $record = json_decode($record,0);
            //var_dump($working_arrays);$this->debug_exit(__FILE__,__LINE__,1);
            //var_dump($working_arrays['advanced_edit_functions']);$this->debug_exit(__FILE__,__LINE__,1);
                                     
            foreach($working_arrays['advanced_edit_functions'] as $name=>$value){
               //var_dump($working_arrays); $this->debug_exit(__FILE__,__LINE__,1);
                //echo("# 00 * ".$value);
                foreach($working_arrays[$value]['field_name_array'] as $field_name){
                    //echo("*11 *".$field_name);
                    $working_arrays[$value][$field_name] = $this->getEdit8_decode_array_to_array($record,$field_name);
                }
            }
            //var_dump($working_arrays);$this->debug_exit(__FILE__,__LINE__,1);
            $working_arrays['ppv_define_query']['lookups']['field_names']               = '';
            $working_arrays['ppv_define_query']['lookups']['relational_operators']  = '';
            $working_arrays['ppv_define_query']['lookups'][0]                       = '';
            $working_arrays['ppv_define_query']['lookups'][1]                       = '';

            $working_arrays['ppv_define_business_rules']['lookups']['field_names']              = '';
            $working_arrays['ppv_define_business_rules']['lookups']['relational_operators']  = '';
            $working_arrays['ppv_define_business_rules']['lookups'][0]                      = '';
            $working_arrays['ppv_define_business_rules']['lookups'][1]                          = '';
            $working_arrays = $this->getEdit8_array_node_to_array($working_arrays);

            //var_dump($working_arrays);$this->debug_exit(__FILE__,__LINE__,1);
            return($working_arrays);
            
        }
    
}
