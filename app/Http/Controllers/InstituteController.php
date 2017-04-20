<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Institute;

class InstituteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct(){
        $this->middleware('auth');
    }
    public function index()
    {

    }

    public function search()
    {
        $institute = Institute::all();

        return view('dashboard.searchInstitute', compact('institute'));

    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('dashboard.createInstitute');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        $institute = new Institute;

        $institute->name = $request->name;
        $institute->type = $request->type;
        $institute->logoUrl = $request->logoUrl;
        $institute->contactNo = $request->contactNo;
        $institute->email = $request->email;
        $institute->address = $request->address;

        $this->validate($request, [

        'name' => 'required|unique:institutes|max:100',
        'contactNo' => 'nullable|unique:institutes|max:100',
        'email' => 'nullable|unique:institutes|max:100',
        //'email' => unique:institutes|max:100',
        
         ]);

        $institute->save();

        //$institueLogoPath = $request->logoUrl->store('images');

        return redirect('/admin');


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
    public function edit(Institute $institute)
    {

        return view('dashboard.editInstitute', compact('institute'));

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
       $institute = Institute::findOrFail($id);
       $institute->name = $request->input('name');
       $institute->type = $request->input('type');
       $institute->logoUrl = $request->input('logoUrl');
       $institute->contactNo = $request->input('contactNo');
       $institute->address = $request->input('address');
       $institute->email = $request->input('email');


       $institute->save();

       return redirect('/searchInstitue');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $institute = Institute::findOrFail($id);
        $institute->delete();

        //Session::flash('message', 'Successfully deleted the record!');

        return redirect('/searchInstitue');

    }
}
