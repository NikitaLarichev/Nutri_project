<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Message;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class MessageCounter extends Component
{
    public $messages_count;
    public $client_id = 0;

    public function render()
    {
        if($this->client_id == 0){
            $this->messages_count = Message::where('receiver_id', Auth::user()->id)->where('isRead', 0)->get()->count();
        } else {
            $this->messages_count = Message::where('receiver_id', Auth::user()->id)->where('sender_id', $this->client_id)->where('isRead', 0)->get()->count();
        }

        return view('livewire.message-counter', ['messages_count' => $this->messages_count]);
    }
}
