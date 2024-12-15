<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Message;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class Chat extends Component
{

    public $messages = [];
    public $newMessage = "";
    public $user;
    public $receiver_id;

    public function mount(){
        $this->user = Auth::user();
        if($this->user->role != 'admin'){
            $this->receiver_id = User::firstWhere('role', 'admin')->id;
            $this->messages = Message::where('sender_id', $this->user->id)->orWhere('receiver_id', $this->user->id)->orderby('created_at')->get();
        } else {
            $this->messages = Message::where('sender_id', $this->receiver_id)->orWhere('receiver_id', $this->receiver_id)->orderby('created_at')->get();
        }
        
    }

    public function sendMessage(){
        if($this->newMessage != "") {
            $message = new Message;
            $message->sender_id = Auth::user()->id;
            $message->receiver_id = $this->receiver_id;
            $message->content = $this->newMessage;
            $message->date = date('y-m-d');
            $message->save();
        }
    }

    public function refreshMesseges(){
        $this->mount();
    }
    
    public function render()
    {
        $this->mount();
        $this->dispatch('chat_mes');
        return view('livewire.chat', ['all_messages' => $this->messages]);
    }
}
