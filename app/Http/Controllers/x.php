    public function reportDefMenuEdit(Request $request, $id,$what_we_are_doing,$coming_from){
        echo('<br>this is reportDefMenuEdit node: '.$this->node_name);
        //echo("<br>we moved it to indexReports and then reportDefMenuEdit(here)");
        //$this->debug_exit(__FILE__,__LINE__,0);
        
        //echo("<br>".'* '.$id.' * '.$what_we_are_doing.' * '.$coming_from." ** "); 

        $miscThing=MiscThing::find($id);
        
        //var_dump($miscThing);
        //echo($miscThing->modifiable_fields_array);
        $array = json_decode($miscThing->modifiable_fields_array);
        //var_dump($array);
        //echo("<br>"."right before view "); 

    switch ($what_we_are_doing) {
        case "maintain_modifiable_fields":
            $column_names_array = (array) $this->build_column_names_array($this->model_table);
            //var_dump($column_names_array);
            $ppv_array_names = array('ppv_define_query','ppv_define_business_rules');
            //$what_we_are_doing = 'displaying_advanced_edits_screen';
            $working_arrays     = $this->working_arrays_construct($miscThing,$ppv_array_names,$what_we_are_doing);

          $column_names_array = $working_arrays[$what_we_are_doing]['lookups']['field_names'];
            $index2 = $working_arrays[$what_we_are_doing]['field_name_array']['field_name'];
            $to_array = $working_arrays[$what_we_are_doing][$index2];
            $from_array = array_diff($column_names_array,$to_array);
            //$this->debug_exit(__FILE__,__LINE__,0);var_dump($to_array);
            //var_dump(Input::all());$this->debug_exit(__FILE__,__LINE__,1);
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
                    var_dump($working_arrays);$this->debug_exit(__FILE__,__LINE__,0);
                break;  

            $this->justModifiable($id, $working_arrays,$what_we_are_doing,$request);
            echo("<br>".'* '.$id.' * '.$what_we_are_doing.' * '.$coming_from." ** "); 
            //$this->debug_exit(__FILE__,__LINE__,10);
       case "maintain_browse_fields":
        case "ppv_define_query":
            $blade_routine                          = "advanced_query_getEdit_blade_gen_new";
            $blade_name                             = "_advanced_query_getEdit_blade";
            break;
        case "ppv_define_business_rules":
            $blade_routine                          = "business_rules_getEdit_blade_gen";
            $blade_name                             = "_business_rules_getEdit";
            break;
    }

       return view($this->node_name.'.reportDefMenuEdit'    ,compact('miscThing'))
        ->with('model'                            ,$this->model)
        ->with('node_name'                        ,$this->node_name)
        ->with('what_we_are_doing'                ,$what_we_are_doing)
        ->with('coming_from'                      ,$coming_from)
       ;

    //$request->input('name_of_field');
}