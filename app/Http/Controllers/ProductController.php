<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    public function getProducts(Request $request){
        $category_id = $request->input('category_id');
        $products = DB::table('products')->select('id','category_id','name','image','detail','price','contents')->where('category_id',$category_id)->where('status',1)->get();
        return $products;
    }
}
