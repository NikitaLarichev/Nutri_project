<span 
@if($messages_count != 0)
    class="mes_count px-1"
@else
    class="d-none"
@endif
 wire:poll.1s>
    {{$messages_count}}
</span>
