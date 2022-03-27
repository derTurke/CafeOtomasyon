<?php

namespace App\Http\Controllers;

use App\Models\Basket;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class OrderController extends Controller
{
    public function addOrder(Request $request){

        $address_id = $request->input('address_id');
        $table_id = $request->input('table_id');
        $total = $request->input('total');
        $note = $request->input('note');
        if (empty($address_id) && empty($table_id)){
            return response()->json("Adres bilgileriniz veya masa numaranız boş olamaz!");
        }
        if ($total == 0.0){
            return response()->json("Sipariş verebilmeniz için sepetinizde ürün olması gerekmektedir!");
        }

        $addOrder = DB::table('orders')->insertGetId([
            'user_id' => Auth::user()->id,
            'address_id' => $address_id,
            'table_id' => $table_id,
            'total' => $total,
            'note' => $note,
            'ip' => $_SERVER["REMOTE_ADDR"],
            'created_at' => date('Y-m-d H:i:s')
        ]);
        $baskets = DB::table('baskets')->select('product_id','price','amount','total')->where('user_id',Auth::user()->id)->get();
        foreach ($baskets as $value){
            $addOrderDetail = DB::table('order_details')->insert([
                'order_id' => $addOrder,
                'user_id' => Auth::user()->id,
                'product_id' => $value->product_id,
                'price' => $value->price,
                'amount' => $value->amount,
                'total' => $value->total,
                'ip' => $_SERVER["REMOTE_ADDR"],
                'created_at' => date('Y-m-d H:i:s')
            ]);
        }
        if ($addOrder){
            $basketDelete = DB::table("baskets")->where('user_id',Auth::user()->id)->delete();
            if (!empty($basketDelete)){
                return response()->json('success');
            }
        } else {
            return response()->json('Siparişiniz alınırken bir sorunla karşılaşıldı. Lütfen tekrar deneyiniz!');
        }
    }
    public function getOrders(Request $request){
        $orders = DB::table('orders')->select('id','created_at','total','status')->where('user_id',Auth::user()->id)->orderByDesc('created_at')->get();
        return $orders;
    }

    public function getOrderProductDetail(Request $request){
        $order_id = $request->input('order_id');
        $order_details = DB::table('order_details')->select('id','product_id','price','amount','total')->where('order_id',$order_id)->where('user_id',Auth::user()->id)->get();
        $arr = array();
        foreach ($order_details as $value){
            $product = DB::table('products')->select('name','image')->where('id',$value->product_id)->first();
            $arr_2 = ["id" => $value->id, "image" => $product->image, "name" => $product->name, "price" => $value->price,
                      "amount" => $value->amount, "total" => $value->total];
            array_push($arr,$arr_2);
        }
        return $arr;
    }
    public function getOrderDetail(Request $request){
        $order_id = $request->input('order_id');
        $order = DB::table('orders')->select('id','user_id','address_id','table_id','total','note','created_at','status')->where('user_id',Auth::user()->id)->where('id',$order_id)->first();
        if(!empty($order->address_id)){
            $detail = DB::table('addresses')->select('header','address','building_no','floor','apartment_no','specification','phone')->where('id',$order->address_id)->where('user_id',Auth::user()->id)->first();
            $user = DB::table('users')->select('name')->where('id',$order->user_id)->first();
            $arr = ["id" => $order->id, "total" => $order->total, "note" => $order->note, "created_at" => $order->created_at, 'status' => $order->status ,"user_name" => $user->name, "header" => $detail->header, "address" => $detail->address,
                    "building_no" => $detail->building_no, "floor" => $detail->floor, "apartment_no" => $detail->apartment_no, "specification" => $detail->specification,
                    "phone" => $detail->phone];
        } else {
            $detail = DB::table('tables')->select('id','name')->where('id', $order->table_id)->first();
            $arr = ["id" => $order->id, "total" => $order->total, "note" => $order->note, "created_at" => $order->created_at, 'status' => $order->status ,"table_name" => $detail->name];
        }
        return response()->json($arr);
    }

}
