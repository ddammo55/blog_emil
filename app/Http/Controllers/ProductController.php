<?php

namespace App\Http\Controllers;

use DB;
use App\Product;
use Illuminate\Http\Request;
use App\Http\Requests\ProductRequest;
class ProductController extends Controller
{

    public function index()
    {
     $products = \App\Product::latest()->paginate(15); 

       return view('product.index',compact('products'));
    }


    public function product_create()
    {
        //시리얼 번호 최근 컬럼을 가지고 온다.
        $products_first = \App\Product::latest('id')->first('serial_name');

        if(request('board_name') == null || request('quantity') == 0 || request('quantity') == 201){
             echo "<script>alert(\"보드명과 수량을 확인하여주세요.\");</script>";
             echo "<script> history.back()</script>";
        }else{

        //보드명
        $board_name = request()->board_name;

        echo '<br>';
        //수량
        $quantity = request()->quantity;
        
        //숫자만 남긴다. 0005
        $serial_start_no_int=substr($products_first->serial_name,3,4);

        //숫자 남긴거 +1
        $ttr = sprintf("%04d",$serial_start_no_int+1);
        
        //앞에만 남긴다. 19A
        $serial_start_no_start=substr($products_first->serial_name,0,3);

        //***[완성]*** 11a0011
        $serial_start_no = $serial_start_no_start.$ttr;


        //현재숫자와 보드작업수량을 합친다. 53
        $sum_serial_number = sprintf("%04d",$serial_start_no_int) + sprintf("%04d",$quantity);

        //0053
        $eee = sprintf("%04d",$sum_serial_number);
        
        //***[완성]*** 11a0060
        $serial_end_no = $serial_start_no_start.$eee;

        // 초기값
       $y=0;
       $i=0;

        for($i=$ttr;$i<=$eee;$i++){
        $y+=1;
        $i=(int)$i;
        $serial_name=$serial_start_no_start.sprintf("%04d",$i);

        //대문자변환
        $serial_name=strtoupper($serial_name);


        $serial_name_arr[] = $serial_name;

        //echo $tty = $serial_name_arr;

        Product::create([
            'serial_name' => $serial_name,
            'board_name' => request('board_name'),
            'product_date' => NOW(),
            'aoi_top_part_num' => request('aoi_top_part_num'),
            'aoi_bot_part_num' => request('aoi_bot_part_num'),

        ]);
       
    }
        return view('product.create_list',compact('serial_name_arr'));
}
    }

    public function create()
    {   
        //전체 시리얼번호
        $products = \App\Product::latest('id')->paginate(15); 

        //시리얼 번호 최근 컬럼을 가지고 온다.
        $products_first = \App\Product::latest('id')->first('serial_name');
        
        //dd($products_first);
        //만약 시리얼 번호가 없으면..
        if($products_first == null){
            $products_first = '11A0001';
        //숫자만 남긴다. 0005
        $serial_start_no_int=substr($products_first,3,4);
        //앞에만 남긴다. 19A
        $serial_start_no_start=substr($products_first,0,3);
        }else{
        //숫자만 남긴다. 0005
        $serial_start_no_int=substr($products_first->serial_name,3,4);
        
        //앞에만 남긴다. 19A
        $serial_start_no_start=substr($products_first->serial_name,0,3);

        }
        //숫자1을 더한다. 0006
        $ttr = sprintf("%04d",$serial_start_no_int+1);


        //다시 영문과 숫자를 합친다.
        $final_serial_name = $serial_start_no_start.$ttr;

        //마지막 시리얼번호 + 0001 한 결과변수
        $final_serial_name;

        #|--------------------------------------------------------------------------
        #| 보드명
        #|--------------------------------------------------------------------------
        $pcb_lists = \App\Pcb_list::get();

        //dd($board);

        //$board_name = $board->board_name;

        //echo $board->board_name;


        return view('product.create',compact('products','final_serial_name','pcb_lists'));
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
            'aoi_top_part_num' => request('aoi_top_part_num'),
            'aoi_bot_part_num' => request('aoi_bot_part_num'),

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
