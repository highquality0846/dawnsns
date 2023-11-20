<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;                        
use Auth;

class FollowsController extends Controller
{
    
    public function followList(){                             //フォローリスト
      $icons = DB::table('users')                             //フォロー中icon一覧
        ->join('follows','users.id','=','follows.follow')     //DBの結合
        ->where('follower',Auth::id())
        ->get();
      $images = DB::table('users')                            //フォロー中投稿一覧
        ->join('follows','users.id','=','follows.follow')     
        ->join('posts','users.id','=','posts.user_id')
        ->where('follower',Auth::id())
        ->get();
      return view('follows.followList',["images"=>$images,"icons"=>$icons]); 
    }



    public function followerList(){                           //フォロワーリスト
      $icons = DB::table('users')                             
        ->join('follows','users.id','=','follows.follow')     
        ->where('follow',Auth::id())
        ->get();
      $images = DB::table('users')                            //フォロワー投稿一覧
        ->join('follows','users.id','=','follows.follower')     
        ->join('posts','users.id','=','posts.user_id')
        ->where('follow',Auth::id())
        ->get();
        //dd($images);
      return view('follows.followerList',["images"=>$images,"icons"=>$icons]);
    }
}
