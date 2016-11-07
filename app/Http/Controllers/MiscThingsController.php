<?php

namespace App\Http\Controllers;

use App\Models\MiscThing;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

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
     * Execute the query and show the report you just requested
     *
     * @return \Illuminate\Http\Response
     */

    public function browseEdit() {
        
        //echo(Input::get('what_we_are_doing'));
        //echo("browseEdit<br>");
        //var_dump($miscThings);
        //$this->debug_exit(__FILE__,__LINE__,0);
//var_dump($report_definition);$this->debug_exit(__FILE__,__LINE__,10);
         $report_definition  = $this->execute_query_by_report_no($MiscThings->id);
        $ppv_array_names    = array('ppv_define_query','ppv_define_business_rules');
        $working_arrays     = $this->working_arrays_construct($report_definition,$ppv_array_names,$what_we_are_doing);
        //var_dump($report_definition);$this->debug_exit(__FILE__,__LINE__,10);
        $fieldName_r_o_value_array = $this->load_array_for_query_from_working_array($working_arrays);
        //var_dump($working_arrays); $this->debug_exit(__FILE__,__LINE__,1);
        $query_relational_operators_array = $this->build_query_relational_operators_array();

        $db_result = $this->build_and_execute_query($fieldName_r_o_value_array,$this->bypassed_field_name,$query_relational_operators_array);
        //$db_result = json_encode($db_result);
        //$db_result = json_decode($db_result,1);
        //var_dump($report_definition[0]->modifiable_fields_array); var_dump($db_result); $this->debug_exit(__FILE__,__LINE__,1);
        //$laravel_snippets_array = $this->browse_select_blade_gen($this->model,         json_decode($report_definition[0]->modifiable_fields_array,1),'version4');
        //var_dump($browse_select_loop_str); $this->debug_exit(__FILE__,__LINE__,1);
        $passed_to_view_array = array();
        //$passed_to_view_array['input'] = 'x';
        $passed_to_view_array['input']              = Input::all();
        $passed_to_view_array['encoded_input']      = json_encode(Input::all());
        $passed_to_view_array['snippet_name']       ='_browse_select_display_snippet';
        $passed_to_view_array['report_definition']  = $report_definition[0];
        $passed_to_view_array['encoded_report_definition'] =json_encode($report_definition[0]);             
        $passed_to_view_array['key_field_name']     = $this->key_field_name;
        $passed_to_view_array['miscThings_obj']    = $db_result;
        $strx                                       = json_encode($db_result);
        //$passed_to_view_array['browse_select_loop_str']       = $browse_select_loop_str;
        $passed_to_view_array['miscThings']        = json_decode($strx,1);
        $passed_to_view_array['field_names_array']  = $working_arrays['maintain_browse_fields']['browse_select_array'];


        $passed_to_view_array['generated_files_folder'] = $this->generated_files_folder;
        $passed_to_view_array['encoded_business_rules_field_name_array'] = $report_definition[0]->business_rules_field_name_array;
        $passed_to_view_array['encoded_business_rules_r_o_array'] = $report_definition[0]->business_rules_r_o_array;
        $passed_to_view_array['encoded_business_rules_value_array'] = $report_definition[0]->business_rules_value_array;
        //var_dump($passed_to_view_array['miscThings']); $this->debug_exit(__FILE__,__LINE__,1);
        //var_dump($laravel_snippets_array); $this->debug_exit(__FILE__,__LINE__,1);
        $passed_to_view_array['snippets_array'] = $laravel_snippets_array;

        return View::make($this->node_name.'.edit2_default_browse')
            ->with('passed_to_view_array'   ,$passed_to_view_array);    

 
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
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
 
    public function index()
    {
        //echo('index');$this->debug_exit(__FILE__,__LINE__,1);
        echo('index');$this->debug_exit(__FILE__,__LINE__,1);
        
        //var_dump($this->field_name_list_array);
       $record_type                    = "report_definition";
       $miscThings = MiscThing::where('record_type','=',$record_type)
         ->where('table_name','='    ,$this->model_table)
        ->where('node_name','='     ,$this->node_name)
        ->orderBy('report_name'     ,'asc')
        ->get();

        return view($this->node_name.'.indexReports',compact('miscThings'))
            ->with('encoded_report_description' ,json_encode($miscThings))
            ->with('node_name'                  ,$this->node_name)
            ->with('snippet_table_key_field_name',$this->snippet_table_key_field_name)
            ->with('snippet_table'                  ,$this->snippet_table)
            ;



        //echo("node_name ".$this->node_name);var_dump($db_result);$this->debug_exit(__FILE__,__LINE__,1);

        $this->debug_exit(__FILE__,__LINE__,0);
        return View::make($this->node_name.'.edit1')
        //return View::make($this->node_name.'.edit1')
            ->with('miscThings'                ,$db_result)
            ->with('encoded_report_description' ,json_encode($db_result))
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
    public function indexReports() {
       echo(' indexReports');$this->debug_exit(__FILE__,__LINE__,0);
        
        var_dump($this->node_name);
       $record_type                    = "report_definition";
       $miscThings = MiscThing::where('record_type','=',$record_type)
         ->where('table_name',  '='    ,$this->model_table)
        ->where('node_name',    '='    ,$this->node_name)
        ->orderBy('report_name','asc')
        ->get();

        return view($this->node_name.'.indexReports',compact('miscThings'))
            ->with('encoded_report_description' ,json_encode($miscThings))
            ->with('node_name'                  ,$this->node_name)
            ->with('snippet_table_key_field_name',$this->snippet_table_key_field_name)
            ->with('snippet_table'               ,$this->snippet_table)
            ;
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
