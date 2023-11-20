<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;                        
use Auth;

class FollowsController extends Controller
{
    
    public function followList(){           //フォローリスト
      $images = DB::table('users')
        ->join('follows','users.id','=','follows.follow')     //DBの結合
        ->join('posts','users.id','=','posts.user_id')
        ->where('follower',Auth::id())
        ->get();
        return view('follows.followList',["images"=>$images]); 
    }


    public function followerList(){
        return view('follows.followerList');
    }
}
