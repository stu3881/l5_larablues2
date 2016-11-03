<?php

namespace App\Http\Controllers;

use App\Models\MiscThing;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class MainController extends DEHBaseController
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
        $bypassed_field_name            = "",
        $record_type                    = "table_controller"
        ) {
    $this->middleware('auth');

    }

    // *** these were copied from the original MainController ***

    public function getIndex() 
    {
       $record_type                    = "table_controller";
       $this->middleware('auth');
 
        $queryx = $this->getMeTables($record_type);

        return view('main.index',compact('queryx'));
      $this->debug_exit(__FILE__,__LINE__,0);
    }

    public function getMeTables($record_type) {
      echo("getMeTables ".$record_type);
      $miscThings = MiscThing::where('record_type','=','table_controller')
      ->distinct('node_name','id')
      ->orderBy('node_name', 'asc')
      ->get();
      return $miscThings;

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
