<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;                        
use Auth;

class FollowsController extends Controller
{
    
    public function followList(){           //フォローリスト
      $images = DB::table("users")
        ->select("id","images")
        ->get();
        return view('follows.followList',["images"=>$images]); 
    }


    public function followerList(){
        return view('follows.followerList');
    }
}
