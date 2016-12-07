<?php

namespace App\Http\Controllers;

use App\Models\MiscThing;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Schema; 
use Illuminate\Http\Request;
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
       //var_dump(Request $request);
        $this->debug_exit(__FILE__,__LINE__,0); echo(" leaving constructor");
 
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
        echo("build_report_def_arrays");$this->debug_exit(__FILE__,__LINE__,0);
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
            ->with('snippet_table'                  ,$this->snippet_table)
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
    public function indexReports(REQUEST $request) {
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

    public function reportDefEdits(Request $request){
        echo('<br>this used to be putEdit41'.
            "<br>we moved it to indexReports");//$this->debug_exit(__FILE__,__LINE__,0);
        echo("<br>".$request->Input('what_are_we_doing')); 
        echo("<br>".$request->Input('what_we_are_doing')); 
        echo("<br>the request: reportDefEdits"); var_dump($request);

        $this->debug_exit(__FILE__,__LINE__,10);
        //$this->reportDefEdits20161128($request);

        //case "maintain_modifiable_fields":
        //case "maintain_browse_fields":
        //case "ppv_define_query":
        //case "ppv_define_business_rules":
        //$this->debug_exit(__FILE__,__LINE__,0);var_dump(Input::all());
        $record                     = json_decode($request->Input('encoded_record'),1);
        $column_names_array         = json_decode($request->Input('encoded_column_names'),1);
        $working_arrays             = json_decode($request->Input('encoded_working_arrays'),1);
        //$record = json_decode($request->Input('encoded_record'));
        //var_dump(Input::all());var_dump($record);$this->debug_exit(__FILE__,__LINE__,10);
        $node       = $this->node_name;

        if (!empty($request->Input('what_we_are_doing'))) {

            //echo("putEdit41");$this->debug_exit(__FILE__,__LINE__,0);var_dump(Input::all());
            $what_we_are_doing = $request->Input('what_we_are_doing');               
            switch ($what_we_are_doing) {
                                                
                    
                case "updating_report_name":
                    var_dump(Input::all());$this->debug_exit(__FILE__,__LINE__,1);
                case "displaying_advanced_edits_screen":
                    //var_dump($record);$this->debug_exit(__FILE__,__LINE__,0);
                    // we do all the io in the first case 'displaying_advanced_edits_screen'
                    // and pass encoded strings to the other buttons who cycle them around as Input
                    $record             = $this->execute_query_by_report_no($request->Input('report_key'));
                    //$record = json_encode($record);
                    //$record = json_decode($record,1);
                    $ppv_array_names = array('ppv_define_query','ppv_define_business_rules');
                    $working_arrays     = $this->working_arrays_construct($record,$ppv_array_names,$what_we_are_doing);
                    //$this->debug_exit(__FILE__,__LINE__,0);var_dump($working_arrays);$this->debug_exit(__FILE__,__LINE__,1);
                    return View::make($this->model_table.'.edit_name_advanced_edits')
                        ->with('record'                             ,(array) $record)
                        ->with('encoded_record'                     ,json_encode($record))
                        ->with('encoded_working_arrays'             ,json_encode($working_arrays))
                        //->with('encoded_column_names'             ,json_encode($column_names))    
                        ->with('node_name'                          ,$this->node_name)
                        ->with('model_table'                        ,$this->model_table)
                        ->with('snippet_table'                      ,$this->snippet_table)
                    ;
                    break;
                case "maintain_modifiable_fields":
                case "maintain_browse_fields":


                    switch ($request->Input('edit4_option')) {
                        case "field_list_select":
                            $column_names_array = $working_arrays[$what_we_are_doing]['lookups']['field_names'];
                            //var_dump($working_arrays[$what_we_are_doing]);$this->debug_exit(__FILE__,__LINE__,1);
                            $index2 = $working_arrays[$what_we_are_doing]['field_name_array']['field_name'];
                            $to_array = $working_arrays[$what_we_are_doing][$index2];
                            $from_array = array_diff($column_names_array,$to_array);
                            //$this->debug_exit(__FILE__,__LINE__,0);var_dump($to_array);
                            //var_dump(Input::all());$this->debug_exit(__FILE__,__LINE__,1);
                            return View::make($this->model_table.'.select_fields')
                                ->with('Input'                              ,Input::all())                  
                                //->with('edit4_return_option'              ,'field_list_save')
                                ->with('what_we_are_doing'                  ,$what_we_are_doing)
                                ->with('from_array'                         ,$from_array)
                                ->with('to_array'                           ,$to_array)
                                ->with('node_name'                          ,$this->node_name)
                                ->with('model_table'                        ,$this->model_table)
                                ->with('encoded_record'                     ,$request->Input('encoded_record'))
                                ->with('encoded_column_names'               ,$request->Input('encoded_column_names'))
                                ->with('encoded_working_arrays'             ,$request->Input('encoded_working_arrays'))
                                ->with('message',''
                                );
                            break;  
                        case "update_field_list":
                            $nv_array = array();
                            if (array_key_exists('to',Input::all())) {
                                $nv_array   = array_combine($request->Input('to'), $request->Input('to'));
                            }                                   
                            $encoded_nv_array = json_encode($nv_array);
                            $edit4_return_option = "field_list_save";
                            var_dump(Input::all());$this->debug_exit(__FILE__,__LINE__,0);

                            $updatex  = DB::connection($this->db_snippet_connection)->table($this->snippet_table)
                            ->where($this->snippet_table_key_field_name,    '=', $record[0][$this->snippet_table_key_field_name])
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
                    $what_we_are_doing = $request->Input('what_we_are_doing');               
                    switch ($what_we_are_doing) {
                        case "ppv_define_query":
                            $blade_routine                          = "advanced_query_getEdit_blade_gen_new";
                            $blade_name                             = "_advanced_query_getEdit_blade";
                            break;
                        case "ppv_define_business_rules":
                            $blade_routine                          = "business_rules_getEdit_blade_gen";
                            $blade_name                             = "_business_rules_getEdit";
                            break;
                    }
                    switch ($request->Input('edit4_option')) {
                        case "field_list_select":
                            //$this->debug_exit(__FILE__,__LINE__,0);var_dump(Input::all());$this->debug_exit(__FILE__,__LINE__,0);
                            echo ($request->Input('edit4_option'));
                            $record_array               = json_decode($request->Input('encoded_record'),1);
                            $record_obj                 = json_decode($request->Input('encoded_record'),0);
                            $column_names_array         = json_decode($request->Input('encoded_column_names'),1);
                            $working_arrays             = json_decode($request->Input('encoded_working_arrays'),1);
                            //$this->debug_exit(__FILE__,__LINE__,0);var_dump($working_arrays);
                            //var_dump($working_arrays[$what_we_are_doing]);$this->debug_exit(__FILE__,__LINE__,1);
                            //$this->debug_exit(__FILE__,__LINE__,0);//var_dump($working_arrays[$what_we_are_doing]['field_name_array']);
                            //var_dump($working_arrays[$what_we_are_doing]);
                            //$this->debug_exit(__FILE__,__LINE__,1);
                            $field_name             = $working_arrays[$what_we_are_doing]['field_name_array']['field_name'];
                            $r_o                    = $working_arrays[$what_we_are_doing]['field_name_array']['r_o'];
                            $value                  = $working_arrays[$what_we_are_doing]['field_name_array']['value'];
                            $field_name_array       = $working_arrays[$what_we_are_doing][$field_name];
                            $r_o_array              = $working_arrays[$what_we_are_doing][$r_o];
                            $value_array            = $working_arrays[$what_we_are_doing][$value];
                            $no_of_rows = count($field_name_array);  //any of the three will do
                            
                            $filename = $this->views_files_path."/".$this->generated_files_folder."/".$request->Input('report_key').
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
                                    $blade_routine                          = "advanced_query_getEdit_blade_gen_new";
                                    $blade_name                             = "_advanced_query_getEdit_blade";
                                    $tst1 = 0;
                                    if ($tst1){
                                        $this->getEdit_ppv_write_blade_new(
                                            $request->Input('report_key'),
                                            $filename,
                                            5,
                                            $blade_routine,
                                            $blade_name);
                                    echo('one time fix reset $tst1 ');var_dump(Input::all());$this->debug_exit(__FILE__,__LINE__,1);
                                    }
                                }
                                break;
                            case "ppv_define_business_rules":
                                $blade_routine                          = "business_rules_getEdit_blade_gen";
                                $blade_name                             = "_business_rules_getEdit";
                                $tst1 = 0;
                                if ($tst1){
                                    $this->getEdit_ppv_write_blade_new(
                                        $request->Input('report_key'),
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
                                ->with('working_arrays'                     ,$working_arrays)
                                ->with('Input'                              ,Input::all())
                                ->with('record'                             ,$record_array)
                                ->with('encoded_record'                     ,$request->Input('encoded_record'))
                                ->with('encoded_working_arrays'             ,$request->Input('encoded_working_arrays'))

                                ->with('generated_files_folder'             ,$this->generated_files_folder)         
                                ->with('record2'                            ,$record_obj)
                                ->with('node_name'                          ,$this->node_name)
                                ->with('coming_from'                        ,'edit1')
                                ->with('first_lookup_array'                 ,$working_arrays[$what_we_are_doing]['lookups'][0])
                                ->with('second_lookup_array'                ,$working_arrays[$what_we_are_doing]['lookups'][1])
                                ->with('field_name_array'                   ,$field_name_array)
                                ->with('r_o_array'                          ,$r_o_array)
                                ->with('value_array'                        ,$value_array)
                                ;
        
                            break;
                        case "update_field_list":
                            //var_dump(Input::all());$this->debug_exit(__FILE__,__LINE__,1);
                            $working_arrays = json_decode($request->Input('encoded_working_arrays'),1);
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
                            ->where($this->snippet_table_key_field_name,    '=', $request->Input('report_key'))
                            ->update($arr0);
                            // ***
                            // CREATE query edit blade
                            //      $this->debug_exit(__FILE__,__LINE__,0);var_dump(Input::all());

                            //var_dump($arr0);
                            //$arr0 = json_encode($arr0);$arr0 = json_decode($arr0,1);
                            $this->my_ctr = 6;
                            $no_of_rows = $this->my_ctr;  //any of the three will do
                            $rows = $this->my_ctr;
                            $filename = $this->views_files_path."/".$this->generated_files_folder."/".$request->Input('report_key').$blade_name.'.blade.php';
                            //$rows = count($arr)+ $this->no_of_blank_entries;
                            $this->getEdit_ppv_write_blade_new(
                                $request->Input('report_key'),
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

    //$request->input('name_of_field');
}


/**
 * 4 functions maintain 4 entities
 *
 * @param  \Illuminate\Http\Request  $request
 * @return \Illuminate\Http\Response
 */

public function reportDefEdits20161128($id){
    echo(" reportDefEdits<br>");
    $misc_text_area_0 = "displaying_advanced_edits_screen";
    var_dump($id);
    $this->debug_exit(__FILE__,__LINE__,0);
    $what_we_are_doing = "edit2_build_default_browse";
    $column_names_array = (array) $this->build_column_names_array($this->model_table);
    //$field_names_array = json_decode($values_array['encoded_field_name_array'],1);

    //var_dump($report_definition);
    $miscThings = MiscThing::where('id','=',$id)->get();
    $miscThings[0]->misc_text_area_0 =  $misc_text_area_0;
   var_dump($miscThings[0]);
    $this->debug_exit(__FILE__,__LINE__,0);

    if ($miscThings){
        $passed_to_view_array = $this->build_report_def_arrays($miscThings);

       $ppv_array_names    = array('ppv_define_query','ppv_define_business_rules');
       $working_arrays     = $this->working_arrays_construct($miscThings,$ppv_array_names,$what_we_are_doing);
    //var_dump($working_arrays);
    //$this->debug_exit(__FILE__,__LINE__,10);

        $lookups = array();
        $lookups['field_name'] = $column_names_array;
        $lookups['r_o'] = $this->build_business_rules_relational_operators();
        $two_mbr_names_for_lookups      = array();
        $two_mbr_names_for_lookups[]    = 'field_name';
        $two_mbr_names_for_lookups[]    = 'r_o';


         return view('miscThings.reportDefEdits'    ,compact('miscThings'))
            ->with('model_table'                  ,$this->model_table)
            ->with('generated_files_folder'     , $this->generated_files_folder)
            ->with('report_key'                   , $id)
            ->with('field_names_array'            , $field_names_array)
            ->with('key_field_name'               , 'id')
            //->with('encoded_business_rules_field_name_array'    ,                             //$encoded_business_rules_field_name_array)
            ->with('data_array_name'    , $passed_to_view_array)
            ->with('record'                     , $miscThings[0])
            ->with('node_name'                  ,$this->node_name);
         //return view('miscThings.edit2_default_browse',$miscThings);
        }

    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function editUpdate($id)
    {
       $miscThing=MiscThing::find($id);
       return view('miscThings.editUpdate',compact('miscThing'));
    }


   public function showRequest(Request $request) {
        
        var_dump($request);
       echo('showRequest');$this->debug_exit(__FILE__,__LINE__,0);
         }


    public function working_arrays_construct($record,$ppv_array_names,$what_we_are_doing) {
        //echo("working_arrays_construct");
        $working_arrays     = $this->working_arrays_build($record);
        $working_arrays     = $this->working_arrays_populate($working_arrays,$record);
        $column_names       = $this->build_column_names_array($this->model_table);
        $working_arrays     = $this->working_arrays_populate_lookups($working_arrays,$column_names);
        //echo("working_arrays_construct");var_dump($working_arrays);$this->debug_exit(__FILE__,__LINE__,1);
        $working_arrays     = $this->working_arrays_pad_rows_for_growth($ppv_array_names,$working_arrays);
        switch ($what_we_are_doing) {
            case "edit2_build_default_browse":
                //just need assignments from record
                //$this->debug_exit(__FILE__,__LINE__,0);var_dump($working_arrays);$this->debug_exit(__FILE__,__LINE__,1);

                break;
            default:
                //$column_names         = $this->build_column_names_array($this->model_table);
                //$working_arrays   = $this->working_arrays_populate_lookups($working_arrays,$column_names);
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
                        //$this->debug_exit(__FILE__,__LINE__,0);

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

            //$working_arrays['maintain_browse_fields']['field_name']       = 'browse_select_array';
            //$working_arrays['maintain_browse_fields'][]                   = 'browse_select_array';
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
            $working_arrays['ppv_define_query']['lookups']['field_names']           = 
                array_merge(array("not_used"=>"not_used"),  $columns);
            //var_dump($working_arrays );$this->debug_exit(__FILE__,__LINE__,1);

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
            $record = json_decode($record,1);
            //var_dump($working_arrays);$this->debug_exit(__FILE__,__LINE__,1);
            //var_dump($working_arrays['advanced_edit_functions']);$this->debug_exit(__FILE__,__LINE__,1);
                                     
            foreach($working_arrays['advanced_edit_functions'] as $name=>$value){
               //var_dump($working_arrays); $this->debug_exit(__FILE__,__LINE__,1);
                //echo("# 00 * ".$value);
                foreach($working_arrays[$value]['field_name_array'] as $field_name){
                    //echo("*11 *".$field_name);
                    $working_arrays[$value][$field_name] = $this->decode_array_to_array($record,$field_name);
                }
            }
            //var_dump($working_arrays);$this->debug_exit(__FILE__,__LINE__,1);
            $working_arrays['ppv_define_query']['lookups']['field_names']               = '';
            $working_arrays['ppv_define_query']['lookups']['relational_operators']      = '';
            $working_arrays['ppv_define_query']['lookups'][0]                           = '';
            $working_arrays['ppv_define_query']['lookups'][1]                           = '';

            $working_arrays['ppv_define_business_rules']['lookups']['field_names']              = '';
            $working_arrays['ppv_define_business_rules']['lookups']['relational_operators']     = '';
            $working_arrays['ppv_define_business_rules']['lookups'][0]                          = '';
            $working_arrays['ppv_define_business_rules']['lookups'][1]                          = '';
            $working_arrays = $this->array_node_to_array($working_arrays);

            //var_dump($working_arrays);$this->debug_exit(__FILE__,__LINE__,1);
            return($working_arrays);
            
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
        //
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
}
