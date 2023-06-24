<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Topic;
use App\User;


class TopicMessageController extends Controller
{
    public function index(Request $request, $offset = null, $limit = null)
    {
        $params = (object)Validator::make($request->input(), [
            'user_id' => 'required|integer',
            'topic_id' => 'required|integer',
        ])->validate();

        $topic = Topic::where([
            ['id', $params->topic_id],
            ['user_id', $params->user_id],
        ])->first();

        if ($topic) {
            if (!empty($offset) && !empty($limit)) {
                $messages = $this->add_user_role($topic->message()->skip($offset)->take($limit)->get());
                return response()->json(['data' => $messages], 200);
            } else {
                $messages = $this->add_user_role($topic->message->take(10)->all());
                return response()->json(['data' => $messages], 200);
            }
        }else{
            return response()->json(['data' => "Topic does not exist."], 200);
        }
    }

    private function add_user_role($messages)
    {
        foreach($messages as $message){
            $message->user_role = User::findOrFail($message->user_id)->role;
        }
        return $messages;
    }

    public function create(Request $request)
    {
        $params = (object)Validator::make($request->input(), [
            'user_id' => 'required|integer',
            'topic_id' => 'required|integer',
            'body' => 'required|max:700'
        ])->validate();

        $user = User::findOrFail($params->user_id);
        $isAdmin = ($user->role == "super_admin") ? TRUE : FALSE;
        $message = '';

        $topic = Topic::where([
            ['id', $params->topic_id],
            ])->first();

        if(empty($topic)){ return response()->json(['data' => "Topic does not exist."], 400); }
        
        $canPost = ($topic->user_id == $user->id) || $isAdmin;
        if(!$canPost){ return response()->json(['data' => "You cannot post on this Topic"], 400);}
        
        $message = $topic->message()->create([
            'user_id' => $user->id,
            'topic_id' => $topic->id,
            'body' => $params->body,
        ]);

        return response()->json(['data' => $message], 200);
    }
}
