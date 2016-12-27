    $node_name              = 'miscThings';
    $model                  = 'miscThing';
    $controller_name        = 'MiscThingsController';
    $method_name            = "reportDefMenuEdit";
    $what_we_are_doing      = ""; // assigned elsewhere but need to be defined here
    $coming_from            = ""; // assigned elsewhere but need to be defined here
    Route::get('admin/'.$node_name.'/{'.$model.'}'.'/{'.$what_we_are_doing.'}'.'/{'.$coming_from.'}'.'/'.$method_name, array('uses'=>$controller_name.'@'.$method_name))->name($node_name .'.'.$method_name); 


    $node_name              = 'books';
    $model                  = 'book';
    $controller_name        = 'BookController';
    Route::resource($node_name ,$controller_name);

    $method_name            = "edita";
    $parm2                  = "";
    $parm3                  = "";
    Route::get($node_name.'/{'.$model.'}'.'/{'.$parm2.'}'.'/{'.$parm3.'}'.'/'.$method_name, array('uses'=>$controller_name.'@'.$method_name))->name($node_name .'.'.$method_name);   


    public function reportDefMenuEdit($id,$what_we_are_doing,$coming_from){
        echo('<br>reportDefMenuEdit <br>this used to be putEdit41'.$this->node_name.
        "<br>we moved it to indexReports and then reportDefMenuEdit(here)");
        //$this->debug_exit(__FILE__,__LINE__,0);
        //echo("<br>".'* '.$id.' * '.$what_we_are_doing.' * '.$coming_from." ** "); 

        $miscThing=MiscThing::find($id);
       //var_dump($record);
        return view($this->node_name.'.reportDefMenuEdit'    ,compact('miscThing'))
        ->with('model'                            ,$this->model)
        ->with('node_name'                        ,$this->node_name)
        ->with('what_we_are_doing'                ,$what_we_are_doing)
        ->with('coming_from'                      ,$coming_from)
       ;

    //$request->input('name_of_field');
}



    public function edita($id,$parm2,$parm3)
    {
        $this->debug_exit(__FILE__,__LINE__,0);
        echo('edita in BookController '.'id '.$id.' parm2: '.$parm2.' parm3: '.$parm3.'<br>');
        $book=Book::find($id);return view('books.edita',compact('book'))
        ->with('parm2'                      ,$parm2)
        ->with('parm3'                      ,$parm3)
       ;
      
    }
            <td>
  		        <a href="{{ URL::route($node_name.'.reportDefMenuEdit', $parameters = array('id'=>$record->id, 'what_we_are_doing'=>'displaying_advanced_edits_screen','coming_from'=> 'edit1')) }}" class="btn btn-warning">edita</a>
					{{ Form::close() }}
			</td>


            <td>
            	<a href="{{ URL::route('books.edita', $parameters = array('id'=>$book->id, 'parm2'=>$parm2,'parm3'=> $parm3)) }}" class="btn btn-warning">edita</a>
        	</td>

| admin/miscThings/{miscThing}/{x}/{x}/reportDefMenuEdit | miscThings.reportDefMenuEdit | App\Http\Controllers\MiscThingsController@reportDefMenuEdit            | web          |

| books/{book}{parm2}{parm3}/edita | books.edita   | App\Http\Controllers\BookController@edita   | web     
