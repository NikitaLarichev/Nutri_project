<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Message;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class Chat extends Component
{

    public $messages = [];
    public $newMessage;
    public $user;
    public $receiver_id;

    public function mount(){
        $this->user = Auth::user();
        if($this->user->role != 'admin'){
            $this->receiver_id = User::firstWhere('role', 'admin')->id;
        }
        $this->messages = Message::where('sender_id', $this->user->id)->orWhere('receiver_id', $this->user->id)->orderby('created_at')->get();
    }

     /** @js  */
    // public function scrollDown()
    // {
    //         return 'document.getElementById("chat_div").div.scrollTo(0, 0)';
    // }

    public function sendMessage(){
        // Message::create([
        //     'sender_id' => $this->user->id,
        //     'receiver_id' => $this->receiver_id,
        //     'date' => date('y-m-d'),
        //     'content' => $this->newMessage,  
        // ]);
        $message = new Message;
        $message->sender_id = Auth::user()->id;
        $message->receiver_id = $this->receiver_id;
        $message->content = $this->newMessage;
        $message->date = date('y-m-d');
        $message->save();
    }

    public function refreshMesseges(){
        $this->messages = Message::where('sender_id', $this->user->id)->orWhere('receiver_id', $this->user->id)->orderby('created_at')->get();
    }
    
    public function render()
    {
        $this->messages = Message::where('sender_id', $this->user->id)->orWhere('receiver_id', $this->user->id)->orderby('created_at')->get();
        // dd(count($messages));
        return view('livewire.chat', ['all_messages' => $this->messages]);
    }
}
