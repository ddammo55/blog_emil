<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Shipment;
use App\Product;
use App\Http\Requests\ShipmentRequest;
class ShipmentsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        if(request('serial_name')){
                    $products = \App\Product::where('con', 0)->latest('updated_at')->get(); // 제품 시리얼번호 con=0인것만 가져오기
        $products_alls = \App\Product::where('serial_name', request('serial_name'))->where('con', 1)->paginate(1); //여기서는 shipment순으로 가져온다.
        $projects = \App\Project::all(); // 프로젝트 명
        //$products = ["딸기","바나나","파인애플"];
        return view('shipment.s1',compact('products','projects','products_alls'));
    }else{


        $products = \App\Product::where('con', 0)->latest('updated_at')->get(); // 제품 시리얼번호 con=0인것만 가져오기
        $products_alls = \App\Product::where('con', 1)->latest('updated_at')->paginate(50); //여기서는 shipment순으로 가져온다.
        $projects = \App\Project::all(); // 프로젝트 명
        //$products = ["딸기","바나나","파인애플"];
        return view('shipment.s1',compact('products','projects','products_alls'));
    }
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
    public function store(ShipmentRequest $request)
    {

        //시리얼번호 가지고 온다
        $serial_name = \App\Product::get('serial_name');

        //시리얼번호를 배열로 가지고 온다.
        $skill = request('skills');
        //dd($skills);
        foreach($skill as $v) { //시리얼번호 19A001_boardname 보드명을 지우고 배열에 담는다.
            $skills[] = explode('_',$v)[0];
        }

        //시리얼번호 수량
        $skills_count = count($skills);

        for($i=0; $i<$skills_count; $i++){
        Product::where('serial_name',$skills[$i])->update([  //선택한 시리얼번호에 다음 값을 업데이트한다.
            'shipment_daily' => request('project'),
            'note' => request('note'),
            'receiver' => request('receiver'),
            'shipment' => NOW(),
            'ship_user' => auth()->user()->name, //인계자
            'mod_user' => auth()->user()->name, //수정한 유저
            'mark_ip' => $_SERVER['REMOTE_ADDR'],
            'coting_t' => rand(40,60), //코팅두께
            'coting_inp' => 1,
            'con' => 1, //출하내역 유뮤 
        ]);
        
    }

        //flash('입력이 정상적으로 처리되었습니다.');
         echo "<script>alert(\"입력이 정상적으로 처리되었습니다.\");</script>";
        //만약에 결과보기를 클릭하면
        return back();

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
        $products = \App\Product::where('id',337)->get();

        $projects_names = \App\Project::all(); // 프로젝트 명
        //dd($product);
      return view('shipment.edit', compact('products','projects_names'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Product $product)
    {
        request('project_name');
        dd($product);
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

    public function con($id)
    {
        //dd($id);
       $product = Product::find($id);
       $product->con = 0;
       $product->shipment_daily = '';
       $product->shipment = null;
       $product->coting_t = 0;
       $product->coting_inp = 0;
       $product->note = null;
       $product->receiver = null;
       $product->ship_user = null;
       $product->save();

       //flash('정상적으로 처리 되었습니다.');
       return back();
    }

}
