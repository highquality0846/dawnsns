@extends('layouts.login')

@section('content')

<h1>Follow list</h1>  <!--【タイトル】-->

<div>
  @foreach($icons as $icon)<!--【フォロー中アイコン一覧】-->
    <img src="/images/{{ $icon -> images }}" alt="icon">
    {{$icon->follow}}  <!-- 分かりやすい様にid設置中 -->
  @endforeach
</div>

<div>
@foreach($images as $image)
  <div>
    <img src="/images/{{ $image -> images }}" alt="icon">
    {{$image->follow}} <!-- 分かりやすい様にid設置中 -->
    {{$image->username}}
  </div>
  {{$image->posts}}
@endforeach
</div>








@endsection