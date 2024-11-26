@extends('layouts.account_menu', ['user'=>$user])
@section('menu')
@parent
@endsection
@section('account_content')
    <div class="container ms-mt100px">
        <!-- <div class="ms-mes_container">
            @foreach($messages as $message)
                @if($message->sender_id== Auth::user()->id)
                    <div class="ms-my_message ms-message_block">{{$message->content}}</div>
                @else
                    <div class="ms-opponent_message ms-message_block">{{$message->content}}</div>
                @endif
            @endforeach
        </div>
       <div>
            <form method="post" action={{route('send_message_to_admin')}}>
            @csrf
                <div class="d-flex flex-raw">
                    <input class="ms-chat_input" type="textarea" name="send_field"/>
                    <input class="ms-chat_submit" type="submit" value="отправить"/>
                </div>
            </form>
       </div> -->
       @livewire('chat')       
    </div>
@endsection
