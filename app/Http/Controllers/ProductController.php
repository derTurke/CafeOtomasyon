<?php

namespace App\Http\Controllers;

use App\Models\Basket;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    public function getProducts(Request $request){
        $category_id = $request->input('category_id');
        $products = DB::table('products')->select('id','category_id','name','image','detail','price','contents')->where('category_id',$category_id)->where('status',1)->get();
        return $products;
    }
    public function getProduct(Request $request){
        $product_id = $request->input('product_id');
        $product = DB::table('products')->select('id','category_id','name','image','detail','price','contents')->where('id',$product_id)->where('status',1)->get();
        return $product;
    }

    public function addBasket(Request $request){

        $product_id = $request->input('product_id');
        $price = $request->input('price');
        $piece = $request->input('piece');
        $total = $request->input('total');
        $product = DB::table('products')->select('image','name')->where('id',$product_id)->get();
        $image = $product[0]->image;
        $name = $product[0]->name;

        $addBasket = DB::table('baskets')->insert([
            'user_id' => Auth::user()->id,
            'product_id' => $product_id,
            'image' => $image,
            'name' => $name,
            'price' => $price,
            'amount' => $piece,
            'total' => $total,
            'ip' => $_SERVER["REMOTE_ADDR"],
            'created_at' => date('Y-m-d H:i:s')
        ]);
        if ($addBasket){
            return response()->json('success');
        } else {
            return response()->json('Ürün sepetinize eklenirken bir sorunla karşılaşıldı. Lütfen tekrar deneyiniz!');
        }

    }

    public function getBasket(Request $request){

        $basket = DB::table('baskets')->select('id','product_id','price','amount','total')->where('user_id',Auth::user()->id)->where('status',1)->get();
        foreach ($basket as $value){
            $product = DB::table('products')->select('price')->where('id',$value->product_id)->get();
            $editBasket = DB::table('baskets')->where('id',$value->id)->update([
                'price' => $product[0]->price,
                'total' => $value->amount * $product[0]->price
            ]);
        }
        $basket = DB::table('baskets')->select('id','product_id','image','name','price','amount','total')->where('user_id',Auth::user()->id)->where('status',1)->get();

        return $basket;
    }

    public function deleteBasket(Request $request){
        $id = $request->input('id');
        $data = Basket::where("id",$id)->where("user_id",Auth::user()->id)->first();
        $data->delete();
        $basket = DB::table('baskets')->select('id','product_id','image','name','price','amount','total')->where('user_id',Auth::user()->id)->where('status',1)->get();
        return $basket;
    }

    public function getBasketSummary(Request $request){
        $basket = DB::table('baskets')->where('user_id',Auth::user()->id)->where('status',1)->sum('total');
        return response()->json($basket);
    }

    public function getTables(Request $request){
        $tables = DB::table('tables')->select('id','name','qr_code')->where('status',0)->get();
        return $tables;
    }



}
