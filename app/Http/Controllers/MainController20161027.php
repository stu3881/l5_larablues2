<?php
namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Storage;
use Illuminate\Support\Facades\Schema; 

use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\View;


use DB;

class MainController extends Controller {

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
        parent::__construct();

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

        // cloned from miscThings, commented out here
        //$this->make_sure_table_snippet_exists($this->model_table);
        //$this->debug_exit(__FILE__,__LINE__,0);
        //$this->generated_snippets_array        = $this->get_generated_snippets();

       //config
        $this->database_connection_config_path = substr(app_path(),0,strlen(app_path())-4)."/config/";
        
        //controllers
        $node =  "controllers";
        $this->DEHbase_controller_path     = app_path()."/Http/Controllers/";
         $this->stored_connections_path = substr(app_path(),0,strlen(app_path())-4).'/storage/connections/'. $this->db_connection_name ;

        //$this->my_ctr = $my_ctr;
        //routes

        // these are derived
 
        $this->view_files_prefix                = $this->views_files_path;
        $this->key_field_array                  = array($this->snippet_table_key_field_name=>$this->snippet_table_key_field_name);
        $this->key_field_name_array             = array($this->snippet_table_key_field_name=>$this->snippet_table_key_field_name);
        //$this->make_sure_table_snippet_exists($this->model_table);
        //$this->debug_exit(__FILE__,__LINE__);
        //$this->generated_snippets_array         = $this->get_generated_snippets();
        // generated_snippets are arrays that are generated when the properties
        // of a report change
        //print_r($this->generated_snippets_array);exit('exit 22');
        //$this->report_nippets_array           = $this->decode_generated_snippets_by_record_type('table_snippets');
        //$this->key_field_name_array           = array($this->key_field_name=>$this->key_field_name);
        //$this->required_fields_array            = $this->generated_snippets_array['required_fields_array'];
        //echo $this->view_files_prefix ;exit ("exit in constructor");

        // THIS IS HOWWE CHANGE CONNECTIONS
        /*
        $this->snippet_table                    = "miscThings";
        $this->defaultConnection                = "defaultConnection";
        //$this->defaultConnection                = "blues_main";
        $ConnectionsQuery = DB::connection($this->defaultConnection)->table($this->snippet_table)
        ->where('record_type','=','database_connection')
        ->where('db_connection_name' ,"=", 'defaultConnection')
        ->get();
        $this->db_snippet_connection            = $ConnectionsQuery[0]->db_snippet_connection;
        $this->db_data_connection               = $ConnectionsQuery[0]->db_data_connection;
        //echo("exiting miscThings constructor");$this->debug_exit(__FILE__,__LINE__,0);
        $this->field_name_lists_array = $field_name_lists_array;
        $this->field_name_list_array = "";
 
        // field_name_list_array defines the arrays depending on $what_we_are_doing
        // the first level index 
       //$this->field_name_list_array = (array) $this->initialize_field_name_list_array();
       $this->field_name_list_array_first_index = $field_name_list_array_first_index;
        */
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



	public function getIndex() {
        //$this->debug_exit(__FILE__,__LINE__);
        $this->middleware('auth');
        $query = $this->getMeTables("record_type");
        return View::make('main.index')
		->with('queryx', $query);
	}


	public function getView($id) {
		return View::make('main.view')->with('product', Product::find($id));
	}
///
	public function getCategory($cat_id) {
		return View::make('main.category')
			->with('products', Product::where('category_id', '=', $cat_id)->paginate(3))
			->with('category', Category::find($cat_id));
	}

	public function getSearch() {
		$keyword = Input::get('keyword');

		return View::make('main.search')
			->with('products', Product::where('title', 'LIKE', '%'.$keyword.'%')->get())
			->with('keyword', $keyword);
	}

	public function postAddtocart() {
		$product = Product::find(Input::get('id'));
		$quantity = Input::get('quantity');

		Cart::insert(array(
			'id'=>$product->id,
			'name'=>$product->title,
			'price'=>$product->price,
			'quantity'=>$quantity,
			'image'=>$product->image
		));

		return redirect('main/cart');
	}

	public function getCart() {
		return View::make('main.cart')->with('products', Cart::contents());
	}

	public function getRemoveitem($identifier) {
		$item = Cart::item($identifier);
		$item->remove();
		return redirect('main/cart');
	}

	public function getContact() {
		return View::make('main.contact');
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
