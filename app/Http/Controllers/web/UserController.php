<?php

namespace App\Http\Controllers\web;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(Auth::user()->role !== 4){
            return view('web.garson.index');
        }
        $dataList = User::all();
        return view('web.users',['dataList' => $dataList]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if(Auth::user()->role !== 4){
            return view('web.garson.index');
        }
        return view('web.user_create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if(Auth::user()->role !== 4){
            return view('web.garson.index');
        }
        $data = new User;
        $data->name = $request->input('name');
        $data->email = $request->input('email');
        $data->password = Hash::make($request->input('password'));
        $data->birthdate = $request->input('birthdate');
        $data->sex = $request->input('sex');
        $data->role = $request->input('role');
        $result = $data->save();
        if ($result == 1){
            return back()->with('success','Kullanıcı başarıyla eklendi.');
        } else {
            return back()->with('error','Kullanıcı eklenirken bir sorunla karşılaşıldı! Lütfen tekrar deneyiniz.');
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user,$id)
    {
        if(Auth::user()->role !== 4){
            return view('web.garson.index');
        }
        $data = User::find($id);
        return view('web.user_edit',['data' => $data]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user,$id)
    {
        if(Auth::user()->role !== 4){
            return view('web.garson.index');
        }
        $data = User::find($id);
        $data->name = $request->input('name');
        $data->email = $request->input('email');
        $data->birthdate = $request->input('birthdate');
        $data->sex = $request->input('sex');
        $data->role = $request->input('role');
        $result = $data->save();
        if ($result == 1){
            return back()->with('success','Kullanıcı başarıyla güncellendi.');
        } else {
            return back()->with('error','Kullanıcı güncellenirken bir sorunla karşılaşıldı! Lütfen tekrar deneyiniz.');
        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user,$id)
    {
        if(Auth::user()->role !== 4){
            return view('web.garson.index');
        }
        $result = DB::table('users')->where('id','=',$id)->delete();
        if ($result == 1){
            return back()->with('success','Kullanıcı başarıyla kaldırıldı.');
        } else {
            return back()->with('error','Kullanıcı kaldırılırken bir sorunla karşılaşıldı! Lütfen tekrar deneyiniz.');
        }
    }
}
