<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Furnisure;
use Illuminate\Support\Facades\Validator;

class FurnisureController extends Controller
{
    public function show ($id)
    {
        $furnisure = Furnisure::findOrFail($id);
        $furnisure->images = Furnisure::get_images($furnisure);
        return response()->json(['data' => $furnisure], 200);
    }

    public function index($offset = null, $limit = null)
    {
        if (!empty($offset) && !empty($limit)) {
            $furnisures = Furnisure::all()->skip($offset)->take($limit)->flatten();
            $furnisures = $this->add_images($furnisures);
            return response()->json(['data' => $furnisures], 200);
        } else {
            $furnisures = Furnisure::all()->take(10);
            $furnisures = $this->add_images($furnisures);
            return response()->json(['data' => $furnisures], 200);
        }
    }

    public function price_range()
    {
        return response()->json(['data' => [
            'max_price' => Furnisure::max('cost_per_month'), 
            'min_price' => Furnisure::min('cost_per_month')]], 200);
    }

    public function search(Request $request)
    {
        $params = (object)Validator::make($request->input(), [
            'furnisure_type_id' => 'required',
            'max_price' => 'required',
            'min_price' => 'required',
            'offset' => 'required',
            'limit' => 'required',
        ])->validate();

        return response()->json(['data' => Furnisure::where([
            ['furnisure_type_id', $params->furnisure_type_id],
        ])
            ->whereBetween('cost_per_month', [$params->min_price, $params->max_price])
            ->skip($params->offset)->take($params->limit)
            ->get()],200);
    }

    private function add_images($furnisures)
    {
        foreach ($furnisures as $furnisure) {
            $furnisure->images = Furnisure::get_images($furnisure);
        }
        return $furnisures;

    }
}
