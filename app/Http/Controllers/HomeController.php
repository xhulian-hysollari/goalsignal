<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */



    public function index()
    {
        if(isset(Auth::user()->is_active))
        {
            if (Auth::user()->is_active == 1)
            {
                return view('layouts.admin');
            } elseif (Auth::user()->is_active !== 1) {
                Auth::logout();
                return redirect('/login');
            }

        }
    }

}
