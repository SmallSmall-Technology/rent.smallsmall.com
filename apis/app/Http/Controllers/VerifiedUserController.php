<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\User;

class VerifiedUserController extends Controller
{
    public function show($id)
    {
        $user = User::whereNotNull('email_verified_at')->find($id);
        if($user){
            return response()->json(['data'=> $user], 200);
        }else{
            return response()->json(['data'=> $user], 404);
        }
    }
}
