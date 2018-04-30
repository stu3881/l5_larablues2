<?php

namespace App\Http\Controllers;

class WorkingArray extends CRHBaseController
//class WorkingArray extends DEHBaseController
{   
    public function __construct(
        //$this->debugx('1111',__FILE__,__LINE__,__FUNCTION__);
        $working_arrays = array(),
                $buttons_in_front               = "",
        $print_orientation              = "",
        $record_type                    = "table_controller", 
        //$db_connection_name             = "blues_main", 
        $db_connection_name             = "", 
        $db_snippet_connection          = "",
        $db_data_connection             = "",
        //$snippet_table                  = "",
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
        $snippet_model                      = "",
        $store_validation_id                = 0,
        $business_rules_array               = 0,
        $project_path                       = "",
        $table_names                         = array(),
        $active_controllers                 = array(),
        $view_variables_array               = array(),
        $parm2_array                        = array(),
        $array_of_parm2_array               = array() 

        // this is designed for use with the miscThings table
        // several sub-arrays are defined for different entities
        // this wasn't always a class but i'm converting it so i can use the same thing in programmer utilities

        //moving data related stuff out of the constructor
        // ******

  /*      
        $working_arrays['groups_to_be_resized']     = array(
            'ppv_define_query'              => 'ppv_define_query',
            'ppv_define_business_rules'     => 'ppv_define_business_rules'
            ),
        $working_arrays['advanced_edit_functions']     = array(
            'maintain_modifiable_fields'    => 'maintain_modifiable_fields',
            'maintain_browse_fields'        => 'maintain_browse_fields',
            'ppv_define_query'              => 'ppv_define_query',
            'advanced_menu_fields_list'     => 'advanced_menu_fields_list',
            'ppv_define_business_rules'     => 'ppv_define_business_rules'
            ),

        $working_arrays['ppv_define_business_rules']['field_name_array'] = array(
            'field_name' => 'business_rules_field_name_array',
            'r_o'        => 'business_rules_r_o_array',
            'value'      => 'business_rules_value_array',
            'business_rules' => 'business_rules'
            );
        //var_dump($working_arrays['ppv_define_business_rules']);
        //$this->debugx('1111',__FILE__,__LINE__,__FUNCTION__);
         $working_arrays['ppv_define_business_rules']['default_values_array'] = array(
            'field_name' => 'not_used',
            'r_o'        => 'required',
            'value'      => '',
            'business_rules' => 'business_rules'
            );

        $working_arrays['advanced_menu_fields_list']['field_name_array']  = array(
            'report_name'       => 'report_name');
        $working_arrays['maintain_modifiable_fields']['field_name_array'] = array(
            'field_name'        => 'modifiable_fields_array');
        $working_arrays['maintain_modifiable_fields']['modifiable_fields_array'] = 
        json_decode($record->modifiable_fields_array);


        $working_arrays['maintain_browse_fields']['field_name_array'] = array(
            'field_name'        => 'browse_select_array');
        $working_arrays['maintain_browse_fields']['default_values_array'] = array(
            'field_name'        => $this->bypassed_field_name,);
        $working_arrays['maintain_browse_fields']['browse_select_array'] = 
        json_decode($record->browse_select_array);

//***********

//***********        

        $working_arrays['ppv_define_query']['field_name_array'] = array(
            'field_name' => 'query_field_name_array',
            'r_o'        => 'query_r_o_array',
            'value'      => 'query_value_array'
            );
        $working_arrays['ppv_define_query']['default_values_array'] = array(
            'field_name' => $this->bypassed_field_name,
            'r_o'        => '=',
            'value'      => ''
            );

       //var_dump(json_decode($record->query_field_name_array)); //var_dump($working_arrays['ppv_define_query']);
        //$this->debugx('1111',__FILE__,__LINE__,__FUNCTION__);
        //var_dump($record);
        
        $working_arrays['ppv_define_query']['query_field_name_array'] = 
        json_decode($record->query_field_name_array);
        $working_arrays['ppv_define_query']['query_r_o_array'] = 
        json_decode($record->query_r_o_array);
        $working_arrays['ppv_define_query']['query_value_array'] = 
        json_decode($record->query_value_array);
        $working_arrays['ppv_define_query']['query_r_o_array_values'] = array();
        //var_dump($working_arrays['ppv_define_query']);$this->debugx('0111',__FILE__,__LINE__,__FUNCTION__);
        //$working_arrays = $this->working_arrays_fixer($working_arrays,'ppv_define_query');
        
        if(!is_array($working_arrays['ppv_define_query']['query_field_name_array'])){
            //var_dump($record->query_field_name_array);var_dump(json_decode($record->query_field_name_array));
            //$this->debugx('1111',__FILE__,__LINE__,__FUNCTION__);
            echo("count xxx".count($working_arrays['ppv_define_query']['query_field_name_array'])); 

            var_dump($working_arrays['ppv_define_query']);$this->debugx('0111',__FILE__,__LINE__,__FUNCTION__);

            $working_arrays = $this->working_arrays_fixer($working_arrays,'ppv_define_query');
            //$this->debug_exit(__FILE__,__LINE__,10);
        }
        else{
            //var_dump($working_arrays);
            //$this->debugx('0111',__FILE__,__LINE__,__FUNCTION__);
            //var_dump($working_arrays['ppv_define_query']['query_field_name_array']);
            ;
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
       //$this->debugx('1111',__FILE__,__LINE__,__FUNCTION__);


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
        //return($working_arrays);
    }
    */

        )
        {
        
        //parent::__construct();
        $this->db_snippet_connection           = $db_snippet_connection;
        //$this->debug_exit(__FILE__,__LINE__,0); echo(" entering constructor");

        //$snippet_table = "miscThings";
        //$defaultConnection = "localhost_stu3881_main";
        //$queryx = $this->get_db_connection_data($snippet_table,$defaultConnection);

        //$this->beforeFilter('csrf', array('on'=>'post'));
        //$this->beforeFilter('admin');
        $this->working_arrays                  = $working_arrays;
        $this->working_arrays['groups_to_be_resized']     = array(
            'ppv_define_query'              => 'ppv_define_query',
            'ppv_define_business_rules'     => 'ppv_define_business_rules'
            );

        //$this->generated_snippets_array        = $this->get_generated_snippets();


    }


    public function move_from_constructor($entity) {
        $this->generated_snippets_array         = $this->get_generated_snippets();

    }




     public function working_arrays_construct($record,$what_we_are_doing) {
        //echo("working_arrays_construct");
        // $working_arrays contains some handy grouping of data and arrays we need for various things
       
        $working_arrays     = $this->working_arrays_define($record);
        //var_dump($working_arrays);  $this->debugx('1111',__FILE__,__LINE__,__FUNCTION__);

         $working_arrays     = $this->working_arrays_populate($working_arrays,$record);
          
        $column_names       = $this->build_column_names_array($this->model_table);
        
        $working_arrays     = $this->working_arrays_populate_lookups($working_arrays,$column_names);

          //return $working_arrays;
        //echo($what_we_are_doing);var_dump($working_arrays);$this->debugx('0100',__FILE__,__LINE__,__FUNCTION__);
        //$working_arrays     = $this->working_arrays_pad_rows_for_growth($working_arrays);
            switch ($what_we_are_doing) { 
                case "klone_record":
                    $this->debugx('1100',__FILE__,__LINE__,__FUNCTION__);
                    //$this->kloneRecord($id);                     
                    break;
                case "edit2_default_add":
                case "edit2new":
                case "edit2_default_edit":
                case "editing_a_data_record":
                     break;
                 }
         //var_dump($working_arrays);  $this->debugx('1111',__FILE__,__LINE__,__FUNCTION__);
         return $working_arrays;
    }

      



    public function working_arrays_fixer($working_arrays,$what_we_are_doing) {
        
        //foreach ($ppv_array_names as $what_we_are_doing){
        switch ($what_we_are_doing) {
           case "ppv_define_query":
            $pad_ctr = 5;
            $working_arrays = $this->working_arrays_pad_rows_for_growth($working_arrays,$pad_ctr) ;
            //echo(count($working_arrays['ppv_define_query']['query_field_name_array']));
 
           //var_dump($working_arrays ['ppv_define_query']);
           //$this->debugx('0111',__FILE__,__LINE__,__FUNCTION__);

            //var_dump($working_arrays ['ppv_define_query']);$this->debugx('1111',__FILE__,__LINE__,__FUNCTION__);
                break;
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


    public function working_arrays_pad_rows_for_growth($working_arrays,$pad_ctr) {
            
            echo(count($working_arrays['ppv_define_query']['query_field_name_array']));

        //echo('<br><br>'.'working_arrays_pad_rows_for_growth');$this->debug_exit(__FILE__,__LINE__,0);
        foreach ($working_arrays['groups_to_be_resized']as $group_to_be_padded){
            // hard coded in working_arrays currently contains
            // 'ppv_define_query'     
            // 'ppv_define_business_rules'  
           
            $working_arrays = $this->working_arrays_pad_specific_group($working_arrays,$group_to_be_padded,$pad_ctr);
         }
       return $working_arrays;
    }



    public function working_arrays_set_pad_ctr($working_arrays,$array_group_to_be_padded ) {
        // this is setting the padding at the end of the form so there's always room for growth
        // it's more complicated because the size of one array dictates the size of all three
//$this->bypassed_field_name 
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
                //$this->debugx('1111',__FILE__,__LINE__,__FUNCTION__);
                //var_dump($working_arrays[$array_group_to_be_padded][$specific_array_name]);
                //* now we need to set pad ctr

                // *****
                // loop thru assuring proper defaults
                // *****
                //var_dump($working_arrays[$array_group_to_be_padded]['field_name_array']);
                // $working_arrays[$array_group_to_be_padded]['field_name_array'] 
                // currently contains
                // case "field_name":
                // case "r_o":
                // case "value":                                

                foreach($working_arrays[$array_group_to_be_padded]['field_name_array'] as 
                        $index=>$actual_array_name) {
                       switch ($index) {
                            case "field_name":
                               foreach(
                                    $working_arrays[$array_group_to_be_padded][$actual_array_name] as 
                                    $index=>$field_value) {
                                    if ($field_value == $this->bypassed_field_name) {
                                            $pad_ctr = $pad_ctr -1;
                                        } // end of ield names
                                 }
                                break;
                            case "r_o":
                            case "value":                                
                                break;
                       } // switch   
                }

                for ($i=0; $i<($pad_ctr); $i++){
                    // for each entry we're going to insert
                    foreach($working_arrays[$array_group_to_be_padded]['field_name_array'] as 
                        $index=>$actual_array_name) {
                        // the field_name_arrays contain the same fields
                        // the same array names at different levels
                        // they contain lists of different names

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
          var_dump($working_arrays);$this->debugx('1111',__FILE__,__LINE__,__FUNCTION__);
        
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
        //$this->debug_exit(__FILE       __,__LINE__array_of_parm2_array,10);


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






    public function xworking_arrays_construct($record,$what_we_are_doing) {
        //echo("working_arrays_construct");
        // $working_arrays contains some handy grouping of data and arrays we need for various things
       
        $working_arrays     = $this->working_arrays_define($record);
        //var_dump($working_arrays);  $this->debugx('1111',__FILE__,__LINE__,__FUNCTION__);

         $working_arrays     = $this->working_arrays_populate($working_arrays,$record);
          
        $column_names       = $this->build_column_names_array($this->model_table);
        
        $working_arrays     = $this->working_arrays_populate_lookups($working_arrays,$column_names);

          //return $working_arrays;
        //echo($what_we_are_doing);var_dump($working_arrays);$this->debugx('0100',__FILE__,__LINE__,__FUNCTION__);
        //$working_arrays     = $this->working_arrays_pad_rows_for_growth($working_arrays);
            switch ($what_we_are_doing) { 
                case "klone_record":
                    $this->debugx('1100',__FILE__,__LINE__,__FUNCTION__);
                    //$this->kloneRecord($id);                     
                    break;
                case "edit2_default_add":
                case "edit2new":
                case "edit2_default_edit":
                case "editing_a_data_record":
                     break;
                 }
         //var_dump($working_arrays);  $this->debugx('1111',__FILE__,__LINE__,__FUNCTION__);
         return $working_arrays;
    }

      
    public function working_arrays_define($record) {
        //echo("working_arrays_define");
        //var_dump($record);
        //$this->debugx('1111',__FILE__,__LINE__,__FUNCTION__);
        $working_arrays = array();
        //$requestFieldsArray=$record->all(); // important!!

        //$working_arrays['maintain_modifiable_fields']['field_name']   = 'modifiable_fields_array';
        //$working_arrays['maintain_modifiable_fields'][]               = 'modifiable_fields_array';
        //* ******
        // "groups_to_be_resized" lists arrays that need room for growth.
        // queries and business rules can grow and differ widely from one query (or rule) to 
        //another they need to be loaded first and padded with some room for growth
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

       //var_dump(json_decode($record->query_field_name_array)); //var_dump($working_arrays['ppv_define_query']);
        //$this->debugx('1111',__FILE__,__LINE__,__FUNCTION__);
        //var_dump($record);
        
        $working_arrays['ppv_define_query']['query_field_name_array'] = 
        json_decode($record->query_field_name_array);
        $working_arrays['ppv_define_query']['query_r_o_array'] = 
        json_decode($record->query_r_o_array);
        $working_arrays['ppv_define_query']['query_value_array'] = 
        json_decode($record->query_value_array);
        $working_arrays['ppv_define_query']['query_r_o_array_values'] = array();
        //var_dump($working_arrays['ppv_define_query']);$this->debugx('0111',__FILE__,__LINE__,__FUNCTION__);
        //$working_arrays = $this->working_arrays_fixer($working_arrays,'ppv_define_query');
        
        if(!is_array($working_arrays['ppv_define_query']['query_field_name_array'])){
            //var_dump($record->query_field_name_array);var_dump(json_decode($record->query_field_name_array));
            //$this->debugx('1111',__FILE__,__LINE__,__FUNCTION__);
            echo("count xxx".count($working_arrays['ppv_define_query']['query_field_name_array'])); 
            /*
            $working_arrays['ppv_define_query']['query_field_name_array'] = 
            json_decode($record->query_field_name_array);

            $working_arrays['ppv_define_query']['query_r_o_array'] = 
            json_decode($record->query_r_o_array);
            $working_arrays['ppv_define_query']['query_value_array'] = 
            json_decode($record->query_value_array);
            */
            var_dump($working_arrays['ppv_define_query']);$this->debugx('0111',__FILE__,__LINE__,__FUNCTION__);

            $working_arrays = $this->working_arrays_fixer($working_arrays,'ppv_define_query');
            //$this->debug_exit(__FILE__,__LINE__,10);
        }
        else{
            //var_dump($working_arrays);
            //$this->debugx('0111',__FILE__,__LINE__,__FUNCTION__);
            //var_dump($working_arrays['ppv_define_query']['query_field_name_array']);
            ;
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
       //$this->debugx('1111',__FILE__,__LINE__,__FUNCTION__);

        $working_arrays['ppv_define_business_rules']['field_name_array'] = array(
            'field_name' => 'business_rules_field_name_array',
            'r_o'        => 'business_rules_r_o_array',
            'value'      => 'business_rules_value_array',
            'business_rules' => 'business_rules'
            );
        //var_dump($working_arrays['ppv_define_business_rules']);
        //$this->debugx('1111',__FILE__,__LINE__,__FUNCTION__);
         $working_arrays['ppv_define_business_rules']['default_values_array'] = array(
            'field_name' => 'not_used',
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




     /**
     * write_file_from_string
     *
     */

    public function write_file_from_string($file_name,$file_as_string) {
        //$this->debug0(__FILE__,__LINE__,__FUNCTION__);
        if (is_file($file_name)){
            unlink($file_name); // delete it
        }
        $handle = fopen($file_name, "w");
        fwrite($handle, $file_as_string);
    }


    
}
        //$requestFieldsArray=$record->all(); // important!!

        //$working_arrays['maintain_modifiable_fields']['field_name']   = 'modifiable_fields_array';
        //$working_arrays['maintain_modifiable_fields'][]               = 'modifiable_fields_array';
        //* ******
        // "groups_to_be_resized" lists arrays that need room for growth.
        // queries and business rules can grow and differ widely from one query (or rule) to 
        //another they need to be loaded first and padded with some room for growth
        //
        // no more or no less than $this->no_of_blank_entries 
        // default values padded onto the end
        //
        // even though we have relational operators and values arrays to worry about,
        // this drives off the number of field_names = to $bypassed_field_name on the end of the array
        // the array indexes get defined here but the working_arrays_pad_rows_for_growth
        // originally we did it just for who you were but not, it seems easiest to size them after we get // the existing arrays. 
        // ******