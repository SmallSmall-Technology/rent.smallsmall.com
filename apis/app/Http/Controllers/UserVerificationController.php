<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Http\Requests\UserVerificationRequest;
use App\Verification;

class UserVerificationController extends Controller
{
    public function store(UserVerificationRequest $request)
    {
        $result = $request->save();
        
        if(!empty($result)){
            return response()->json(['data' => $result], 200);
        }else {
            return response()->json(['data' => "There was an error processing your request. Try again later."], 400);
        }
    }

    public function show(Request $request, $user_id)
    {
        $params = (object)Validator::make($request->input(), [
            'user_id' => 'required|integer',
        ])->validate();

        $user_verification = Verification::where('user_id', $params->user_id)->first();
        if($user_verification){
            return response()->json(['data' => $user_verification], 200);
        }else{
            return response()->json(['data' => "User has no verification data" ], 400);  
        }
    }
}
