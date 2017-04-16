<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use \App\User;

class RegistrationController extends Controller
{
    public function create(){
        return view('registration.create');
    }
    public function store(){
        //validate
        $this->validate(request(),[
            'name'=>'required',
            'email'=>'required|email',
            'password'=>'required|confirmed'
        ]);
        //create and session_save_path
        User::create(request(['name','email','password']));
        //redirect
        return redirect()->home();
    }  
}
