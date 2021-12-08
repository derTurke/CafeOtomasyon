<?php

namespace App\Http\Controllers\web;

use App\Http\Controllers\Controller;
use App\Models\Table;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TableController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $dataList = Table::all();
        return view('web.table',['dataList' => $dataList]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = new Table;
        $latest = DB::table('tables')->latest('id')->first();
        if(empty($latest)){
            $data->name = 1;
            $data->qr_code = "1-table";
        } else {
            $data->name = $latest->name + 1;
            $data->qr_code = ($latest->name + 1).'-table';
        }
        $data->save();
        return redirect()->route('table');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::table('tables')->where('id','=',$id)->delete();
        return redirect()->route('table');
    }
}
