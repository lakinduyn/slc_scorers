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
      $myDate =time();// date nd time
      $name=request('name');
      $type=request('type');

      $this->file = $_FILES['image'];
      if(file_exists($this->file['tmp_name'])){
      $errors= array();
      $file_name = $_FILES['image']['name'];
      $file_size =$_FILES['image']['size'];
      $ext = strtolower(substr(strrchr($file_name, '.'), 1)); 
      $newfilename=$name. '' .$type.''.$myDate.".".$ext;
      $file_tmp =$_FILES['image']['tmp_name'];
      $file_type=$_FILES['image']['type'];
      
      if($file_size > 2097152){
         $errors[]='File size must be excately 2 MB';
      }
      
   
         move_uploaded_file($file_tmp,"resources/images/clubs/".$newfilename);
         
          $institute->logoUrl=$newfilename;
      
      
   }

        $institute->name = $request->name;
        $institute->type = $request->type;
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
       $myDate =time();// date nd time
      $name=request('name');
      $type=request('type');

      $this->file = $_FILES['image'];
      if(file_exists($this->file['tmp_name'])){
      $errors= array();
      $file_name = $_FILES['image']['name'];
      $file_size =$_FILES['image']['size'];
      $ext = strtolower(substr(strrchr($file_name, '.'), 1)); 
      $newfilename=$name. '' .$type.''.$myDate.".".$ext;
      $file_tmp =$_FILES['image']['tmp_name'];
      $file_type=$_FILES['image']['type'];
      
      if($file_size > 2097152){
         $errors[]='File size must be excately 2 MB';
      }
      
   
         move_uploaded_file($file_tmp,"resources/images/clubs/".$newfilename);
         
          $institute->logoUrl=$newfilename;
      
      
   }
       $institute->name = $request->input('name');
       $institute->type = $request->input('type');
       //$institute->logoUrl = $request->input('logoUrl');
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
   
    public function  getInstitutes()
    {
        $ins = Institute::all(); 

        //Session::flash('message', 'Successfully deleted the record!');

        return view('dashboard.addTeam', compact('ins'));

    }
}
