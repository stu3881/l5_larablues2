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

    public function browseEdit($id) {
        
         echo("browseEdit<br>");
        var_dump($id);
        //$this->debug_exit(__FILE__,__LINE__,0);
       // $report_definition  = $this->execute_query_by_report_no($id);
       $report_definition = MiscThing::where('id','=',$id)
          ->get();
        var_dump($report_definition[0]);$this->debug_exit(__FILE__,__LINE__,10);

        $miscThings = MiscThing::where($this->snippet_table_key_field_name, '=', $id)
        ->get();
        //var_dump($miscThings[0]);$this->debug_exit(__FILE__,__LINE__,10);
       $encoded_business_rules_field_name_array = array();
        $field_names_array = array();

        if ($miscThings){
            $passed_to_view_array = build_report_def_arrays($miscThings);
             return view('miscThings.edit2_default_browse',compact('miscThings'))
                ->with('model_table'                ,$this->model_table)
                ->with('generated_files_folder'    , $this->generated_files_folder)
                ->with('report_key'    , $id)
                ->with('field_names_array'    , $field_names_array)
                ->with('key_field_name'    , 'id')
                ->with('encoded_business_rules_field_name_array'    , $encoded_business_rules_field_name_array)
                ->with('passed_to_view_array'    , $passed_to_view_array)
                ->with('node_name'                  ,$this->node_name);
         return view('miscThings.edit2_default_browse',$miscThings);
        }
        else {
            echo 'you have a fatal error<br>';
            $this->debug_exit(__FILE__,__LINE__,1);
        }
         $report_definition  = $this->execute_query_by_report_no($id);
        //var_dump($report_definition[0]);       
       return view('miscThings.edit2_default_browse',$report_definition);
    }

    /**
     * get data necessary for reporting and load it into a single array
     * copied from putEdit2new
     *
     * @return array
     */

    public function build_report_def_arrays() {
        echo("build_report_def_arrays");$this->debug_exit(__FILE__,__LINE__,0);
        //var_dump(Input::all());
       switch ($what_we_are_doing) { 
            case "editing_a_data_record":
                //var_dump(Input::all()); $this->debug_exit(__FILE__,__LINE__,1);
                $report_definition  = $this->execute_query_by_report_no(Input::get('report_key'));
                $modifiable_fields_array = $this->decode_object_field_to_array($report_definition[0],'modifiable_fields_array');

                //$arrr0 = $this->gen_lookup_name_value_array_data($this->model_table);
                $lookups_array['field_name'] = $this->build_column_names_array($this->model_table);

                //var_dump($lookups_array); $this->debug_exit(__FILE__,__LINE__,0);

                $xxx_array = $this->gen_lookup_name_value_array_datax($this->model_table);
                //$lookups_array = $this->gen_lookup_name_value_array_datax('shows');
                $lookups_array = array_merge($lookups_array,$xxx_array);
                //var_dump(Input::all());var_dump($lookups_array); $this->debug_exit(__FILE__,__LINE__,1);
                //$data = $db_result[0];
                $data = "";
                $db_result  = $this->refresh_data_record_if_adding($what_we_are_doing,$data,$modifiable_fields_array); 

                //var_dump($modifiable_fields_array);
                //var_dump($lookups_array);
                //var_dump($db_result);$this->debug_exit(__FILE__,__LINE__,01);

                $snippet_string = $this->modifiable_fields_view_snippet_str_gen($modifiable_fields_array,
                    $lookups_array,$db_result[0]);

                $fnam = $this->view_files_prefix."/".$this->generated_files_folder."/".Input::get('report_key').'_snippet_string.blade.php';
                $this->add_delete_add_file_as_string($fnam,$this->modifiable_fields_view_snippet_str_gen($modifiable_fields_array,
                    $lookups_array,$db_result[0]));

                $strx       = json_encode($db_result);
                //$db_result = json_encode($db_result);
                //$db_result = json_decode($db_result,1);
                //echo "<br><br>".$snippet_string;$this->debug_exit(__FILE__,__LINE__,1);
                //var_dump($snippet_string);var_dump($db_result); $this->debug_exit(__FILE__,__LINE__,1);
                
                $passed_to_view_array = array();
                //$passed_to_view_array['input'] = 'x';
                //$passed_to_view_array['input']                = Input::all();
                $passed_to_view_array['encoded_modifiable_fields_array'] = json_encode($modifiable_fields_array);
                $passed_to_view_arra2newy['data_key']                       = Input::get('data_key');
                $passed_to_view_array['encoded_input']                  = Input::get('encoded_input');
                $passed_to_view_array['snippet_name']                   ='_modifiable_fields_getEdit_snippet';
                $passed_to_view_array['report_definition']              = $report_definition[0];
                $passed_to_view_array['record']                         = $db_result[0];
                $passed_to_view_array['encoded_report_definition']      = json_encode($report_definition[0]);       
                $passed_to_view_array['snippet_string']                 = $snippet_string;      
                $passed_to_view_array['lookups_array']                  = $lookups_array;       
            default:
                $this->debug_exit(__FILE__,__LINE__,1);
                break;
            }
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
    public function execute_query_by_report_no($report_no) {
        //echo 'execute_query_by_report_no'.$report_no;//exit("exit");
        //var_dump(Input::all());       
    
      $response_array = MiscThing::where($this->snippet_table_key_field_name, '=', $report_no)
        ->get();

        if ($response_array){
            return $response_array;
        }
        else {
            echo 'you have a fatal error<br>';
            $this->debug_exit(__FILE__,__LINE__,1);
        }
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
 
    public function index(){
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
