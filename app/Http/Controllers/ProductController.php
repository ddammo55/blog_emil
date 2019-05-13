<?php

namespace App\Http\Controllers;

use DB;
use App\Product;
use Illuminate\Http\Request;
use App\Http\Requests\ProductRequest;
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
        $products = \App\Product::latest('id')->paginate(15); 
        $products_first = \App\Product::latest('id')->first('serial_name');
        //echo($products_first->serial_name);
        $serial_start_no_int=substr($products_first->serial_name,3,4); //숫자만 남긴다.
        //dd($serial_start_no_int);
        $serial_start_no_int=$serial_start_no_int+0001;
        dd($serial_start_no_int);


        // $result1 = substr($chang,0,3);
        // $result2 = substr($chang,3,4);
        
        // $ttr = sprintf("%04d",$result2+1);
        // $ttr_chang = $result1.$ttr;
       // return view('product.create',compact('products','serial_start_no_int'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProductRequest $request)
    {
        //시리얼 번호 받기   
       $serial_start_no=$request['serial_start_no'];
       $serial_end_no=$request['serial_end_no'];

        //시리얼번호 숫자만 남긴다 19A0001 => 0001
       $serial_start_no_int=substr($serial_start_no,3,4);
       $serial_end_no_int=substr($serial_end_no,3,4);

        // 초기값
       $y=0;
       $i=0;

        //시리얼번호 영문만 담는 변수 19A0001 => 19A 
       $serial_english_name=substr($serial_start_no,0,3);

        // 반복문 
       for($i=$serial_start_no_int;$i<=$serial_end_no_int;$i++)
       {
        // $i="0001";
        
        $y+=1;
        $i=(int)$i;
        $serial_name=$serial_english_name.sprintf("%04d",$i);

        //대문자변환
        $serial_name=strtoupper($serial_name);
        //$serial_name="19A0001";

        //셀번호 배열에 담기
        $serial_name_arr[] = $serial_name;
        }   

        $cc = count($serial_name_arr);
        if($cc > 200)
        {
         


         echo "<script>alert(\"200장 초과제한입니다. 관리자에게 문의해 주세요.\");</script>";
         echo "<script> history.back()</script>";
         //return back();

        }else{
        for($i=$serial_start_no_int;$i<=$serial_end_no_int;$i++){
        $y+=1;
        $i=(int)$i;
        $serial_name=$serial_english_name.sprintf("%04d",$i);

        //대문자변환
        $serial_name=strtoupper($serial_name);

        // $serial_name 와 기존 old_serial_name가 같은면 에러 발생
        $old_serial_name = DB::table('products')->where('serial_name', $serial_name)->value('serial_name');
        //$old_serial_name = \App\Product::find($serial_name)->serial_name;

        // dd($sese);
        // return false;

        if($serial_name == $old_serial_name){
            echo "<script>alert(\"$serial_name 시리얼번호가 중복입니다.\");</script>";
         echo "<script> history.back()</script>";
        }else{


        Product::create([
            'serial_name' => $serial_name,
            'board_name' => request('board_name'),
            'product_date' => NOW(),

        ]);
    }
    }
}
       return view('product.create_list',compact('serial_name_arr'));
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
