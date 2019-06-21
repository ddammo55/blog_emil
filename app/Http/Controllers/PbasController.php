<?php

namespace App\Http\Controllers;

use App\Pba;
use Illuminate\Http\Request;
use App\Http\Requests\PbaRequest;

class PbasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //PBA 리스트 불러오기
        $pbas = \App\Pba::latest('id')->paginate(25);

        return view('pbas.list', compact('pbas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       
        return view('pbas.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PbaRequest $request)
    {
        //dd(request()->all());
        Pba::create([
            'board_name' => request('board_name'),
            'content' => request('content'),
        ]);
        // request(['boardname', 'top_num', 'bot_num',  $method , 'note']));
       flash('입력이 정상적으로 처리되었습니다.');
       return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Pba  $pba
     * @return \Illuminate\Http\Response
     */
    public function show(Pba $pba)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Pba  $pba
     * @return \Illuminate\Http\Response
     */
    public function edit(Pba $pba)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Pba  $pba
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Pba $pba)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Pba  $pba
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pba $pba)
    {
        //
    }
}
