<?php

namespace App\Http\Controllers\web;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Setting::first();
        if($data === null){
            $data = new Setting;
            $data->company_name = "";
            $data->save();
            $data = Setting::first();
        }
        return view('web.setting_edit',['data' => $data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $id = $request->input('id');
        $data = Setting::find($id);
        $data->company_name = $request->input('company_name');
        $data->brand_name = $request->input('brand_name');
        $data->address = $request->input('address');
        $data->phone = $request->input('phone');
        $data->fax = $request->input('fax');
        $data->email = $request->input('email');
        $data->sicil_no = $request->input('sicil_no');
        $data->vergi_no = $request->input('vergi_no');
        $data->vergi_dairesi = $request->input('vergi_dairesi');
        $data->mersis_no = $request->input('mersis_no');
        $data->facebook = $request->input('facebook');
        $data->twitter = $request->input('twitter');
        $data->instagram = $request->input('instagram');
        $data->linkedin = $request->input('linkedin');
        $data->kullanici_sozlesme = $request->input('kullanici_sozlesme');
        $data->kvkk = $request->input('kvkk');
        $data->aydinlatma_metni = $request->input('aydinlatma_metni');
        $data->save();

        return redirect()->route('setting');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
