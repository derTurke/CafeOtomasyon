<?php

namespace App\Http\Controllers\web;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\OrderDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class OrderDetailController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($order_id)
    {
        $data = Order::where('id',$order_id)->get();
        $dataList = OrderDetail::where('order_id',$order_id)->get();

        return view('web.order_detail',['order_id' => $order_id,'data' => $data, 'dataList' => $dataList]);
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
    public function edit($id,$order_id)
    {

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
    public function destroy($id,$order_id)
    {
        $data = OrderDetail::find($id);
        $order = Order::find($order_id);
        $order->total = $order->total - $data->total;
        $order->save();
        DB::table('order_details')->where('id','=',$id)->delete();
        if($order->total == 0){
            DB::table('orders')->where('id','=',$order_id)->delete();
        }
        return redirect()->route('order_detail',['order_id' => $order_id]);
    }
}
