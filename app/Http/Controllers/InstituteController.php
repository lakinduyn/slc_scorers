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
    public function index()
    {

    }

    public function search()
    {
        $ins = Institute::all();

        return view('dashboard.searchInstitute', compact('ins'));

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
    public function store()
    {
        
        $institute = new Institute;

        // \App\Institute::create([
        //     'name' => request('name'),
        //     'type' => request('type'),
        //     'logoUrl' => request('logoUrl'),
        //     'contactNo' => request('contactNo'),
        //     'email' => request('email'),
        //     'address' => request('address')

        // ]);

        Institute::create(request() -> all());

        //$institute -> save();

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
        $record = $this->records->findOrFail($id);

        if(! $record){
            Upload::create(Input::all());
            return $this->respondCreated('Upload was created');
        }

        $record = fill(Input::all())->save();
        return $this->respondCreated('Upload was created');

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
