<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\User;
use App\Profile;

class UserProfileController extends Controller
{
    public function show($id)
    {
        $profile = Profile::where('user_id',$id)->first();
        if(!empty($profile)){
            $profile->image = $profile->image()->pluck('url')->toArray();
            return response()->json(['data' => $profile], 200);
        }else{
            return response()->json(['data' => "Profile not found for user."], 404);
        }
    }
    
    public function update(Request $request)
    {
        $params = (object)Validator::make($request->input(), [
            'user_id' => 'required',
            'first_name' => 'required',
            'last_name' => 'required',
            'phone' => 'required',
            'gender' => 'required',
        ])->validate();

        $user = User::findorFail($params->user_id);

        $user->profile()->update([
            'first_name' => $params->first_name,
            'last_name' => $params->last_name,
            'phone' => $params->phone,
            'gender' => $params->gender,
        ]);

        $user->update([
            'name' => $params->first_name . ' '. $params->last_name,
            'phone' => $params->phone
        ]);

        return response()->json(['data' => $user->profile], 200);
    }
}
