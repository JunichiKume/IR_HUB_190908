@extends('layouts.layout')

@section('content')

<div class="chatPage">
  <header class="header">
  <a href="{{route('matching')}}" class="linkToMatching"></a>
    <div class="chatPartner">
      <div class="chatPartner_name">{{ $chat_room_user -> name }}</div>
    </div>
  </header>
  <div class="container">
    <div class="messagesArea messages">
    @foreach($chat_messages as $message)
    <div class="message">
      @if($message->user_id = Auth::id())
        <span>{{Auth::user()->name}}</span>
      @else
        <span>{{$chat_room_user_name}}</span>
      @endif
      
      <div class="commonMessage">
        <div>
        {{$message->message}}
        </div>
      </div>
    </div>
    @endforeach
    </div>
  </div>
  
  <form class="messageInputForm" action="{{'/chat/chat'}}" method="POST">
    <div class='container'>
      {{ csrf_field() }}
      <input type="text" name="message" data-behavior="chat_message" class="messageInputForm_input"  placeholder="メッセージを入力...">
      <!--<textarea rows="3" id="text" data-behavior="chat_message" class="messageInputForm_input" placeholder="メッセージを入力..."></textarea>-->
      <input type="hidden" name="chat_room_id" value="{{ $chat_room_id }}">
      <input type="hidden" name="chat_room_user" value="{{ $chat_room_user }}">
      <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
      <!--<input type="submit" value=送信>-->
      <button id="send">送信</button>
      <!--<div id="output"></div>-->
    </div>
  </form>
</div>
    
<script>
// var chat_room_id = {{ $chat_room_id }};
// var user_id = {{ Auth::user()->id }};
// var current_user_name = "{{ Auth::user()->name }}";
// var chat_room_user_name = "{{ $chat_room_user_name }}";
</script>

@endsection