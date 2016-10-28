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
class VolunteersController extends DEHBaseController {
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct(
        $record_type                    = "table_controller", 
        //$db_connection_name             = "localhost_stu3881_main", 
        $db_connection_name             = "blues_main", 
        //$db_connection_name             = "gohoooa_stu3881_main",
        $db_snippet_connection          = "",
        $db_data_connection             = "",
        $snippet_connection_name        = "snippetConnection",
        $controller_name                = "VolunteersController", 
        $no_of_blank_entries            = "5", 
        $model                          = "Volunteer", 
        $model_table                    = "volunteers", 
        $node_name                      = "volunteers", 
        $snippet_table                  = "miscThings", 
        $snippet_table_key_field_name   = "id", 
        $backup_node                    = "backup_before_redirect_to_baseline", 
        $generated_files_folder         = "generated_files", 
        $key_field_name                 = "v_index",
         $bypassed_field_name            = "not_used",
        $view_files_prefix = "",

        $field_list_array_name = "",
        $field_name_list_array = "",

        $field_name_lists_array = "",
        $field_name_list_array_first_index = "",
        $my_ctr                             = 0
       
        ) {
        parent::__construct();
        $this->db_connection_name               = $db_connection_name;
        $this->db_snippet_connection            = $db_snippet_connection;
        $this->db_data_connection               = $db_data_connection;
 
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
        $this->stored_connections_path = substr(app_path(),0,strlen(app_path())-4).'/storage/connections/';
        //. $this->db_connection_name ;
         $this->stored_connections_path = substr(app_path(),0,strlen(app_path())-4).'/storage/connections/'. $this->db_connection_name ;

 
        //routes

        // these are derived
 
        $this->view_files_prefix                = $this->views_files_path;
        $this->key_field_array                  = array($this->snippet_table_key_field_name=>$this->snippet_table_key_field_name);
        $this->key_field_name_array             = array($this->snippet_table_key_field_name=>$this->snippet_table_key_field_name);
        $this->make_sure_table_snippet_exists($this->model_table);
        //$this->debug_exit(__FILE__,__LINE__);
        $this->generated_snippets_array         = $this->get_generated_snippets();
        // generated_snippets are arrays that are generated when the properties
        // of a report change
        //print_r($this->generated_snippets_array);exit('exit 22');
        //$this->report_nippets_array           = $this->decode_generated_snippets_by_record_type('table_snippets');
        //$this->key_field_name_array           = array($this->key_field_name=>$this->key_field_name);
        $this->required_fields_array            = $this->generated_snippets_array['required_fields_array'];
        //echo $this->view_files_prefix ;exit ("exit in constructor");

        // THIS IS HOWWE CHANGE CONNECTIONS
        $this->snippet_table                    = "miscThings";
        //$this->defaultConnection                = "defaultConnection";
        $this->defaultConnection                = "startup_dont_change";

        //$ConnectionsQuery = DB::connection($this->defaultConnection)->table($this->snippet_table)
        $ConnectionsQuery = DB::table($this->snippet_table)
         // this uses the one in config/database.php
        ->where('record_type','=','database_connection')
        ->where('db_connection_name' ,"=", $this->defaultConnection )
        ->get();
        
        $this->db_snippet_connection            = $ConnectionsQuery[0]->db_snippet_connection;
        $this->db_data_connection               = $ConnectionsQuery[0]->db_data_connection;
        //$this->db_snippet_connection            = "blues_main";
        //$this->db_data_connection               = "gohoooa_stu3881_main";
        // $this->db_data_connection               = "localhost_stu3881_main";
        //$this->db_data_connection               = "gohoooa_stu3881_main";
        //$this->db_data_connection               = "localhost_stu3881_main";



        //echo("exiting miscThings constructor");$this->debug_exit(__FILE__,__LINE__,0);
        //$this->field_name_lists_array = $field_name_lists_array;
        //$this->field_name_list_array = "";
 
        // field_name_list_array defines the arrays depending on $what_we_are_doing
        // the first level index 
       //$this->field_name_list_array = (array) $this->initialize_field_name_list_array();
       $this->field_name_list_array_first_index = $field_name_list_array_first_index;
     
    }
    
     public function index()
    {
        //
        $this->debug_exit(__FILE__,__LINE__);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $this->debug_exit(__FILE__,__LINE__);
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
        $this->debug_exit(__FILE__,__LINE__);
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
        $this->debug_exit(__FILE__,__LINE__);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
         //$this->debug_exit(__FILE__,__LINE__);
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
        $this->debug_exit(__FILE__,__LINE__);
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
        $this->debug_exit(__FILE__,__LINE__);
    }
}
