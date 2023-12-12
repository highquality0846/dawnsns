<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/added';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        $rules = [
            'username' => 'required | between:4,12',
            'mail' => 'required|email|between:4,50|unique:users',
            'password' => 'required|between:4,12|confirmed|alpha_dash', 
        ];
        $messages = [
            'username.required' => '入力必須です。',
            'username.between' => '４文字以上１２文字以下で入力してください。',
            'mail.required' => '入力必須です。',
            'mail.email' => 'メールアドレスではありません。',
            'mail.between' => '４文字以上５０文字以下で入力してください。',
            'mail.unique' => '登録済のメールアドレスです。',
            'password.required' => '入力必須です。',
            'password.between' => '４文字以上１２文字以下で入力してください。',
            'password.confirmed' => 'パスワードと確認用パスワードが一致しません。',
            'password.alpha_dash' => '英数字で入力してください。',
            'password.unique' => '登録済のパスワードです。',
            'password.confirmed' => '間違えんなよ。。。',
        ];
        return $validator = validator::make($data,$rules,$messages);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */

//

    protected function create(array $data)
    {
        return User::create([
            'username' => $data['username'],
            'mail' => $data['mail'],
            'password' => bcrypt($data['password']),
        ]);
    }


    // public function registerForm(){
    //     return view("auth.register");
    // }

    public function register(Request $request){
        if($request->isMethod('post')){
            $data = $request->input();
            $name = $request->input('username'); 

            $validator = $this->validator($data);
              if($validator->fails()){
                return redirect('/register')->withErrors($validator)
                ->withInput();
            }

            //  $this->create($data);
            $request->session()->put('username', $name);
            return redirect('added');
        }
        return view('auth.register');
    }

    public function added(Request $request){
        $username = $request->session()->get('username');
        $request->session()->forget('username');
        return view('auth.added',compact('username')); //追加 nameもっていきたい
    }
}
