<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\User;

class UserImageController extends Controller
{
    public function update(Request $request)
    {
        $params = (object)Validator::make($request->input(), [
            'user_id' => 'required',
            'photo' => 'mimes:jpeg,png'
        ])->validate();

        $user = User::findorFail($params->user_id);

        $path = $request->file('photo')->store(
            'profile_photos/'.$params->user_id
        );
        $user->profile()->update([
            'image_url' => $path
        ]);
        return response()->json(['data' => $user->profile], 200);
    }
}
