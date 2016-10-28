<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\MiscThing;
use DB;
class MainController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
  public function __construct(  
        /*  
        $record_type                    = "table_controller", 
        //$db_connection_name             = "gohoooa_stu3881_main", 
        //$db_connection_name             = "blues_main", 
        $db_connection_name             = "", 
        $db_snippet_connection          = "",   
        $db_data_connection             = "",   

        $controller_name                = "MiscThingsController", 
        $no_of_blank_entries            = 5, 
        $model                          = "MiscThing", 
        $model_table                    = "miscThings", 
        $node_name                      = "miscThings", 
        $snippet_table                  = "miscThings", 
        $snippet_table_key_field_name   = "id", 
        $backup_node                    = "backup_before_redirect_to_baseline", 
        $generated_files_folder         = "generated_files",        
        $key_field_name                 = "id", 
        $bypassed_field_name            = "not_used"
        */
        // *******************************
        $record_type                    = "", 
        $db_connection_name             = "", 
        $db_snippet_connection          = "",   
        $db_data_connection             = "",   

        $controller_name                = "", 
        $no_of_blank_entries            = "", 
        $model                          = "", 
        $model_table                    = "miscThings", 
        $node_name                      = "main", 
        $snippet_table                  = "miscThings", 
        $snippet_table_key_field_name   = "", 
        $backup_node                    = "",  
        $generated_files_folder         = "",      
        $key_field_name                 = "", 
        $bypassed_field_name            = ""
        ) {
    $this->middleware('auth');

    }

    // *** these were copied from the original MainController ***

    public function getIndex() 
    {
        //$this->debug_exit(__FILE__,__LINE__);
        $this->middleware('auth');
        $query = $this->getMeTables("record_type");
        return View::make('main.index')
        ->with('queryx', $query);
    }

    public function getMeTables($record_type) {
        //$this->debug_exit(__FILE__,__LINE__);

        $field_name = "record_type";
       $query = DB::connection($this->db_snippet_connection)
       ->table($this->snippet_table)
       ->distinct($field_name)
       ->orderBy($field_name)
       ->get(array($field_name));
       // var_dump($query);$this->debug_exit(__FILE__,__LINE__,0);


      return $query;

        return View::make('main.index')
        ->with('query', $query);
    }

    public function getMeTablesOld($record_type) {
        //$this->debug_exit(__FILE__,__LINE__);

        $field_name = "record_type";
       $query = DB::connection($this->db_snippet_connection)
       ->table($this->snippet_table)
       ->distinct($field_name)
       ->orderBy($field_name)
       ->get(array($field_name));
       // var_dump($query);$this->debug_exit(__FILE__,__LINE__,0);

       $field_name = "record_type";
       $query = DB::connection($this->db_snippet_connection)
       ->table($this->snippet_table)
       ->distinct($field_name)
       ->orderBy($field_name)
       ->get(array($field_name));
        //var_dump($query);$this->debug_exit(__FILE__,__LINE__,0);

        $field_name = "record_type";
        $value = "database_connection";
        $query = DB::connection($this->db_snippet_connection)
        ->table($this->snippet_table)
        ->where($field_name,'=',$value)
        //->distinct($distinct)
        //->orderBy($field_name)
        //->first()
        ->get();
        //var_dump($query);$this->debug_exit(__FILE__,__LINE__,1);

        $field_name = "record_type";
        $value = "report_definition";
       $query = DB::connection($this->db_snippet_connection)
       ->table($this->snippet_table)
       ->where($field_name,'=',$value)
       //->distinct($distinct)
       ->orderBy($field_name)
       ->get();
         //var_dump($query);$this->debug_exit(__FILE__,__LINE__,1);

        $field_name = "record_type";
        $distinct = "node_name";
        $distinct = "model_table";
         
        $value = "table_controller";
       $query = DB::connection($this->db_snippet_connection)
       ->table($this->snippet_table)
       ->where($field_name,'=',$value)
        ->distinct($distinct)
       ->orderBy($distinct)
       //->get(array($field_name,$distinct));
       ->get();
       //var_dump($query);$this->debug_exit(__FILE__,__LINE__,1);
      return $query;

        return View::make('main.index')
        ->with('query', $query);
    }


    public function index()
    {
        //
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
