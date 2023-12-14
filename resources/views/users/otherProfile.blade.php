@extends('layouts.login')

@section('content')

@foreach($users as $user)
  <div>
    <img src="/storage/images/{{ $user -> images }}" alt="icon">    <!-- icon -->
    {{$user -> username}}
  </div>
  <div style="display:inline-flex">                         
    <p>bio</p>
    {{$user -> bio}}                                        
  </div>
  <div> 
    @if($followings ->contains($user->id))               
      <form action="/delete" method="post">                  <!--【フォロー解除ボタン】-->
        @csrf                                
        <button type="submit">フォロー解除</button>
        <input type="hidden" name="id" value="{{$user->id}}">
      </form>
    @else
      <form action="/add-follow" method="post">              <!--【フォローボタン】-->
        @csrf                                  
        <button type="submit">フォロー</button>           
        <input type="hidden" name="id" value="{{$user->id}}">
      </form>
    @endif
  </div>
@endforeach
<div>
  <h1>投稿一覧</h1>
</div>
@foreach($posts as $post)
  <div>
    {{$post->posts}}
  </div>
@endforeach

@endsection