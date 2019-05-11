<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
     $products = \App\Product::latest()->paginate(15); 

     return view('product.index',compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('product.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
         //시리얼 번호 받기   
         $serial_start_no=$_POST['serial_start_no'];
         $serial_end_no=$_POST['serial_end_no'];

         //시리얼번호 숫자만 남긴다 19A0001 => 0001
        echo $serial_start_no_int=substr($serial_start_no,3,4);
        echo  $serial_end_no_int=substr($serial_end_no,3,4);

        //초기값
        $y=0;
        $i=0;

        //시리얼번호 영문만 담는 변수 19A0001 => 19A 
        echo $serial_english_name=substr($serial_start_no,0,3);

        // 반복문 
        for($i=$serial_start_no_int;$i<=$serial_end_no_int;$i++){
             #$i="0001";
            $y+=1;
            $i=(int)$i;
            $serial_name=$serial_english_name.sprintf("%04d",$i);

            //대문자변환
            $serial_name=strtoupper($serial_name);
            #$serial_name="19A0001";
            
            Product::create([
            'serial_name' => $serial_name,
            'created_at' => NOW(),
            'updated_at' => NOW(),

            ]);
       }      
        return redirect('/product/create');
       
    }

    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        //
    }
}
