@extends('layouts.login')

@section('content')

@if($errors->has('username'))
    <div class="error">
        <p>{{ $errors->first('username') }}</p>
    </div>
@endif

@if($errors->has('mail'))
    <div class="error">
        <p>{{ $errors->first('mail') }}</p>
    </div>
@endif

@if($errors->has('password'))
    <div class="error">
        <p>{{ $errors->first('password') }}</p>
    </div>
@endif

@foreach($user as $user)
  <img src='/storage/images/{{$user->images}}'>
  <form action='/update' method='POST' name='update' enctype="multipart/form-data">
  @csrf
    <label for="name">UserName</label>
    <input type="text" name='username' value='{{$user->username}}'>
    <br>
    <label for="adress">MailAdress</label>
    <input type="text" name='mail' value='{{$user->mail}}'>
    <br>
    <label for="password">Password</label>
    <input type="text" value='●●●●●●' readonly>
    <br>
    <label for="newpassword">new Password</label>
    <input type="password" name='password'>
    <br>
    <label for="bio">Bio</label>
    <input type="text" name='bio' value='{{$user->bio}}'>
    <br>
    <label for="image">IconImage</label>
    <input type="file" name='images'>
    <br>
    <input type="submit" value='更新する'>
  </form>

@endforeach









@endsection