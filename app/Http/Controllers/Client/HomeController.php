<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        return view('client.home');
    }

    public function menu(Request $request)
    {
        cookie()->queue('mini_menu',$request->get('is_active'),60*24*30);
    }
}
