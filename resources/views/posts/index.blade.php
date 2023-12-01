@extends('layouts.login')

@section('content')
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="/js/jquery.js"></script>

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
  <div class="life-type">
    <div class="modal-open" deta-target="{{$post->user_id}}">  <!-- OPEN data"target" -->
      <img src="/images/edit.png" alt="鉛筆画像">
    </div>
  </div>
    <div class="modal-main js-modal" id="{{$post->user_id}}">
      <div class="modal-inner" >
        <form class="inner-content" action="/post/{{ $post->id }}/update" method='post'>    
          @csrf
          <input type='text' name='update_text' placeholder="{{ $post->posts }}" class=''>
          <button type='submit'>更新</button>
        </form> 
      </div>
    </div>

 <a class="btn btn-danger" href="/post/{{ $post->id }}/delete">削除</a>
</div>
@endforeach

@endsection
