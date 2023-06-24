<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\User;
use App\StorageInspection;


class StorageInspectionController extends Controller
{
    public function store(Request $request)
    {
        $params = (object)Validator::make($request->input(), [
            'user_id' => 'required',
            'storage_id' => 'required',
            'dateTime' => 'required',
        ])->validate();

        $user = User::find($params->user_id);
        $inspection_time = round($params->dateTime / 1000);

        if($inspection_time < time()){
            return response()->json(['error' => 'Inspection time is set in the past'], 401);
        }

        $residentialInspection = new StorageInspection([
            'inspection_time' => date('Y-m-d H:i:s', $inspection_time),
            'storage_id'  => $params->storage_id
        ]);

        $user->storage_inspection()->save($residentialInspection);
        $user->refresh();

        return response()->json(['data'=> 'success'], 200);
    }
}
