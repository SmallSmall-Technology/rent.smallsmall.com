<?php
// This comment has no impact on the code below. 
// I'm testing the deployment script

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Rules\PropertyTypes;
use App\Favorite;
use App\Residential;
use App\Storage;
use App\Coworking;
use App\Furnisure;
use App\User;

class FavoriteController extends Controller
{
    public function index(Request $request, $offset = null, $limit = null)
    {
        $params = (object)Validator::make($request->input(), [
            'user_id' => 'required|integer',
        ])->validate();

        $favorites = null;

        $user = User::findOrFail($params->user_id);

        if (!empty($offset) && !empty($limit)) {
            $favorites = Favorite::where([['user_id', $user->id], ])
                ->skip($offset)->take($limit)->get();
        } else {
            $favorites = Favorite::where([['user_id', $user->id], ])->take(10)->get();
        }
        return $this->send_favorites($favorites);
    }

    public function create(Request $request)
    {
        $params = (object)Validator::make($request->input(), [
            'user_id' => 'required|integer',
            'favoritable_id' => 'required|int',
            'favoritable_type' => ['required', 'string', new PropertyTypes],
        ])->validate();

        $user = User::findOrFail($params->user_id);
        $class = $this->get_property_type_class($params->favoritable_type, $params->favoritable_id);
        $exists = Favorite::where(
            [
                'user_id' => $params->user_id,
                'favoritable_id' => $params->favoritable_id,
                'favoritable_type' => $class
            ]
        )->exists();
        if (!$exists) {
            $favorite = new Favorite([
                'user_id' => $user->id,
                'favoritable_id' => $params->favoritable_id,
                'favoritable_type' => $class,
            ]);
            $favorite->save();
            return response()->json(['data' => $favorite], 200);
        } else {
            return response()->json(['data' => "User already likes this property"], 400);
        }

    }

    public function delete(Request $request)
    {
        $params = (object)Validator::make($request->input(), [
            'user_id' => 'required|integer',
            'favoritable_id' => 'required|int',
            'favoritable_type' => ['required', 'string', new PropertyTypes],
        ])->validate();

        $user = User::findOrFail($params->user_id);
        $class = $this->get_property_type_class($params->favoritable_type, $params->favoritable_id);
        $exists = Favorite::where(
            [
                'user_id' => $params->user_id,
                'favoritable_id' => $params->favoritable_id,
                'favoritable_type' => $class
            ]
        )->exists();
        if ($exists) {
            $deletedFavourite = Favorite::where(
                [
                    'user_id' => $params->user_id,
                    'favoritable_id' => $params->favoritable_id,
                    'favoritable_type' => $class
                ]
            )->delete();
            return response()->json(['data' => $deletedFavourite], 200);
        } else {
            return response()->json(['data' => "User never liked property."], 400);
        }

    }

    private function map_favorites($favorites = null)
    {
        return $favorites->map(function ($favorite) {
            if (!empty($favorite->favoritable)){
                $type = $favorite->favoritable;
                $type->type = class_basename($type);
                $type->images = get_class($type)::get_images($type);
                return $type;
            }
        });
    }

    private function send_favorites($favorites)
    {
        // dd("Voila");
        if (!empty($favorites)) {
            return response()->json(['data' => $this->map_favorites($favorites)], 200);
        } else {
            return response()->json(['data' => "User has no favorites"], 200);
        }
    }

    private function get_property_type_class($property_type, $property_id)
    {
        switch ($property_type) {
            case 'Residential':
                return (!empty(Residential::findOrFail($property_id))) ? Residential::class : false;
                break;

            case 'Storage':
                return (!empty(Storage::findOrFail($property_id))) ? Storage::class : false;
                break;

            case 'Coworking':
                return (!empty(Coworking::findOrFail($property_id))) ? Coworking::class : false;
                break;

            case 'Furnisure':
                return (!empty(Furnisure::findOrFail($property_id))) ? Furnisure::class : false;
                break;

            default:
                fail('Could not get valid property type.');
                break;
        }
    }
}
