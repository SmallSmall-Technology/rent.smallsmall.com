<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\UserPayments;
use App\Residential;
use App\Coworking;
use App\Storage;
use App\Furnisure;

class PaymentHistoryController extends Controller
{
    public function index($offset = null, $limit = null)
    {
        $params = (object)Validator::make(request()->input(), [
            'user_id' => 'required',
        ])->validate();

        if (!empty($offset) && !empty($limit)) {
            $results = UserPayments::where([
                'user_id' => $params->user_id,
                'status' => 'success',
            ])->orderBy('id', 'DESC')->skip($offset)->take($limit)->get();
            $results = $this->process_properties($results);
            return response()->json(['data' => $results], 200);
        } else {
            $results = UserPayments::where([
                'user_id' => $params->user_id,
                'status' => 'success',
            ])->orderBy('id', 'DESC')->take(10)->get();
            $results = $this->process_properties($results);
            return response()->json(['data' => $results], 200);
        }
    }

    private function process_properties($properties)
    {
        foreach ($properties as $property) {
            $property->setHidden([
                'txn_reference', 'status', 'updated_at'
            ]);
            $property->property_details =
                $this->get_property_type($property->property_type, $property->property_id);
            // $property->images = $property->images()->pluck('url')->toArray();
        }

        return $properties;
    }

    private function get_property_type($property_type, $property_id)
    {
        switch ($property_type) {
            case 'Residential':
                return Residential::findOrFail($property_id);
                break;

            case 'Storage':
                return Storage::findOrFail($property_id);
                break;

            case 'Coworking':
                return Coworking::findOrFail($property_id);
                break;

            case 'Furnisure':
                return Furnisure::findOrFail($property_id);
                break;

            default:
                fail('Could not get valid property type.');
                break;
        }
    }
}
