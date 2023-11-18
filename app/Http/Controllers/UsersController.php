<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;                         //DB使用宣言
use Auth;

class UsersController extends Controller

{

    //dd(Auth::id());

    public function profile(){
      return view('users.profile');}


    public function search(Request $request){               //【検索機能】
      $word = $request -> input('search');                  //formのname属性=search
      if (isset($request->search)) {                        
        $users = DB::table('users')
          ->where('username','like',"%".$word."%")
          ->select('id','username','images')
          ->get();} 
      else {
        $users = DB::table('users')
          ->select('id','username','images')
          ->get(); 
      } 
      $followings = DB::table('follows')
          ->where('follower', Auth::id()) 
          ->pluck('follow');                
      return view('users.search',['users'=>$users,'word'=>$word,'followings'=>$followings]);}


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