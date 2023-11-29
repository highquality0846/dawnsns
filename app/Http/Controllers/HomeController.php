<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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
    { $follows = DB::table('follows')
        ->where('follower',Auth::id())
        ->count();
      $followers = DB::table('follows')
        ->where('follow',Auth::id())
        ->count();
      return view('home',['follows'=>$follows,'followers'=>$followers]);
    }
}
