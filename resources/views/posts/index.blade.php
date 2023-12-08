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
    {{ $post->user_id }}
    {{ $post->posts }}
    {{ $post->created_at }}
  </div>
  @if( Auth::id() === $post ->user_id)
  <div class="modal-open" data-target="modal{{$post->id}}">  <!-- OPEN data"target" -->
    <img src="/images/edit.png" alt="鉛筆画像">
  </div>
  <div class="modal-main js-modal" id="modal{{$post->id}}">
    <div class="modal-inner" >
      <div class="inner-content">
        <form  action="/post/{{ $post->id }}/update" method='post'>    
          @csrf
          <input type='text' name='update_text' placeholder="{{ $post->posts }}" class=''>
          <button type='submit' class="btn btn-primary pull-right">更新</button>
          <a class="send-button modalClose">Close</a>
        </form> 
      </div>
    </div>
  </div>
  <a class="btn btn-danger" href="/post/{{ $post->id }}/delete">削除</a>
  @endif
@endforeach

@endsection
