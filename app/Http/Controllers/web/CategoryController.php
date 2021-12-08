<?php

namespace App\Http\Controllers\web;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class CategoryController extends Controller
{
    protected $appends = [
        'getParentsTree',
    ];

    public static function getParentsTree($category,$title){
        if($category->parent_id == 0){
            return $title;
        }
        $data = Category::find($category->parent_id);
        $title = $data->name.' > '.$title;

        return self::getParentsTree($data,$title);

    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $dataList = Category::with('children')->get();
        return view('web.category',['dataList' => $dataList]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $dataList = Category::with('children')->get();
        return view('web.category_create',['dataList' => $dataList]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = new Category;
            $data->parent_id = $request->input('parent_id');
            $data->name = $request->input('name');
            $data->image = Storage::putFile('images',$request->file('image'));
            $data->status = $request->input('status');
            $data->save();
        return redirect()->route('category');
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
        $data = Category::find($id);
        $dataList = Category::with('children')->get();
        return view('web.category_edit',['data' => $data, 'dataList' => $dataList]);
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
        $data = Category::find($id);

        $data->parent_id = $request->input('parent_id');
        $data->name = $request->input('name');
        if($request->file('image') != null){
            $data->image = Storage::putFile('images',$request->file('image'));
        }
        $data->status = $request->input('status');
        $data->save();
        return redirect()->route('category');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::table('categories')->where('id','=',$id)->delete();
        return redirect()->route('category');
    }
}
