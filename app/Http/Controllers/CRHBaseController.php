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

class CRHBaseController extends DEHBaseController
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
        // Automatically adjuested strings begin here    
        
        $controller_name                = "miscThingsController", 
        $model                          = "MiscThing", 
        $node_name                      = "miscThings", 
        $model_table                    = "miscThings", 

        $link_parms_array               = array(),
        //$controller_name                = '#beginControllerName#endControllerName',
        //$model                          = '#beginModel#endModel',
        //$node_name                      = '#beginNodeName#endNodeName', 
        //$model_table                    = '#beginModelTable#endModelTable',

        $no_of_blank_entries            = "5", 
        $snippet_table                  = "miscThings", 
        $snippet_node_name              = "miscThings", 
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
        $no_of_fields                       = 0,
        $report_definition_id               = 0,

        $store_validation_id                = 0,
        $business_rules_array               = 0,
        $project_path                       = "",
        $all_tables                         = array(),
        $active_controllers                 = array(),
        $view_variables_array               = array(),
        $parm2_array                        = array(),
        $array_of_parm2_array               = array() 

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
        $this->snippet_node_name                = $snippet_node_name;
        $this->snippet_table                    = $snippet_table;
        $this->snippet_table_key_field_name     = $snippet_table_key_field_name;
        $this->node_name                        = $node_name ;
        //$this->link_parms_array                 = $this->derive_entity_names_from_table($this->node_name);


        $this->backup_node                      = $backup_node;
        $this->generated_files_folder           = $generated_files_folder;
        $this->key_field_name                   = $key_field_name;
        $this->bypassed_field_name              = $bypassed_field_name;     
        $this->no_of_blank_entries              = $no_of_blank_entries;

        //* *****
        //* PATHS
        //* *****
        $this->project_path             = substr(app_path(),0,strlen(app_path())-4);
        $this->controllers_path         = app_path()."/Http/Controllers";
        $this->routes_path              = app_path()."/Http";
        $this->storage_path             = $this->project_path."/storage";
        $this->views_files_path         = $this->project_path."/resources/views/";


        $this->key_field_array          = array($this->snippet_table_key_field_name=>$this->snippet_table_key_field_name);
        $this->make_sure_table_snippet_exists($this->model_table);
        //$this->debug_exit(__FILE__,__LINE__,0);
        $this->generated_snippets_array        = $this->get_generated_snippets();

       //config
        $this->database_connection_config_path = $this->project_path."/config/";
        
        //controllers
        $node =  "controllers";

        $this->stored_connections_path      = $this->project_path.'/storage/connections/'. $this->db_connection_name ;
        $this->view_files_prefix                = $this->views_files_path;
 



        $this->my_ctr = $my_ctr;
        //routes

        // these are derived
 

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
        $MiscThing->setConnection("homestead");
        $miscThings = $MiscThing
            ::where('record_type','=','table_controller')
            ->where('controller_name','='    ,"MiscThingsController")
            ->get();
        $this->db_snippet_connection            = $miscThings[0]->db_snippet_connection;
        $this->db_data_connection               = $miscThings[0]->db_data_connection;
       
        $this->db_snippet_connection            = "homestead";
        $this->db_data_connection               = "homestead";
 
 
        // field_name_list_array defines the arrays depending on $what_we_are_doing
        // the first level index 
        //$this->field_name_list_array = (array) $this->initialize_field_name_list_array();
        $this->field_name_lists_array = $field_name_lists_array;
        $this->field_name_list_array = "";
        $this->field_name_list_array_first_index = $field_name_list_array_first_index;
        $this->business_rules_array         = $business_rules_array;
        $this->no_of_fields                 = 0;


        $this->all_tables                   = $all_tables; 
        $this->active_controllers           = $active_controllers;
        $this->view_variables_array         = $view_variables_array;
        $this->parm2_array                  = $parm2_array;
        $this->array_of_parm2_array         = $array_of_parm2_array;



        echo (" : ".$this->project_path);$this->debug0(__FILE__,__LINE__,__FUNCTION__);

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

     /**
     * Execute the query and show the report you just requested
     *
     * @return \Illuminate\Http\Response
     */

     public function activateDeactivate( $id, $what_we_are_doing, $table){
        //echo($what_we_are_doing);
        //$this->debug1(__FILE__,__LINE__,__FUNCTION__);echo('just routes');
        $entity = $table ;
        $this->link_parms_array = $this->derive_entity_names_from_table($table);
        $entities_array = array(
            'routes'            =>$this->link_parms_array['node_name'],
            'table_controller'  =>$this->link_parms_array['controller_name'],
            'model'             =>$this->link_parms_array['model'],
            'views'             =>$this->link_parms_array['node_name'],
            );
        $an_array = array();
        $msg_array = array();

        $fieldNamesArray = array(
        'line',
        'entity',
        'str1',
        'fileName',
        'str2',
        'fileName2');
        $an_array['fieldNames'] = $fieldNamesArray;
        echo($id.' '.$what_we_are_doing.' '.$entity.' ');$this->debug1(__FILE__,__LINE__,__FUNCTION__);
        switch ($what_we_are_doing) { 
            case "activate":
                $this->activate_entity($entity);
                //$this->debug0(__FILE__,__LINE__,__FUNCTION__);
                break;
            case "deactivate":
                //echo($id.$what_we_are_doing);$this->debug0(__FILE__,__LINE__,__FUNCTION__);
                $updatex = MiscThing::where($this->key_field_name,  '=', $id)
                ->update(array('table_reporting_active'=>0));
                break ;
            case "validate":
                $name = "";
                //get_active_reports_for_table
                //echo('validate'. $entity.$name);$this->debug0(__FILE__,__LINE__,__FUNCTION__);
                $an_array = array();
                $an_array = $this->validate_entity($entity,$name,$an_array);
                //var_dump($an_array);$this->debug1(__FILE__,__LINE__,__FUNCTION__);
                break;
           case "listbrokenLinks":
                $name = "";
                echo($what_we_are_doing.' '. $entity.$name);$this->debug1(__FILE__,__LINE__,__FUNCTION__);
                //$this->clean_orphan_files($this->model_table,$this->app_path); // activate..
 
                $an_array = $this->validate_entity($entity,$name,$an_array);
                //var_dump($an_array);$this->debug1(__FILE__,__LINE__,__FUNCTION__);
                break;
                 //$this->debug1(__FILE__,__LINE__,__FUNCTION__);
            }
      
        foreach ($entities_array as $entity=>$name) {
            //echo(' '.$what_we_are_doing.' '. $entity.' '.$name.' ');$this->debug1(__FILE__,__LINE__,__FUNCTION__);
            switch ($what_we_are_doing) { 
                case "activate":
                    $this->activate_entity($entity);
                    
                    //$this->debug0(__FILE__,__LINE__,__FUNCTION__);
                    break;
                case "deactivate":
                    //echo($id.$what_we_are_doing);$this->debug0(__FILE__,__LINE__,__FUNCTION__);
                    $updatex = MiscThing::where($this->key_field_name,  '=', $id)
                    ->update(array('table_reporting_active'=>0));
                    break ;
                case "validate":
                    //echo('validate'. $entity.$name);$this->debug0(__FILE__,__LINE__,__FUNCTION__);
                    $an_array = $this->validate_entity($entity,$name,$an_array);
                    //var_dump($an_array);$this->debug1(__FILE__,__LINE__,__FUNCTION__);
                    break;
                case "listbrokenLinks":
                    //echo('validate'. $entity.$name);$this->debug0(__FILE__,__LINE__,__FUNCTION__);
                    $an_array = $this->validate_entity($entity,$name,$an_array);
                    //var_dump($an_array);$this->debug1(__FILE__,__LINE__,__FUNCTION__);
                    break;
            }   
        }
        
        if (isset($an_array)){
            //var_dump($an_array);$this->debug1(__FILE__,__LINE__,__FUNCTION__);
            return view($this->node_name.'.dynamicMenu1')
                ->with('arr1',$an_array);
        }
        $this->debug1(__FILE__,__LINE__,__FUNCTION__);
        return redirect()->route('programmerUtilities.mainMenu_active_inactive', 
                ['id' => $this->report_definition_id,
                'what_we_are_doing' => 'what_we_are_doing',
                'coming_from' => 'dynamicMenu0'
                ]);
        
    }

    public function generic_method_build_array_of_parm2_array($what_are_we_doing,$parm2_array,$all_tables,$active_controllers,$view_variables_array,$no_of_fields){
           // ***************************
       // var_dump($parm2_array);
       $array_of_parm2_array = array();
       foreach($all_tables as $table){
           // echo($table);$this->debugx('0110',__FILE__,__LINE__,__FUNCTION__);

            switch ($what_are_we_doing) {
                case "configure_an_unconfigured_table":
                    break;
                case "activate_deactivate_table_reporting":
                    break;
                case "reports_with_broken_links":
                    if (in_array($table,$active_controllers)){
                        //echo("<br/>".$table);$this->debugx('0111',__FILE__,__LINE__,__FUNCTION__);

                        if ($no_of_fields > 1){
                            for ($i = 1; $i < $no_of_fields; $i++) {
                                $array_of_parm2_array[$table]['parm2_array'][$i]  = $parm2_array;
                                if (!in_array('node_name_follows',$array_of_parm2_array[$table]['parm2_array'][$i])){
                                    $array_of_parm2_array[$table]['parm2_array'][$i][]  = 'node_name_follows';
                                    $array_of_parm2_array[$table]['parm2_array'][$i][]  = $table;
                                    }

                                $array_of_parm2_array[$table]['parm2_array'][$i][]= $view_variables_array[$table]['field'][$i];
                            }

                           for ($i = 1; $i < $no_of_fields; $i++) {
                                $array_of_parm2_array[$table]['parm2_array'][$i]    = json_encode($array_of_parm2_array[$table]['parm2_array'][$i]);
                            }
                        }
                    }
                    break;
            } // end switch
         } // end foreach

        //var_dump($array_of_parm2_array);$this->debugx('0111',__FILE__,__LINE__,__FUNCTION__);
        return $array_of_parm2_array;
    }

    public function generic_method_add_link_field_names($parm2_array,$view_variables_array,$table,$no_of_fields) {
        var_dump($active_tables);
        for ($i = 1; $i < $no_of_fields; $i++) {
            $parm2_array[$I][]= $view_variables_array[$table]['field'][$i];
         }
         return $parm2_array;
    }

    public function generic_method_build_view_variables_array($all_tables,$active_tables,$what_are_we_doing,$no_of_fields) {
           // ***************************
        //var_dump($active_tables);
        //var_dump($all_tables); var_dump($what_are_we_doing);

         //$this->debugx(' 1110',__FILE__,__LINE__,__FUNCTION__);
        // this builds the row that will be displayed
       $view_variables_array = array();
       foreach($all_tables as $table){
            switch ($what_are_we_doing) {
                case "reports_with_broken_links":
                   
                    if (in_array($table,$active_tables)){
                        //* only an active table can have broken links
                        $view_variables_array[$table]['what_are_we_doing']  = $what_are_we_doing;
                        
                        $view_variables_array[$table]['field'][] = $table;
                        $view_variables_array[$table]['field'][] = 'cclist_broken_links';
                        $view_variables_array[$table]['field'][] = 'ccremove_broken_links';
                        for ($i = 0; $i < $no_of_fields; $i++) {
                            $view_variables_array[$table]['class'][]       = "text_align_left";
                        }
                    }



                   break;
               case "configure_an_unconfigured_table":
                   
                     if (!in_array($table,$active_tables)){
                        $view_variables_array[$table]['what_are_we_doing']  = $what_are_we_doing;
                        $view_variables_array[$table]['field'][0]       = $table;
                        $view_variables_array[$table]['class'][0]       = "text_align_left";
                        $view_variables_array[$table]['field'][1]       = 'configure';
                        $view_variables_array[$table]['class'][1]       = "text_align_left";
                    }
                    break;
                case "activate_deactivate_table_reporting":
                   
                    $view_variables_array[$table]['what_are_we_doing']  = $what_are_we_doing;
                    if (!in_array($table,$active_tables)){
                        $view_variables_array[$table]['field'][0]       = $table;
                        $view_variables_array[$table]['class'][0]       = "text_align_left mycart-btn"; // dark blue            
                        $view_variables_array[$table]['field'][1]       = 'activate';
                        $view_variables_array[$table]['class'][1]       = "text_align_left";
                   }
                    else {
                        $view_variables_array[$table]['field'][0]       = $table;
                        $view_variables_array[$table]['class'][0]       = "text_align_left"; 
                       $view_variables_array[$table]['field'][1]        = 'de_activate';
                        $view_variables_array[$table]['class'][1]       = "text_align_left mycart-btn"; // dark blue            
                        }
                    $view_variables_array[$table]['field'][2]           = 'validate';
                    $view_variables_array[$table]['class'][2]           = $view_variables_array[$table]['class'][1];
                    break;
             } // end switch
            

         } // for each table
        //var_dump($view_variables_array);$this->debugx('0111',__FILE__,__LINE__,__FUNCTION__);
        return $view_variables_array;
    }




    public function generic_method_get_all_tables($parm1) {
        // ********
        // ********
        $what_are_we_doing = $parm1;
        switch ($parm1) {
            case "configure_an_unconfigured_table":
                 $all_tables = DB::connection()->getDoctrineSchemaManager()->listTableNames();
               
                break;
            case "activate_deactivate_table_reporting":
                 $all_tables = DB::connection()->getDoctrineSchemaManager()->listTableNames();
                
                break;
            case "reports_with_broken_links":
                $all_tables = DB::connection()->getDoctrineSchemaManager()->listTableNames();
                break;
            }
        //var_dump($parm1);$this->debugx('0110',__FILE__,__LINE__,__FUNCTION__);
        return $all_tables;
    }

    public function generic_method_get_active_tables() {
        // ********
        // ********
       $active_controllers = MiscThing
           ::where('record_type','=','table_controller')
           ->where('table_reporting_active','=',1)
           ->orderBy('node_name')
           ->get();   
        $active_tables = array();
        foreach ($active_controllers as $active_controller) {
            $active_tables[] = $active_controller->node_name;
        } 
        //var_dump($active_tables);$this->debugx('1110',__FILE__,__LINE__,__FUNCTION__);
        return $active_tables;
    }


    public function generic_method_request_2parms(REQUEST $request,$parm1,$parm2) {
        // ********
        //var_dump($request);//var_dump($parm1);//var_dump($parm2_array);
        //$this->debugx('1101',__FILE__,__LINE__,__FUNCTION__);
        // *******
        $parm2_array = json_decode($parm2);

        //var_dump($parm2_array);$this->debugx('1111',__FILE__,__LINE__,__FUNCTION__);
        $what_are_we_doing = $parm1;
        if (!in_array('we_have_done_first_read',$this->parm2_array))//||(in_array('coming_from_programmer_utilities',$parm2_array)))
        {

            $parm2_array[] = 'we_have_done_first_read';
            $this->all_tables = $this->generic_method_get_all_tables($parm1);
            $this->active_controllers = $this->generic_method_get_active_tables();
            $this->no_of_fields = 3;


           //$this->view_variables_array = $this->generic_method_build_view_variables_array($this->all_tables,$this->active_controllers,$parm1,$this->no_of_fields);
            }
        else { 
            //var_dump($parm2_array);$this->debugx('1111',__FILE__,__LINE__,__FUNCTION__);
            }
        switch ($parm1) {
            case "configure_an_unconfigured_table":
                break;
            case "activate_deactivate_table_reporting":
                break;
            case "reports_with_broken_links":
                $this->no_of_fields = 3;
                $this->view_variables_array = $this->generic_method_build_view_variables_array($this->all_tables,$this->active_controllers,$parm1,$this->no_of_fields);
 
               if (in_array('cclist_broken_links',$parm2_array)){
                    $this->no_of_fields = 1;

                    $flip = array_flip($parm2_array);
                    $i = $flip['node_name_follows']+1;
                    $table_name = $parm2_array[$i];
                    $node_name = $parm2_array[$i];
                    $update_option = "list_broken_links";
                    
                    //$broken_link_files = $this->
                    $this->view_variables_array = $this->clean_orphan_files($table_name,$node_name,$node_name,$update_option);  //2parms
                }
                if (in_array('ccremove_broken_links',$parm2_array)){
                    //$this->debugx('1101',__FILE__,__LINE__,__FUNCTION__);
                   $flip = array_flip($parm2_array);
                    $i = $flip['node_name_follows']+1;
                    $table_name = $parm2_array[$i];
                    $node_name = $parm2_array[$i];
                    $update_option = "remove_broken_links";
                    $broken_link_files = $this->clean_orphan_files($table_name,$node_name,$node_name,$update_option);  //2parms
                }

                //* everybody else
               $this->array_of_parm2_array = $this->generic_method_build_array_of_parm2_array($parm1,$parm2_array,$this->all_tables,$this->active_controllers,$this->view_variables_array,$this->no_of_fields);

                break;
            }



        //var_dump($what_are_we_doing);$this->debugx('1111',__FILE__,__LINE__,__FUNCTION__);


        $required_variables_array = array(

            //'parm2'             => json_encode($decoded_variables_array),
            'node_name'         => $this->node_name,     
            'myStrings'         => $this->myStrings
            );


        //var_dump($this->view_variables_array);
        //var_dump($this->array_of_parm2_array);
        //var_dump($this->parm2_array);
        //$this->debugx('0111',__FILE__,__LINE__,__FUNCTION__);
        //*
        //* loop thru the view_variables_array
        return view($this->node_name.'.dynamicMenu0')
            // VARIABLES WE'RE PASSING TO A VIEW
            ->with('no_of_fields'           ,$this->no_of_fields)
            ->with('array_of_parm2_array'    ,$this->array_of_parm2_array)
            ->with('report_definition_key'    ,$this->report_definition_id)
            ->with('parm1'                    ,$parm1)
            ->with('what_we_are_doing'          ,$parm1)
            ->with('view_variables_array'     , $this->view_variables_array)
            ->with('parm2_array'                ,json_encode($this->parm2_array))
            ->with('required_variables'         ,$required_variables_array);
    }
 
    public function activate_entity($entity) {
        //$this->debug0(__FILE__,__LINE__,__FUNCTION__);echo(" ".$entity);
        $project_path     = substr(app_path(),0,strlen(app_path())-4);
        $crlf = "\r\n";
        $crlftab = "\r\n\t";
        $quote = "'";

        $search_str_array = array(
            'controller_name'   => "@@controller_name@@",
            'model_table'       => "@@model_table@@",
            'model'             => "@@model@@",
            'node_name'         => "@@node_name@@",
            'field_name_string' => "@@field_name_string@@"
            );
        $values_array = array(
            'controller_name'   => $this->link_parms_array['controller_name'],
            'model_table'       => $this->link_parms_array['model_table'],
            'model'             => $this->link_parms_array['model'],
            'node_name'         => $this->link_parms_array['node_name'],
            'field_name_string' => ""
            );
       
 
        switch ($entity) {
            case "table_controller":

                $controller_file = app_path()."/Http/Controllers/".  $this->link_parms_array['controller_name'].".php";
                if (is_file($controller_file)){
                   $this->debug3(__FILE__,__LINE__,__FUNCTION__);echo (' a_table_controller for '.$this->link_parms_array['node_name'].' already_exists');

                }
                else{
                    $controller_model_file = app_path()."/Http/Controllers/". "ModelForGeneratedControllers.php";
                    $file_as_string = file_get_contents($controller_model_file);
                    $file_as_string = $this->scan_replace_str_value_arrays($file_as_string,$search_str_array,$values_array,'y');
                    File::put($controller_file, $file_as_string);
                }

                //* ********************************
                if ($miscThing = MiscThing    
                ::where('record_type',  '=', "table_controller")
                ->where('node_name',  '=', $this->link_parms_array['node_name'])
                ->get()){
                   $this->debug3(__FILE__,__LINE__,__FUNCTION__);
                    if ($miscThing->count('items') == 0){
                        $this->debug0(__FILE__,__LINE__,__FUNCTION__);echo (' a_table_controller for '.$this->link_parms_array['node_name'].' is being created');
                        $insert_array = array(
                        'table_reporting_active'    =>1,
                        'record_type'               =>"table_controller",
                        'controller_name'           =>$this->link_parms_array['controller_name'],        
                        'model'                     =>$this->link_parms_array['model'],        
                        'model_table'               =>$this->link_parms_array['model_table'],        
                        'node_name'                 =>$this->link_parms_array['node_name'],
                        );        
                        $insert = MiscThing
                        ::insert(array($insert_array));
                    }
                    //var_dump($miscThing->count('items'));

                    $updatex = MiscThing::where('record_type',  '=', "table_controller")
                    ->where('node_name',  '=', $this->link_parms_array['node_name'])
                    ->update(array('table_reporting_active'=>1));                 
                     //$this->debug1(__FILE__,__LINE__,__FUNCTION__);

                }
                else{
                    $this->debug1(__FILE__,__LINE__,__FUNCTION__);echo (' a_table_controller for '.$this->link_parms_array['node_name'].' neesds_to_be_created');
                }


                break;
            case "model":
               $models_directory = app_path()."/Models/";
               $model_file_name = $models_directory. "generatedModelsModel.php";
               
               if (is_file($model_file_name)){
                    $file_as_string = file_get_contents($model_file_name);
                    //echo ("<br><br><br>file_as_string ");
                    //var_dump($file_as_string);$this->debug1(__FILE__,__LINE__,__FUNCTION__);
                }
                if (is_file($models_directory.$this->link_parms_array['model'].".php")){
                    //echo "<br>".$entity." ".$this->link_parms_array['model']." exists";$this->debug1(__FILE__,__LINE__,__FUNCTION__);
                }
                else{
                    //echo "<br>file does not exitst";$this->debug1(__FILE__,__LINE__,__FUNCTION__);
                    $columns = Schema::getColumnListing($this->link_parms_array['node_name']);
                    array_shift($columns); // always assume 1st element is key and drop it
                    $crlf = "\r\n";
                    $crlftab = "\r\n\t";
                    $quote = "'";
                    $field_name_str = $crlftab;
                    foreach ($columns as $index=>$field_name) {
                        $field_name_str .= $quote.$field_name.$quote.",".$crlftab  ;
                    } 
                    //$values_array = array();
                    //$values_array['controller_name']         = $this->link_parms_array['controller_name'];
                    //$values_array['model_table']         = $this->link_parms_array['model_table'];
                    $values_array['field_name_string']   = $field_name_str;
                    //echo ("<br><br><br>file_as_string ".$file_as_string);
                    //echo ("<br><br><br>values_array");var_dump($search_str_array);$values_array
                    $file_as_string = $this->scan_replace_str_value_arrays($file_as_string,$search_str_array,$values_array,'y');
                    File::put($models_directory.$this->link_parms_array['model'].".php", $file_as_string);                
                 }
                 break;
            case "routes":
                //* ****************************
                //* first, we need to create the routes (file) for the node
                //* ****************************
                //$this->debug3(__FILE__,__LINE__,__FUNCTION__);echo (" : ".$entity);exit();
                $routes_path = $project_path."/routes/";
                $routes_model_file = $routes_path. "GeneratedRoutesModel.php";
                 if (!is_file($routes_model_file)){
                     $this->debug0(__FILE__,__LINE__,__FUNCTION__);echo " required file MISSING ";echo ($routes_model_file.'<br>');exit();
                }
                $generated_file_name = $routes_path. "generated/".$this->link_parms_array['node_name'].".php";
                if (is_file($generated_file_name)){
                    //echo "rotute file exists ";echo ($routes_model_file.'<br>');
                    $this->debug0(__FILE__,__LINE__,__FUNCTION__);echo($generated_file_name." already exists");
                    // dont create it twice
                }
                else{
                    //$this->debug0(__FILE__,__LINE__,__FUNCTION__);echo " creating ";echo ($generated_file_name.'<br>');exit();
                    $file_as_string = file_get_contents($routes_model_file);
                    $this->debug0(__FILE__,__LINE__,__FUNCTION__);echo (" creating routes file for ".$this->link_parms_array['node_name']);//exit();
                    $file_as_string = $this->scan_replace_str_value_arrays($file_as_string,$search_str_array,$values_array,'n');
                    File::put($generated_file_name, $file_as_string);
                }
                //* ****************************
                //* first, we need to create the routes (file)
                //File::put($generated_file_name, $file_as_string);
                //* ****************************
                //* ****************************
                //* NOW, WEB.PHP HAS TO INCLUDE THAT FILE
                $routes_web_file    = $project_path."/routes/web.php";
                $file_as_string     = file_get_contents($routes_web_file);
                
                $search_str_array   = array(
                    'start_of_generated_includes' => "//generated_inserts_begin_here" 
                 );
                $values_array = 
                array(
                    'start_of_generated_includes' => 
                    "//generated_inserts_begin_here".$crlftab."@include('".$generated_file_name.
                    "');"
                    );
                // make sure it hasnt already been included
                $i1 = stripos("*".$file_as_string,"@include('".$generated_file_name);
                if ($i1 > 0){
                    $this->debug3(__FILE__,__LINE__,__FUNCTION__);
                    echo ("the include in web.php for ".$this->link_parms_array['node_name'].
                        " already exists ");
                     // ok but don't add twice
                }
                else{
                    $file_as_string  = 
                    $this->scan_replace_str_value_arrays($file_as_string,$search_str_array,$values_array,'y');
                     $this->debug0(__FILE__,__LINE__,__FUNCTION__);echo (' integrating '.$this->link_parms_array['node_name'].' into web.php');
                    File::put($routes_web_file, $file_as_string);
                }
                
                //$this->debug0(__FILE__,__LINE__,__FUNCTION__);echo (' exit for testing ');exit();

                break;
            case "views":
                $dir_name = $project_path."/resources/views/". $this->link_parms_array['node_name'];
                if (is_dir($dir_name)){
                    $this->debug3(__FILE__,__LINE__,__FUNCTION__);echo (' the_directory_for '.$this->link_parms_array['node_name'].' already_exists');
                }
                else{
                    mkdir($dir_name);
                    $infile = $project_path."/resources/views"."/generated_views_directory_model";
                    File::copyDirectory($infile,$dir_name);
                }
                //* ***********************
                //* ***********************
                $dir_name = $dir_name."/generated_files";
                if (is_dir($dir_name)){
                }
                else{
                    if (mkdir($dir_name)){
                        //$this->debug1(__FILE__,__LINE__,__FUNCTION__);
                        if ($miscThing = MiscThing    
                        ::where('record_type',  '=', "report_definition")
                        ->where('node_name',  '=', $this->link_parms_array['node_name'])
                        ->delete()){
                            $this->clone_ids_to_node_name($this->link_parms_array['node_name']);
                        }
                    }
                    else{
                      echo (' create failed for directory '.$dir_name);
                        $this->debug1(__FILE__,__LINE__,__FUNCTION__);
                    }
                   
                }
                $this->clone_ids_to_node_name($this->link_parms_array['node_name']);
                break;
            } // end of entities switch  
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

    public function validate_entity($entity,$name,$msg_array) {
        //$this->debug0(__FILE__,__LINE__,__FUNCTION__);echo(" ".$entity);
        $project_path     = substr(app_path(),0,strlen(app_path())-4);
        $crlf = "\r\n";
        $crlftab = "\r\n\t";
       
        $quote = "'";

        $search_str_array = array(
            'controller_name'   => "@@controller_name@@",
            'model_table'       => "@@model_table@@",
            'model'             => "@@model@@",
            'node_name'         => "@@node_name@@",
            'field_name_string' => "@@field_name_string@@"
            );
        $values_array = array(
            'controller_name'   => $this->link_parms_array['controller_name'],
            'model_table'       => $this->link_parms_array['model_table'],
            'model'             => $this->link_parms_array['model'],
            'node_name'         => $this->link_parms_array['node_name'],
            'field_name_string' => ""
            );
       
        //$search_str_array and $this->link_parms_array MUST match indexes one for one  
            $controller_file = app_path()."/Http/Controllers/".  $this->link_parms_array['controller_name'].".php";
        $i0 = count($msg_array);
        $msg_array[$i0]['line']     = "";
        $msg_array[$i0]['entity']   = "";
        $msg_array[$i0]['str1']     = "";
        $msg_array[$i0]['fileName'] = "";
        $msg_array[$i0]['str2']     = "";
        $msg_array[$i0]['fileName2']= "";

         switch ($entity) { 
            case "table_controller":
                $controller_file = app_path()."/Http/Controllers/".  $this->link_parms_array['controller_name'].".php";
                if (is_file($controller_file)){
                    //$this->debug3(__FILE__,__LINE__,__FUNCTION__); //just line-no
                    //echo ($entity . " is present ....".$controller_file);
                    $msg_array[$i0]['line']     = __LINE__; 
                    $msg_array[$i0]['entity']   = $entity;
                    $msg_array[$i0]['fileName'] = $this->link_parms_array['controller_name'];
                    $msg_array[$i0]['str1']     = " is present ";
               }
                else{
                    $this->debug3(__FILE__,__LINE__,__FUNCTION__); //just line-no
                    echo ($entity . " is MISSING ....".$controller_file);
                    $msg_array[$i0]['line']     = __LINE__; 
                    $msg_array[$i0]['entity']   = $entity;
                    $msg_array[$i0]['str1']     = "is MISSING ";
                    $msg_array[$i0]['fileName'] = $controller_file;
                 }
                $i0++;
                $msg_array[$i0]['line']     = "";
                $msg_array[$i0]['entity']   = "";
                $msg_array[$i0]['str1']     = "";
                $msg_array[$i0]['fileName'] = "";
                $msg_array[$i0]['str2']     = "";
                $msg_array[$i0]['fileName2']= "";

                if ($miscThing = MiscThing    
                    ::where('record_type',  '=', "table_controller")
                    ->where('node_name',  '=', $this->link_parms_array['node_name'])
                    ->get()){
                        if ($miscThing->count('items') == 0){
                            $this->debug3(__FILE__,__LINE__,__FUNCTION__);
                            echo ('table_controller record MISSING .... '.$this->link_parms_array['node_name']);
                            $msg_array[$i0]['str2'] = 'table_controller record MISSING  '.$this->link_parms_array['node_name'];
                            $msg_array[$i0]['line'] = __LINE__; 
                            $msg_array[$i0]['entity'] = $entity;
                            $msg_array[$i0]['str1'] = "is MISSING from the database";
                            $msg_array[$i0]['fileName'] = $controller_file;
                            }
                       else{
                            $this->debug3(__FILE__,__LINE__,__FUNCTION__);
                            echo ('table_controller record is present .... '.$this->link_parms_array['node_name']);
                            //$msg_array[$i0]['str2'] = 'table_controller record MISSING '.$this->link_parms_array['node_name'];
                            $msg_array[$i0]['line'] = __LINE__; 
                            $msg_array[$i0]['entity'] = $entity;
                            $msg_array[$i0]['str1'] = "database record is present";
                            $msg_array[$i0]['fileName'] = $this->link_parms_array['node_name'];
                            //$msg_array[$i0]['str2'] = $this->link_parms_array['node_name'];
                            //$msg_array[$i0]['fileName2'] = "";
                        }
                    }               
                 break;
            case "model":
                $models_directory = app_path()."/Models/";
                $model_file_name = $models_directory. "generatedModelsModel.php";    
                if (is_file($models_directory.$this->link_parms_array['model'].".php")){
                    $this->debug3(__FILE__,__LINE__,__FUNCTION__); //just line-no
                    echo ($entity . " is present ....". $models_directory.$this->link_parms_array['model'].".php");
                    $msg_array[$i0]['line'] = __LINE__; 
                    $msg_array[$i0]['entity'] = $entity;
                    $msg_array[$i0]['str1'] = " is present";
                    $msg_array[$i0]['fileName'] = $controller_file;
                    
                    $msg_array[$i0]['str2'] = "";
                    $msg_array[$i0]['fileName2'] = "";
                }
                else{
                    $this->debug3(__FILE__,__LINE__,__FUNCTION__); //just line-no
                    echo($entity . " is MISSING ....". $models_directory.$this->link_parms_array['model'].".php");
                    $msg_array[$i0]['line'] = __LINE__; 
                    $msg_array[$i0]['entity'] = $entity;
                    $msg_array[$i0]['str1'] = " is present";
                    $msg_array[$i0]['fileName'] = $controller_file;
                    $msg_array[$i0]['str2'] = "";
                    
                    $msg_array[$i0]['fileName2'] = "";
                }
                break;
            case "routes":
                $routes_path = $project_path."/routes/";
                $routes_model_file = $routes_path. "GeneratedRoutesModel.php";
                $generated_file_name = $routes_path."generated/". $this->link_parms_array['node_name'].".php";
                if (!is_file($routes_model_file)){
                    $this->debug3(__FILE__,__LINE__,__FUNCTION__); //just line-no
                    echo "<br>"." required file MISSING ....";echo ($routes_model_file.'<br>');
                }
                if (is_file($generated_file_name)){
                    $this->debug3(__FILE__,__LINE__,__FUNCTION__); //just line-no
                    echo ($entity . " is present".$generated_file_name);                
                    $msg_array[$i0]['line'] = __LINE__; 
                    $msg_array[$i0]['entity'] = $entity;
                    $msg_array[$i0]['str1'] = " is present";
                    $msg_array[$i0]['fileName'] = $controller_file;
                    
                    $msg_array[$i0]['str2'] = "";
                    $msg_array[$i0]['fileName2'] = "";
                }
                else{
                    $this->debug3(__FILE__,__LINE__,__FUNCTION__); //just line-no
                    echo (" ". $entity . " is MISSING ".".....".$generated_file_name);     
                    $msg_array[$i0]['line'] =  __LINE__; 
                    $msg_array[$i0]['entity'] = $entity;
                    $msg_array[$i0]['str1'] = " is present";
                    $msg_array[$i0]['fileName'] = $controller_file;
                    
                    $msg_array[$i0]['str2'] = "";
                    $msg_array[$i0]['fileName2'] = "";
                }
                //* ****************************
                //* first, we need to create the routes (file)
                //File::put($generated_file_name, $file_as_string);
                //* ****************************
                //* ****************************
                //* NOW, WEB.PHP HAS TO INCLUDE THAT FILE
                $i0++;
                $msg_array[$i0]['line']     = "";
                $msg_array[$i0]['entity']   = "";
                $msg_array[$i0]['str1']     = "";
                $msg_array[$i0]['fileName'] = "";
                $msg_array[$i0]['str2']     = "";
                $msg_array[$i0]['fileName2']= "";

                $routes_web_file    = $project_path."/routes/web.php";
                $file_as_string     = file_get_contents($routes_web_file);
                
                $search_str_array   = array(
                    'start_of_generated_includes' => "//generated_inserts_begin_here" 
                 );
                $values_array = 
                array(
                    'start_of_generated_includes' => 
                    "//generated_inserts_begin_here".$crlftab."@include('".$generated_file_name.
                    "');"
                    );
                // make sure it hasnt already been included
                $i1 = stripos("*".$file_as_string,"@include('".$generated_file_name);
                if ($i1 > 0){
                    $this->debug3(__FILE__,__LINE__,__FUNCTION__);
                    echo ("include is present .... in web.php for ".$this->link_parms_array['node_name']);
                    echo (" ...."."@include('".$generated_file_name);
                    $msg_array[$i0]['line'] = __LINE__; 
                    $msg_array[$i0]['entity'] = $entity;
                    $msg_array[$i0]['str1'] = "include is present in web.php for";
                    $msg_array[$i0]['fileName'] = $routes_path."generated/";
                    $msg_array[$i0]['str2'] = $this->link_parms_array['node_name'].".php";
                    //$msg_array[$i0]['fileName2'] = $this->link_parms_array['node_name'].".php";
                }
                else{
                    $this->debug3(__FILE__,__LINE__,__FUNCTION__);
                    echo ("include is MISSING .... in web.php for ".$this->link_parms_array['node_name'].
                    " @include('".$generated_file_name); 
                    $msg_array[$i0]['line'] = __LINE__; 
                    $msg_array[$i0]['entity'] = $entity;
                    $msg_array[$i0]['str1'] = "include is MISSING in web.php";
                    $msg_array[$i0]['fileName'] = $routes_path."generated/";
                    $msg_array[$i0]['str2'] = $this->link_parms_array['node_name'].".php";
                   //$this->debug1(__FILE__,__LINE__,__FUNCTION__);echo (' integrating '.$this->link_parms_array['node_name'].' into web.php');
                    //File::put($routes_web_file, $file_as_string);
                }  
                break;
            case "views":
                $dir_name = $project_path."/resources/views/". $this->link_parms_array['node_name'];
                //echo("<br> * dir_name: ".$dir_name);
                if (is_dir($dir_name)){
                    $this->debug3(__FILE__,__LINE__,__FUNCTION__);
                    echo ('the views directory is present ....'.$dir_name);
                     $msg_array[$i0]['line'] = __LINE__; 
                    $msg_array[$i0]['entity'] = $entity;
                    $msg_array[$i0]['str1'] = "the views directory is present";
                    $msg_array[$i0]['fileName'] = $project_path."/resources/views/";                   
                    $msg_array[$i0]['str2'] = $this->link_parms_array['node_name'];
     
               }
                else{
                    $this->debug3(__FILE__,__LINE__,__FUNCTION__); //just line-no
                    echo ('the views directory '.'is MISSING ....'.$dir_name);
                    $msg_array[$i0]['line'] = __LINE__; 
                    $msg_array[$i0]['entity'] = $entity;
                    $msg_array[$i0]['str1'] = "the views directory '.'is MISSING";
                    $msg_array[$i0]['fileName'] = $project_path."/resources/views/";           
                    $msg_array[$i0]['str2'] = $this->link_parms_array['node_name'];
    
                }  
                $i0++;  
                $dir_name = $project_path."/resources/views/". $this->link_parms_array['node_name'].'/generated_files'; 
                if (is_dir($dir_name)){
                    $this->debug3(__FILE__,__LINE__,__FUNCTION__);
                    echo (' the generated_files directory is present .... '.$dir_name);
                    $msg_array[$i0]['line'] = __LINE__; 
                    $msg_array[$i0]['entity'] = $entity;
                    $msg_array[$i0]['str1'] = "the generated_files directory is present";
                    $msg_array[$i0]['fileName'] = $project_path."/resources/views/";
                    
                    $msg_array[$i0]['str2'] = $this->link_parms_array['node_name'].'/generated_files'; 
                    $msg_array[$i0]['fileName2'] = "";
     
                }
                else{
                    $this->debug3(__FILE__,__LINE__,__FUNCTION__);
                    echo (' the generated_files directory is MISSING ....'.$dir_name);
                    $msg_array[$i0]['line'] = __LINE__; 
                    $msg_array[$i0]['entity'] = $entity;
                    $msg_array[$i0]['str1'] = "the generated_files directory is MISSING";
                    $msg_array[$i0]['fileName'] = $dir_name;
                    
                    $msg_array[$i0]['str2'] = "";
                    $msg_array[$i0]['fileName2'] = "";
                }                 
                break;
            }   

      
            return $msg_array;
       
        $this->debug1(__FILE__,__LINE__,__FUNCTION__);
    }





 

    public function deactivate_entity($entity,$name) {
         $this->debug0(__FILE__,__LINE__,__FUNCTION__);
         switch ($entity) { 
            case "table_controller":
                $file_extension = "/Http/Controllers/". $name.".php";
                $file_name = app_path().$file_extension;
                 if (is_file(app_path().$file_extension)){
                    echo "there";
                    $this->debug1(__FILE__,__LINE__,__FUNCTION__);
                }
                echo ("<br><br>file_name: ".$file_name);
                break;
            case "model":
                 break;
            case "routes":
                break;
            case "views":
                break;
        }   

    }        


   public function derive_entity_names_from_table($table) {       
        //$this->debug0(__FILE__,__LINE__,__FUNCTION__);
        $link_parms_array = array(
            'controller_name'   => ucfirst($table).'Controller',
            'model_table'       => $table,
            'model'             => ucfirst($table),
            'node_name'         => lcfirst($table)
            );
        //echo '**'.substr($link_parms_array['model'],0,strlen($table)).'**';
        
        //echo '<br>'.'**'.substr($link_parms_array['model'],strlen($table)-1,1).'**';this->debug0(__FILE__,__LINE__,__FUNCTION__);
        if (substr($link_parms_array['model'],strlen($table)-1,1) == 's') {
            $link_parms_array['model'] = substr($link_parms_array['model'],0,strlen($table)-1);
        }

        return $link_parms_array;
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
                
            }
        } // end of if report_definition


    }





     /**
     * Execute the query and show the report you just requested
     *
     * @return \Illuminate\Http\Response
     */

    public function browseEdit(Request $request, $id, $what_we_are_doing, $coming_from){
        //$this->debug2(__FILE__,__LINE__,__FUNCTION__);echo(" ".$what_we_are_doing.$id.$coming_from);
    
        $report_definition          = $this->execute_query_by_report_no($id) ;
        $encoded_business_rules     = $report_definition[0]->business_rules;

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

    public function initialize_query($distinct_regular,$field_name,$r_o,$v) {
    // *****************
    // this initializes the query pointing to the correct model
    // ****************
        $this->debug1(__FILE__,__LINE__,__FUNCTION__);
        switch ($distinct_regular) { 
            case "distinct":
                $query = MiscThing::distinct()->select($field_name);
                echo("MiscThing::distinct()->select(".$field_name.")");
                break;
            case "regular":
                $query = MiscThing::where($field_name,$r_o,$v);
                echo("MiscThing::where(".$field_name.",". $r_o. ",".$v.")");
                //$this->debug0(__FILE__,__LINE__,__FUNCTION__);

                 break;
       }   
       return $query;

    } 


    public function build_and_execute_query(
        $working_arrays,
        $bypassed_field,
        $query_relational_operators_array) {
        //echo("<br>build_and_execute_query");
        $this->debug4(__FILE__,__LINE__,__FUNCTION__);
        //var_dump($working_arrays['ppv_define_query']);
        //$this->debug_exit(__FILE__,__LINE__,10);
        //
        // *******
        // this guy does a lot
        // *****
        //$fieldName_r_o_value_array);

        $field_name_array_name = $working_arrays['ppv_define_query']['field_name_array']['field_name'];
        $field_name_array      = $working_arrays['ppv_define_query'][$field_name_array_name];
        $r_o_array_name        = $working_arrays['ppv_define_query']['field_name_array']['r_o'];
        $r_o_array             = $working_arrays['ppv_define_query'][$r_o_array_name];
  
        $value_array_name      = $working_arrays['ppv_define_query']['field_name_array']['value'];
        $value_array           = $working_arrays['ppv_define_query'][$value_array_name];

        //* ********************
        $dash_gt = " ->";
        $first_time = 1;
        //echo $this->model;$this->debug1(__FILE__,__LINE__,__FUNCTION__);
        $executing_distinct = 0;
        $model = $this->node_name;

        foreach ($field_name_array as $index=>$field_name) {
            $value = $field_name;
           if ($field_name <> $bypassed_field){
                $r_o = $r_o_array [$index];
                $v = $value_array[$index];
                $v = $this->convert_string_variables_to_variables($v);
                //$this->debug1(__FILE__,__LINE__,__FUNCTION__);
                switch ($r_o) {
                    case "distinct":
                        if ($first_time){
                            $first_time = 0;
                            $model = $this->model_name;
                            $query = $this->initialize_query('distinct',$field_name,$r_o,$v);
                        }
                        else {
                            $query->where($field_name,$r_o,$v);
                             echo("->where(".$field_name." $r_o ".$v.")");
                        }
                        break;
                    case "=":
                    case "<>":
                    case ">":
                    case "<":
                    case "<=":
                    case ">=":
                        if ($first_time){
                            $first_time = 0;
                            
                            $query = $this->initialize_query('regular',$field_name,$r_o,$v);
                        }
                        else {
                            $query->where($field_name,$r_o,$v);
                            echo("->where(".$field_name." $r_o ".$v.")");
                            //$this->debug1(__FILE__,__LINE__,__FUNCTION__);

                        }
                        break;
                    }
  //echo $this->model;$this->debug0(__FILE__,__LINE__,__FUNCTION__);    
                switch ($r_o) {
                    //case  "join":
                    case "join":
                        //DB::table('name')->join('table', 'name.id', '=', 'table.id')
                        //->select('name.id', 'table.email');       
                        //case  "where":
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
                        //$distinct_value = $value;
                        //$query->distinct();
                        //echo(" ->distinct()");
                       
                        break;
                    case "xgetArray":
                        //$query->get();
                        break;
                } // end switch      

 
            } // end of not bypassed

            
        }  // end foreach
        //$this->debug1(__FILE__,__LINE__,__FUNCTION__);
        echo(' ->get()');
        return $query->get();
    }   // end of b uild_and_execute_query        
    public function build_and_execute_queryOLD(
        $working_arrays,
        $bypassed_field,
        $query_relational_operators_array) {
        //echo("<br>build_and_execute_query");
        $this->debug4(__FILE__,__LINE__,__FUNCTION__);
        //var_dump($working_arrays['ppv_define_query']);
        //$this->debug_exit(__FILE__,__LINE__,10);
        //
        // *******
        // this guy does a lot
        // *****
        //$fieldName_r_o_value_array);

        $field_name_array_name = $working_arrays['ppv_define_query']['field_name_array']['field_name'];
        $field_name_array      = $working_arrays['ppv_define_query'][$field_name_array_name];
        $r_o_array_name        = $working_arrays['ppv_define_query']['field_name_array']['r_o'];
        $r_o_array             = $working_arrays['ppv_define_query'][$r_o_array_name];
  
       $value_array_name      = $working_arrays['ppv_define_query']['field_name_array']['value'];
       $value_array           = $working_arrays['ppv_define_query'][$value_array_name];

        $dash_gt = " ->";
        //$dash_gt = " query->where";
        //$query = MiscThing::
        // *************
        $first_time = 1;
        //echo $this->model;$this->debug1(__FILE__,__LINE__,__FUNCTION__);
        $executing_distinct = 0;
        $model = $this->node_name;
        foreach ($field_name_array as $index=>$field_name) {
            $value = $field_name;
           if ($field_name <> $bypassed_field){
                $r_o = $r_o_array [$index];
                $v = $value_array[$index];
                $v = $this->convert_string_variables_to_variables($v);
                //$this->debug1(__FILE__,__LINE__,__FUNCTION__);
                switch ($r_o) {
                    case "distinct":
                        if ($first_time){
                            $first_time = 0;
                            //$query = MiscThing::where($field_name,$r_o,$v);
                            //$query = MiscThing::distinct()->select($field_name)->groupBy('user_id')->get();
                            $model = $this->model_name;
                            $query = $model::distinct()->select($field_name);

                             echo("MiscThing::distinct()->select(".$field_name.")");
                        }
                        else {
                            $query->where($field_name,$r_o,$v);
                             echo("->where(".$field_name." $r_o ".$v.")");
                        }
                        break;
                    case "=":
                    case "<>":
                    case ">":
                    case "<":
                    case "<=":
                    case ">=":
                        if ($first_time){
                            $first_time = 0;
                            $query = MiscThing::where($field_name,$r_o,$v);
                            echo($model ."::where(".$field_name.",". $r_o. ",".$v.")");
                            //$this->debug0(__FILE__,__LINE__,__FUNCTION__);
                        }
                        else {
                            $query->where($field_name,$r_o,$v);
                            echo("->where(".$field_name." $r_o ".$v.")");
                            //$this->debug1(__FILE__,__LINE__,__FUNCTION__);

                        }
                        break;
                    }
  //echo $this->model;$this->debug0(__FILE__,__LINE__,__FUNCTION__);    
                switch ($r_o) {
                    //case  "join":
                    case "join":
                        //DB::table('name')->join('table', 'name.id', '=', 'table.id')
                        //->select('name.id', 'table.email');       
                        //case  "where":
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
                        //$distinct_value = $value;
                        //$query->distinct();
                        //echo(" ->distinct()");
                       
                        break;
                    case "xgetArray":
                        //$query->get();
                        break;
                } // end switch      

 
        } // end of not bypassed

        
    }  // end foreach
                //$this->debug1(__FILE__,__LINE__,__FUNCTION__);
            echo(' ->get()');
            return $query->get();

    //$this->debug1(__FILE__,__LINE__,__FUNCTION__);
 

    //return  (array) $query;
    }   // end of b uild_and_execute_query

    public function clean_orphan_files($table_name,$node_name,$view_files_prefix,$update_option) {
        //$field_name_array = (array) json_decode(Input::get('encoded_field_name_array'));
        //echo "xxxx".$view_files_prefix."xxxx".$node_name;exit('xit2001');
        $active_report_ids = $this->get_active_reports_for_table($node_name); 
        $path_to_files = $this->views_files_path .'/'.$view_files_prefix."/".$this->generated_files_folder;

          //$this->debugx('1110',__FILE__,__LINE__,__FUNCTION__);

        if ($handle = opendir($path_to_files)) {
            //echo "Directory handle: $handle\n";
            //echo "Entries:\n";
            $stra = "xxx";
            $broken_link_files = array();
            //var_dump($active_report_ids);$this->debugx('1110',__FILE__,__LINE__,__FUNCTION__);
            /* This is the correct way to loop over the directory. */
            while (false !== ($entry = readdir($handle))) {
                $i = strpos($entry,'_');
                if ($i >0) {
                    $stra = substr($entry,0,$i);
                    if (is_numeric($stra)){
                        if (in_array($stra,$active_report_ids)){
                            //echo ('<br/>'. 'good '.$entry ." will not be deleted"."<br>");
                        }
                        else {
                            //echo $path_to_files."/".$entry . " will be deleted"."<br>";
                            if ($update_option == "remove_broken_links"){
                                $broken_link_files[ $path_to_files.'/'.$entry] = $entry;
                                unlink($path_to_files."/".$entry);
                            }
                            else{
                                $broken_link_files[ $entry] = $path_to_files.'/'.$entry;
                               
                            }

                           //echo ('<br/>'." will be deleted ".$entry );
                             
                        }
                    }
                }
            }
            closedir($handle);
        }
        return $broken_link_files;
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
       echo ('<BR>'.__FILE__. ' at line: '.__LINE__.' in method: ' .__FUNCTION__);//exit('exit');

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
                        $passed_to_view_array['qqqq']                           = 
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
 
    //public function putEdit2new() {
    public function editUpdatex(
        Request $request, 
        $id, 
        $what_we_are_doing, 
        $coming_from,
        $report_definition_key){

        //echo("<br>".
        //    ' what_we_are_doing: '. $what_we_are_doing.
        //    ", id: ".$id.
        //    ', coming_from: '.$coming_from.
        //    ', report_definition_key: '.$report_definition_key);
        //echo ('<BR>'.__FILE__. ' at line: '.__LINE__.' in method: ' .__FUNCTION__);//exit('exit');
        //var_dump($request);
        //echo("editUpdate");$this->debug_exit(__FILE__,__LINE__,10);
        if (!empty($what_we_are_doing)) {
            echo ('<BR>'.__FILE__. ' at line: '.__LINE__.' in method: ' .__FUNCTION__);
            echo($what_we_are_doing);
            $report_definition  = MiscThing::where('id','=',$report_definition_key)->get();
            $working_arrays     = $this->working_arrays_construct($report_definition[0]);
           
            //$this->debug_exit(__FILE__,__LINE__,10);
            switch ($what_we_are_doing) { 
                case "klone":
                    echo($report_definition_key);
                    $MiscThing  =  MiscThing::where('id','=',$id)->get();

                    if($MiscThing){
                        //var_dump($MiscThing[0]['fillable']);
                        $arr1 = (array) $MiscThing[0]['attributes'];
                        unset($arr1['id']);
                        MiscThing::create($arr1);
                        return redirect('admin/miscThings');
                        //var_dump($MiscThing[0]['attributes']);exit();
                        var_dump($arr1);exit();

                    } 
                    var_dump($MiscThing);exit();
                    break;
               case "edit2_default_add":
                case "edit2new":
                case "edit2_default_edit":
                case "editing_a_data_record":
                    //$request->input('data_key');
                    //var_dump(Input::all()); $this->debug_exit(__FILE__,__LINE__,0);
                    //$report_definition  = $this->execute_query_by_report_no($id);
                    $modifiable_fields_array = $working_arrays['maintain_modifiable_fields']['modifiable_fields_array'];

                    $lookups_array['field_name'] = $this->build_column_names_array($this->model_table);
 
                    $fieldname_name_value_array = $this->bld_name_value_lookup_array($this->model_table);
                    //$lookups_array = $this->bld_name_value_lookup_array('shows');
                   $lookups_array = array_merge($lookups_array,$fieldname_name_value_array);
 
                    $MiscThing  = MiscThing::where('id','=',$id)->get();
                    if($MiscThing){
                        $array1  = $this->return_modifiable_fields_array($what_we_are_doing,$report_definition_key,$modifiable_fields_array); 
                        
                       $array1  = $this->return_modifiable_fields_array($what_we_are_doing,$id,$modifiable_fields_array); 
                        
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
                        $passed_to_view_array['qqqqq']                           = 
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
                        //echo ('<BR>'.__FILE__. ' at line: '.__LINE__.' in method: ' .__FUNCTION__);
                        return view($this->node_name.'.editUpdate',compact('miscThings'))
                        ->with('node_name'   ,$this->node_name)            
                       ->with('encoded_business_rules'   ,$report_definition[0]['business_rules']) 
                      ->with('passed_to_view_array'   ,$passed_to_view_array);            
                        break;          
            case "edit2_default_update":
            //case "updating_data_record": // defined in editUpdate
                //echo("<BR>".$what_we_are_doing);$this->debug_exit(__FILE__,__LINE__,10);
                //var_dump($request);$this->debug_exit(__FILE__,__LINE__,1);
                $requestFieldsArray=$request->all(); // important!!

                //var_dump($this->build_business_rules_relational_operators());$this->debug_exit(__FILE__,__LINE__,1);
                //var_dump($requestFieldsArray);$this->debug_exit(__FILE__,__LINE__,1);

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
                        $updatex  = DB::connection($this->db_snippet_connection)->table($this->model_table)
                            ->insert($modifiable_fields_name_values);
                        break;
                    case "edit2_edit_button":
                        $updatex  = DB::connection($this->db_snippet_connection)
                        ->table($this->model_table)
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



    public function clone_id_to_node($from_id,$name_values_array,$node_name) {
        //$this->debug1(__FILE__,__LINE__,__FUNCTION__);
        $MiscThing  =  MiscThing
        ::where('id','=',$from_id)->get();
        if($MiscThing){
            $arr1 = (array) $MiscThing[0]['attributes'];
            $from_array = array('report_id'=>$from_id);
            unset($arr1['id']);
            $arr1 = array_merge ($arr1,$name_values_array);
            //var_dump($arr1);
            //$this->debug1(__FILE__,__LINE__,__FUNCTION__);
            MiscThing::create($arr1);
            switch ($arr1['record_type']) { 
            case "report_definition":
                $from_folder = $this->views_files_path."/"."generated_files";
                $to_folder = $this->views_files_path."/"."generated_files";
                echo($from_folder."**".$to_folder."**");
                $new_id = $this->get_newest_record_type('report_definition');
                $to_array   = array('report_id'=>$new_id);
                //echo("<BR>*.$this->views_files_path."*".$from_folder);
                //echo("**".$to_folder."**".$this->snippet_table);
                var_dump($from_array);var_dump($to_array);
                //$this->debug1(__FILE__,__LINE__,__FUNCTION__);
                $x = $this->partial_folder_clone_w_scanrepl($from_folder,$to_folder,$from_array,$to_array,'y');
                break;
            }         
        }
        return $new_id;
        return redirect('admin/miscThings');
    }




    public function clone_ids_to_node_name($node_name) {
        //$this->debug1(__FILE__,__LINE__,__FUNCTION__);
        $new_values = array(
            'model'         => $this->link_parms_array['model'],
            'node_name'     => $this->link_parms_array['node_name'],
            'table_name'    => $this->link_parms_array['node_name']
            );
        $reports_to_clone_array = array(
             $this->report_definition_model_name =>$this->report_definition_id  
              );

        //***** see if there are any reports defined for this node
        $Existing_reports_for_node  =  MiscThing
            ::where('record_type','=','report_definition')
            ->where('node_name','=',$new_values['node_name'])
            ->get();
        //***** if there aren't any, load the defaults
        if ($Existing_reports_for_node->count('items') == 0){
            //echo('<br>'. 'no report_definitions for this node:  '.$new_values['node_name']);
            //exit("702");
            //***** for each default_report 
            foreach ($reports_to_clone_array as $index => $from_id) {
                $this->clone_id_to_node($from_id,$new_values,$node_name); 
            }
        }
        return redirect('admin/miscThings');
    }


    public function create()
    {
        //$x = Config::get('dehGlobals.business_rules_array');
        $this->debug_exit(__FILE__,__LINE__,10);  
 
        //echo("<br>".$this->store_validation_id );$this->debug_exit(__FILE__,__LINE__,1);
        //$snippet_file ="../".$this->node_name.'/'.$this->generated_files_folder.'/'.$this->store_validation_id.'_modifiable_fields_add';

        $snippet_file = $this->node_name."/".$this->generated_files_folder."/".$this->report_definition_id.
        '_modifiable_fields_add.blade.php';
        //File::put($snippet_file,$this->$blade_routine($no_of_rows));
        $report_definition = 
        $this->execute_query_by_report_no($$this->report_definition_id) ;
        $encoded_business_rules     = $report_definition[0]->business_rules;
        $modifiable_fields_array    = $report_definition[0]->modifiable_fields_array;
        $snippet_file ="../".$this->node_name.'/'.$this->generated_files_folder.'/'.
        $report_definition_key.'_modifiable_fields_add';  
        $this->blade_gen_simple_add($this->report_definition_id,$modifiable_fields_array);
         echo($report_definition_key.$this->node_name);
        return view($this->node_name.'.create')
            ->with('encoded_business_rules' , $report_definition[0]->business_rules)
            ->with('modifiable_fields_array' , 
                $report_definition[0]->modifiable_fields_array)
            ->with('report_definition_key'  , $report_definition_key)
            ->with('snippet_file'           , $snippet_file)
            ->with('node_name'              , $this->node_name
            );         return view($this->node_name.'.create')
        //->with('message'                , $message)
        ->with('snippet_file'           , $snippet_file)
        ->with('report_definition_key'  , $this->report_definition_id)
        ->with('node_name'              , $this->node_name);

    }

 
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
     public function create_w_report_id($report_definition_key) {
        //$report_definition_key = $this->report_definition_key;
        echo $report_definition_key;
        $this->debug0(__FILE__,__LINE__,__FUNCTION__);
        $report_definition = 
        $this->execute_query_by_report_no($report_definition_key) ;
        //var_dump($report_definition);$this->debug_exit(__FILE__,__LINE__,1);
        $encoded_business_rules     = $report_definition[0]->business_rules;
        
        $snippet_file ="../".$this->node_name.'/'.$this->generated_files_folder.'/'.
        $report_definition_key.'_modifiable_fields_add';  
        echo($report_definition_key.$this->node_name);
        return view($this->node_name.'.create')
            ->with('encoded_business_rules' , $report_definition[0]->business_rules)
            ->with('modifiable_fields_array' , 
                $report_definition[0]->modifiable_fields_array)
            ->with('report_definition_key'  , $report_definition_key)
            ->with('snippet_file'           , $snippet_file)
            ->with('node_name'              , $this->node_name
            );
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response conn
     */
    public function execute_query_by_report_no($report_no) {
      //echo 'execute_query_by_report_no'.$report_no.$this->snippet_table_key_field_name;$this->debug_exit(__FILE__,__LINE__,0);
      $response = DB::connection($this->db_snippet_connection)
        ->table($this->snippet_table)
        ->where($this->snippet_table_key_field_name, '=', $report_no)
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
        
        $response0 = MiscThing
        ::where('table_name','=', $table_name)
        ->where('record_type','=','name_value_definition')
        ->get(array('field_name','table_name','name','value'));
        $array = array();
        foreach($response0 as $response){
            $array [$response->field_name][$response->name] = $response->value;
        }
        return $array;
    }


    public function clone_generated_files_to_node_name($node_name) {
        if ($handle = opendir($this->views_files_path."/".$node_name."/generated_files")) {
            echo "Directory handle: $handle\n";
            echo "Entries:\n";
            $new_id = $this->get_newest_record_type('report_definition');
            $this->debug1(__FILE__,__LINE__,__FUNCTION__);
            /* This is the correct way to loop over the directory. */
            while (false !== ($entry = readdir($handle))) {
                $haystack = "*" . $entry;
                $i0 = stripos($haystack,$needle);
                echo "$entry\n";
              $new_id = $this->get_newest_record_type('report_definition');
          }
        }
    }
 

    public function get_active_reports_for_table($node_name) {
    $array = array();
    $response = MiscThing
    ::where('record_type','=','report_definition')
    //->where('table_name','=',$this->model_table)
    ->where('node_name','=',$node_name)
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
    



    public function get_newest_record_type($record_type) {
        $report_definition  = 
            MiscThing
            ::where('record_type','=',$record_type)
            ->orderBy('created_at'     ,'desc')
            ->get();
        echo ($report_definition[0]['id']);
        //$this->debug1(__FILE__,__LINE__,__FUNCTION__);
        return $report_definition[0]['id'];
    }


   public function get_report_definition_id(
        $record_type,
        $node_name,
        $like_report_name
        ) {
        //echo 'get_report_definition_id';
        //$this->debug_exit(__FILE__,__LINE__,10);
        $response = MiscThing
            ::where('record_type','=',$record_type)
            ->where('node_name','='     ,$this->snippet_node_name)
            ->where('report_name','like','%'.$like_report_name.'%')
            ->get();

        if ($response){
            //var_dump($response[0]['id']);$this->debug_exit(__FILE__,__LINE__,10);
            return $response[0]['id'];
        }
        else {
            echo 'you have a fatal error<br>';
            $this->debug_exit(__FILE__,__LINE__,1);
        }
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
    public function indexReports(REQUEST $request,$id,$report_definition_id) {
       //$this->debug_exit(__FILE__,__LINE__,0);echo(' indexReports');
       // var_dump($id);
       $record_type                    = "report_definition";
   
        if($miscThings = MiscThing::where('record_type','=',$record_type)
            ->where('table_name',  '='    ,$this->model_table)
            ->where('node_name',    '='    ,$this->node_name)
            ->orderBy('report_name','asc')
            ->get()){
            if ($miscThings->count('items') == 0){
                // there are NO reports so go to new report screen
                echo(' no reports');$this->debug_exit(__FILE__,__LINE__,0);
                $this->create_w_report_id($report_definition_id);
                //$this->debug_exit(__FILE__,__LINE__,1);echo(' no reports');
            }
            else{
                $what_we_are_doing = 'displaying_advanced_edits_screen';
                $working_arrays     = $this->working_arrays_construct($miscThings[0]);
                $record = $miscThings[0];
                var_dump($this->report_definition_id);
                // var_dump($miscThings);
    $parameters = array('id'=>$id,'what_we_are_doing'=>$what_we_are_doing,'coming_from'=>'indexReports');
                //var_dump($parameters);$this->debug_exit(__FILE__,__LINE__,10);
                //$this->debug_exit(__FILE__,__LINE__,10);
                return view($this->node_name.'.indexReports',compact('miscThings'))
                    ->with('encoded_report_description'     ,json_encode($miscThings))
                    ->with('encoded_record'                 ,json_encode($record))
                    ->with('model_table'                    ,$request->input('model_table'))
                    ->with('id'                             ,$request->input('id'))
                    ->with('report_definition_id'           ,$this->report_definition_id)
                    ->with('parameters'                     ,$parameters)
                    ->with('encoded_working_arrays'         ,json_encode($working_arrays))
                    ->with('record'                         ,$record)
                    ->with('all_records'                    ,$miscThings)
                    ->with('report_key'                     ,$this->report_definition_id)
                    //->with('report_key'                     ,$request->input('report_key'))
                    ->with('node_name'                      ,$this->node_name)
                    ->with('snippet_table_key_field_name'   ,$this->snippet_table_key_field_name)
                    ->with('snippet_table'                  ,$this->snippet_table)
                    ;
            }
        //exit("exit 837"); 
        }
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
        //var_dump($what_we_are_doing);//$this->debug_exit(__FILE__,__LINE__,1);
        //var_dump($modifiable_fields_array);$this->debug_exit(__FILE__,__LINE__,1);

        $array1 = array();
        if (is_null($modifiable_fields_array)){ echo "858";
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
                    $working_arrays = $this->working_arrays_construct($db_result[0]);
                    $modifiable_fields_array = $working_arrays['maintain_modifiable_fields']['modifiable_fields_array'];

                   //var_dump($working_arrays);echo(__FILE__.__LINE__);exit();
                    /*
                   foreach ($db_result as $name=> $value) {
                        $array1[$value] = $db_result->$value;
                    }
                    */
                   //var_dump($db_result->items[0]);
                   //$this->debug_exit(__FILE__,__LINE__,1);
                   $array1 = array();
                   if (is_null($modifiable_fields_array)){
                        return $array1;
                    }

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

    public function reportDefMenuEdit(REQUEST $request,$id,$what_we_are_doing,$coming_from){
        //$requestFieldsArray=$request->all();
        //var_dump($requestFieldsArray); // important!!);
        //echo('<br>this is reportDefMenuEdit node: '.$this->node_name);
        //echo("<br>we moved it to indexReports and then reportDefMenuEdit(here)");
        //echo("<br>".'* '.$id.' * '.$what_we_are_doing.' * '.$coming_from." ** ");$this->debug_exit(__FILE__,__LINE__,0);
        //$this->debug3(__FILE__,__LINE__,__FUNCTION__);echo($id.' * '.$what_we_are_doing.' * '.$coming_from); 
        $miscThing = MiscThing::where('id','=',$id)->get();
        //var_dump($miscThing);$this->debug_exit(__FILE__,__LINE__,10);
        $working_arrays     = $this->working_arrays_construct($miscThing[0]);
        //var_dump($working_arrays);$this->debug_exit(__FILE__,__LINE__,10);        
        //$this->debug_exit(__FILE__,__LINE__,10);
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
                ->with('report_definition_id'               ,$this->report_definition_id)
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
            //var_dump($request[0]);//var_dump($working_arrays);
            $just_the_ones_we_want = $working_arrays['ppv_define_business_rules']['field_name_array'];

            //unset($modifiable_fields_name_values[$this->snippet_table_key_field_name]);
            //$requestFieldsArray=$request->all(); // important!!
            //$this->validate($request, $business_rules);

           //var_dump($just_the_ones_we_want);
           //var_dump($working_arrays['ppv_define_business_rules']['field_name_array']);
            //var_dump($working_arrays['ppv_define_query']['field_name_array']);
            //$this->debug_exit(__FILE__,__LINE__,10);
             switch ($what_we_are_doing) {
                case 'ppv_define_query':
                    $just_the_names_array = json_encode($working_arrays['ppv_define_query']['field_name_array']);
                    break;
                case 'ppv_define_business_rules':
                     $just_the_names_array = json_encode($working_arrays['ppv_define_business_rules']['field_name_array']);
                    break;
             }

            $column_names_array = (array) $this->build_column_names_array($this->model_table);
            //echo('<br>1042: '.$what_we_are_doing);var_dump($miscThing );   $this->debug_exit(__FILE__,__LINE__,0);   
            $working_arrays = 
            $this->working_arrays_fixer($working_arrays,$what_we_are_doing);
            //var_dump($working_arrays [$what_we_are_doing]);$this->debug_exit(__FILE__,__LINE__,0);
            $field_name_array_name = ($working_arrays[$what_we_are_doing]['field_name_array']['field_name']);
            //echo("rows ".$field_name_array_name);
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
        
            //echo ($what_we_are_doing);$this->debug_exit(__FILE__,__LINE__,10);
            return view($this->model_table.".ppv_update"    ,compact('miscThing'))
                ->with('what_we_are_doing'                  ,$what_we_are_doing)
               ->with('just_the_names_array'                ,$just_the_names_array)
                ->with('report_definition_id'               ,$this->report_definition_id)

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
        ->with('report_definition_id'               ,$this->report_definition_id)

        ->with('model'                              ,$this->model)
        ->with('node_name'                          ,$this->node_name)
        ->with('what_we_are_doing'                  ,'updating_report_name')
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
                var_dump(Input::all());$this->debug_exit(__FILE__,__LINE__,10);

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

   // clone_file_snippets($from_id,$newest_id);
 
    public function partial_folder_clone_w_scanrepl($from_folder,$to_folder,$from_string_array,$to_string_array,$displayYN) {
        //* *************
        //* 
        //echo($from_folder."  ".$to_folder);$this->debug1(__FILE__,__LINE__,__FUNCTION__);
        if ($handle = opendir($from_folder)) {
             /* This is the correct way to loop over the directory. */
            while (false !== ($entry = readdir($handle))) {
                $new_file_name =  $this->scan_replace_str_value_arrays($entry,$from_string_array,$to_string_array,$displayYN);
                if ($new_file_name != $entry){
                    //* if the names don't match, they WERE a match so create this file name
                    copy($from_folder.'/'.$entry,   $to_folder.'/'.$new_file_name);
                    echo ("<br>".$new_file_name." was created ");
                }
            }
        }
    }


     public function scan_replace_str_value_arrays($search_string,$search_str_array,$value_str_array,$displayYN){
        foreach ($search_str_array as $entity=>$search_str) {
            if ($displayYN == 'y'){
               //echo("<br> ".$search_str_array[$entity] ." will be replaced by ". $value_str_array[$entity])."*";
               $displayYN = 'n';
            }
             $search_string = str_ireplace ($search_str_array[$entity], $value_str_array[$entity] , $search_string);
        }  
        return  $search_string;       
     }



    public function show(REQUEST $request,$id)
    {
        $requestFieldsArray=$request->all(); // important!!
        var_dump($requestFieldsArray);
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
        //$this->debug1(__FILE__,__LINE__,__FUNCTION__);
        //var_dump($request->input('encoded_business_rules'));
        $requestFieldsArray     = $request->all(); // important!!
        $validation_array       = (array) json_decode($request->input('encoded_business_rules'));
        $modifiable_fields_array = (array) json_decode($request->input('modifiable_fields_array'));
        //var_dump($requestFieldsArray); $this->debug1(__FILE__,__LINE__,__FUNCTION__);
        unset($modifiable_fields_array['id']);
        
        
        $new_values = array(
            'model'         => $this->link_parms_array['model'],
            'node_name'     => $this->link_parms_array['node_name'],
            'table_name'    => $this->link_parms_array['node_name']
            );
        $array1 = array_intersect_key($requestFieldsArray,$modifiable_fields_array);
        $array3 = array_intersect_key($new_values,$modifiable_fields_array);
        $array2 = array_merge($array1,$array3);
        $this->validate($request,$validation_array);
        //$this->debug1(__FILE__,__LINE__,__FUNCTION__);
       
        $new_id = $this->clone_id_to_node($requestFieldsArray['id'],$array2, $new_values['node_name']);
        //$this->debug_exit(__FILE__,__LINE__,10);

        $snippet_file = $this->node_name."/".$this->generated_files_folder."/".$this->report_definition_id.
        '_modifiable_fields_add.blade.php';
        //File::put($snippet_file,$this->$blade_routine($no_of_rows));
        $report_definition = 
        $this->execute_query_by_report_no($this->report_definition_id) ;
        $encoded_business_rules     = $report_definition[0]->business_rules;
        $modifiable_fields_array    = (array) json_decode($report_definition[0]->modifiable_fields_array);
        $snippet_file ="../".$this->node_name.'/'.$this->generated_files_folder.'/'.
        $this->report_definition_id.'_modifiable_fields_add';  

        unset($modifiable_fields_array['id']);
        //var_dump($array3);var_dump($modifiable_fields_array);$this->debug_exit(__FILE__,__LINE__,10);
        $this->blade_gen_simple_add($this->report_definition_id,$modifiable_fields_array);

        return redirect()->route($new_values['node_name'].'.indexReports',[
            'id' => $new_id,
            'reportDefinitionKey'=>$requestFieldsArray['report_definition_id']
            ]);

        //return redirect('admin/miscThings');
    }


    public function stor_w_rules_array(REQUEST $request) {
        echo('stor_w_rules_array');
        $this->debug_exit(__FILE__,__LINE__,10);
        $validation_array = json_decode($encoded_business_rules);
        $modifiable_fields_array = json_decode($modifiable_fields_array);
        //$requestFieldsArray=$request->all(); // important!!
        $this->validate($request,$validation_array);
        $updatex  = DB::connection($this->db_snippet_connection)->table($this->model_table)->insert($modifiable_fields_array);

        $miscThing=$request->all(); // important!!
        MiscThing::create($miscThing);
        return redirect('admin/miscThings');
    }


    public function just_the_ones_we_want(REQUEST $request,$encoded_business_rules) {
        echo('just_the_ones_we_want');
        $this->debug_exit(__FILE__,__LINE__,10);
        $validation_array = json_decode($encoded_business_rules);
        //$requestFieldsArray=$request->all(); // important!!
        $this->validate($request,$validation_array);
        $updatex  = DB::connection($this->db_snippet_connection)->table($this->model_table)->insert($modifiable_fields_name_values);

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
    public function update(REQUEST $request, $id)
    {
        //* *********************
        // the request has every field we need but many we dont
        // running array_intersect_key against an array of the fields we want
        // will return an array of ONLY the data we want from the request
        // **********************
        $requestFieldsArray=$request->all();
        if (!array_key_exists('what_we_are_doing',$requestFieldsArray)) {
           $requestFieldsArray['what_we_are_doing'] = 'updating_report_name';
         }
        $update = 0;  
        
        //var_dump($requestFieldsArray);$this->debug_exit(__FILE__,__LINE__,10);
        //var_dump($requestFieldsArray['encoded_modifiable_fields_array']);$this->debug_exit(__FILE__,__LINE__,10);
        switch ($requestFieldsArray['what_we_are_doing']) {
            
           case "editUpdate":
                $update = 1;
                // this is the guy that needs validation
                $just_the_ones_we_want = array_flip((array) json_decode($requestFieldsArray['encoded_modifiable_fields_array']));
                
                //var_dump($just_the_ones_we_want);$this->debug_exit(__FILE__,__LINE__,10);
                 break; 
             case "updating_report_definition":
                break; 
            case "updating_report_name":
               $update = 1; 
               $requestFieldsArray['just_the_names_array'] = array('report_name');
         
                $just_the_ones_we_want = $requestFieldsArray['just_the_names_array'] ;
                $just_the_ones_we_want = array_flip($just_the_ones_we_want);
                break;  

           case "maintain_modifiable_fields":
                $update = 1; 
                //var_dump($requestFieldsArray['field_name_array']);$this->debug_exit(__FILE__,__LINE__,10);
                //var_dump($requestFieldsArray);$this->debug_exit(__FILE__,__LINE__,10);
                $requestFieldsArray['modifiable_fields_array'] = 
                json_encode(array_combine($request->to,$request->to));
                //* ******************
                $objectOrArray = "array";
                $this->blade_gen_browse_select($id,$objectOrArray);
                $just_the_ones_we_want = array(
                    'modifiable_fields_array'=> 'modifiable_fields_array'
                    );
                break;  

            case "maintain_browse_fields":           
                $update = 1; 
                $requestFieldsArray['browse_select_array'] = 
                json_encode(array_combine($request->to,$request->to));
                $objectOrArray = "array";
                $this->blade_gen_browse_select($id,$objectOrArray);
                $just_the_ones_we_want = array('browse_select_array'=> 'browse_select_array');
                break;  
            case "ppv_define_query":
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
                $just_the_ones_we_want = $requestFieldsArray;

                break;  
            case "ppv_define_business_rules":
                echo(__FILE__.__LINE__.'<br>');//exit();
                $update = 1; 
                //var_dump($request);//var_dump($working_arrays);
 

                $requestFieldsArray['business_rules']             = 
                $this->build_validation_array(
                    $this->build_business_rules_relational_operators(),
                    $request->field_name_array,
                    $request->r_o_array,
                    $request->value_array);
                $business_rules = $requestFieldsArray['business_rules'];
                $request->business_rules = json_encode($requestFieldsArray['business_rules']);
                $requestFieldsArray['business_rules'] = 
                    json_encode($requestFieldsArray['business_rules']);
                $requestFieldsArray['business_rules_field_name_array']    = 
                    json_encode($request->field_name_array);
                $requestFieldsArray['business_rules_r_o_array'] = 
                    json_encode($request->r_o_array);
                $requestFieldsArray['business_rules_value_array'] = 
                    json_encode($request->value_array);


                $just_the_ones_we_want = (array) json_decode($requestFieldsArray['just_the_names_array']);
                $just_the_ones_we_want = array_flip($just_the_ones_we_want);
                 //echo(' array_intersect_key($requestFieldsArray,$arr2 ' );var_dump($arr2);            $this->debug_exit(__FILE__,__LINE__,10);
                break;  
        } 
        //$requestFieldsArray=$request->all(); // create an array of all fields on the form
        //$this->debug_exit(__FILE__,__LINE__,1);echo('update id: '.$id);
        // ******
       // update
       // ******
        if ($update){  
            $requestFieldsArray = array_intersect_key($requestFieldsArray,
            $just_the_ones_we_want);
            //var_dump($request);$this->debug_exit(__FILE__,__LINE__,10);
            //$validation_array = json_decode($encoded_business_rules);
            switch ($request->what_we_are_doing) {
             case "editUpdate":
                // this is the guy that needs validation
                $rules_array =  (array) json_decode($request->encoded_business_rules);
                //var_dump($rules_array);
                //$this->debug_exit(__FILE__,__LINE__,10);
                $this->validate($request,$rules_array);
                //var_dump($just_the_ones_we_want);$this->debug_exit(__FILE__,__LINE__,10);
                break; 
            }
            
            //var_dump($requestFieldsArray);$this->debug_exit(__FILE__,__LINE__,10);

            //var_dump($requestFieldsArray);

        
            $updatex = MiscThing::where($this->key_field_name,  '=', $id)
            ->update($requestFieldsArray);

            return redirect()->route('miscThings.reportDefMenuEdit', 
                ['id' => $id,
                'what_we_are_doing' => 'what_we_are_doing',
                'coming_from' => 'edit1'
                ]);
        return back()->withInput();
        }
        if (!$update) {

            var_dump($requestFieldsArray);$this->debug_exit(__FILE__,__LINE__,10);
            if ((isset($request->what_we_are_doing)&&$request->what_we_are_doing == 'updating_data_record') ){
                $business_rules = json_decode($requestFieldsArray['wxyz'],1 );
                var_dump($business_rules);$this->debug_exit(__FILE__,__LINE__,0);
                $modifiable_fields_array = json_decode($request->encoded_modifiable_fields_array,1);
                $modifiable_fields_name_values = array_intersect_key($requestFieldsArray, $modifiable_fields_array);
                unset($modifiable_fields_name_values[$this->snippet_table_key_field_name]);
                $requestFieldsArray=$request->all(); // important!!
                $this->validate($request, $business_rules);
                 // valid past here
                $update = 0; 
                    $miscThingsings=MiscThing::find($id);
                    $miscThingsings->update($modifiable_fields_name_values);
                    return redirect('admin/miscThings')
                       ->with('message'      , 'ok ');
            }
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
         $this->debug_exit(__FILE__,__LINE__);

        $this->authorize('destroy', $MiscThing);

        $MiscThing->delete();

        //return redirect('/tasks');
        return;

    }
    public function working_arrays_construct($record) {
        //echo("working_arrays_construct");
        // $working_arrays contains some handy grouping of data and arrays we need for various things
       
        $working_arrays     = $this->working_arrays_define($record);

         $working_arrays     = $this->working_arrays_populate($working_arrays,$record);
          
        $column_names       = $this->build_column_names_array($this->model_table);
        
        $working_arrays     = $this->working_arrays_populate_lookups($working_arrays,$column_names);
          //return $working_arrays;
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
        //var_dump($record);exit();


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
            'value'      => 'business_rules_value_array',
            'business_rules' => 'business_rules'
            );
        $working_arrays['ppv_define_business_rules']['default_values_array'] = array(
            'field_name' => $this->bypassed_field_name,
            'r_o'        => 'required',
            'value'      => ' ',
            'business_rules' => 'business_rules'

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

        //var_dump($working_arrays);$this->debug_exit(__FILE__,__LINE__,1);
        return $working_arrays;

    }


    public function working_arrays_pad_rows_for_growth($working_arrays) {
        //echo('<br><br>'.'working_arrays_pad_rows_for_growth');$this->debug_exit(__FILE__,__LINE__,0);
        foreach ($working_arrays['groups_to_be_resized']as $array_group_to_be_padded){
            $pad_ctr = $this->working_arrays_set_pad_ctr($working_arrays,$array_group_to_be_padded);
            
            $working_arrays = $this->working_arrays_pad_specific_group($working_arrays,$array_group_to_be_padded,$pad_ctr);
            //$this->debug_exit(__FILE__,__LINE__,10);
        }
       return $working_arrays;
    }



    public function working_arrays_set_pad_ctr($working_arrays,$array_group_to_be_padded ) {
        // this is setting the padding at the end of the form so there's always room for growth
        // it's more complicated because the size of one array dictates the size of all three

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
        //echo ('<BR>'.__FILE__. ' at line: '.__LINE__.' in method: ' .__FUNCTION__);echo($array_group_to_be_padded);
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
