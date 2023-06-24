<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Message;
use App\User;

class MessageController extends Controller
{
    public function show(Request $request, $id)
    {
        $params = (object)Validator::make($request->input(), [
            'user_id' => 'required|integer',
            'topic_id' => 'required|integer',
        ])->validate();

        $message = Message::where([
            ['id', $id],
            ['user_id', $params->user_id],
            ['topic_id', $params->topic_id]
        ])->get()->flatten();
        // dd($message);
        if($message){
            $message = $this->add_user_role($message);
            return response()->json(['data' => $message], 200);
        }else{
            return response()->json(['data' => "Message not found"], 400);
        }

    }

    private function add_user_role($messages)
    {
        foreach($messages as $message){
            $message->user_role = User::findOrFail($message->user_id)->role;
        }
        return $messages;
    }
}
