<?php

namespace App\Http\Controllers\web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ChefController extends Controller
{
    public function index()
    {
        return view('web.chef.index');
    }

    public function chefNewOrder(Request $request){
        $newOrderDetails = DB::table('order_details')->where('status',1)->get();
        $arr = array();
        foreach ($newOrderDetails as $value){
            $product = DB::table('products')->select('image','name')->where('id' , $value->product_id)->first();
            $arr_2 = ["id" => $value->id, "order_id" => $value->order_id, "image" => $product->image, "name" => $product->name, 'amount' => $value->amount];
            array_push($arr,$arr_2);
        }
        return $arr;
    }
    public function chefPrepareOrder(Request $request){
        $newOrderDetails = DB::table('order_details')->where('status',2)->get();
        $arr = array();
        foreach ($newOrderDetails as $value){
            $product = DB::table('products')->select('image','name')->where('id' , $value->product_id)->first();
            $arr_2 = ["id" => $value->id, "order_id" => $value->order_id, "image" => $product->image, "name" => $product->name, "amount" => $value->amount];
            array_push($arr,$arr_2);
        }
        return $arr;
    }
    public function updateNewOrder(Request $request){
        $order_id = $_GET["order_id"];
        $status = $_GET["status"];
        $update = DB::table('order_details')->where('id',$order_id)->update([
            "status" => $status
        ]);
    }
}
