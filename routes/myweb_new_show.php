 <?php   // *****
    // these are common to all the routes that follow for this controller
    // *****
    $node_name              = 'new_show';
    $model                  = 'new_show';
    $controller_name        = 'New_showController';
    $what_we_are_doing      = "what_we_are_doing";      // assigned elsewhere but needs to be defined here
    $coming_from            = "coming_from";            // assigned elsewhere but needs to be defined here
    $reportDefinitionKey    = "reportDefinitionKey";    // assigned elsewhere but needs to be defined here
    $encoded_business_rules = "encoded_business_rules"; // assigned elsewhere but needs to be defined here
    //*
    $method_name            = "store";
    Route::POST('admin/'.$node_name, array('uses'=>$controller_name.'@'.$method_name))->name($node_name .'.'.$method_name); 
      //*
    $method_name            = "store_w_rules_array";
    Route::POST('admin/'.$node_name
         .'/{'.$encoded_business_rules.'}'
        .'/'.$method_name, 
        array('uses'=>$controller_name.'@'.$method_name))->name($node_name .'.'.$method_name); 
    //*
    $method_name            = "browseEdit";
    Route::get('admin/'.$node_name
        .'/{'.$model.'}'
        .'/{'.$what_we_are_doing.'}'
        .'/{'.$coming_from.'}'
        .'/'.$method_name, 
        array('uses'=>$controller_name.'@'.$method_name))->name($node_name .'.'.$method_name); 
     //*
    $method_name            = "editUpdate";
    Route::get('admin/'.$node_name
        .'/{'.$model.'}'
        .'/{'.$what_we_are_doing.'}'
        .'/{'.$coming_from.'}'
        .'/{'.$reportDefinitionKey.'}'
        .'/'.$method_name, 
        array('uses'=>$controller_name.'@'.$method_name))->name($node_name .'.'.$method_name); 
     //*
    $method_name            = "indexRecords";
    Route::get('admin/'.$node_name.'/'.$method_name, array('uses'=>$controller_name.'@'.$method_name))->name($node_name .'.'.$method_name);   
     //*
    $method_name            = "indexReportsx";
    Route::get('admin/'.$node_name.'/'.$method_name, array('uses'=>$controller_name.'@'.$method_name))->name($node_name .'.'.$method_name);   
     //*
    $method_name            = "indexReports";
    Route::get('admin/'.$node_name.'/{'.$model.'}'.'/'.'{'.$reportDefinitionKey.'}'.'/'.$method_name, array('uses'=>$controller_name.'@'.$method_name))->name($node_name .'.'.$method_name);   
     //*
    $method_name            = "ppvEdit";
    Route::get('admin/'.$node_name.'/{'.$model.'}'.'/{'.$what_we_are_doing.'}'.'/{'.$coming_from.'}'.'/'.$method_name, array('uses'=>$controller_name.'@'.$method_name))->name($node_name .'.'.$method_name); 
     //*
    $method_name            = "reportDefEdits";
    Route::get('admin/'.$node_name.'/{'.$model.'}/'.$method_name, array('uses'=>$controller_name.'@'.$method_name))->name($node_name .'.'.$method_name);   
     //*
    $method_name            = "reportDefMenuEdit";
    Route::get('admin/'.$node_name.'/{'.$model.'}'.'/{'.$what_we_are_doing.'}'.'/{'.$coming_from.'}'.'/'.$method_name, array('uses'=>$controller_name.'@'.$method_name))->name($node_name .'.'.$method_name); 
     //*
    $method_name            = "create";
    Route::get('admin/'.$node_name.'/'.$method_name, array('uses'=>$controller_name.'@'.$method_name))->name($node_name .'.'.$method_name); 
     //*
    $method_name            = "create_w_report_id";
    Route::get('admin/'.$node_name.'/{'.$reportDefinitionKey.'}'.'/'.$method_name, 
        array('uses'=>$controller_name.'@'.$method_name))->name($node_name .'.'.$method_name); 

