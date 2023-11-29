<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;                         //DB使用宣言
use Auth;

class UsersController extends Controller

{


    public function profile($id){                           //【他ユーザーのプロフィール機能】
      $users = DB::table('users')
        ->where('id',$id)
        ->get();
      $followings = DB::table('follows')
        ->where('follower', Auth::id()) 
        ->pluck('follow'); 
      $posts = DB::table('posts')
        ->where('user_id',$id)
        ->get();
      $follows = DB::table('follows')
        ->where('follower',Auth::id())
        ->count();
      $followers = DB::table('follows')
        ->where('follow',Auth::id())
        ->count();
      return view('users.otherProfile',['users'=>$users,'followings'=>$followings,'posts'=>$posts,'follows'=>$follows,'followers'=>$followers]);
    }


    public function search(Request $request){               //【検索機能】
      $word = $request->input('search');                  //formのname属性=search
      if (isset($request->search)) {                        
        $users = DB::table('users')
          ->where('id', '<>', Auth::id())                   //ログイン中のid以外
          ->where('username','like',"%".$word."%")
          ->select('id','username','images')
          ->get();} 
      else {
        $users = DB::table('users')
          ->where('id', '<>', Auth::id())                   
          ->select('id','username','images')
          ->get(); 
      } 
        $followings = DB::table('follows')
          ->where('follower', Auth::id()) 
          ->pluck('follow'); 
        $follows = DB::table('follows')
          ->where('follower',Auth::id())
          ->count();
        $followers = DB::table('follows')
          ->where('follow',Auth::id())
          ->count();         
      return view('users.search',['users'=>$users,'word'=>$word,'followings'=>$followings,'follows'=>$follows,'followers'=>$followers]);
    }


    public function follow(Request $request){              //【フォロー機能】
      $id = $request->input('id');                         
      DB::table('follows')->insert([                       
        'follow' => $id,
        'follower' => Auth::id(),
        'created_at' => now()]);
      return back();
    }

    public function delete(Request $request){              //【フォロー解除機能】
      $id = $request->input('id');                         
      DB::table('follows')                                 
        ->where('follow', $id)                             
        ->delete();                                        
      return back();
    }

}