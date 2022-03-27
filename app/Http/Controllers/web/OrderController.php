<?php

namespace App\Http\Controllers\web;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($slug)
    {
        $status = "";
        $slug_tr = "";
        switch ($slug){
            case 'New':
                $status = 1;
                $slug_tr = "Yeni";
                break;
            case 'Accepted':
                $status = 2;
                $slug_tr = "Onaylanan";
                break;
            case 'Prepared':
                $status = 3;
                $slug_tr = "Hazırlanan";
                break;
            case 'Completed':
                $status = 4;
                $slug_tr = "Tamamlanan";
                break;

        }

        $dataList = Order::where('status','=',$status)->get();
        return view('web.order',['dataList' => $dataList,'slug' => $slug,'slug_tr' => $slug_tr]);
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
    public function edit($id,$slug)
    {
        DB::table('orders')->where('id','=',$id)->update([
            'status' => 4
        ]);
        return redirect()->route('order',['slug' => $slug]);
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
    public function destroy($id,$slug)
    {
        DB::table('orders')->where('id','=',$id)->delete();
        DB::table('order_details')->where('order_id','=',$id)->delete();
        return redirect()->route('order',['slug' => $slug]);
    }
}
