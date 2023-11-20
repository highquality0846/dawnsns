@extends('layouts.login')

@section('content')

<h1>Follow list</h1>

@foreach($icon as $icons)
<img src="/images/{{ $image -> images }}" alt="icon">



@endforeach

@endsection