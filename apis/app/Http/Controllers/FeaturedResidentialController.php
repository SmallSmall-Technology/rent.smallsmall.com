<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Residential;

class FeaturedResidentialController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($offset = null, $limit = null)
    {
        if (!empty($offset) && !empty($limit)){
            return response()->json(['data' => Residential::all()->whereNotNull('featured')->skip($offset)->take($limit)], 200);
        } else{
            return response()->json(['data' => Residential::all()->whereNotNull('featured')->take(10)]);
        }
    }
}
