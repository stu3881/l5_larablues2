<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Input;

class ArtistController extends DEHBaseController {
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct(

        $controller_name = "ArtistController", $record_type = "table_controller", $db_database = "stu3881_main", $db_connection_name = "localhost_stu3881_main", $no_of_blank_entries = "5", $model = "Artist", $model_table = "artist", $node_name = "artist", $snippet_table = "miscThings", $snippet_table_key_field_name = "id", $backup_node = "backup_before_redirect_to_baseline", $generated_files_folder = "generated_files", $key_field_name = "artist_id", $bypassed_field_name = "not_used"
        //parm_list_start
e        //parm_list_stop
        
        /*
        $model                  = "MiscThings",
        $model_table                = "miscThings",
        $snippet_table              = "miscThings",
        $snippet_table_key_field_name       = "id",
        $node_name              = 'miscThings',
        $backup_node                = "backup_before_redirect_to_baseline",
        $generated_files_folder         = "generated_files",
            $key_field_name                 = "id",
        $bypassed_field_name            = "not_used",       
        $no_of_blank_entries            = 5
        */
            
        ) {
        parent::__construct();
        $this->beforeFilter('csrf', array('on'=>'post'));
        $this->beforeFilter('admin');
        $this->db_connection_name               = $db_connection_name;
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
        $this->view_files_prefix                = app_path()."/views/".$this->node_name;
        $this->key_field_array                  = array($this->snippet_table_key_field_name=>$this->snippet_table_key_field_name);
        $this->key_field_name_array             = array($this->snippet_table_key_field_name=>$this->snippet_table_key_field_name);
        $this->make_sure_table_snippet_exists($this->model_table);
        $this->generated_snippets_array         = $this->get_generated_snippets();
        
        // generated_snippets are arrays that are generated when the properties
        // of a report change
        //print_r($this->generated_snippets_array);exit('exit 22');
        //$this->report_nippets_array           = $this->decode_generated_snippets_by_record_type('table_snippets');
        //$this->key_field_name_array           = array($this->key_field_name=>$this->key_field_name);
        $this->required_fields_array            = $this->generated_snippets_array['required_fields_array'];

    }
    

    public function index()
    {
        //
    }


     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function indexReports(REQUEST $request) {
       $this->debug_exit(__FILE__,__LINE__,10);echo(' indexReports');
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
            ->with('encoded_record' ,json_encode($record))
            ->with('encoded_working_arrays' ,json_encode($working_arrays))
            ->with('record'                     ,$record)
            ->with('all_records'                ,$miscThings)
           
            ->with('report_key'                  ,$request->input('report_key'))
            ->with('node_name'                  ,$this->node_name)
            ->with('snippet_table_key_field_name',$this->snippet_table_key_field_name)
            ->with('snippet_table'               ,$this->snippet_table)
            ;
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
