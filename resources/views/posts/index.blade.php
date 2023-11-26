@extends('layouts.login')

@section('content')

<div class='container'>  
  <form action='/tweet' method='post'>     
    @csrf
    <div class='text_form'>
      <input type='text' name='post_Text'>
    </div>
    <div class='button'>
      <button type='submit'>投稿ボタン</button>
    </div>
  </form>
</div>

@foreach ($posts as $post)  
<div>
  {{ $post->id }}
  {{ $post->posts }}
  {{ $post->created_at }}
<form action="/post/{{ $post->id }}/update" method='post'>    
  @csrf
  <input type='text' name='update_text' placeholder="{{ $post->posts }}">
  <button type='submit'>更新</button>
</form>
  <a class="btn btn-danger" href="/post/{{ $post->id }}/delete">削除</a>
</div>
@endforeach

@endsection
