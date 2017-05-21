 <?php   // *****
    // these are common to all the routes that follow for this controller
    // *****
    $node_name              = 'programmerUtilities';
    $model                  = 'MiscThing';
    $controller_name        = 'ProgrammerUtilitiesController';
    $what_we_are_doing      = "what_we_are_doing";   // needs to be defined here
    $coming_from            = "coming_from";         // needs to be defined here
    $reportDefinitionKey    = "reportDefinitionKey"; // needs to be defined here
    $encoded_business_rules = "encoded_business_rules"; // assigned elsewhere 
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
    $method_name            = "activateDeactivate";

    Route::get('admin/'.$node_name
        .'/{'.$model.'}'
        .'/{'.$what_we_are_doing.'}'
        .'/{'.$coming_from.'}'
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
    $method_name            = "mainMenu";
    Route::get('admin/'.$node_name.'/{'.$model.'}'.'/'.'{'.$reportDefinitionKey.'}'.'/'.$method_name, array('uses'=>$controller_name.'@'.$method_name))->name($node_name .'.'.$method_name);   
    //*
    $method_name            = "mainMenu_active_inactive";
    Route::get('admin/'.$node_name.'/{'.$model.'}'.'/'.'{'.$reportDefinitionKey.'}'.'/'.$method_name, array('uses'=>$controller_name.'@'.$method_name))->name($node_name .'.'.$method_name);   

    $method_name            = "mainMenu_generate_routes_snippet";
    Route::get('admin/'.$node_name.'/{'.$model.'}'.'/'.'{'.$reportDefinitionKey.'}'.'/'.$method_name, array('uses'=>$controller_name.'@'.$method_name))->name($node_name .'.'.$method_name);   

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

