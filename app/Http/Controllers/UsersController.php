<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Input;
use View;
use Auth;
class UsersController extends DEHBaseController
{


	public function __construct() {
		parent::__construct();
		//$this->beforeFilter('csrf', array('on'=>'post'));
	}

	public function getNewaccount() {
		return View::make('users.newaccount');
	}

	public function postCreate() {
		$validator = Validator::make(Input::all(), User::$rules);

		if ($validator->passes()) {
			$user = new User;
			$user->firstname = Input::get('firstname');
			$user->lastname = Input::get('lastname');
			$user->email = Input::get('email');
			$user->password = Hash::make(Input::get('password'));
			$user->telephone = Input::get('telephone');
			$user->save();
		echo ""."in ".substr(__FILE__,strripos (__FILE__ , "/")+1)." on line ".__LINE__;exit();

			return redirect('users/signin')
				->with('message', 'Thank you for creating a new account. Please sign in.');
		}

		return redirect('users/newaccount')
			->with('message', 'Something went wrong')
			->withErrors($validator)
			->withInput();
	}

	public function getSignin() {
		return View::make('users.signin');
	}

	public function postSignin(Request $request) {
		if (Auth::attempt(array('email'=>$request->input('email'), 'password'=>$request->input('password')))) {
			//$this->debug_exit(__FILE__,__LINE__);
			return;
			$this->debug_exit(__FILE__,__LINE__);
			return redirect('main/');

		  	return redirect('main/index')->with('message', 'Thanks for signing in');
		}

		return redirect('users/signin')->with('message', 'Your email/password combo was incorrect');
	}

			

	public function getSignout() {
		Auth::logout();
		//return redirect('users/signin')->with('message', 'You have been signed out');
        return redirect('/')->with('message', 'You have been signed out');
	}

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
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
