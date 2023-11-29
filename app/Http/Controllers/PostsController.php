<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostsController extends Controller
{
    public function index(){
      $posts = DB::table('posts')->get();
      $follows = DB::table('follows')
        ->where('follower',Auth::id())
        ->count();
        //dd($follows);
      $followers = DB::table('follows')
        ->where('follow',Auth::id())
        ->count();
      return view('posts.index',['posts'=>$posts,'follows'=>$follows,'followers'=>$followers]);
    }


    public function tweet(Request $request){            
      $post = $request->input('post_Text');      
      DB::table('posts')->insert([              
        'posts' => $post,                     
        'user_id' => Auth::id(),              
        'created_at' => now(),                
        'updated_at' => now()                  
      ]);
      return redirect('/top');                   
    }
    

    public function delete($id){                        //投稿削除
      DB::table('posts')                                
        ->where('id', $id)                          
        ->delete();                                 
      return redirect('/top');                       
    }


    public function update($id,Request $request){       //更新機能
      DB::table('posts')                        
        ->where('id', $id)                    
        ->update([
          'posts' => $request->update_text,       
          'updated_at' => now()                    
        ]);                           
      return redirect('/top');                 
    }

}