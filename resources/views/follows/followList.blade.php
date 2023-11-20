@extends('layouts.login')

@section('content')

<h1>Follow list</h1>

@foreach($images as $image)
<img src="/images/{{ $image -> images }}" alt="icon">
{{$image->follow}}

@endforeach

@endsection