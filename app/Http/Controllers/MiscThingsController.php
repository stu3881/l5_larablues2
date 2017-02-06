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

use DB;
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



        //$this->required_fields_array            = $this->generated_snippets_array['required_fields_array'];
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
     * write_file_from_string
     *
     */

    public function write_file_from_string($file_name,$file_as_string) {
        //echo($file_name.$file_as_string." write_file_from_string ");$this->debug_exit(__FILE__,__LINE__,0);
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
                        echo("<br>"."calling working_arrays_construct ");$this->debug_exit(__FILE__,__LINE__,10);

                        $working_arrays     = $this->working_arrays_construct($report_definition);
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
                var_dump($arr); $this->debug_exit(__FILE__,__LINE__,1);   
                $query_relational_operators_array = $this->build_query_relational_operators_array();
             
                $snippet_string = $this->build_and_execute_query($arr,$this->bypassed_field_name,$query_relational_operators_array);
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
            echo("<br>"."calling working_arrays_construct ");$this->debug_exit(__FILE__,__LINE__,10);

            $working_arrays     = $this->working_arrays_construct($report_definition);

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
                $arr = $working_arrays['ppv_define_query']['field_name_array']['r_o'];
                var_dump($arr); $this->debug_exit(__FILE__,__LINE__,1);   
                //$query_relational_operators_array = $this->build_query_relational_operators_array();
                //$db_result = $this->build_and_execute_query($arr,$this->bypassed_field_name,$query_relational_operators_array);
            }
        } // end of if report_definition


    }





     /**
     * Execute the query and show the report you just requested
     *
     * @return \Illuminate\Http\Response
     */

    public function browseEdit(Request $request, $id, $what_we_are_doing, $coming_from){
        echo("<br> browseEdit ".$what_we_are_doing.$id.$coming_from);$this->debug_exit(__FILE__,__LINE__,0);
        //var_dump($id);$this->debug_exit(__FILE__,__LINE__,10);
        //var_dump($report_definition);
        $report_definition = MiscThing::where('id','=',$id)->get();
        //var_dump($report_definition[0]); $this->debug_exit(__FILE__,__LINE__,0);   
        
        $working_arrays     = $this->working_arrays_construct($report_definition[0]);
        //var_dump($working_arrays);$this->debug_exit(__FILE__,__LINE__,10);
        //var_dump($report_definition[0]);

        $query_relational_operators_array = $this->build_query_relational_operators_array();
        if(!$miscThings = $this->build_and_execute_query($working_arrays,$this->bypassed_field_name,$query_relational_operators_array)) {
    $this->debug_exit(__FILE__,__LINE__,10);
        }
        //var_dump($miscThings[0]);
        $encoded_business_rules_field_name_array = array();
        $field_names_array = array();
        $data_array_name = array();
        $data_array_name ["report_name"] = $report_definition[0]->report_name;
        $data_array_name ["record_type"] = $report_definition[0]->record_type;
        $field_names_row_file_name =  "../".$this->node_name.'/'.$this->generated_files_folder.'/'.$report_definition[0]->id.'_browse_select_field_names_row';

        $browse_snippet_file_name ="../".$this->node_name.'/'.$this->generated_files_folder.'/'.$report_definition[0]->id.'_browse_select_display_snippet';


        //echo('<br>after build_and_execute_query');$this->debug_exit(__FILE__,__LINE__,0);
        if($coming_from == 'var_dump'){
            var_dump($miscThings[0]);
            var_dump($report_definition[0]);

          $this->debug_exit(__FILE__,__LINE__,0);  
        }
        //var_dump($browse_snippet_file_name);  $this->debug_exit(__FILE__,__LINE__,0);
        if ($miscThings){         
            //var_dump($miscThings[0]); $this->debug_exit(__FILE__,__LINE__,10);  
            //$miscThings = (array) $miscThings;
            //var_dump($miscThings[0]); $this->debug_exit(__FILE__,__LINE__,0); 
             return view($this->node_name.'.browseEdit',compact('miscThings'))
            ->with('browse_select_field_count'  ,count($miscThings))
            ->with('node_name'                  ,$this->node_name)             
            ->with('field_names_row_file_name'  , $field_names_row_file_name)
            ->with('browse_snippet_file_name'   , $browse_snippet_file_name)
            ->with('report_key'                 , $id)
            ->with('model_table'                ,$this->model_table)
            ->with('key_field_name'             ,'id')
            ->with('key_field_value'            , $id)
            ->with('all_records'                , $miscThings)
            ->with('use_table_in_record'        ,'n')
            ->with('record_table_name'          , $this->model_table)
            
            ;
         //return view('miscThings.edit2_default_browse',$miscThings);
        }
        else {
            echo 'you have a fatal error<br>';
            $this->debug_exit(__FILE__,__LINE__,1);
        }
  
        if($miscThings = MiscThing::distinct('record_type')->get()){
          //$miscThings = MiscThing::where($this->snippet_table_key_field_name, '=', $id)->get();
          //$this->debug_exit(__FILE__,__LINE__,0);   
          //echo("<br> report_name<br>".$miscThings[0]->report_name."**");
          //var_dump($miscThings[0]);
          //$this->debug_exit(__FILE__,__LINE__,10);  
        }
    }
        

    public function browse_select_blade_gen($model,$field_name_array,$version,$objOrArray) {
        //echo '<br>browse_select_blade_gen<br><br>';$this->debug_exit(__FILE__,__LINE__,10);

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
                //echo("browse_select_blade_gen");var_dump($array);$this->debug_exit(__FILE__,__LINE__,1);
                return $array;
                break;
            }
    }
    




    public function browse_select_blade_files_gen($report_key,$objOrArray) {
        //echo ('<br>browse_select_blade_files_gen<br><br>'.$report_key);$this->debug_exit(__FILE__,__LINE__,10);

        $fnam = $this->view_files_prefix."/".$this->generated_files_folder."/".$report_key.'_browse_select_field_names_row.blade.php';
        File::put($fnam, $this->browse_select_field_names_row_gen($this->model,$_REQUEST["to"]));
        
        $fnam = $this->view_files_prefix."/".$this->generated_files_folder."/".$report_key.'_browse_select_display_snippet.blade.php';
        File::put($fnam,$this->browse_select_blade_gen($this->model,$_REQUEST["to"],'version1',$objOrArray));
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

    public function browse_select_snippets_gen_by_report($key_field_name,$key_value) {
        //echo 'browse_select_snippets_gen_by_report';print_r($_REQUEST);exit("exit 172");
        $nv_array = array(); 
        foreach ($_REQUEST['to'] as $value){
            $nv_array [$value] = $value;
        }
        $array = array();
       
        $array ['browse_select_display_snippet']            = "";
        $array ['browse_select_array']                                  = json_encode($nv_array);
        $array ['merge_browse_select_and_modify_arrays']= json_encode(array_merge ((array) $_REQUEST["to"],$this->generated_snippets_array['modifiable_fields_array']));
        $array ['lookup_name_value_array_gen_by_table'] = json_encode($this->lookup_name_value_array_gen_by_table($this->model_table));
        //print_r($array);exit("exit 184");
        $this->generated_snippets_array_update($key_field_name,$key_value,$array);
        return;
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
        $fieldname_name_value_array = $this->bld_name_value_lookup_array($this->model_table);

        $lookups_array                      = array_merge($lookups_array,$fieldname_name_value_array);
        $snippet_string                     = $this->modifiable_fields_view_snippet_str_gen($modifiable_fields_array,$lookups_array,$report_definition[0]);
        //$snippet_string is the html to display all the browse fields in <td>s across a line
        //var_dump($snippet_string);$this->debug_exit(__FILE__,__LINE__,1);

        $fnam = 
        $this->view_files_prefix."/".$this->generated_files_folder."/".$report_definition[0]->id.'_snippet_string.blade.php';
        //$this->write_file_from_string($fnam,$this->modifiable_fields_view_snippet_str_gen($modifiable_fields_array,$lookups_array,$report_definition[0]));
        $this->write_file_from_string($fnam,$snippet_string);
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

 
    //public function putEdit2new() {
    public function editUpdate(
        Request $request, 
        $id, 
        $what_we_are_doing, 
        $coming_from,
        $report_definition_key){
        echo("<br> editUpdate... ".
            ' what_we_are_doing: '. $what_we_are_doing.
            ", id: ".$id.
            ', coming_from: '.$coming_from.
            ', report_definition_key: '.$report_definition_key);$this->debug_exit(__FILE__,__LINE__,0);
        //var_dump($request);
        //echo("editUpdate");$this->debug_exit(__FILE__,__LINE__,10);
        if (!empty($what_we_are_doing)) {
            //echo("editUpdate");$this->debug_exit(__FILE__,__LINE__,0);
            $report_definition  = MiscThing::where('id','=',$report_definition_key)->get();
            $working_arrays     = $this->working_arrays_construct($report_definition[0]);
            switch ($what_we_are_doing) { 
                case "edit2_default_add":
                case "edit2new":
                case "edit2_default_edit":
                case "editing_a_data_record":
                    //$request->input('data_key');
                    //var_dump(Input::all()); $this->debug_exit(__FILE__,__LINE__,0);
                    //$report_definition  = $this->execute_query_by_report_no($id);
                    $modifiable_fields_array = $working_arrays['maintain_modifiable_fields']['modifiable_fields_array'];

                    $lookups_array['field_name'] = $this->build_column_names_array($this->model_table);
                    //var_dump($modifiable_fields_array); $this->debug_exit(__FILE__,__LINE__,10);

                    $fieldname_name_value_array = $this->bld_name_value_lookup_array($this->model_table);
                    //$lookups_array = $this->bld_name_value_lookup_array('shows');
                    $lookups_array = array_merge($lookups_array,$fieldname_name_value_array);
                    //var_dump($report_definition_key); $this->debug_exit(__FILE__,__LINE__,1);

                    $MiscThing  = MiscThing::where('id','=',$id)->get();
                    if($MiscThing){
                        $array1  = $this->return_modifiable_fields_array($what_we_are_doing,$report_definition_key,$modifiable_fields_array); 
                        //echo('id' .$id);//var_dump($MiscThing[0]);var_dump($modifiable_fields_array);
                        //var_dump($array1);$this->debug_exit(__FILE__,__LINE__,0);
                        $snippet_string = $this->modifiable_fields_view_snippet_str_gen(
                            $modifiable_fields_array,
                            $lookups_array,
                            $array1);                   }   


                        $fnam = $this->view_files_prefix."/".$this->generated_files_folder."/".$id.'_snippet_string.blade.php';
                       //var_dump($fnam);$this->debug_exit(__FILE__,__LINE__,01);
                        $this->write_file_from_string($fnam,$snippet_string);
                        //$this->write_file_from_string($fnam,$this->modifiable_fields_view_snippet_str_gen($modifiable_fields_array,              $lookups_array,$MiscThing[0]));

                        $edit_snippet_file_name ="../".$this->node_name.'/'.$this->generated_files_folder.'/'.$MiscThing[0]->id.'_snippet_string';
                        //$edit_snippet_file_name = $fnam;
                        //debug_exit(__FILE__,__LINE__,1);   
                        $passed_to_view_array                                   = array();
                        $passed_to_view_array['edit_snippet_file_name']         = $edit_snippet_file_name;
                        $passed_to_view_array['id']                             = $id;
                        $passed_to_view_array['report_definition_key']          = $report_definition_key;
                        $passed_to_view_array['coming_from']                    = $coming_from;

                        $passed_to_view_array['encoded_modifiable_fields_array'] = 
                            json_encode($modifiable_fields_array);
                        $passed_to_view_arra2newy['data_key']                   = $request->input('data_key');
                        $passed_to_view_array['encoded_input']                  = $request->input('encoded_input');
                        $passed_to_view_array['snippet_name']                   ='_modifiable_fields_getEdit_snippet';
                        $passed_to_view_array['wxyz']                           = 
                            ($report_definition[0]['business_rules']);
                        $passed_to_view_array['report_definition']              = $report_definition[0];
                        $passed_to_view_array['record']                         = $MiscThing[0];
                        $passed_to_view_array['encoded_report_definition']      = json_encode($report_definition[0]);       
                        $passed_to_view_array['snippet_string']                 = $snippet_string;      
                        $passed_to_view_array['lookups_array']                  = $lookups_array;       
                        //echo("*".$request->input('coming_from')."*");$this->debug_exit(__FILE__,__LINE__,0);
                        //var_dump($passed_to_view_array['record']);$this->debug_exit(__FILE__,__LINE__,1);      
                // *****
                // return to view
                // *****
                        return view($this->node_name.'.editUpdate',compact('miscThings'))
                        ->with('node_name'   ,$this->node_name)            
                       ->with('passed_to_view_array'   ,$passed_to_view_array);            
                        break;          
            case "edit2_default_update":
            //case "updating_data_record": // defined in editUpdate
                //echo("<BR>".$what_we_are_doing);$this->debug_exit(__FILE__,__LINE__,10);
                //var_dump($request);$this->debug_exit(__FILE__,__LINE__,1);
                $requestFieldsArray=$request->all(); // important!!

                //var_dump($working_arrays['ppv_define_business_rules']['business_rules_r_o_array']);
                //var_dump($this->build_business_rules_relational_operators());$this->debug_exit(__FILE__,__LINE__,1);
                //$validator = $this->validate($requestFieldsArray,$business_rules_array);
                var_dump($requestFieldsArray);$this->debug_exit(__FILE__,__LINE__,1);

                //$validator = Validator::make(Input::all(), $business_rules_array); //update
                if ( $validator->fails() ) {
                    $errors = $validator->messages();
                    $this->debug_exit(__FILE__,__LINE__,1);
                    //return redirect()->back(); 
                    //return redirect('public/admin/'.$this->node_name.'/editUpdate')
                    return View::make($this->node_name.'/editUpdate')
                        //->with('passed_to_view_array' ,$passed_to_view_array);            

                    //->withErrors($errors)
                    ->withInput();
                      //return $validator->errors()->all();
                    //return back()->withErrors($errors)->withInput();
                }
                
                //$this->debug_exit(__FILE__,__LINE__,1);
                $a = 'encoded_modifiable_fields_array';
                $Inputo = json_decode(json_encode(Input::all()),0);
                $modifiable_fields_array = $this->decode_object_field_to_array($Inputo,$a);
                $modifiable_fields_name_values = array_intersect_key(Input::all(), $modifiable_fields_array);
                //var_dump($b);
                //var_dump(Input::all());$this->debug_exit(__FILE__,__LINE__,1);
                switch ($request->input('coming_from')) {
                    
                    case "edit2_browse_add_button":
                        $updatex  = DB::connection($this->db_data_connection)->table($this->model_table)
                            ->insert($modifiable_fields_name_values);
                        break;
                    case "edit2_edit_button":
                        $updatex  = DB::connection($this->db_data_connection)->table($this->model_table)
                            ->where($this->key_field_name,  '=', $request->input('data_key'))
                            ->update($modifiable_fields_name_values);
                        break;
                }


                return redirect('admin/'.$this->node_name.'/edit1')
                ->with('message', 'record updated')
                ->with('message', 'validation has been bypassed');
                break;

                    default:
                        echo("<br>"."what we are doing is improperly assigned");
                        $this->debug_exit(__FILE__,__LINE__,1);
                        break;
                }
        }   
    }


    public function editUpdate_blade_files_gen($report_key,$objOrArray) {
        //echo ('<br>browse_select_blade_files_gen<br><br>'.$report_key);$this->debug_exit(__FILE__,__LINE__,10);

        $fnam = $this->view_files_prefix."/".$this->generated_files_folder."/".$report_key.'_editUpdate_snippet.blade.php';
        File::put($fnam,$this->editUpdate_snippet_gen($this->model,$_REQUEST["to"],'version1',$objOrArray));
        //$fnam = $this->view_files_prefix."/".$this->generated_files_folder."/".$report_key.'_browse_select_field_names_row.blade.php';
        //File::put($fnam, $this->browse_select_field_names_row_gen($this->model,$_REQUEST["to"]));
        
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


    public function bld_name_value_lookup_array($table_name) {
        
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



    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
 
    public function index(){
        //echo('index');$this->debug_exit(__FILE__,__LINE__,1);
        //echo('index');$this->debug_exit(__FILE__,__LINE__,10);
        
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
        $what_we_are_doing = 'displaying_advanced_edits_screen';
        //$working_arrays     = $this->working_arrays_construct($miscThings[0]);
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
        }
        return $strx;
    }   

    public function ppv_edit_snippet_gen($no_of_rows){
        //echo(" ppv_edit_snippet_gen ".$no_of_rows."<br>");$this->debug_exit(__FILE__,__LINE__,0);
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
        for ($i=0; $i<($no_of_rows); $i++){
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

    public function ppvEdit(Request $request, $id,$what_we_are_doing,$coming_from){
        echo('<br>this is reportDefMenuEdit node: '.$this->node_name);
        //echo("<br>we moved it to indexReports and then reportDefMenuEdit(here)");
        $this->debug_exit(__FILE__,__LINE__,0);
    }


    public function return_modifiable_fields_array($what_we_are_doing,$id,$modifiable_fields_array) {
        //var_dump($what_we_are_doing);$this->debug_exit(__FILE__,__LINE__,1);
                $array1 = array();
         switch ($what_we_are_doing) { 
            case "adding_a_data_record":
            case "edit2_default_add":
            case "editing_a_data_record":
            case "edit2_default_edit":
            case "edit2new":
                /*foreach ($modifiable_fields_array as $name=> $value) {
                    $array1[$value] = "";
                }*/
            switch ($what_we_are_doing) { 
                case "editing_a_data_record":
                case "edit2_default_edit":
                case "edit2new":
                   $db_result  = MiscThing::where('id','=',$id)->get();
                   if($db_result){
                    foreach ($modifiable_fields_array as $name=> $value) {
                        $array1[$value] = $db_result[0]->$value;
                    }

                   }
                    break;
                }
            }
            //var_dump($db_result);$this->debug_exit(__FILE__,__LINE__,1);
            return $array1;
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
        //echo("<br>".'* '.$id.' * '.$what_we_are_doing.' * '.$coming_from." ** ");$this->debug_exit(__FILE__,__LINE__,0);
        
        echo("<br>".'* '.$id.' * '.$what_we_are_doing.' * '.$coming_from." ** "); 
        $miscThing = MiscThing::where('id','=',$id)->get();
        //var_dump($miscThing);$this->debug_exit(__FILE__,__LINE__,10);
        $working_arrays     = $this->working_arrays_construct($miscThing[0]);
        //var_dump($miscThing);$this->debug_exit(__FILE__,__LINE__,10);
    switch ($what_we_are_doing) {
        case "maintain_modifiable_fields":
        case "maintain_browse_fields":           
            $column_names_array = (array) $this->build_column_names_array($this->model_table);
            
            //var_dump($working_arrays[$what_we_are_doing]);$this->debug_exit(__FILE__,__LINE__,10);
            $column_names_array = $working_arrays[$what_we_are_doing]['lookups']['field_names'];
            $array_name = $working_arrays[$what_we_are_doing]['field_name_array']['field_name'];
            $to_array = (array) $working_arrays[$what_we_are_doing][$array_name];
            $from_array = array_diff($column_names_array,$to_array);
            //$this->debug_exit(__FILE__,__LINE__,0);var_dump($to_array);
            
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
            //echo('<br>1042: '.$what_we_are_doing);var_dump($miscThing );   $this->debug_exit(__FILE__,__LINE__,0);   
            //$working_arrays = 
            $this->working_arrays_fixer($working_arrays,$what_we_are_doing);
            //var_dump($working_arrays [$what_we_are_doing]);$this->debug_exit(__FILE__,__LINE__,0);
            $field_name_array_name = ($working_arrays[$what_we_are_doing]['field_name_array']['field_name']);
            echo("rows ".$field_name_array_name);
            $no_of_rows = count($working_arrays [$what_we_are_doing][$field_name_array_name]);
            
            //echo("rows ".$no_of_rows);
            //var_dump($working_arrays [$what_we_are_doing][$field_name_array_name]);$this->debug_exit(__FILE__,__LINE__,0);
            //var_dump($field_name_array_name);$this->debug_exit(__FILE__,__LINE__,1);

            $blade_routine                          = "ppv_edit_snippet_gen";
            $blade_name                             = "_ppv_edit_snippet";
            $filename = $this->views_files_path."/".$this->generated_files_folder."/".$id.$blade_name.'.blade.php';
            //echo($filename.' name> '.$blade_name.' routine> '.$blade_routine);
            //* FIle
            File::put($filename,$this->$blade_routine($no_of_rows));
            //*
     
 
            //var_dump($working_arrays);$this->debug_exit(__FILE__,__LINE__,1);
            $column_names_array = $working_arrays[$what_we_are_doing]['lookups']['field_names'];
           $column_names_array = array_combine(array_values($column_names_array),$column_names_array);
          
            //$working_arrays['ppv_define_query']['lookups']['field_names'] = array_values($a);
            //var_dump(array_values($a) );$this->debug_exit(__FILE__,__LINE__,1);

            //$working_arrays[$what_we_are_doing]['lookups']['field_names'],
             //$working_arrays[$what_we_are_doing]['lookups']['field_names']);
            //var_dump($working_arrays[$what_we_are_doing]['lookups'][1]);
            //$this->debug_exit(__FILE__,__LINE__,0);


            $field_name_array_name  = ($working_arrays[$what_we_are_doing]['field_name_array']['field_name']);
            $field_name_array       = ($working_arrays[$what_we_are_doing][$field_name_array_name]);
            $r_o_array_name         = ($working_arrays[$what_we_are_doing]['field_name_array']['r_o']);
            $r_o_array              = ($working_arrays[$what_we_are_doing][$r_o_array_name]);
            $value_array_name       = ($working_arrays[$what_we_are_doing]['field_name_array']['value']);
            $value_array            = ($working_arrays[$what_we_are_doing][$value_array_name]);
        
            //echo ($what_we_are_doing);$this->debug_exit(__FILE__,__LINE__,0);
            return view($this->model_table.".ppv_update"    ,compact('miscThing'))
                ->with('what_we_are_doing'                  ,$what_we_are_doing)
                ->with('id'                                 ,$id)
                ->with('request'                  ,$request)
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
        //var_dump($miscThing);$this->debug_exit(__FILE__,__LINE__,10);

       return view($this->node_name.'.reportDefMenuEdit',compact('miscThing'))
        ->with('id'                                 ,$id)
        ->with('model'                              ,$this->model)
        ->with('node_name'                          ,$this->node_name)
        ->with('what_we_are_doing'                  ,$what_we_are_doing)
        ->with('coming_from'                        ,$coming_from)
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
                 //var_dump($working_arrays);$this->debug_exit(__FILE__,__LINE__,0);
                 return view($this->node_name.'.reportDefMenuEdit'    ,compact('miscThing'))
                    ->with('what_we_are_doing'                  ,$what_we_are_doing)
                    ->with('from_array'                         ,$from_array)
                    ->with('to_array'                           ,$to_array)
                     ->with('message'                           ,'')
                     ;
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
        $requestFieldsArray=$request->all(); // important!!
        $this->debug_exit(__FILE__,__LINE__,0);echo('update id: '.$id);
        //$this->debug_exit(__FILE__,__LINE__,0);//var_dump($requestFieldsArray);
        //$this->debug_exit(__FILE__,__LINE__,1);
         if (isset($request->browse_select_array)){
            $update = 1; 
            $request->browse_select_array = $request->to;
            $requestFieldsArray['browse_select_array'] = 
                array_combine($request->to,$request->to);
            $requestFieldsArray['browse_select_array'] =
                json_encode($requestFieldsArray['browse_select_array']); // important!!
            $objectOrArray = "object";
            //$objectOrArray = "array";
            $this->browse_select_blade_files_gen($id,$objectOrArray);
            }
        if (isset($request->modifiable_fields_array)){
            $update = 1; 
            //var_dump($request);$this->debug_exit(__FILE__,__LINE__,0);
            $request->modifiable_fields_array = $request->to;
            $requestFieldsArray['modifiable_fields_array'] = 
            array_combine($request->to,$request->to);
            //var_dump($requestFieldsArray['modifiable_fields_array']);$this->debug_exit(__FILE__,__LINE__,1);
            $requestFieldsArray['modifiable_fields_array'] =
            json_encode($requestFieldsArray['modifiable_fields_array']); 
            //var_dump($requestFieldsArray['modifiable_fields_array']);$this->debug_exit(__FILE__,__LINE__,0);
            }

        if (isset($request->query_field_name_array)){
            $update = 1; 
            //var_dump($request);$this->debug_exit(__FILE__,__LINE__,1);
            // move the common screen names into the specific fields in the table

            $request->query_field_name_array            = json_encode($request->field_name_array);
            $requestFieldsArray['query_field_name_array'] = $request->query_field_name_array;

            $request->query_r_o_array                    = json_encode($request->r_o_array);
            $requestFieldsArray['query_r_o_array']         = $request->query_r_o_array;

            $request->query_value_array                  = json_encode($request->value_array);
            $requestFieldsArray['query_value_array']       = $request->query_value_array;
        }
        if (isset($request->business_rules_field_name_array)){
            $update = 1; 
            $requestFieldsArray['business_rules']             = 
            $this->build_validation_array(
                $this->build_business_rules_relational_operators(),
                $request->field_name_array,
                $request->r_o_array,
                $request->value_array);
            $business_rules = $requestFieldsArray['business_rules'];
            $requestFieldsArray['business_rules'] = 
                json_encode($requestFieldsArray['business_rules']);
            $requestFieldsArray['business_rules_field_name_array']    = 
                json_encode($request->field_name_array);
            $requestFieldsArray['business_rules_r_o_array'] = 
                json_encode($request->r_o_array);
            $requestFieldsArray['business_rules_value_array'] = 
                json_encode($request->value_array);
       }
       // ******
       // update
       // ******
       //'what_we_are_doing' => string 'updating_data_record' 
        //var_dump($requestFieldsArray);$this->debug_exit(__FILE__,__LINE__,0);

        if ((isset($request->what_we_are_doing)&&$request->what_we_are_doing == 'updating_data_record') ){
            $business_rules = json_decode($requestFieldsArray['wxyz'],1 );
            var_dump($business_rules);$this->debug_exit(__FILE__,__LINE__,0);
            $modifiable_fields_array = json_decode($request->encoded_modifiable_fields_array,1);
            $modifiable_fields_name_values = array_intersect_key($requestFieldsArray, $modifiable_fields_array);
            unset($modifiable_fields_name_values[$this->snippet_table_key_field_name]);
              $requestFieldsArray=$request->all(); // important!!
            $this->validate($request, $business_rules);
             // valid past here
             var_dump($modifiable_fields_name_values);$this->debug_exit(__FILE__,__LINE__,0);
 
            $update = 1; 
            if ($update == 1){
                $miscThingsings=MiscThing::find($id);
                $miscThingsings->update($modifiable_fields_name_values);

                return redirect('admin/miscThings')
                ->with('message'      , 'ok ');

              //var_dump($requestFieldsArray);$this->debug_exit(__FILE__,__LINE__,1);
            }   
          
    var_dump($update);$this->debug_exit(__FILE__,__LINE__,1);    


        }
         if ($update = 1){
            $miscThingsings=MiscThing::find($id);
            $miscThingsings->update($requestFieldsArray);
        }
                return redirect('admin/miscThings')
                ->with('message'      , 'record updated ');
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
    public function working_arrays_construct($record) {
        //echo("working_arrays_construct");
        // $working_arrays contains some handy grouping of data and arrays we need for various things
        // we used to define working_arrays based on what we were doing
        $working_arrays     = $this->working_arrays_define($record);
        $working_arrays     = $this->working_arrays_populate($working_arrays,$record);
        $column_names       = $this->build_column_names_array($this->model_table);
        $working_arrays     = $this->working_arrays_populate_lookups($working_arrays,$column_names);
        //var_dump($working_arrays);$this->debug_exit(__FILE__,__LINE__,1);
        $working_arrays     = $this->working_arrays_pad_rows_for_growth($working_arrays);
        //$this->working_arrays_fixer($record,$what_we_are_doing);
         return $working_arrays;
    }

      
    public function working_arrays_define($record) {
        //echo("working_arrays_define");
        //var_dump($record);
        //$this->debug_exit(__FILE__,__LINE__,10);
        $working_arrays = array();
        //$working_arrays['maintain_modifiable_fields']['field_name']   = 'modifiable_fields_array';
        //$working_arrays['maintain_modifiable_fields'][]               = 'modifiable_fields_array';
        $working_arrays['expandable_what_we_are_doings']     = array(
            'maintain_modifiable_fields'    => 'maintain_modifiable_fields',
            'maintain_browse_fields'        => 'maintain_browse_fields',
            'ppv_define_query'              => 'ppv_define_query',
            'ppv_define_business_rules'     => 'ppv_define_business_rules'
            );
        $working_arrays['advanced_edit_functions']     = array(
            'maintain_modifiable_fields'    => 'maintain_modifiable_fields',
            'maintain_browse_fields'        => 'maintain_browse_fields',
            'ppv_define_query'              => 'ppv_define_query',
            'advanced_menu_fields_list'     => 'advanced_menu_fields_list',
            'ppv_define_business_rules'     => 'ppv_define_business_rules'
            );
        $working_arrays['advanced_menu_fields_list']['field_name_array']           = array(
            'report_name'       => 'report_name'
            );

        $working_arrays['maintain_modifiable_fields']['field_name_array'] = array(
            'field_name'        => 'modifiable_fields_array');
        $working_arrays['maintain_modifiable_fields']['default_values'] = array(
            'field_name'        => $this->bypassed_field_name,
            );
        $working_arrays['maintain_modifiable_fields']['modifiable_fields_array'] = 
        json_decode($record->modifiable_fields_array);


        $working_arrays['maintain_browse_fields']['field_name_array'] = array(
            'field_name'        => 'browse_select_array');
        $working_arrays['maintain_browse_fields']['default_values'] = array(
            'field_name'        => $this->bypassed_field_name,);
        $working_arrays['maintain_browse_fields']['browse_select_array'] = 
        json_decode($record->browse_select_array);



        $working_arrays['ppv_define_query']['field_name_array'] = array(
            'field_name' => 'query_field_name_array',
            'r_o'        => 'query_r_o_array',
            'value'      => 'query_value_array'
            );
        $working_arrays['ppv_define_query']['default_values'] = array(
            'field_name' => $this->bypassed_field_name,
            'r_o'        => '=',
            'value'      => ' '
            );

        //var_dump($working_arrays['ppv_define_query']);$this->debug_exit(__FILE__,__LINE__,10);
        //var_dump($record);$this->debug_exit(__FILE__,__LINE__,10);
        
        $working_arrays['ppv_define_query']['query_field_name_array'] = 
        json_decode($record->query_field_name_array);
        $working_arrays['ppv_define_query']['query_r_o_array'] = 
        json_decode($record->query_r_o_array);
        $working_arrays['ppv_define_query']['query_value_array'] = 
        json_decode($record->query_value_array);
        $working_arrays['ppv_define_query']['query_r_o_array_values'] = array();
        //var_dump($working_arrays['ppv_define_query']);$this->debug_exit(__FILE__,__LINE__,0);
       //$working_arrays = $this->working_arrays_fixer($working_arrays,$what_we_are_doing);
        if(!isset($working_arrays['ppv_define_query']['query_field_name_array'])){
            //echo("count xxx".count($working_arrays['ppv_define_query']['query_field_name_array']));
            $working_arrays = $this->working_arrays_fixer($working_arrays,'fix_ppv_query');
            //$this->debug_exit(__FILE__,__LINE__,10);
        }
        else{
            //var_dump($working_arrays['ppv_define_query']);$this->debug_exit(__FILE__,__LINE__,0);
            $query_relational_operators_array = $this->build_query_relational_operators_array();
             foreach ($working_arrays['ppv_define_query']['query_r_o_array'] as $index=>$value){
                $working_arrays['ppv_define_query']['query_r_o_array_values'][] =
                $query_relational_operators_array[$value];
                
            }
        }
        //echo("<br>"$value."*".". $query_relational_operators_array[$value]);
        //var_dump($working_arrays['ppv_define_query']);$this->debug_exit(__FILE__,__LINE__,10);
       

        $working_arrays['ppv_define_business_rules']['field_name_array'] = array(
            'field_name' => 'business_rules_field_name_array',
            'r_o'        => 'business_rules_r_o_array',
            'value'      => 'business_rules_value_array'
            );
        $working_arrays['ppv_define_business_rules']['default_values'] = array(
            'field_name' => $this->bypassed_field_name,
            'r_o'        => 'required',
            'value'      => ' '
            );
        $working_arrays['ppv_define_business_rules']['business_rules_field_name_array'] = 
        json_decode($record->business_rules_field_name_array);
        $working_arrays['ppv_define_business_rules']['business_rules_r_o_array'] = 
        json_decode($record->business_rules_r_o_array);
        $working_arrays['ppv_define_business_rules']['business_rules_value_array'] = 
        json_decode($record->business_rules_value_array);
        $working_arrays['ppv_define_query']['business_rules_r_o_array_values'] = array();
        //$query_relational_operators_array = $this->build_query_relational_operators_array();
        //foreach ($working_arrays['ppv_define_query']['business_rules_r_o_array'] as $index=>$value){
        //    $working_arrays['ppv_define_query']['business_rules_r_o_array_values'][] =
        //    $query_relational_operators_array[$value];
        //}

        //var_dump($working_arrays );$this->debug_exit(__FILE__,__LINE__,1);
        return($working_arrays);
    }


    public function working_arrays_fixer($working_arrays,$fix_this) {
        
        //foreach ($ppv_array_names as $what_we_are_doing){
        //var_dump($working_arrays );$this->debug_exit(__FILE__,__LINE__,0);
        switch ($fix_this) {
           case "fix_ppv_query":
            $no_of_entries = 5;
            for ($i=0;$i<$no_of_entries;$i++) {
                $working_arrays['ppv_define_query']['query_field_name_array'][] = 
                $working_arrays['ppv_define_query']['default_values']['field_name'];
                $working_arrays['ppv_define_query']['query_r_o_array'][] = 
                $working_arrays['ppv_define_query']['default_values']['r_o'];
                $working_arrays['ppv_define_query']['query_value_array'][] = 
                $working_arrays['ppv_define_query']['default_values']['value'];
            }

            case "maintain_browse_fields":           
                $column_names_array = (array) $this->build_column_names_array($this->model_table);
                //var_dump($working_arrays[$what_we_are_doing]);$this->debug_exit(__FILE__,__LINE__,10);
 
        $tarray = array();
        $tarray[] = $this->bypassed_field_name;
        $tarray[] = $this->bypassed_field_name;
        $tarray[] = $this->bypassed_field_name;
        $working_arrays['ppv_define_business_rules']['business_rules_field_name_array'] = $tarray;
        $tarray = array();
        $tarray[] = "required";
        $tarray[] = "required";
        $tarray[] = "required";

        $working_arrays['ppv_define_business_rules']['business_rules_r_o_array'] = $tarray;
        $tarray = array();
        $tarray[] = " ";
        $tarray[] = " ";
        $tarray[] = " ";
        $working_arrays['ppv_define_business_rules']['business_rules_value_array'] = $tarray;
               }

        //}
        //var_dump($working_arrays);$this->debug_exit(__FILE__,__LINE__,1);
        return $working_arrays;

    }


    public function working_arrays_pad_rows_for_growth($working_arrays) {
    /*
        $working_arrays['expandable_what_we_are_doings']     = array(
            'maintain_modifiable_fields'    => 'maintain_modifiable_fields',
            'maintain_browse_fields'        => 'maintain_browse_fields',
            'ppv_define_query'              => 'ppv_define_query',
            'ppv_define_business_rules'     => 'ppv_define_business_rules'
        );
        */
        //var_dump($working_arrays);$this->debug_exit(__FILE__,__LINE__,1);
        foreach ($working_arrays['expandable_what_we_are_doings']as $what_we_are_doing){
            foreach($working_arrays[$what_we_are_doing] as $index=>$fieldx) {
                if ($index == 'field_name'){
                    echo($array_name.' * this is a field_name*<br>');$this->debug_exit(__FILE__,__LINE__,1);
                }
            }

       }
       return $working_arrays;
    }   

        public function working_arrays_populate_lookups($working_arrays,$columns) {
            $working_arrays['maintain_modifiable_fields']['lookups']['field_names'] = $columns;
            $working_arrays['maintain_browse_fields']['lookups']['field_names']     = $columns;
            $a = array_merge(array($this->bypassed_field_name=>$this->bypassed_field_name),  $columns);
            $working_arrays['ppv_define_query']['lookups']['field_names'] = array_values($a);
            //var_dump(array_values($a) );$this->debug_exit(__FILE__,__LINE__,1);

            $query_relational_operators_array = $this->build_query_relational_operators_array();
            // just to make the name shorter
            $working_arrays['ppv_define_query']['lookups']['relational_operators']  = $query_relational_operators_array;
            $working_arrays['ppv_define_query']['lookups'][0]                       =  
                array_merge(array($this->bypassed_field_name=>$this->bypassed_field_name),  $columns);
            $working_arrays['ppv_define_query']['lookups'][1]                       = $query_relational_operators_array;

            $business_rules_relational_operators = $this->build_business_rules_relational_operators();
            $working_arrays['ppv_define_business_rules']['lookups']['field_names']          = 
                array_merge(array($this->bypassed_field_name=>$this->bypassed_field_name),  $columns);
            $working_arrays['ppv_define_business_rules']['lookups']['relational_operators'] = $business_rules_relational_operators;
           $working_arrays['ppv_define_business_rules']['lookups'][0]                      = 
                array_merge(array($this->bypassed_field_name=>$this->bypassed_field_name),  $columns);
            $working_arrays['ppv_define_business_rules']['lookups'][1]                      = $business_rules_relational_operators;
            //var_dump($working_arrays['ppv_define_business_rules']['lookups'][1]);
            //var_dump($working_arrays['ppv_define_business_rules']['lookups']['relational_operators']);
            //var_dump($business_rules_relational_operators );$this->debug_exit(__FILE__,__LINE__,1);
           return $working_arrays;         //
        }


        public function working_arrays_populate($working_arrays,$record) {
            //echo("working_arrays_populate");
        //var_dump($record);$this->debug_exit(__FILE__,__LINE__,1);
        $query_relational_operators_array = $this->build_query_relational_operators_array();
        foreach($working_arrays['expandable_what_we_are_doings'] as $name=>$array_name){
            foreach($working_arrays[$array_name]['field_name_array'] as $name1=>$array_name1){
                $working_arrays['ppv_define_query']['r_o_array'] = json_decode($record->$array_name1);
            }           
        }           
        //var_dump($working_arrays['ppv_define_query']);$this->debug_exit(__FILE__,__LINE__,0);
        //var_dump($query_relational_operators_array);$this->debug_exit(__FILE__,__LINE__,0);
       //var_dump($working_arrays['ppv_define_query']);$this->debug_exit(__FILE__,__LINE__,10);  
       
       //var_dump($working_arrays['ppv_define_query']['ppv_ro_values_array']);
        //$this->debug_exit(__FILE       __,__LINE__,10);


     //var_dump($working_arrays);$this->debug_exit(__FILE__,__LINE__,1);                               
             //var_dump($record);
            //$this->debug_exit(__FILE__,__LINE__,10);
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
