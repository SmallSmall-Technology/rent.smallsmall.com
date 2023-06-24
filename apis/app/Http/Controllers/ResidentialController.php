<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Residential;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use App\Image;

class ResidentialController extends Controller
{
    public function show($id)
    {
        $residential = Residential::findOrFail($id);
        $residential->images = Residential::get_images($residential);
        return response()->json(['data' => $residential], 200);
    }

    public function index($offset = null, $limit = null)
    {
        if (!empty($offset) && !empty($limit)) {
            $residentials = Residential::all()->skip($offset)->take($limit)->sortByDesc('featured')->flatten();
            $residentials = $this->add_images($residentials);
            return response()->json(['data' => $residentials], 200);
        } else {
            $residentials = Residential::all()->sortByDesc('featured')->take(10)->flatten();
            $residentials = $this->add_images($residentials);
            return response()->json(['data' => $residentials], 200);
        }
    }

    private function add_images($residentials)
    {
        foreach ($residentials as $residential) {
            $residential->images = Residential::get_images($residential);
        }
        return $residentials;

    }

    public function price_range()
    {
        return response()->json(['data' => [
            'max_price' => Residential::max('cost_per_month'),
            'min_price' => Residential::min('cost_per_month')
        ]], 200);
    }

    public function search(Request $request)
    {
        $params = (object)Validator::make($request->input(), [
            'location_id' => 'required',
            'rooms' => 'required',
            'furnishing' => 'required',
            'max_price' => 'required',
            'min_price' => 'required',
            'offset' => 'required',
            'limit' => 'required',
        ])->validate();

        $result = $meta = [];
        // DB::connection()->enableQueryLog();

        if (($params->rooms == -1) && ($params->furnishing == -1) && ($params->location_id == -1)) {
            $result = $this->get_residentials_for_all_rooms_and_all_furnishing_and_all_locations($params);
        }
        if (($params->rooms == -1) && ($params->furnishing == -1) && ($params->location_id != -1)) {
            $result = $this->get_residentials_with_only_given_location($params);
        }
        if (($params->rooms == -1) && ($params->furnishing != -1) && ($params->location_id == -1)) {
            $result = $this->get_residentials_with_only_given_furnishing($params);
        }
        if (($params->rooms == -1) && ($params->furnishing != -1) && ($params->location_id != -1)) {
            $result = $this->get_residentials_for_specific_furnishing_and_location($params);
        }
        if (($params->rooms != -1) && ($params->furnishing == -1) && ($params->location_id == -1)) {
            $result = $this->get_residentials_for_specific_no_of_rooms($params);
        }
        if (($params->rooms != -1) && ($params->furnishing == -1) && ($params->location_id != -1)) {
            $result = $this->get_residentials_for_specific_no_of_rooms_and_location($params);
        }
        if (($params->rooms != -1) && ($params->furnishing != -1) && ($params->location_id == -1)) {
            $result = $this->get_residentials_for_specific_no_of_rooms_and_furnishing($params);
        }
        if (($params->rooms != -1) && ($params->furnishing != -1) && ($params->location_id != -1)) {
            $result = $this->get_residentials_for_specific_no_of_rooms_and_furnishing_and_location($params);
        }

        // $queries = DB::getQueryLog();
        // dd(end($queries));
        if(!empty($result)){
            $meta = ['total' => count($result)];
            $result = $this->add_images($result);
        }
        return response()->json(['data' => ['meta' => $meta, 'results' => $result]], 200);
    }

    private function get_residentials_for_all_rooms_and_all_furnishing_and_all_locations($params)
    {
        return Residential::whereBetween('cost_per_month', [$params->min_price, $params->max_price])
            ->skip($params->offset)->take($params->limit)
            ->get();
    }

    private function get_residentials_with_only_given_location($params)
    {
        return Residential::where([
            ['location_id', $params->location_id],
        ])
            ->whereBetween('cost_per_month', [$params->min_price, $params->max_price])
            ->skip($params->offset)->take($params->limit)
            ->get();
    }

    private function get_residentials_with_only_given_furnishing($params)
    {
        return Residential::where([
            ['furnishing', $params->furnishing],
        ])
            ->whereBetween('cost_per_month', [$params->min_price, $params->max_price])
            ->skip($params->offset)->take($params->limit)
            ->get();
    }

    private function get_residentials_for_specific_furnishing_and_location($params)
    {
        return Residential::where([
            ['furnishing', $params->furnishing],
            ['location_id', $params->location_id],
        ])
            ->whereBetween('cost_per_month', [$params->min_price, $params->max_price])
            ->skip($params->offset)->take($params->limit)
            ->get();
    }

    private function get_residentials_for_specific_no_of_rooms($params)
    {
        if ($params->rooms == '3s') {
            return Residential::where('num_of_rooms', '>', 3)
                ->whereBetween('cost_per_month', [$params->min_price, $params->max_price])
                ->skip($params->offset)->take($params->limit)
                ->get();
        } else {
            return Residential::where([
                ['num_of_rooms', $params->rooms],
            ])
                ->whereBetween('cost_per_month', [$params->min_price, $params->max_price])
                ->skip($params->offset)->take($params->limit)
                ->get();
        }
    }

    private function get_residentials_for_specific_no_of_rooms_and_location($params)
    {
        if ($params->rooms == '3s') {
            return Residential::where([
                ['num_of_rooms', '>', 3],
                ['location_id', $params->location_id]
            ])
                ->whereBetween('cost_per_month', [$params->min_price, $params->max_price])
                ->skip($params->offset)->take($params->limit)
                ->get();
        } else {
            return Residential::where([
                ['num_of_rooms', $params->rooms],
                ['location_id', $params->location_id],
            ])
                ->whereBetween('cost_per_month', [$params->min_price, $params->max_price])
                ->skip($params->offset)->take($params->limit)
                ->get();
        }
    }

    private function get_residentials_for_specific_no_of_rooms_and_furnishing($params)
    {
        if ($params->rooms == '3s') {
            return Residential::where([
                ['num_of_rooms', '>', 3],
                ['furnishing', $params->furnishing]
            ])
                ->whereBetween('cost_per_month', [$params->min_price, $params->max_price])
                ->skip($params->offset)->take($params->limit)
                ->get();
        } else {
            return Residential::where([
                ['num_of_rooms', $params->rooms],
                ['furnishing', $params->furnishing],
            ])
                ->whereBetween('cost_per_month', [$params->min_price, $params->max_price])
                ->skip($params->offset)->take($params->limit)
                ->get();
        }
    }

    private function get_residentials_for_specific_no_of_rooms_and_furnishing_and_location($params)
    {
        if ($params->rooms == '3s') {
            return Residential::where([
                ['num_of_rooms', '>', 3],
                ['furnishing', $params->furnishing],
                ['location_id', $params->location_id],
            ])
                ->whereBetween('cost_per_month', [$params->min_price, $params->max_price])
                ->skip($params->offset)->take($params->limit)
                ->get();
        } else {
            return Residential::where([
                ['num_of_rooms', $params->rooms],
                ['furnishing', $params->furnishing],
                ['location_id', $params->location_id],
            ])
                ->whereBetween('cost_per_month', [$params->min_price, $params->max_price])
                ->skip($params->offset)->take($params->limit)
                ->get();
        }
    }
}
            