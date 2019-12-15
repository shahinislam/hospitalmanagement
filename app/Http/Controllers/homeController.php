<?php

namespace App\Http\Controllers;
use App\Login;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\WhoLogged;

class homeController extends Controller{

	public function getHome(){
		return view('home');
	}

	public function postLogin(Request $request){
          $this->validate($request,[
          	   'email'=>'required|email',
          	   'password'=>'required',
          	   'selected'=>'required'
        ]);

      $type=$request['selected'];

      if(!Auth::attempt(['email'=>$request['email'],'password'=>$request['password'],
       	'type'=>$request['selected']])){
	             return redirect()->back()->with(['fail'=>'Could not log you in!']);
	       }

	    return redirect()->route($type.'.dashboard');
	}
}