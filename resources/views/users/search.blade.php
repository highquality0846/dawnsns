@extends('layouts.login')

@section('content')

<form action="search" method="post">
@csrf                                
  <input type="text" name="search" placeholder="ユーザー名">           
  <button type="submit">検索</button>
  @if(isset($word))
    検索ワード：{{$word}}
  @endif
</form> 



@foreach ($users as $user)           
<div>
  <img src="/storage/images/{{ $user -> images }}" alt="icon">
  {{ $user->username}}  

  @if($followings ->contains($user->id))
    <form action="delete" method="post">
      @csrf                                
      <button type="submit" class="deleat-botton">フォロー解除</button>
      <input type="hidden" name="id" value="{{$user->id}}">
    </form>
  @else
    <form action="add-follow" method="post">
      @csrf                                  
      <button type="submit" class="follow-botton">フォロー</button>           
      <input type="hidden" name="id" value="{{$user->id}}">
    </form>

  @endif
</div>

@endforeach

@endsection