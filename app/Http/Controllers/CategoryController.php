<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CategoryController extends Controller
{
    public function getCategories(){
        return DB::table('categories')->select('id','parent_id','name','image')->where('status',1)->where('parent_id',0)->get();
    }
}
