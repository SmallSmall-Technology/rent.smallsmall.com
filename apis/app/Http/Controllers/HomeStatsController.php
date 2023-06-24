<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Residential;
use App\Storage;
use App\Coworking;
use App\Furnisure;

class HomeStatsController extends Controller
{
    public function index()
    {
        $data = [];
        $data['residentials_available'] = Residential::where('is_rented', 0)->count();
        $data['storages_available'] = Storage::where('is_rented', 0)->count();
        $data['coworkings_available'] = Coworking::where('is_rented', 0)->count();
        $data['furnisures_available'] = Furnisure::where('is_rented', 0)->count();
        return response()->json(['data' => $data], 200);
    }
}
