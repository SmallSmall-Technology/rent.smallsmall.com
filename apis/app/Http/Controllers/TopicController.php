<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Topic;
use App\User;

class TopicController extends Controller
{
    public function show(Request $request, $id)
    {
        $params = (object)Validator::make($request->input(), [
            'user_id' => 'required|integer',
        ])->validate();
        $user = User::findOrFail($params->user_id);

        $topic = Topic::where(['id'=>$id, 'user_id' => $user->id])->get();
        if($topic){
            $this->add_user_role($topic);
        }
        return response()->json(['data' => $topic ], 200);
    }

    public function index(Request $request, $offset = null, $limit = null)
    {
        $params = (object)Validator::make($request->input(), [
            'user_id' => 'required|integer',
        ])->validate();

        $user = User::findOrFail($params->user_id);

        if (!empty($offset) && !empty($limit)) {
            $topics = $this->add_user_role(Topic::where('user_id', $user->id)->skip($offset)->take($limit)->orderBy('created_at', 'desc')->get());
            return response()->json(['data' => $topics ], 200);
        } else {
            $topics = $this->add_user_role(Topic::where('user_id', $user->id)->orderBy('created_at', 'desc')->take(10)->get());
            return response()->json(['data' => $topics ]);
        }
    }

    private function add_user_role($topics)
    {
        foreach($topics as $topic){
            $topic->user_role = User::findOrFail($topic->user_id)->role;
        }
        return $topics;
    }

    public function create(Request $request)
    {
        $params = (object)Validator::make($request->input(), [
            'user_id' => 'required|integer',
            'name' => 'required|max:255'
        ])->validate();
            
        $user = User::findOrFail($params->user_id);
        $topic = Topic::create([
            'user_id' => $user->id,
            'name' => $params->name,
        ]);
        $topic->save();

        return response()->json(['data' => $topic], 200);
    }
}
