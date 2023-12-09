@extends('layouts.login')

@section('content')

<h1>Follow list</h1>                    <!--【タイトル】-->


  @foreach($icons as $icon)             <!--【フォロー中アイコン一覧】-->
    <div style="display:inline-flex">
      <a href="/post/{{$icon->follow}}/profile">
        <img src="/storage/images/{{ $icon -> images }}" alt="icon">
      </a>
    {{$icon->follow}}               <!-- 分かりやすい様にid設置中 -->
    </div>
  @endforeach



<div>
@foreach($images as $image)             <!--【投稿一覧】-->
  <div>
    <a href="/post/{{$image->follow}}/profile"><img src="/storage/images/{{ $image -> images }}" alt="icon"></a>
    {{$image->follow}} <!-- 分かりやすい様にid設置中 -->
    {{$image->username}}
  </div>
  <div>
    {{$image->created_at}}
  </div>
  <div>
    {{$image->posts}}
  </div>
@endforeach
</div>








@endsection