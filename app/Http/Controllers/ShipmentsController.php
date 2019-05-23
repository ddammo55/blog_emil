<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Shipment;
class ShipmentsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {


        $products = \App\Product::latest()->paginate(15);
        //$products = ["딸기","바나나","파인애플"];
        return view('shipment.s1',compact('products'));
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
        //echo $_POST['items_left'];

        //dd(request()->all());
        //시리얼번호 가지고 온다
        $serial_name = \App\Product::get('serial_name');


        $skills = request('skills');
        dd($skills);

        if($serial_name == $skills){

        }

        //$products->update(request(['serial_name',]))
        //dd($shipment);
         // for ($i=0;$i<10;$i++){
         //    $serial_name = $_POST['submit_button'][$i];
         // }

         // echo $serial_name;

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
