<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class InstituteController extends Controller
{
    //
    public function searchInstitutes(){

        //$ins = DB::table('institutes')->get();
        $ins = \App\Institute::all();

        return view('dashboard.searchInstitutes', compact('ins'));

    }
}
