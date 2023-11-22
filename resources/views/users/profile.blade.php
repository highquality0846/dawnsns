@extends('layouts.login')

@section('content')

@foreach($users as $user)
<div>
  <img src="/images/{{ $user -> images }}" alt="icon">    <!-- icon -->
  {{$user -> username}}
</div>

<div style="display:inline-flex">                         
  <p>bio</p>
  {{$user -> bio}}                                        
</div>


  @if($followings ->contains($user->id))  
  <div>                <!-- あなたの番号が$followingsにcontainsだったら -->
    <form action="delete" method="post">                  <!--【フォロー解除ボタン】-->
      @csrf                                
      <button type="submit" class="deleat-botton">フォロー解除</button>
      <input type="hidden" name="id" value="{{$user->id}}">
    </form>
  @else
    <form action="add-follow" method="post">              <!--【フォローボタン】-->
      @csrf                                  
      <button type="submit" class="follow-botton">フォロー</button>           
      <input type="hidden" name="id" value="{{$user->id}}">
    </form>
  </div>
  @endif



@endforeach

@endsection