<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Coworking;
use Illuminate\Support\Facades\Validator;
use App\CoworkingInterestType;

class CoworkingController extends Controller
{
    public function show($id)
    {
        $coworking = Coworking::findOrFail($id);
        $coworking->images = Coworking::get_images($coworking);
        return response()->json(['data' => $coworking], 200);
    }

    public function index($offset = null, $limit = null)
    {
        if (!empty($offset) && !empty($limit)) {
            $coworkings = Coworking::all()->skip($offset)->take($limit)->flatten();
            $coworkings = $this->add_images($coworkings);
            return response()->json(['data' => $coworkings], 200);
        } else {
            $coworkings = Coworking::all()->take(10);
            $coworkings = $this->add_images($coworkings);
            return response()->json(['data' => $coworkings], 200);
        }
    }

    private function add_images($coworkings)
    {
        foreach ($coworkings as $coworking) {
            $coworking->images = Coworking::get_images($coworking);
        }
        return $coworkings;
    }

    public function price_range()
    {
        return response()->json(['data' => [
            'max_price' => Coworking::max('cost_per_month'),
            'min_price' => Coworking::min('cost_per_month')
        ]], 200);
    }

    public function interest_types()
    {
        return response()->json(['data' => CoworkingInterestType::all()], 200);
    }

    public function search(Request $request)
    {
        $params = (object)Validator::make($request->input(), [
            'location_id' => 'required',
            'interest' => 'required',
            'car_parking' => 'required',
            'people_per_space' => 'required',
            'max_price' => 'required',
            'min_price' => 'required',
            'offset' => 'required',
            'limit' => 'required',
        ])->validate();

        $result = $meta = [];
        // DB::connection()->enableQueryLog();

        if (($params->people_per_space == -1) && ($params->interest == -1)
            && ($params->car_parking == -1) && ($params->location_id == -1)) {
            $result = $this->all_coworkings_no_filter($params);
        }
        if (($params->people_per_space == -1) && ($params->interest == -1)
            && ($params->car_parking == -1) && ($params->location_id != -1)) {
            $result = $this->get_coworkings_for_only_specific_location($params);
        }
        if (($params->people_per_space == -1) && ($params->interest == -1)
            && ($params->car_parking != -1) && ($params->location_id == -1)) {
            $result = $this->get_coworkings_for_only_specific_car_parking($params);
        }
        if (($params->people_per_space == -1) && ($params->interest == -1)
            && ($params->car_parking != -1) && ($params->location_id != -1)) {
            $result = $this->get_coworkings_for_specific_car_parking_and_location($params);
        }
        if (($params->people_per_space == -1) && ($params->interest != -1)
            && ($params->car_parking == -1) && ($params->location_id == -1)) {
            $result = $this->get_coworkings_for_specific_interest($params);
        }
        if (($params->people_per_space == -1) && ($params->interest != -1)
            && ($params->car_parking != -1) && ($params->location_id == -1)) {
            $result = $this->get_coworkings_for_specific_interest_and_car_parking($params);
        }
        if (($params->people_per_space == -1) && ($params->interest != -1)
            && ($params->car_parking != -1) && ($params->location_id != -1)) {
            $result = $this->get_coworkings_for_specific_interest_car_parking_and_location($params);
        }
        if (($params->people_per_space != -1) && ($params->interest == -1)
            && ($params->car_parking == -1) && ($params->location_id == -1)) {
            $result = $this->get_coworkings_for_specific_people_per_space($params);
        }
        if (($params->people_per_space != -1) && ($params->interest == -1)
            && ($params->car_parking == -1) && ($params->location_id != -1)) {
            $result = $this->get_coworkings_for_specific_people_per_space_and_location($params);
        }
        if (($params->people_per_space != -1) && ($params->interest == -1)
            && ($params->car_parking != -1) && ($params->location_id == -1)) {
            $result = $this->get_coworkings_for_specific_people_per_space_and_car_parking($params);
        }
        if (($params->people_per_space != -1) && ($params->interest == -1)
            && ($params->car_parking != -1) && ($params->location_id != -1)) {
            $result =
                $this->get_coworkings_for_specific_people_per_space_car_parking_and_location($params);
        }
        if (($params->people_per_space != -1) && ($params->interest != -1)
            && ($params->car_parking == -1) && ($params->location_id == -1)) {
            $result = $this->get_coworkings_for_specific_people_per_space_and_interest($params);
        }
        if (($params->people_per_space != -1) && ($params->interest != -1)
            && ($params->car_parking == -1) && ($params->location_id != -1)) {
            $result = $this->get_coworkings_for_specific_people_per_space_interest_and_location($params);
        }
        if (($params->people_per_space != -1) && ($params->interest != -1)
            && ($params->car_parking != -1) && ($params->location_id == -1)) {
            $result = $this->get_coworkings_for_specific_people_per_space_interest_and_car_parking($params);
        }
        if (($params->people_per_space != -1) && ($params->interest != -1)
            && ($params->car_parking != -1) && ($params->location_id != -1)) {
            $result = $this->get_specific_people_per_space_interest_car_parking_and_location($params);
        }

        // $queries = DB::getQueryLog();
        // dd(end($queries));
        if (!empty($result)) {
            $meta = ['total' => count($result)];
            $result = $this->add_images($result);
        }
        return response()->json(['data' => ['meta' => $meta, 'results' => $result]], 200);
    }

    private function all_coworkings_no_filter($params)
    {
        return Coworking::whereBetween('cost_per_month', [$params->min_price, $params->max_price])
            ->skip($params->offset)->take($params->limit)
            ->get();
    }

    private function get_coworkings_for_only_specific_location($params)
    {
        return Coworking::where(['location_id' => $params->location_id])
            ->whereBetween('cost_per_month', [$params->min_price, $params->max_price])
            ->skip($params->offset)->take($params->limit)
            ->get();
    }

    private function get_coworkings_for_only_specific_car_parking($params)
    {
        return Coworking::where(['car_parking' => $params->car_parking])
            ->whereBetween('cost_per_month', [$params->min_price, $params->max_price])
            ->skip($params->offset)->take($params->limit)
            ->get();
    }

    private function get_coworkings_for_specific_car_parking_and_location($params)
    {
        return Coworking::where([
            'car_parking' => $params->car_parking,
            'location_id' => $params->location_id
        ])
            ->whereBetween('cost_per_month', [$params->min_price, $params->max_price])
            ->skip($params->offset)->take($params->limit)
            ->get();
    }

    private function get_coworkings_for_specific_interest($params)
    {
        return Coworking::where([
            'interest' => $params->interest,
        ])
            ->whereBetween('cost_per_month', [$params->min_price, $params->max_price])
            ->skip($params->offset)->take($params->limit)
            ->get();
    }

    private function get_coworkings_for_specific_interest_and_car_parking($params)
    {
        return Coworking::where([
            'interest' => $params->interest,
            'car_parking' => $params->car_parking,
        ])
            ->whereBetween('cost_per_month', [$params->min_price, $params->max_price])
            ->skip($params->offset)->take($params->limit)
            ->get();
    }

    private function get_coworkings_for_specific_interest_car_parking_and_location($params)
    {
        return Coworking::where([
            'interest' => $params->interest,
            'car_parking' => $params->car_parking,
            'location_id' => $params->location_id,
        ])
            ->whereBetween('cost_per_month', [$params->min_price, $params->max_price])
            ->skip($params->offset)->take($params->limit)
            ->get();
    }

    private function get_coworkings_for_specific_people_per_space($params)
    {
        if ($params->people_per_space == '3s') {
            return Coworking::where([
                ['people_per_space', '>', 3],
            ])
                ->whereBetween('cost_per_month', [$params->min_price, $params->max_price])
                ->skip($params->offset)->take($params->limit)
                ->get();
        } else {
            return Coworking::where([
                ['people_per_space', $params->people_per_space],
            ])
                ->whereBetween('cost_per_month', [$params->min_price, $params->max_price])
                ->skip($params->offset)->take($params->limit)
                ->get();
        }
    }

    private function get_coworkings_for_specific_people_per_space_and_location($params)
    {
        if ($params->people_per_space == '3s') {
            return Coworking::where([
                ['people_per_space', '>=', 3],
                ['location_id', $params->location_id],
            ])
                ->whereBetween('cost_per_month', [$params->min_price, $params->max_price])
                ->skip($params->offset)->take($params->limit)
                ->get();
        } else {
            return Coworking::where([
                'people_per_space' => $params->people_per_space,
                'location_id' => $params->location_id,
            ])
                ->whereBetween('cost_per_month', [$params->min_price, $params->max_price])
                ->skip($params->offset)->take($params->limit)
                ->get();
        }
    }

    private function get_coworkings_for_specific_people_per_space_and_car_parking($params)
    {
        if ($params->people_per_space == '3s') {
            return Coworking::where([
                ['people_per_space', '>=', 3],
                ['car_parking', $params->car_parking],
            ])
                ->whereBetween('cost_per_month', [$params->min_price, $params->max_price])
                ->skip($params->offset)->take($params->limit)
                ->get();
        } else {
            return Coworking::where([
                'people_per_space' => $params->people_per_space,
                'car_parking' => $params->car_parking,
            ])
                ->whereBetween('cost_per_month', [$params->min_price, $params->max_price])
                ->skip($params->offset)->take($params->limit)
                ->get();
        }
    }

    private function get_coworkings_for_specific_people_per_space_car_parking_and_location($params)
    {
        if ($params->people_per_space == '3s') {
            return Coworking::where([
                ['people_per_space', '>=', 3],
                ['car_parking', $params->car_parking],
                ['location_id', $params->location_id],
            ])
                ->whereBetween('cost_per_month', [$params->min_price, $params->max_price])
                ->skip($params->offset)->take($params->limit)
                ->get();
        } else {
            return Coworking::where([
                'people_per_space' => $params->people_per_space,
                'car_parking' => $params->car_parking,
                'location_id' => $params->location_id,
            ])
                ->whereBetween('cost_per_month', [$params->min_price, $params->max_price])
                ->skip($params->offset)->take($params->limit)
                ->get();
        }
    }

    private function get_coworkings_for_specific_people_per_space_and_interest($params)
    {
        if ($params->people_per_space == '3s') {
            return Coworking::where([
                ['people_per_space', '>=', 3],
                ['interest', $params->interest],
            ])
                ->whereBetween('cost_per_month', [$params->min_price, $params->max_price])
                ->skip($params->offset)->take($params->limit)
                ->get();
        } else {
            return Coworking::where([
                'people_per_space' => $params->people_per_space,
                'interest' => $params->interest,
            ])
                ->whereBetween('cost_per_month', [$params->min_price, $params->max_price])
                ->skip($params->offset)->take($params->limit)
                ->get();
        }
    }

    private function get_coworkings_for_specific_people_per_space_interest_and_location($params)
    {
        if ($params->people_per_space == '3s') {
            return Coworking::where([
                ['people_per_space', '>=', 3],
                ['interest', $params->interest],
                ['location_id', $params->location_id],
            ])
                ->whereBetween('cost_per_month', [$params->min_price, $params->max_price])
                ->skip($params->offset)->take($params->limit)
                ->get();
        } else {
            return Coworking::where([
                'people_per_space' => $params->people_per_space,
                'interest' => $params->interest,
                'location_id' => $params->location_id,
            ])
                ->whereBetween('cost_per_month', [$params->min_price, $params->max_price])
                ->skip($params->offset)->take($params->limit)
                ->get();
        }
    }

    private function get_coworkings_for_specific_people_per_space_interest_and_car_parking($params)
    {
        if ($params->people_per_space == '3s') {
            return Coworking::where([
                ['people_per_space', '>=', 3],
                ['interest', $params->interest],
                ['car_parking', $params->car_parking],
            ])
                ->whereBetween('cost_per_month', [$params->min_price, $params->max_price])
                ->skip($params->offset)->take($params->limit)
                ->get();
        } else {
            return Coworking::where([
                'people_per_space' => $params->people_per_space,
                'interest' => $params->interest,
                'car_parking' => $params->car_parking,
            ])
                ->whereBetween('cost_per_month', [$params->min_price, $params->max_price])
                ->skip($params->offset)->take($params->limit)
                ->get();
        }
    }

    private function get_specific_people_per_space_interest_car_parking_and_location($params)
    {
        if ($params->people_per_space == '3s') {
            return Coworking::where([
                ['people_per_space', '>', 3],
                ['interest', $params->interest],
                ['car_parking', $params->car_parking],
                ['location_id', $params->location_id],
            ])
                ->whereBetween('cost_per_month', [$params->min_price, $params->max_price])
                ->skip($params->offset)->take($params->limit)
                ->get();
        } else {
            return Coworking::where([
                ['people_per_space', $params->people_per_space],
                ['interest', $params->interest],
                ['car_parking', $params->car_parking],
                ['location_id', $params->location_id],
            ])
                ->whereBetween('cost_per_month', [$params->min_price, $params->max_price])
                ->skip($params->offset)->take($params->limit)
                ->get();
        }
    }
}
