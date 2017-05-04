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

class ProgrammerUtilitiesController extends MiscThingsController
{
        public function __construct(
     
        /**/
        $buttons_in_front               = "",
        $print_orientation              = "",
        $record_type                    = "table_controller", 
        //$db_connection_name             = "blues_main", 
        $db_connection_name             = "", 
        $db_snippet_connection          = "",
        $db_data_connection             = "",
        //$db_snippet_connection          = "",
        $controller_name                = "ProgrammerUtilitiesController", 
        $no_of_blank_entries            = "5", 
        $model                          = "MiscThing", 
        $node_name                      = "programmerUtilities", 

        $model_table                    = "miscThings", 
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
        $field_name_list_array_first_index  = "",
        $my_ctr                             = 0,
        $report_definition_id               = 0,
        $store_validation_id                = 0,
        $business_rules_array               = 0

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

/*
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
        $this->report_definition_id         = 12450;
        $this->business_rules_array         = $business_rules_array;
        $this->store_validation_id          = $this->report_definition_id;


*/

    }



     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function mainMenu(REQUEST $request,$id,$reportDefinitionKey) {
       $this->debug_exit(__FILE__,__LINE__,0);echo('mainMenu');
       //var_dump($request);//$this->debug_exit(__FILE__,__LINE__,10);
       $record_type                    = "report_definition";
       $linkx = "xx";

       $main_menu_array = $this->mainMenu_build_links();

        return view($this->node_name.'.programmerUtilitiesMenu',$main_menu_array)
            ->with('menu_array'               ,$main_menu_array)
            ;
        }

    public function mainMenu_active_inactive($id,$reportDefinitionKey) {
       //$this->debug_exit(__FILE__,__LINE__,1);echo('mainMenu_active_inactive');
 
       $db_result1 = DB::connection($this->db_snippet_connection)
       ->select('SHOW TABLES');
       //var_dump( $db_result1);
        foreach($db_result1 as $table)
        {
           //echo($table->Tables_in_homestead."<br>");
        }
        $db_result2 = DB::connection($this->db_snippet_connection)
        ->table($this->model_table)
        ->where('record_type','=','table_controller')
        ->where('table_reporting_active','=',1)
        //->get(['node_name AS Tables_in_homestead'])
        ->get(['model_table'])
        ->toArray()
        ;
        var_dump($db_result1);$this->debug_exit(__FILE__,__LINE__,0);
        var_dump($db_result2);$this->debug_exit(__FILE__,__LINE__,0);

         $diff = array_udiff($db_result1, $db_result2,
         function ($obj_a, $obj_b) {
            //echo('diff a'.'<br>');$this->debug_exit(__FILE__,__LINE__,0);
            //var_dump($obj_a);
            //echo('diff b'.'<br>');$this->debug_exit(__FILE__,__LINE__,0);
            //var_dump($obj_b);

            //return $obj_a != $obj_b;
            //return $obj_a - $obj_b;
 
            // causes non-numeric value
            return $obj_a->Tables_in_homestead - $obj_b->model_table;
            //return $obj_b->model_table;
          }
        );
        var_dump($diff);$this->debug_exit(__FILE__,__LINE__,1);
    }

    public function mainMenu_build_links() {
        $main_menu_array = array(
        'activate/deactivate table reporting'=>'mainMenu_active_inactive',
        'another one'=>'mainMenu_active_inactive',
        'and another one'=>'mainMenu_active_inactive'


        );
        return $main_menu_array;
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
        //echo("<br> browseEdit ".$what_we_are_doing.$id.$coming_from);$this->debug_exit(__FILE__,__LINE__,0);
    
        $report_definition          = $this->execute_query_by_report_no($id) ;
        $encoded_business_rules     = $report_definition[0]['business_rules'];

        //$this->business_rules_array = (array) json_decode($report_definition[0]['business_rules']);

        $working_arrays             = $this->working_arrays_construct($report_definition[0]);
        //var_dump($working_arrays);$this->debug_exit(__FILE__,__LINE__,10);

        $query_relational_operators_array = $this->build_query_relational_operators_array();
        
        if(!$miscThings = $this->build_and_execute_query($working_arrays,$this->bypassed_field_name,$query_relational_operators_array)) {
            echo("<BR>"."query failed");$this->debug_exit(__FILE__,__LINE__,10);
        }
        
        //var_dump($miscThings[0]);$this->debug_exit(__FILE__,__LINE__,10);
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
            ->with('encoded_business_rules'     , $encoded_business_rules)

           ->with('report_definition_key'     , $id)

             
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
        

 
    public function snippets_gen_browse_select($key_field_name,$key_value) {
        echo 'snippets_gen_browse_select';print_r($_REQUEST);exit("exit 172");
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
            ', report_definition_key: '.$report_definition_key);
        //$this->debug_exit(__FILE__,__LINE__,10);
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
                        $array1  = $this->return_modifiable_fields_array($what_we_are_doing,$id,$modifiable_fields_array); 
                       echo('id' .$id);//var_dump($MiscThing[0]);var_dump($modifiable_fields_array);
                        var_dump($array1);$this->debug_exit(__FILE__,__LINE__,0);
                        $snippet_string = $this->snippet_gen_modifiable_fields(
                            $modifiable_fields_array,
                            $lookups_array,
                            $array1);                   }   


                        $fnam = $this->view_files_prefix."/".$this->generated_files_folder."/".$id.'_snippet_string.blade.php';
                       //var_dump($fnam);$this->debug_exit(__FILE__,__LINE__,01);
                        $this->write_file_from_string($fnam,$snippet_string);
    

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
                //var_dump($b);
                //$this->debug_exit(__FILE__,__LINE__,1);
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
        //echo ('<br>editUpdate_blade_files_gen<br><br>'.$report_key);$this->debug_exit(__FILE__,__LINE__,10);

        $fnam = $this->view_files_prefix."/".$this->generated_files_folder."/".$report_key.'_editUpdate_snippet.blade.php';
        File::put($fnam,$this->editUpdate_snippet_gen($this->model,$_REQUEST["to"],'version1',$objOrArray));
        //$fnam = $this->view_files_prefix."/".$this->generated_files_folder."/".$report_key.'_browse_select_field_names_row.blade.php';
        //File::put($fnam, $this->blade_gen_browse_select_field_names_row($this->model,$_REQUEST["to"]));
   }
 
 
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create_w_report_id($report_definition_key) {
        //echo("<br>".$this->store_validation_id . $report_definition_key);$this->debug_exit(__FILE__,__LINE__,1);
        $report_definition  = $this->execute_query_by_report_no($report_definition_key) ;
        $encoded_business_rules = $report_definition[0]['business_rules'];
        $this->business_rules_array = (array) json_decode($report_definition[0]['business_rules']);
        //var_dump($encoded_business_rules);$this->debug_exit(__FILE__,__LINE__,1);
        $snippet_file ="../".$this->node_name.'/'.$this->generated_files_folder.'/'.$report_definition_key.'_modifiable_fields_add';
        //$this->c1($report_definition_key);
         return view($this->node_name.'.create')
            ->with('encoded_business_rules' , $encoded_business_rules)
            ->with('report_definition_key'  , $report_definition_key)
           //->with('report_key'              , $report_definition_key)
            ->with('snippet_file'           , $snippet_file)
            ->with('node_name'              , $this->node_name);
    }



    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //$x = Config::get('dehGlobals.business_rules_array');
        //$this->debug_exit(__FILE__,__LINE__,10);  
 
        //echo("<br>".$this->store_validation_id );$this->debug_exit(__FILE__,__LINE__,1);
        $snippet_file ="../".$this->node_name.'/'.$this->generated_files_folder.'/'.$this->store_validation_id.'_modifiable_fields_add';
        //$snippet_file = $this->node_name."/".$this->generated_files_folder.
        "/".$this->report_definition_id.'_modifiable_fields_add.blade.php';

        //echo("<br>".$snippet_file.$this->store_validation_id );$this->debug_exit(__FILE__,__LINE__,1);
       //$snippet_file= "../".'baseline_blades/'.'report_name_only';

        //$snippet_file= "../".'baseline_blades/'.'report_name_only';
         return view($this->node_name.'.create')
        //->with('message'                        , $message)
        ->with('snippet_file'                   , $snippet_file)
        ->with('report_definition_key'  , $this->report_definition_id)
        ->with('node_name'                        , $this->node_name);

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
            ->with('report_definition_key',$this->report_definition_id)
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
    public function indexReports(REQUEST $request,$id,$reportDefinitionKey) {
       $this->debug_exit(__FILE__,__LINE__,0);echo(' indexReports');
       //var_dump($request);
        var_dump($id);
       $record_type                    = "report_definition";
        /*
       $miscThings = MiscThing::where('id','=',$this->report_definition_id )
         ->get();
        */
        $miscThings = MiscThing::where('record_type','=',$record_type)
         ->where('table_name',  '='    ,$this->model_table)
        ->where('node_name',    '='    ,$this->node_name)
        ->orderBy('report_name','asc')
        ->get();
        
        $what_we_are_doing = 'displaying_advanced_edits_screen';
        $working_arrays     = $this->working_arrays_construct($miscThings[0]);
        $record = $miscThings[0];
        //var_dump($this->report_definition_id);$this->debug_exit(__FILE__,__LINE__,10);
        return view($this->node_name.'.indexReports',compact('miscThings'))
            ->with('encoded_report_description' ,json_encode($miscThings))
            ->with('encoded_record'             ,json_encode($record))
             ->with('model_table'               ,$request->input('model_table'))
             ->with('id'                        ,$request->input('id'))
             ->with('report_definition_key'      ,$this->report_definition_id)
             ->with('reportDefinitionKey'      ,$reportDefinitionKey)

            ->with('encoded_working_arrays'     ,json_encode($working_arrays))
            ->with('record'                     ,$record)
            ->with('all_records'                ,$miscThings)
           ->with('report_key'                  ,$this->report_definition_id)
            //->with('report_key'                  ,$request->input('report_key'))
            ->with('node_name'                  ,$this->node_name)
            ->with('snippet_table_key_field_name',$this->snippet_table_key_field_name)
            ->with('snippet_table'               ,$this->snippet_table)
            ;
        }

      /**
     
     *
     */
       
  

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

    public function return_modifiable_fields_array($what_we_are_doing,$id,$modifiable_fields_array) {
        //var_dump($what_we_are_doing);$this->debug_exit(__FILE__,__LINE__,1);
                   //var_dump($modifiable_fields_array);$this->debug_exit(__FILE__,__LINE__,1);

                $array1 = array();
        if (is_null($modifiable_fields_array)){
            return $array1;
        }
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
                    //var_dump($modifiable_fields_array);$this->debug_exit(__FILE__,__LINE__,1);
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


            $field_name_array_name  = ($working_arrays[$what_we_are_doing]['field_name_array']['field_name']);
            $field_name_array       = ($working_arrays[$what_we_are_doing][$field_name_array_name]);
            $r_o_array_name         = ($working_arrays[$what_we_are_doing]['field_name_array']['r_o']);
            $r_o_array              = ($working_arrays[$what_we_are_doing][$r_o_array_name]);
            //var_dump($working_arrays[$what_we_are_doing][$r_o_array_name]);var_dump($r_o_array);
            $working_arrays[$what_we_are_doing]['lookups'][1] = 
            array_combine(
                $working_arrays[$what_we_are_doing]['lookups'][1],
                $working_arrays[$what_we_are_doing]['lookups'][1]);
           //$this->debug_exit(__FILE__,__LINE__,10);
           $value_array_name       = ($working_arrays[$what_we_are_doing]['field_name_array']['value']);
            $value_array            = ($working_arrays[$what_we_are_doing][$value_array_name]);
        
            //echo ($what_we_are_doing);$this->debug_exit(__FILE__,__LINE__,0);
            return view($this->model_table.".ppv_update"    ,compact('miscThing'))
                ->with('what_we_are_doing'                  ,$what_we_are_doing)
                ->with('id'                                 ,$id)
                ->with('request'                            ,$request)
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

    public function store(REQUEST $request) {
        echo('storex');
        var_dump($request->input('encoded_business_rules'));
        //var_dump($request->input::all()); 
        //$this->debug_exit(__FILE__,__LINE__,10);
        //$this->debug_exit(__FILE__,__LINE__,10);
        $validation_array = (array) json_decode($request->input('encoded_business_rules'));
        $requestFieldsArray=$request->all(); // important!!
        $this->validate($request,$validation_array);
 
        $miscThing=$request->all(); // important!!
        MiscThing::create($miscThing);
        return redirect('admin/miscThings');
    }



    public function store_w_rules_array(REQUEST $request, $encoded_business_rules) {
        echo('store');
        $this->debug_exit(__FILE__,__LINE__,10);
        //$request->input('data_key');
                    var_dump($request->input::all()); $this->debug_exit(__FILE__,__LINE__,10);
        $validation_array = $this->business_rules_array;
        $requestFieldsArray=$request->all(); // important!!
        $this->validate($request,$validation_array);
        //$updatex  = DB::connection($this->db_data_connection)->table($this->model_table)->insert($modifiable_fields_name_values);

        $miscThing=$request->all(); // important!!
        MiscThing::create($miscThing);
        return redirect('admin/miscThings');
    }



    /*
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $idInput
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $update = 0;  
        $requestFieldsArray=$request->all(); // important!!
        //$this->debug_exit(__FILE__,__LINE__,1);echo('update id: '.$id);
        //$this->debug_exit(__FILE__,__LINE__,0);//var_dump($requestFieldsArray);
        //$this->debug_exit(__FILE__,__LINE__,1);
        if (isset($request->browse_select_array)){
            $update = 1; 
            $request->browse_select_array = $request->to;
            $requestFieldsArray['browse_select_array'] = 
                array_combine($request->to,$request->to);
            $requestFieldsArray['browse_select_array'] =
                json_encode($requestFieldsArray['browse_select_array']); // important!!
            //$objectOrArray = "object";
            $objectOrArray = "array";
            $this->blade_gen_browse_select($id,$objectOrArray);
            }
        if (isset($request->modifiable_fields_array)){
            $update = 1; 
            //var_dump($request);$this->debug_exit(__FILE__,__LINE__,0);
            $request->modifiable_fields_array = $request->to;
            $requestFieldsArray['modifiable_fields_array'] = 
            array_combine($request->to,$request->to);
            $this->blade_gen_simple_add($id,$requestFieldsArray['modifiable_fields_array']);
            //var_dump($requestFieldsArray['modifiable_fields_array']);$this->debug_exit(__FILE__,__LINE__,1);
            $requestFieldsArray['modifiable_fields_array'] =
            json_encode($requestFieldsArray['modifiable_fields_array']); 
             //var_dump($requestFieldsArray['modifiable_fields_array']);$this->debug_exit(__FILE__,__LINE__,10);
            }

        if (isset($request->query_field_name_array)){
            $update = 1; 
            
            $new_r_o_array = $request->r_o_array;
            if(is_numeric($request->r_o_array[0])){
                $new_r_o_array = array();
                $query_relational_operators_array = $this->build_query_relational_operators_array();
                foreach ($request->r_o_array as $index=>$value){
                    $new_r_o_array[] =
                    $query_relational_operators_array[$value];
                }
            }
            $requestFieldsArray = array(
                'query_field_name_array'    => json_encode($request->field_name_array),
                'query_r_o_array'           => json_encode($new_r_o_array),
                'query_value_array'         => json_encode($request->value_array)
                );

           // move the common screen names into the specific fields in the table

        }
        //var_dump($requestFieldsArray);$this->debug_exit(__FILE__,__LINE__,10);
        //var_dump($requestFieldsArray['query_r_o_array']);$this->debug_exit(__FILE__,__LINE__,10);


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
            //var_dump($requestFieldsArray);$this->debug_exit(__FILE__,__LINE__,10);

       }
       // ******
       // update
       // ******
       //'what_we_are_doing' => string 'updating_data_record' 
        //var_dump($requestFieldsArray);$this->debug_exit(__FILE__,__LINE__,0);
        if (!$update) {

            //var_dump($requestFieldsArray);$this->debug_exit(__FILE__,__LINE__,10);
            if ((isset($request->what_we_are_doing)&&$request->what_we_are_doing == 'updating_data_record') ){
                $business_rules = json_decode($requestFieldsArray['wxyz'],1 );
                var_dump($business_rules);$this->debug_exit(__FILE__,__LINE__,0);
                $modifiable_fields_array = json_decode($request->encoded_modifiable_fields_array,1);
                $modifiable_fields_name_values = array_intersect_key($requestFieldsArray, $modifiable_fields_array);
                unset($modifiable_fields_name_values[$this->snippet_table_key_field_name]);
                $requestFieldsArray=$request->all(); // important!!
                $this->validate($request, $business_rules);
                 // valid past here
                //var_dump($modifiable_fields_name_values);$this->debug_exit(__FILE__,__LINE__,10);
     
                $update = 0; 
                    $miscThingsings=MiscThing::find($id);
                    $miscThingsings->update($modifiable_fields_name_values);
                    return redirect('admin/miscThings')
                       ->with('message'      , 'ok ');
            }
        }
         if ($update = 1){
            echo("<br>"." id: ".$id);var_dump($requestFieldsArray);$this->debug_exit(__FILE__,__LINE__,0);
            $miscThingsings=MiscThing::find($id);
            $miscThingsings->update($requestFieldsArray);
        }
                return redirect('admin/miscThings')
                ->with('message'      , 'record updated ');
    }

    //
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
        //* ******
        // "groups_to_be_resized" lists arrays that need room for growth.
        // queries and business rules can grow and differ widely from one query (or rule) to another
        // they need to be loaded first and padded with some room for growth
        //
        // no more or no less than $this->no_of_blank_entries 
        // default values padded onto the end
        //
        // even though we have relational operators and values arrays to worry about,
        // this drives off the number of field_names = to $bypassed_field_name on the end of the array
        // the array indexes get defined here but the working_arrays_pad_rows_for_growth
        // originally we did it just for who you were but not, it seems easiest to size them after we get // the existing arrays. 
        // ******
        $working_arrays['groups_to_be_resized']     = array(
            //'maintain_modifiable_fields'    => 'maintain_modifiable_fields',
            //'maintain_browse_fields'        => 'maintain_browse_fields',
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
        $working_arrays['maintain_modifiable_fields']['default_values_array'] = array(
            'field_name'        => $this->bypassed_field_name,
            );
        $working_arrays['maintain_modifiable_fields']['modifiable_fields_array'] = 
        json_decode($record->modifiable_fields_array);


        $working_arrays['maintain_browse_fields']['field_name_array'] = array(
            'field_name'        => 'browse_select_array');
        $working_arrays['maintain_browse_fields']['default_values_array'] = array(
            'field_name'        => $this->bypassed_field_name,);
        $working_arrays['maintain_browse_fields']['browse_select_array'] = 
        json_decode($record->browse_select_array);



        $working_arrays['ppv_define_query']['field_name_array'] = array(
            'field_name' => 'query_field_name_array',
            'r_o'        => 'query_r_o_array',
            'value'      => 'query_value_array'
            );
        $working_arrays['ppv_define_query']['default_values_array'] = array(
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
            //var_dump($working_arrays['ppv_define_query']);$this->debug_exit(__FILE__,__LINE__,10);
            // translate old ro_array from index to values
            $query_relational_operators_array = $this->build_query_relational_operators_array();
            foreach ($working_arrays['ppv_define_query']['query_r_o_array'] as $index=>$value){
                if (is_numeric($value)) {
                    $working_arrays['ppv_define_query']['query_r_o_array_values'][] =
                    $query_relational_operators_array[$value];
                }
            }
        }
        //echo("<br>"$value."*".". $query_relational_operators_array[$value]);
        //var_dump($working_arrays['ppv_define_query']);$this->debug_exit(__FILE__,__LINE__,10);
       

        $working_arrays['ppv_define_business_rules']['field_name_array'] = array(
            'field_name' => 'business_rules_field_name_array',
            'r_o'        => 'business_rules_r_o_array',
            'value'      => 'business_rules_value_array'
            );
        $working_arrays['ppv_define_business_rules']['default_values_array'] = array(
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
                $working_arrays['ppv_define_query']['default_values_array']['field_name'];
                $working_arrays['ppv_define_query']['query_r_o_array'][] = 
                $working_arrays['ppv_define_query']['default_values_array']['r_o'];
                $working_arrays['ppv_define_query']['query_value_array'][] = 
                $working_arrays['ppv_define_query']['default_values_array']['value'];
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
        //echo('<br><br>'.'working_arrays_pad_rows_for_growth');$this->debug_exit(__FILE__,__LINE__,0);
        foreach ($working_arrays['groups_to_be_resized']as $array_group_to_be_padded){
            $pad_ctr = $this->working_arrays_set_pad_ctr($working_arrays,$array_group_to_be_padded);
            //$this->debug_exit(__FILE__,__LINE__,10);
            $working_arrays = $this->working_arrays_pad_specific_group($working_arrays,$array_group_to_be_padded,$pad_ctr);
        }
       return $working_arrays;
    }



    public function working_arrays_set_pad_ctr($working_arrays,$array_group_to_be_padded ) {
        //echo('<br>'.'working_arrays_set_pad_ctr');$this->debug_exit(__FILE__,__LINE__,0); 
        foreach($working_arrays[$array_group_to_be_padded] as $array_name=>$arrays) {
            //business_rules_field_name_array ppv_define_business_rules
            if($array_name == 'field_name_array'){
                foreach($working_arrays[$array_group_to_be_padded][$array_name]as $generic_array_name=>$specific_array_name) {
                    switch ($generic_array_name) {
                        case "field_name":
                            //echo ("<br>".$generic_array_name." ** ".$specific_array_name);$this->debug_exit(__FILE__,__LINE__,0); 

                            if(is_null($working_arrays[$array_group_to_be_padded][$specific_array_name])){
                              //echo('null stop');$this->debug_exit(__FILE__,__LINE__,10); 
                              $pad_ctr = $this->no_of_blank_entries;
                            }
                            else{
                                $pad_ctr = $this->no_of_blank_entries;
                                $looking_for_first_real_field_name = 1;  
                                $a_count = count($working_arrays[$array_group_to_be_padded][$specific_array_name])-1;
                                 for ($i=$a_count; $i>(0); $i--){
                                    // each entry in the field_name_array
                                    if ($looking_for_first_real_field_name){
                                        if ($working_arrays[$array_group_to_be_padded][$specific_array_name][$i] == $this->bypassed_field_name){
                                            $pad_ctr -= 1;
                                            //echo('<br>'.'found pad');$this->debug_exit(__FILE__,__LINE__,0);
                                        } 
                                        else{
                                            $looking_for_first_real_field_name = 0; 
                                        }         
                                    }
                                } // end for

                            }
                            break;
                        case "r_o":
                             break;
                        case "value":
                             break;
                    }  // end of switch xx                    
                    //echo('<br>'.'pad_ctr: '.$pad_ctr);
                    return $pad_ctr;
                    //var_dump($array_name);$this->debug_exit(__FILE__,__LINE__,10); 
                }
            }
        }        
    }

    public function working_arrays_pad_specific_group($working_arrays,$array_group_to_be_padded,$pad_ctr) {
        echo($array_group_to_be_padded);
        //var_dump($working_arrays);$this->debug_exit(__FILE__,__LINE__,10); 
        //var_dump($working_arrays[$array_group_to_be_padded]);$this->debug_exit(__FILE__,__LINE__,10); 

        foreach($working_arrays[$array_group_to_be_padded]['field_name_array'] as 
            $generic_array_name=>$specific_array_name) {
            //echo('<br> * generic_array_name '.$generic_array_name.'  '. $specific_array_name);
            switch ($generic_array_name) {
            case "field_name":
                //echo ("<br>".$generic_array_name." * ".$specific_array_name);
                //$this->debug_exit(__FILE__,__LINE__,10); 
                //var_dump($working_arrays[$array_group_to_be_padded][$specific_array_name]);
                //* now we need to set pad ctr

                // *****
                // loop thru assuring proper defaults
                // *****
                //var_dump($working_arrays[$array_group_to_be_padded]['field_name_array']);
                for ($i=0; $i<($pad_ctr); $i++){
                    // for each entry we're going to insert
                    foreach($working_arrays[$array_group_to_be_padded]['field_name_array'] as 
                        $index=>$actual_array_name) {

                        switch ($index) {
                            case "field_name":
                            case "r_o":
                            case "value":                                
                                //echo ("<br>padding for: ".$index." * ".$actual_array_name);
                               //var_dump($working_arrays[$array_group_to_be_padded][$actual_array_name]);
                                $working_arrays[$array_group_to_be_padded][$actual_array_name][] =
                                $working_arrays[$array_group_to_be_padded]['default_values_array'][$index];
                                break;
                        } // switch   
                    } // end of ield names

                } // end of pad_ctr
            } // end of switch on generic name
            }  //* end of field_name_array name
            return $working_arrays;
          var_dump($working_arrays);$this->debug_exit(__FILE__,__LINE__,10); 
        
   } // end of working_arrays_pad_specific_group
      


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
        /*
        foreach($working_arrays['groups_to_be_resized'] as $group_to_be_resized){
            foreach($working_arrays[$group_to_be_resized]['field_name_array'] as $name1=>$array_name1){
                    $working_arrays['ppv_define_query']['r_o_array'] = json_decode($record->$array_name1);
               var_dump($working_arrays[$group_to_be_resized]);
                }               

            
            foreach($group_to_be_resized as $group_to_be_resized){
                foreach($working_arrays[$array_name]['field_name_array'] as $name1=>$array_name1){
                    $working_arrays['ppv_define_query']['r_o_array'] = json_decode($record->$array_name1);
                }           
            } 
                     
         }    
         */        
        //var_dump($working_arrays['ppv_define_query']);$this->debug_exit(__FILE__,__LINE__,0);
        //var_dump($query_relational_operators_array);$this->debug_exit(__FILE__,__LINE__,0);
       //var_dump($working_arrays['ppv_define_query']);$this->debug_exit(__FILE__,__LINE__,10);  
       
       //var_dump($working_arrays['ppv_define_query']['ppv_ro_values_array']);
        //$this->debug_exit(__FILE       __,__LINE__,10);


        //var_dump($working_arrays);$this->debug_exit(__FILE__,__LINE__,1);                               
             //var_dump($record);
            //$this->debug_exit(__FILE__,__LINE__,10);
           //var_dump($working_arrays);$this->debug_exit(__FILE__,__LINE__,1);
            $working_arrays['ppv_define_query']['lookups']['field_names']           = '';
            $working_arrays['ppv_define_query']['lookups']['relational_operators']  = '';
            $working_arrays['ppv_define_query']['lookups'][0]                       = '';
            $working_arrays['ppv_define_query']['lookups'][1]                       = '';

            $working_arrays['ppv_define_business_rules']['lookups']['field_names']           = '';
            $working_arrays['ppv_define_business_rules']['lookups']['relational_operators']  = '';
            $working_arrays['ppv_define_business_rules']['lookups'][0]                       = '';
            $working_arrays['ppv_define_business_rules']['lookups'][1]                       = '';
            $working_arrays = $this->getEdit8_array_node_to_array($working_arrays);

            //var_dump($working_arrays);$this->debug_exit(__FILE__,__LINE__,1);
            return($working_arrays);
            
        }
    
}