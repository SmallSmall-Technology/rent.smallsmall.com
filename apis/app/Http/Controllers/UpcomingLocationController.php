<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\UpcomingLocation;
use Illuminate\Support\Facades\Validator;
use App\Location;
use App\User;

class UpcomingLocationController extends Controller
{
    public function index(Request $request, $offset = null, $limit = null)
    {
        $params = (object)Validator::make($request->input(), [
            'user_id' => 'required|integer'
        ])->validate();

        $user = User::findOrFail($params->user_id);

        if (!empty($offset) && !empty($limit)) {
            
            $upcoming_locations = UpcomingLocation::where('user_id', $user->id)->skip($offset)->take($limit)->get();
            $this->get_location_details($upcoming_locations);
            return response()->json(['data' => $upcoming_locations], 200);
        } else {

            $upcoming_locations = UpcomingLocation::where('user_id', $user->id)->take(10)->get();
            $this->get_location_details($upcoming_locations);
            return response()->json(['data' => $upcoming_locations], 200);
        }
    }

    public function store(Request $request)
    {
        $params = (object)Validator::make($request->input(), [
            'user_id' => 'required|integer',
            'location_id' => 'required|integer',
        ])->validate();

        $user = User::findOrFail($params->user_id);
        $location = Location::findOrFail($params->location_id);

        if($user->upcoming_locations()->where('location_id', $params->location_id)->exists()){
            return response()->json(['data' => "User has already indicated interest in this upcoming location."], 400);
        }else{

            $new_up_location = UpcomingLocation::create([
                'user_id' => $user->id,
                'location_id' => $location->id,
            ]);
            $new_up_location->save();
                
            return response()->json(['data' => $new_up_location], 200);
        }
    }

    public function delete(Request $request)
    {
        $params = (object)Validator::make($request->input(), [
            'user_id' => 'required|integer',
            'location_id' => 'required|integer',
        ])->validate();

        $user = User::findOrFail($params->user_id);
        $location = Location::findOrFail($params->location_id);

        if($user->upcoming_locations()->where('location_id', $params->location_id)->exists()){
            
            UpcomingLocation::where([
                'user_id' => $user->id,
                'location_id' => $location->id,
            ])->delete();
                
            return response()->json(['data' => "Location has been removed from User's upcoming locations"], 200);
        }else{
            
            return response()->json(['data' => "User has no upcoming locations here."], 400);
        }
    }

    private function get_location_details($upcoming_locations)
    {
        foreach($upcoming_locations as $upcoming_location){
            $upcoming_location->location_details = Location::findOrFail($upcoming_location->location_id);
        }
    }
}
