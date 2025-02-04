<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Message;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Database\Eloquent\Builder;
//use App\Http\Controllers\Builder;

class ChatController extends Controller
{
    public function accountChat(){
        $user = Auth::user();
        $admin = User::firstWhere('role','admin');
        $messages = Message::where(['sender_id'=> $admin->id, 'receiver_id' => $user->id])->orWhere('sender_id', $user->id)->orderby('created_at')->get();
        return view("account.account_chat", ['user'=>$user, 'messages'=>$messages]);
    }

    public function clientChat($client_id){
        $admin = Auth::user();
        $client = User::firstWhere('id', $client_id);
        $messages = Message::where(['sender_id'=> $admin->id, 'receiver_id' => $client->id])->orWhere('sender_id', $client->id)->orderby('created_at')->get();
        return view("client.client_chat", ['client'=>$client, 'messages'=>$messages]);
    }

    public function sendMessageToAdmin(Request $request){
        $message = new Message;
        $message->sender_id = Auth::user()->id;
        $admin = User::firstWhere('role','admin');
        $message->receiver_id = $admin->id;
        $message->content = $request->send_field;
        $message->date = date('y-m-d');
        $message->save();
        return redirect("account_chat");
    }

    public function sendMessageToClient(Request $request){
        $message = new Message;
        $client_id = $request->receiver_id;
        $message->sender_id = Auth::user()->id;
        $message->receiver_id = $request->receiver_id;
        $message->content = $request->send_field;
        $message->date = date('y-m-d');
        $message->save();
        return redirect()->route('client_chat', [$client_id]);
    }


}
