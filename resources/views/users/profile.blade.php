@extends('layouts.login')

@section('content')

@foreach($user as $user)
  <img src='/images/{{$user->images}}'>
  <form action='/name' method='POST'>
  @csrf
    <label for="name">UserName</label>
    <input type="text" name='name' value='{{$user->username}}'>
    <br>
    <label for="adress">MailAdress</label>
    <input type="text" name='adress' value='{{$user->mail}}'>
    <br>
    <label for="password">Password</label>
    <input type="text" name='password' value='{{$user->password}}' readonly>
    <br>
    <label for="newpassword">new Password</label>
    <input type="password" name='newpassword' value='{{$user->password}}'>
    <br>
    <label for="bio">Bio</label>
    <input type="text" name='bio' value='{{$user->bio}}'>
    <br>
    <label for="image">IconImage</label>
    <input type="file" name='image'>
    <br>
    <input type="submit" value='更新する'>
  </form>

@endforeach









@endsection