<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Message;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class Chat extends Component
{

    public $messages = [];
    //#[Validate('min:3')]
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
        //$this->validate();
        if($this->newMessage != "") {
            $message = new Message;
            $message->sender_id = Auth::user()->id;
            $message->receiver_id = $this->receiver_id;
            $message->content = $this->newMessage;
            $message->date = date('y-m-d');
            $message->save();
        }
    }

    public function readMesseges($receiver_id, $mes_count){
        $messages =[];
        if(User::firstWhere('id', $receiver_id)->role == 'admin'){
            $messages = Message::where('receiver_id', $this->user->id)->where('sender_id', $this->receiver_id)->orWhere('sender_id',  $this->user->id)->where('receiver_id', $this->receiver_id)->get();
        }
        else{
            $messages = Message::where('receiver_id', $this->user->id)->orWhere('sender_id',  $this->user->id)->get();
        }

        $i = 0;
        while($i < $mes_count){
            //dd($receiver_id);
            //dd($mes_count[0]);
            if($messages[$i]->receiver_id == $receiver_id){
                
                if($messages[$i]->isRead == 0){
                    //dd($messages[$i]->id);
                    $messages[$i]->isRead = 1;
                    $messages[$i]->save();
                }
            }
            $i += 1;
        }
    }

    public function refreshMesseges(){
        $this->mount();
    }
    
    public function render()
    {
        $this->mount();
        //Message::where('reciever_id', $this->reciever_id)->where('isRead', 0)->get();
        $this->dispatch('chat_mes', ['user_id'=>$this->user->id]);
        return view('livewire.chat', ['all_messages' => $this->messages]);
    }
}
