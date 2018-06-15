<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Schema;
use DB;

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
        $pad_ctr                        = 5, 
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


        )
        {
        
        //parent::__construct();
        $this->db_snippet_connection           = $db_snippet_connection;
        //$this->debug_exit(__FILE__,__LINE__,0); echo(" entering constructor");
        $this->pad_ctr                          = $pad_ctr;
        //$snippet_table = "miscThings";

        //$this->beforeFilter('csrf', array('on'=>'post'));
        //$this->beforeFilter('admin');
        $this->working_arrays                  = $working_arrays;
        $this->working_arrays['groups_that_get_padded']     = array(
            //'ppv_define_query'              => 'ppv_define_query',
            'maintain_query_joins'          => 'maintain_query_joins',
            'ppv_define_query'              => 'ppv_define_query',
            'ppv_define_business_rules'     => 'ppv_define_business_rules'
            );

        //$this->generated_snippets_array        = $this->get_generated_snippets();


    }


    public function move_from_constructor($entity) {
        $this->generated_snippets_array         = $this->get_generated_snippets();

    }

      
    public function working_arrays_assign_from_data($working_arrays,$record,$bypassed_field_name) {
        //echo("working_arrays_assign_from_data");
         //$bypassed_field_name = $bypassed_field_name;
        //var_dump($record);
        //$this->debugx('1111',__FILE__,__LINE__,__FUNCTION__);
        //$requestFieldsArray=$record->all(); // important!!

        //$working_arrays['maintain_modifiable_fields']['field_name']   = 'modifiable_fields_array';
        //$working_arrays['maintain_modifiable_fields'][]               = 'modifiable_fields_array';
        //* ******
        // "groups_that_get_padded" lists arrays that need room for growth.
        // queries and business rules can grow and differ widely from one query (or rule) to 
        //another they need to be loaded first and padded with some room for growth
        //
        // no more or no less than $this->no_of_blank_entries 
        // default values padded onto the end
        //
        // even though we have relational operators and values arrays to worry about,
        // this drives off the number of field_names = to $bypassed_field_name on the end of the array
        
        // originally we did it just for who you were but not, it seems easiest to size them after we get // the existing arrays. 
        // ****** 
        $working_arrays['groups_that_get_padded']     = array(
            //'ppv_define_query'              => 'ppv_define_query',
            'maintain_query_joins'          => 'maintain_query_joins',
            'ppv_define_query'              => 'ppv_define_query',
            'ppv_define_business_rules'     => 'ppv_define_business_rules'
            );
        $working_arrays['advanced_edit_functions']     = array(
            'maintain_modifiable_fields'    => 'maintain_modifiable_fields',
            'maintain_browse_fields'        => 'maintain_browse_fields',
            'ppv_define_query'              => 'ppv_define_query',
            'advanced_menu_fields_list'     => 'advanced_menu_fields_list',
            'maintain_query_joins'          => 'maintain_query_joins',
 
            'ppv_define_business_rules'     => 'ppv_define_business_rules'
            );
        $working_arrays['advanced_menu_fields_list']['field_name_array']  = array(
            'report_name'       => 'report_name'
            );

        $working_arrays['maintain_modifiable_fields']['field_name_array'] = array(
            'field_name'        => 'modifiable_fields_array');
        $working_arrays['maintain_modifiable_fields']['default_values_array'] = array(
            'field_name'        => $bypassed_field_name,
            );
        //var_dump($record);exit();


        $working_arrays['maintain_modifiable_fields']['modifiable_fields_array'] = 
        json_decode($record->modifiable_fields_array);


        $working_arrays['maintain_browse_fields']['field_name_array'] = array(
            'field_name'        => 'browse_select_array');
        $working_arrays['maintain_browse_fields']['default_values_array'] = array(
            'field_name'        => $bypassed_field_name,);
        $working_arrays['maintain_browse_fields']['browse_select_array'] = 
        json_decode($record->browse_select_array);






          
                //$column_names_array = (array) $this->build_column_names_array($this->model_table);
                //var_dump($working_arrays[$what_we_are_doing]);$this->debug_exit(__FILE__,__LINE__,10);
 
                $tarray = array();
                $tarray[] = $bypassed_field_name;
                $tarray[] = $bypassed_field_name;
                $tarray[] = $bypassed_field_name;
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

// maintain_query_joins

        $working_arrays['maintain_query_joins']['data']['joins_join_type_array'] = 
        json_decode($record->joins_join_type_array);
        $working_arrays['maintain_query_joins']['data']['joins_joinee_table_names_array'] = 
        json_decode($record->joins_joinee_table_names_array);
        $working_arrays['maintain_query_joins']['data']['joins_field_name_array'] = 
        json_decode($record->joins_field_name_array);
        $working_arrays['maintain_query_joins']['data']['joins_r_o_array'] = 
        json_decode($record->joins_r_o_array);
        $working_arrays['maintain_query_joins']['data']['joins_value_array'] = 
        json_decode($record->joins_value_array);

        $working_arrays['maintain_query_joins']['field_name_array'] = array(
            'join_types'            => 'joins_join_type_array',
            'joinor_field_names'    => 'joins_joinee_field_name_array',
            'joinee_table_names'    => 'joins_joinor_field_name_array',
            'joinee_field_names'    => 'joins_r_o_array',
            'joins_r_o_array'       => 'joins_value_array',
            );

/*
        $working_arrays['maintain_query_joins']['field_name_array'] = array(
            'join_types'            => 'join_types',
            'joinor_field_names'    => 'joinor_field_names',
            'joinee_table_names'    => 'joinee_table_names',
            'joinee_field_names'    => 'joinee_field_names',
            'joins_r_o_array'       => 'joins_r_o_array',
            );
*/
        $working_arrays['maintain_query_joins']['field_type_array'] = array(
            'join_types'            => 'select',
            'joinor_field_names'    => 'select',
            'joinee_table_names'    => 'select',
            'joinee_field_names'    => 'select',
            'joins_r_o_array'       => 'select',
            );

        $working_arrays['maintain_query_joins']['lookups'] = array(
            'join_types'            => 'join_types',
            'joinor_field_names'    => 'joinor_field_names',
            'joinee_table_names'    => 'joinee_table_names',
            'joinee_field_names'    => 'joinee_field_names',
            'joins_r_o_array'       => 'joins_r_o_array',
            );
   
        $working_arrays['maintain_query_joins']['default_values_array'] = array(
            'join_types'             => 'not_used',
            'joinor_field_names'    => 'not_used',
            'joinee_table_names'    => 'not_used',
            'joinee_field_names'    => 'not_used',
            'joins_r_o_array'       => '=',
            );

        // ppv_define_query

        // ************
        $working_arrays['ppv_define_query']['data']['query_field_name_array'] = 
        json_decode($record->query_field_name_array);
        $working_arrays['ppv_define_query']['data']['query_r_o_array'] = 
        json_decode($record->query_r_o_array);
        $working_arrays['ppv_define_query']['data']['query_value_array'] = 
        json_decode($record->query_value_array);
        $working_arrays['ppv_define_query']['data']['query_r_o_array_values'] = array();

        $working_arrays['ppv_define_query']['field_name_array'] = array(
            'field_name' => 'query_field_name_array',
            'r_o'        => 'query_r_o_array',
            'value'      => 'query_value_array'
            );
        $working_arrays['ppv_define_query']['default_values_array'] = array(
            'field_name' => $bypassed_field_name,
            'r_o'        => '=',
            'value'      => ' '
            );

       //var_dump(json_decode($record->query_field_name_array)); //var_dump($working_arrays['ppv_define_query']);
        //$this->debugx('1111',__FILE__,__LINE__,__FUNCTION__);
        //var_dump($record);
        
        //var_dump($working_arrays['ppv_define_query']);$this->debugx('0111',__FILE__,__LINE__,__FUNCTION__);
       
        
        if(!is_array($working_arrays['ppv_define_query']['data']['query_field_name_array'])){
            //var_dump($record->query_field_name_array);var_dump(json_decode($record->query_field_name_array));
            //$this->debugx('1111',__FILE__,__LINE__,__FUNCTION__);
            echo("count xxx".count($working_arrays['ppv_define_query']['data']['query_field_name_array'])); 

            var_dump($working_arrays['ppv_define_query']);$this->debugx('0111',__FILE__,__LINE__,__FUNCTION__);

        }
        else{
            //var_dump($working_arrays);
            //$this->debugx('0111',__FILE__,__LINE__,__FUNCTION__);
            //var_dump($working_arrays['ppv_define_query']['data']['query_field_name_array']);
            ;
            // translate old ro_array from index to values
            $query_relational_operators_array = $this->build_query_relational_operators_array();
            foreach ($working_arrays['ppv_define_query']['data']['query_r_o_array'] as $index=>$value){
                if (is_numeric($value)) {
                    $working_arrays['ppv_define_query']['data']['query_r_o_array_values'][] =
                    $query_relational_operators_array[$value];
                }
            }
        }
        //echo("<br>"$value."*".". $query_relational_operators_array[$value]);
        //var_dump($working_arrays['ppv_define_query']);$this->debug_exit(__FILE__,__LINE__,10);
       //$this->debugx('1111',__FILE__,__LINE__,__FUNCTION__);
        $working_arrays['ppv_define_business_rules']['data']['business_rules_field_name_array'] = 
        json_decode($record->business_rules_field_name_array);
        $working_arrays['ppv_define_business_rules']['data']['business_rules_r_o_array'] = 
        json_decode($record->business_rules_r_o_array);
        $working_arrays['ppv_define_business_rules']['data']['business_rules_value_array'] = 
        json_decode($record->business_rules_value_array);
        $working_arrays['ppv_define_query']['business_rules_r_o_array_values'] = array();

        $working_arrays['ppv_define_business_rules']['field_name_array'] = array(
            'field_name' => 'business_rules_field_name_array',
            'r_o'        => 'business_rules_r_o_array',
            'value'      => 'business_rules_value_array',
            'business_rules' => 'business_rules'
            );
        //var_dump($working_arrays['ppv_define_business_rules']);
        //$this->debugx('1111',__FILE__,__LINE__,__FUNCTION__);
         $working_arrays['ppv_define_business_rules']['default_values_array'] = array(
            'field_name'    => 'not_used',
            'r_o'           => 'required',
            'value'         => '',
            'business_rules' => ''
            );

        //$query_relational_operators_array = $this->build_query_relational_operators_array();
        //foreach ($working_arrays['ppv_define_query']['business_rules_r_o_array'] as $index=>$value){
       //    $working_arrays['ppv_define_query']['business_rules_r_o_array_values'][] =
        //    $query_relational_operators_array[$value];
        //}

        //var_dump($working_arrays );$this->debug_exit(__FILE__,__LINE__,1);
        return($working_arrays);
    }


     public function working_arrays_initialize($record,$what_we_are_doing,$bypassed_field_name,$model_table) {
        //echo("working_arrays_initialize");
        // $working_arrays contains some handy grouping of data and arrays we need for various things
        //var_dump($working_arrays);  $this->debugx('1111',__FILE__,__LINE__,__FUNCTION__);
        $working_arrays = array();
        $working_arrays     = $this->working_arrays_assign_from_data($working_arrays,$record,$bypassed_field_name);
        //var_dump($working_arrays[$what_we_are_doing]);$this->debugx('1111',__FILE__,__LINE__,__FUNCTION__);

        $working_arrays     = $this->working_arrays_populate($working_arrays,$record);
        $column_names       = $this->build_column_names_array($model_table);
        //var_dump($working_arrays);$this->debugx('1111',__FILE__,__LINE__,__FUNCTION__);
        //$working_arrays     = $this->working_arrays_populate_lookups($working_arrays,$column_names,$bypassed_field_name);
        //var_dump($working_arrays);  $this->debugx('0111',__FILE__,__LINE__,__FUNCTION__);
        $working_arrays     = $this->working_arrays_populate_lookups_new($what_we_are_doing,$working_arrays,$model_table);
        //var_dump($working_arrays);$this->debugx('1111',__FILE__,__LINE__,__FUNCTION__);
        $working_arrays = 
            $this->working_arrays_pad_for_growth($working_arrays,$this->pad_ctr,$bypassed_field_name);
         return $working_arrays;
    }


    public function working_arrays_pad_for_growth($working_arrays,$pad_ctr,$bypassed_field_name) {
        //var_dump($working_arrays);  $this->debugx('1111',__FILE__,__LINE__,__FUNCTION__);
        foreach ($working_arrays['groups_that_get_padded']as $group_to_be_padded){
            echo("</br>   * ".$group_to_be_padded."</br>");$this->debugx('0111',__FILE__,__LINE__,__FUNCTION__);
            //var_dump($working_arrays [$group_to_be_padded]['field_name_array']);
            var_dump($working_arrays [$group_to_be_padded]);
            $pad_ctr = $this->working_arrays_set_pad_ctr($pad_ctr,$working_arrays,$group_to_be_padded );
            $working_arrays = $this->working_arrays_pad_group($working_arrays,$group_to_be_padded,$pad_ctr,$bypassed_field_name);
         }
        return $working_arrays;
            //$this->debugx('1111',__FILE__,__LINE__,__FUNCTION__);
    }

    public function working_arrays_set_pad_ctr($pad_ctr,$working_arrays,$group_to_be_padded ) {
        //print_r( $working_arrays[$group_to_be_padded]['field_name_array']);$this->debugx('1110',__FILE__,__LINE__,__FUNCTION__);
        foreach($working_arrays[$group_to_be_padded]['field_name_array'] as 
            $generic_array_name=>$specific_array_name) {
            $this->debugx('0100',__FILE__,__LINE__,__FUNCTION__);echo(' '.$generic_array_name."**".$specific_array_name);var_dump($working_arrays[$group_to_be_padded]['field_name_array'][$generic_array_name]);
            //echo( $working_arrays[$group_to_be_padded]['default_values_array'][$generic_array_name]);
            $bypassed_field_name = $working_arrays[$group_to_be_padded]['default_values_array'][$generic_array_name];
            //echo($bypassed_field_name." bypassed_field_name");

            //if(is_null($working_arrays[$group_to_be_padded][$generic_array_name])){
           if(is_null($working_arrays[$group_to_be_padded]['data'][$specific_array_name])){
                //$working_arrays['maintain_query_joins']['data']['joins_join_type_array'] = 
                //echo('$pad_ctr'.$pad_ctr);$this->debugx('0111',__FILE__,__LINE__,__FUNCTION__);
              return $pad_ctr;
            }
            else{
                //var_dump( $working_arrays[$group_to_be_padded]['default_values_array']);
                //var_dump( $working_arrays[$group_to_be_padded]['data'][$generic_array_name]);
                foreach($working_arrays[$group_to_be_padded]['data'][$specific_array_name] as 
                $index=>$value) {
                    if ($value == $bypassed_field_name){
                        $pad_ctr -= 1;
                        //echo('<br>'.'found pad');$this->debug_exit(__FILE__,__LINE__,0);
                    }
                    
                } // end for
                return $pad_ctr;
            }
        }

        //var_dump($pad_ctr);$this->debugx('1110',__FILE__,__LINE__,__FUNCTION__);      
    }

    public function working_arrays_pad_group($working_arrays,$group_to_be_padded,$pad_ctr,$bypassed_field_name) {
        //['da']
        //var_dump($working_arrays[$group_to_be_padded]['default_values_array']);
        //var_dump($working_arrays[$group_to_be_padded]['data']);//$this->debugx('1110',__FILE__,__LINE__,__FUNCTION__);
        foreach($working_arrays[$group_to_be_padded]['field_name_array'] as 
            $generic_array_name=>$specific_array_name) {
            echo($generic_array_name.$specific_array_name);
            //var_dump($working_arrays[$group_to_be_padded]['data'][$generic_array_name]);
            $working_arrays[$group_to_be_padded]['data'][$generic_array_name] = array();
            $working_arrays[$group_to_be_padded]['data'][$specific_array_name][] =
                $working_arrays[$group_to_be_padded]['default_values_array'][$generic_array_name];
        }  
        return $working_arrays;
    } 
          
    public function working_arrays_populate_lookups_new($what_we_are_doing,$working_arrays,$model_table) {
        //$schema = DB::getDoctrineSchemaManager();
        //$columns = Schema::getColumnListing($link_parms_array['node_name']);
        //$this->debugx('0110',__FILE__,__LINE__,__FUNCTION__);

        switch ($what_we_are_doing) { 

        case "maintain_modifiable_fields":
        case "maintain_browse_fields":  
            break;

        case "ppv_define_query":
        case "ppv_define_business_rules":
            break;
        case "maintain_query_joins":

/*        $working_arrays['maintain_query_joins']['lookups'] = array(
            'join_types'             => 'join_types',
            'joinor_field_names'    => 'joinor_field_names',
            'joinee_table_names'    => 'joinee_table_names',
            'joinee_field_names'    => 'joinee_field_names',
            'joins_r_o_array'       => 'joins_r_o_array',
            );
 */
            $schema = DB::getDoctrineSchemaManager();
            //var_dump($working_arrays[$what_we_are_doing]['field_name_array'] );
            //var_dump($working_arrays[$what_we_are_doing]['lookups'] );
            //echo('<br/>');$this->debugx('0110',__FILE__,__LINE__,__FUNCTION__);
            foreach ($working_arrays[$what_we_are_doing]['lookups'] as $key => $value) {
            //foreach ($working_arrays[$what_we_are_doing]['field_name_array'] as $key => $value) {
                
                switch ($key) { 
                    case "join_types":
                        $array = array('not_used','normal','left','right');
                        $array = array_combine(array_values($array),array_values($array));
                        $working_arrays[$what_we_are_doing]['lookups'] [$key] = $array;
                        break;
                    case "joinor_field_names":
                        $columns = Schema::getColumnListing($model_table);
                        $columns = 
                        array_combine(array_values($columns),array_values($columns));

                        $working_arrays[$what_we_are_doing]['lookups'] [$key] = $columns;
                         break;
                   case "joinee_table_names":
                        $table_names = $this->generic_method_get_table_names();
                        $table_names = array_combine(array_values($table_names),array_values($table_names));
                        $working_arrays[$what_we_are_doing]['lookups'] [$key] = $table_names;
                        break;
                    case "joinee_field_names":
                        $columns = Schema::getColumnListing($model_table);
                        $columns = array_combine(array_values($columns),array_values($columns));
                        $working_arrays[$what_we_are_doing]['lookups'] [$key] = $columns;
                        break;
                     case "joins_r_o_array":
                        $join_ro_arrays = array('=','<>','<','>','<=','>=');
                        $table_names = array_combine(array_values($join_ro_arrays),array_values($join_ro_arrays));
                        $working_arrays[$what_we_are_doing]['lookups'] [$key] = $table_names;
                        //$columns = Schema::getColumnListing($this->model_table);
                        //$columns = array_combine(array_values($columns),array_values($columns));
                       break;
                    }
            }
            break;
        }
        //var_dump($working_arrays[$what_we_are_doing]['lookups'] );

        return $working_arrays;
    }



        public function working_arrays_populate_lookups($working_arrays,$columns,$bypassed_field_name) {
            $working_arrays['maintain_query_joins']['lookups']['relational_operators'] = 
            array('=','<>','<','>','<=','>=');

            $working_arrays['maintain_modifiable_fields']['lookups']['field_names'] = $columns;
            $working_arrays['maintain_browse_fields']['lookups']['field_names']     = $columns;
            $a = array_merge(array($bypassed_field_name=>$bypassed_field_name),  $columns);
            $working_arrays['ppv_define_query']['lookups']['field_names'] = array_values($a);
            //var_dump(array_values($a) );$this->debug_exit(__FILE__,__LINE__,1);

            $query_relational_operators_array = $this->build_query_relational_operators_array();
            // just to make the name shorter
            $working_arrays['ppv_define_query']['lookups']['relational_operators']  = $query_relational_operators_array;
            $working_arrays['ppv_define_query']['lookups']['columns_w_bypass']                       =  
                array_merge(array($bypassed_field_name=>$bypassed_field_name),  $columns);
            $working_arrays['ppv_define_query']['lookups']['query_relational_operators_array'] = $query_relational_operators_array;

            $business_rules_relational_operators = $this->build_business_rules_relational_operators();
            $working_arrays['ppv_define_business_rules']['lookups']['field_names']          = 
                array_merge(array($bypassed_field_name=>$bypassed_field_name),  $columns);
            $working_arrays['ppv_define_business_rules']['lookups']['relational_operators'] = $business_rules_relational_operators;
           $working_arrays['ppv_define_business_rules']['lookups']['columns_w_bypass'] = 
                array_merge(array($bypassed_field_name=>$bypassed_field_name),  $columns);
            $working_arrays['ppv_define_business_rules']['lookups']['business_rules_relational_operators']                      = $business_rules_relational_operators;

        $working_arrays['maintain_query_joins']['lookups'] = array(
            'join_types'            => 'join_types',
            'joinor_field_names'    => 'joinor_field_names',
            'joinee_table_names'    => 'joinee_table_names',
            'joinee_field_names'    => 'joinee_field_names',
            'joins_r_o_array'       => 'joins_r_o_array',
            );
   
            //var_dump($working_arrays['ppv_define_business_rules']['lookups']['relational_operators']);
            //var_dump($business_rules_relational_operators );$this->debug_exit(__FILE__,__LINE__,1);
           return $working_arrays;         //
        }


        public function working_arrays_populate($working_arrays,$record) {
            //echo("working_arrays_populate");
        //var_dump($record);$this->debug_exit(__FILE__,__LINE__,1);
        $query_relational_operators_array = $this->build_query_relational_operators_array();
        /*
        foreach($working_arrays['groups_that_get_padded'] as $group_to_be_resized){
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
            $working_arrays['ppv_define_query']['lookups']['columns_w_bypass']                       = '';
            $working_arrays['ppv_define_query']['lookups']['query_relational_operators_array']                       = '';

            $working_arrays['ppv_define_business_rules']['lookups']['field_names']           = '';
            $working_arrays['ppv_define_business_rules']['lookups']['relational_operators']  = '';
            $working_arrays['ppv_define_business_rules']['lookups']['columns_w_bypass']                       = '';
            $working_arrays['ppv_define_business_rules']['lookups']['query_relational_operators_array']                       = '';
            //$working_arrays = $this->getEdit8_array_node_to_array($working_arrays);

            //var_dump($working_arrays);$this->debug_exit(__FILE__,__LINE__,1);
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
        // "groups_that_get_padded" lists arrays that need room for growth.
        // queries and business rules can grow and differ widely from one query (or rule) to 
        //another they need to be loaded first and padded with some room for growth
        //
        // no more or no less than $this->no_of_blank_entries 
        // default values padded onto the end
        //
        // even though we have relational operators and values arrays to worry about,
        // this drives off the number of field_names = to $bypassed_field_name on the end of the array
        
        // originally we did it just for who you were but not, it seems easiest to size them after we get // the existing arrays. 
        // ******