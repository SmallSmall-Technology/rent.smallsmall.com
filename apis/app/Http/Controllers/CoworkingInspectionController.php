<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\User;
use App\CoworkingInspection;

class CoworkingInspectionController extends Controller
{
    public function store(Request $request)
    {
        $params = (object)Validator::make($request->input(), [
            'user_id' => 'required',
            'coworking_id' => 'required',
            'dateTime' => 'required',
        ])->validate();

        $user = User::find($params->user_id);
        $inspection_time = round($params->dateTime / 1000);

        if($inspection_time < time()){
            return response()->json(['error' => 'Inspection time is set in the past'], 401);
        }

        $coworkingInspection = new CoworkingInspection([
            'inspection_time' => date('Y-m-d H:i:s', $inspection_time),
            'coworking_id'  => $params->coworking_id
        ]);

        $user->storage_inspection()->save($coworkingInspection);
        $user->refresh();

        return response()->json(['data'=> 'success'], 200);
    }
}
