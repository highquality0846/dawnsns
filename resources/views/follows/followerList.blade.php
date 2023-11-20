@extends('layouts.login')

@section('content')

<h1>Follower list</h1>

<div>
  @foreach($icons as $icon)<!--【フォロー中アイコン一覧】-->
    <img src="/images/{{ $icon -> images }}" alt="icon">
    {{$icon->follower}}  <!-- 分かりやすい様にid設置中 -->
  @endforeach
</div>

<div>
@foreach($images as $image)
  <div>
    <img src="/images/{{ $image -> images }}" alt="icon">
    {{$image->follower}} <!-- 分かりやすい様にid設置中 -->
    {{$image->username}}
  </div>
  {{$image->posts}}
@endforeach
</div>

@endsection