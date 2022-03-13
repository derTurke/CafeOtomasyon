<?php

namespace App\Http\Controllers\web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ChefController extends Controller
{
    public function index()
    {
        return view('web.chef.index');
    }
}
