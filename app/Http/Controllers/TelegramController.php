<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Telegram\Bot\Laravel\Facades\Telegram;

class TelegramController extends Controller
{
    public function handle(Request $request)
    {
        //dd($request);
        $update = Telegram::commandsHandler(true);

        $message = $update->getMessage();
        //dd($message);
        $chat_id = '771061410';

        Telegram::sendMessage([
            'chat_id' => $chat_id,
            'text' => 'Hello!'
        ]);
    }
}

