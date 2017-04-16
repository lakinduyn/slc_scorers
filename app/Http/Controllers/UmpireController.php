<?php

namespace App\Http\Controllers;

use App\Umpire;
use Illuminate\Http\Request;

class UmpireController extends Controller
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
     * @param  \App\Umpire  $umpire
     * @return \Illuminate\Http\Response
     */
    public function show(Umpire $umpire)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Umpire  $umpire
     * @return \Illuminate\Http\Response
     */
    public function edit(Umpire $umpire)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Umpire  $umpire
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Umpire $umpire)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Umpire  $umpire
     * @return \Illuminate\Http\Response
     */
    public function destroy(Umpire $umpire)
    {
        //
    }
}
