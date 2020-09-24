<?php

namespace App\Http\Controllers\BackEnd;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use App\Message;

class MessageController extends Controller
{
    public function index() {
        $messages = Message::orderBy('isRead', 'DESC')->get();
        foreach($messages as $message) {
            $message->sender = User::find($message->sender);
        }
        return $messages;
    }

    public function read($id) {
        $message = Message::find($id);
        $message->isRead = 0;
        $message->save();
        return $message;
    }
}
