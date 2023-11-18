<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostsController extends Controller
{
    public function index(){
        $posts = DB::table('posts')->get();
        // dd($posts);
        return view('posts.index',['posts'=>$posts]);
    }


    public function tweet(Request $request){   
        $post = $request->input('post_Text');      //投稿フォームに入力された値を取得
        \DB::table('posts')->insert([              //上記をもとにDBに投稿データを保存
            'posts' => $post,                     
            'user_id' => Auth::id(),               //idも送ってね
            'created_at' => now(),                 //作成日時も送信
            'updated_at' => now()                  //更新日時も送信
        ]);
        return redirect('/top');                   //処理が完了したらTOPページに戻る
    }

    
    public function delete($id){                        //formタグとaタグとで数字の広い方が違う。上とこれの関数の違い
      // dd($id);　　　　　　　　　　　　　　　　　　   　     //デバッグ関数
      DB::table('posts')                                //DBのpostsテーブルの
            ->where('id', $id)                          //where idから$idを
            ->delete();                                 //削除してね
 
        return redirect('/top');                        //最後に/topに戻ってね
    }


    //更新機能作成2023.11.11
    public function update($id,Request $request){      //更新機能 投稿と同じくRequestで探してくる
        DB::table('posts')                        
            ->where('id', $id)                    
            ->update([
              'posts' => $request->update_text,        //シングルアローで探せる
              'updated_at' => now()                    //更新日時を現在に更新する
            ]);                           
 
        return redirect('/top');                 
    }


}