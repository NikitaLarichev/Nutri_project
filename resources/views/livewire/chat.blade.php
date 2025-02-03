<div>
    <div id="chat_div" class="c5 ms-mes_container" wire:poll.1s wire:scroll>
        @foreach($all_messages as $message)
            @if($message->sender_id== Auth::user()->id)
                <div>{{Auth::user()->name}}:</div>
                <div class="ms-my_mes_container mes"><div class="ms-my_message ms-message_block">{{$message->content}}</div><div class="ms-mes_time"><div>{{$message->created_at->format('d.m.y')}}</div><div>{{$message->created_at->format('H:i')}}</div></div></div>
            @else
                <div class="opponent-name">{{App\Models\User::firstWhere('id', $message->sender_id)->name}}:</div>
                @if($message->isRead == 1)
                    <div class="ms-opponent_mes_container mes"><div class="ms-mes_time"><div>{{$message->created_at->format('d.m.y')}}</div><div>{{$message->created_at->format('H:i')}}</div></div><div class="ms-opponent_message ms-message_block">{{$message->content}}</div></div>
                @else
                <div class="ms-opponent_mes_container mes"><div class="ms-mes_time"><div>{{$message->created_at->format('d.m.y')}}</div><div>{{$message->created_at->format('H:i')}}</div></div><div class="ms-opponent_message ms-message_block is_not_read">{{$message->content}}</div></div>
                @endif
            @endif
        @endforeach
    </div>
    <div>
        <form wire:submit.prevent="sendMessage">
        @csrf
        <div class="d-flex flex-raw ms-chat_butn_container">
            @error('message')<div class="alert alert-danger">{{ $message }}</div>@enderror
            <textarea class="c1-0 ms-chat_input" type="textarea" name="message" wire:model="newMessage"></textarea>
            <input class="button-outline c3 px-5 mb-2" type="submit" value="Отправить"/>
        </div>
        </form>
    </div>
    @script
    <script>
        $('#chat_div').scrollTop(1e9);
        let last_height = $('#chat_div').prop('scrollHeight');
        let dif = last_height - $('#chat_div').scrollTop();
        //console.log(dif);
        $('#chat_div').on('scroll', ()=>{
            console.log('scrolling');
        })
        $wire.on('chat_mes', (obj)=>{
            let dif_height = $('#chat_div').prop('scrollHeight') - last_height;
            last_height = $('#chat_div').prop('scrollHeight');

            let rec_id = obj[0].user_id;
            //console.log(obj);
            let cd = document.getElementById('chat_div');
            let messages = document.getElementsByClassName('mes');
            const last_mes = document.querySelectorAll('.mes:last-of-type');
            let mes_amount = messages.length;

            if( $('#chat_div').scrollTop() + dif + dif_height >= last_height - 10 &&  $('#chat_div').scrollTop() + dif + dif_height <= last_height + 10){
                $('#chat_div').scrollTop(1e9);
                $wire.readMesseges(rec_id, mes_amount);
            }

            //setTimeout((rec_id, mes_amount)=>{
            
            //}, [2000]);

        })
    </script>
    @endscript
</div>
