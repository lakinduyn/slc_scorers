<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use \App\User;
use Illuminate\Support\Facades\Hash;

class RegistrationController extends Controller
{
    public function create(){
        return view('registration.create');
    }
    public function store(Request $request){
        //validate
        $this->validate(request(),[
            'name'=>'required',
            'email'=>'required|email',
            'password'=>'required|confirmed'
        ]);
        //create and session_save_path
        //Hash::make($request->password);
        User::create(['name'=>$request->name,'email'=>$request->email,'password'=>Hash::make($request->password)]);
   
        //redirect
        return redirect()->home();
    }  
}
