<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Auth;
use App\User;

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
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {   
        $user_data = Auth::user();
      //  dd(json_encode($user_data));
        return view('home')->with('user_data', json_encode($user_data));
    }

    public function action_denied()
    {   
        $user_data = Auth::user();
        return view('site.denied')->with('user_data', json_encode($user_data));
    }
}
