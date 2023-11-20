@extends('layouts.login')

@section('content')

<h1>Follow list</h1>  <!--【タイトル】-->

<div>
  @foreach($images as $image)<!--【フォロー中アイコン一覧】-->
    <img src="/images/{{ $image -> images }}" alt="icon">
    {{$image->follow}}
  @endforeach
</div>

<div>

</div>








@endsection