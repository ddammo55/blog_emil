<?php

namespace App\Http\Controllers;

use App\Boardname;
use Illuminate\Http\Request;

class BoardnamesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $boardnames = \App\Boardname::latest('id')->paginate(25); 

       return view('boardnames.create',compact('boardnames')); 
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
     * @param  \App\Boardname  $boardname
     * @return \Illuminate\Http\Response
     */
    public function show(Boardname $boardname)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Boardname  $boardname
     * @return \Illuminate\Http\Response
     */
    public function edit(Boardname $boardname)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Boardname  $boardname
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Boardname $boardname)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Boardname  $boardname
     * @return \Illuminate\Http\Response
     */
    public function destroy(Boardname $boardname)
    {
        //
    }
}
