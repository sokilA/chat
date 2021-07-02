<?php

namespace App\Http\Controllers;

use App\Events\Message;
use Illuminate\Http\Request;

class MessagesController extends Controller
{
    public function send(Request $request)
    {
        Message::dispatch($request->message);
    }
}
