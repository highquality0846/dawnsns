<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;    
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ProfileController extends Controller

{

public function profile(){

  $user = DB::table('users')
    ->where('id',Auth::id())
    ->get();
  $follows = DB::table('follows')
    ->where('follower',Auth::id())
    ->count();
  $followers = DB::table('follows')
    ->where('follow',Auth::id())
    ->count();
  return view('users.profile',['user'=>$user,'follows'=>$follows,'followers'=>$followers]);
}

public function update(Request $request){
  $update = $request->input();
  $rules = [
    'username' => 'required | between:4,12',
    'mail' => 'required|email|between:4,50',
  ];
  $messages = [
    'username.required' => '入力必須です。',
    'username.between' => '４文字以上１２文字以下で入力してください。',
    'mail.required' => '入力必須です。',
    'mail.email' => 'メールアドレスではありません。',
    'mail.between' => '４文字以上５０文字以下で入力してください。',
    'mail.unique' => '登録済のメールアドレスです。',
  ];
  $validator = validator::make($update, $rules, $messages); 

  if ($validator->fails()) {
    return redirect('/profile')
    ->withErrors($validator)
    ->withInput();
  }
  if (isset($request->password)){
    $newpass = $request->input();   
    $rules = [
      'password' => 'between:4,12|alpha_dash',
    ];
    $messages = [
      'password.required' => '入力必須です。',
      'password.between' => '４文字以上１２文字以下で入力してください。',
      'password.confirmed' => 'パスワードと確認用パスワードが一致しません。',
      'password.alpha_dash' => '英数字で入力してください。',
    ];
    $validator = validator::make($newpass, $rules, $messages);
  if ($validator->fails()) {
    return redirect('/profile')
    ->withErrors($validator)
    ->withInput();
  }
  DB::table('users')
    ->where('id', Auth::id())
    ->update([
    'password'=>bcrypt($update['password']),    //クリプト　暗号化
  ]);  
}

  if(isset($request->image)){                                 ///ここ難しい、要復讐。
    $imageName = $request->file('images')->getClientOriginalName();
    $request->file('images')->storeAs('/images', $imageName, 'public');
  }else{
    $imageName = Auth::user()->images;
  }
   DB::table('users')                        
      ->where('id', Auth::id())                    
      ->update([
        'username'=>$update['username'],
        'mail'=>$update['mail'],
        'bio'=>$update['bio'],
        'images' => $imageName
      ]);
  return back();
  }
}