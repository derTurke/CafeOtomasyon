<?php

namespace App\Http\Controllers\web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class AuthController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $new = DB::table('orders')->where('status',1)->count();
        $accepted = DB::table('orders')->where('status',2)->count();
        $prepared = DB::table('orders')->where('status',3)->count();
        $completed = DB::table('orders')->where('status',4)->count();
        $daily_sum = DB::table('orders')->where('status',4)->whereBetween('created_at',[date('Y-m-d 00:00:00'),date('Y-m-d 23:59:59')])->sum('total');
        $total_sum = DB::table('orders')->where('status',4)->sum('total');
        $data = [
            "new" => $new,
            "accepted" => $accepted,
            "prepared" => $prepared,
            "completed" => $completed,
            "daily_sum" => $daily_sum,
            'total_sum' => $total_sum
        ];
        return view('web.index',$data);
    }

    public function login(){
        return view('web.login');
    }

    public function logincheck(Request $request){
        if($request->isMethod("POST")){
            $credentials = $request->validate([
                'email' => ['required', 'email'],
                'password' => ['required'],
            ]);
            if (Auth::attempt($credentials)) {
                if(Auth::user()->role === 4) {
                    $request->session()->regenerate();
                    return redirect()->intended('home');
                }
            }
            return back()->withErrors([
                'email' => 'The provided credentials do not match our records.',
            ]);

        } else {
            return view('web.login');
        }
    }
    public function logout(Request $request){
        Auth::logout();
        $request->session()->regenerate();
        $request->session()->regenerateToken();
        return redirect('/admin');
    }

}
