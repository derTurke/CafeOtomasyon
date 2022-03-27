<?php

namespace App\Http\Controllers\web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    public function index(){
        return view('web.profile');
    }
    public function profile_update(Request $request){
        $name = $request->input('name');
        $eposta = $request->input('email');
        $users = DB::table('users')->where('email',$eposta)->first();
        if ($users->email == $eposta){
            DB::table('users')->where('id',Auth::user()->id)->update([
                'name' => $name
            ]);
            return back()->with('success','Bilgiler başarıyla güncellendi.');
        } else {
            DB::table('users')->where('id',Auth::user()->id)->update([
                'name' => $name,
                'email' => $eposta
            ]);
            return back()->with('success','Bilgiler başarıyla güncellendi.');
        }


    }
    public function password_update(Request $request){
        $sifre = $request->input('sifre');
        $yeni_sifre = $request->input('yeni_sifre');
        $yeni_sifre_tekar = $request->input('yeni_sifre_tekrar');
        if (empty($sifre)){
            return back()->with('error','Mevcut şifre boş olamaz.');
        }
        if (empty($yeni_sifre)){
            return back()->with('error','Yeni şifre boş olamaz.');
        }
        if ($yeni_sifre != $yeni_sifre_tekar){
            return back()->with('error','Yeni şifreler eşleşmiyor');
        }

        if (!Hash::check($sifre,Auth::user()->getAuthPassword())){
            return back()->with('error','Mevcut şifreniz yanlış.');
        }
        $update = DB::table('users')->where('id',Auth::user()->id)->update([
            'password' => Hash::make($yeni_sifre)
        ]);
        if (!empty($update)){
            return back()->with('success','Şifre başarıyla güncellendi.');
        } else {
            return back()->with('error','Şifreniz güncellenirken bir sorunla karşılaşıldı! Lütfen tekrar deneyiniz.');
        }

    }
}
