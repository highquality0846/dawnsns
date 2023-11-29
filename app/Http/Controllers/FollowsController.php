<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;                        
use Auth;

class FollowsController extends Controller
{
    
    public function followList(){                           
      $icons = DB::table('users')                             
        ->join('follows','users.id','=','follows.follow')    
        ->where('follower',Auth::id())
        ->get();
      $images = DB::table('users')                           
        ->join('follows','users.id','=','follows.follow')     
        ->join('posts','users.id','=','posts.user_id')
        ->where('follower',Auth::id())
        ->get();
      $follows = DB::table('follows')
        ->where('follower',Auth::id())
        ->count();
      $followers = DB::table('follows')
        ->where('follow',Auth::id())
        ->count();
      return view('follows.followList',["images"=>$images,"icons"=>$icons,'follows'=>$follows,'followers'=>$followers]); 
    }



    public function followerList(){                          
      $icons = DB::table('users')                             
        ->join('follows','users.id','=','follows.follow')     
        ->where('follow',Auth::id())
        ->get();
      $images = DB::table('users')                           
        ->join('follows','users.id','=','follows.follower')     
        ->join('posts','users.id','=','posts.user_id')
        ->where('follow',Auth::id())
        ->get();
      $follows = DB::table('follows')
        ->where('follower',Auth::id())
        ->count();
      $followers = DB::table('follows')
        ->where('follow',Auth::id())
        ->count();
      return view('follows.followerList',["images"=>$images,"icons"=>$icons,'follows'=>$follows,'followers'=>$followers]);
    }
}
