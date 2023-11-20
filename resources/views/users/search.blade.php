@extends('layouts.login')

@section('content')

<form action="search" method="post"><!--【検索用form】-->
@csrf                                
  <input type="text" name="search" placeholder="ユーザー名">           
  <button type="submit">検索</button>
</form> 


@foreach ($users as $user)           
<div>
  <img src="/images/{{ $user -> images }}" alt="icon"> <!--【ユーザーアイコン】-->
  {{ $user->username}}  

  @if($followings ->contains($user->id))  <!-- あなたの番号が$followingsにcontainsだったら -->
    <form action="delete" method="post"> <!--【フォロー解除ボタン】-->
      @csrf                                
      <button type="submit" class="deleat-botton">フォロー解除</button>
      <input type="hidden" name="id" value="{{$user->id}}">
    </form>
  @else
    <form action="add-follow" method="post"> <!--【フォローボタン】-->
      @csrf                                  
      <button type="submit" class="follow-botton">フォロー</button>           
      <input type="hidden" name="id" value="{{$user->id}}">
    </form>

  @endif
</div>

@endforeach

@endsection