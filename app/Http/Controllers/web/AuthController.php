<?php

namespace App\Http\Controllers\web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('web.index');
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
