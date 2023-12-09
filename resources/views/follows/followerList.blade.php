@extends('layouts.login')

@section('content')

<h1>Follower list</h1>

<div>
  @foreach($icons as $icon)<!--【フォロー中アイコン一覧】-->
    <a href="/post/{{$icon->follower}}/profile">
      <img src="/storage/images/{{ $icon -> images }}" alt="icon">
    </a>
    {{$icon->follower}}  <!-- 分かりやすい様にid設置中 -->
  @endforeach
</div>

<div>
@foreach($images as $image)
  <div>
  <a href="/post/{{$image->follower}}/profile"><img src="/storage/images/{{ $image -> images }}" alt="icon"></a>
    {{$image->follower}} <!-- 分かりやすい様にid設置中 -->
    {{$image->username}}
  </div>
  {{$image->created_at}}
  {{$image->posts}}
@endforeach
</div>

@endsection