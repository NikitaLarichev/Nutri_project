<div>
    <div id="chat_div" class="ms-mes_container" wire:poll.1s wire:scroll>
        @foreach($all_messages as $message)
            @if($message->sender_id== Auth::user()->id)
                <div class="ms-my_mes_container"><div class="ms-my_message ms-message_block">{{$message->content}}</div><div class="ms-mes_time"><div>{{$message->created_at->format('d.m.y')}}</div><div>{{$message->created_at->format('h:m')}}</div></div></div>
            @else
                <div class="ms-opponent_mes_container"><div class="ms-mes_time"><div>{{$message->created_at->format('d.m.y')}}</div><div>{{$message->created_at->format('h:m')}}</div></div><div class="ms-opponent_message ms-message_block">{{$message->content}}</div></div>
            @endif
        @endforeach
    </div>
    <div>
        <form wire:submit.prevent="sendMessage">
        @csrf
        <div class="d-flex flex-raw ms-chat_butn_container">
            <input class="ms-chat_input" type="textarea" wire:model="newMessage"/>
            <input class="ms-chat_submit" type="submit" value="отправить"/>
        </div>
        </form>
    </div>
</div>
