<?php

namespace App\Http\Controllers\web;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $dataList = Product::all();
        return view('web.product',['dataList' => $dataList]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $dataList = Category::with('children')->get();
        return view("web.product_create",["dataList" => $dataList]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = new Product;
        $data->category_id = $request->input('category_id');
        $data->name = ucwords($request->input('name'), " \t\r\n\f\v'");
        $data->image = Storage::putFile('images/products',$request->file('image'));
        $data->contents = ucwords($request->input('contents'), " \t\r\n\f\v,'");
        $data->detail = $request->input('detail');
        $data->price = $request->input('price');
        $data->status = $request->input('status');
        $data->save();
        return redirect()->route('product');
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
        $data = Product::find($id);
        $dataList = Category::with('children')->get();
        return view('web.product_edit',['data' => $data, 'dataList' => $dataList]);
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
        $data = Product::find($id);
        $data->category_id = $request->input('category_id');
        $data->name = ucwords($request->input('name'), " \t\r\n\f\v'");
        if($request->file('image') != null){
            $data->image = Storage::putFile('images/products',$request->file('image'));
        }
        $data->contents = ucwords($request->input('contents'), " \t\r\n\f\v,'");
        $data->detail = $request->input('detail');
        $data->price = $request->input('price');
        $data->status = $request->input('status');
        $data->save();
        return redirect()->route('product');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::table('products')->where('id','=',$id)->delete();
        return redirect()->route('product');
    }
}
