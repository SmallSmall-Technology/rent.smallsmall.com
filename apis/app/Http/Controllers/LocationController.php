<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Location;

class LocationController extends Controller
{

    public function show(Request $request, $id)
    {
        return response()->json(['data' => Location::findOrFail($id)], 200);
    }

    public function index(Request $request, $offset = null, $limit = null)
    {
        if (!empty($offset) && !empty($limit)) {
            return response()->json(['data' => Location::skip($offset)->take($limit)->get()], 200);
        } else {
            return response()->json(['data' => Location::all()->take(10)], 200);
        }
    }
}
