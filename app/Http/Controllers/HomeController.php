<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function getLastOrder(Request $request){
        $order_details = DB::table('order_details')->select('product_id')->where('user_id',Auth::user()->id)->orderByDesc('id')->limit(5)->get();
        $arr = array();
        foreach ($order_details as $value){
            $product = DB::table('products')->where('id',$value->product_id)->first();
            $arr2 = ["id" => $product->id ,"image" => $product->image,"name" => $product->name, "price" => $product->price];
            array_push($arr, $arr2);
        }
        return $arr;
    }
}
