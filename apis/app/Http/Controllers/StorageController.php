<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Storage;
use Illuminate\Support\Facades\Validator;


class StorageController extends Controller
{
    public function show($id)
    {
        $storage = Storage::findOrFail($id);
        $storage->images = Storage::get_images($storage);
        return response()->json(['data' => $storage], 200);
    }

    public function index($offset = null, $limit = null)
    {
        if (!empty($offset) && !empty($limit)) {
            $storages = Storage::all()->skip($offset)->take($limit)->flatten();
            $storages = $this->add_images($storages);
            return response()->json(['data' => $storages], 200);
        } else {
            $storages = Storage::all()->take(10);
            $storages = $this->add_images($storages);
            return response()->json(['data' => $storages]);
        }
    }

    public function price_range()
    {
        return response()->json(['data' => [
            'max_price' => Storage::max('cost_per_month'), 
            'min_price' => Storage::min('cost_per_month')]], 200);
    }

    private function add_images($storages)
    {
        foreach ($storages as $storage) {
            $storage->images = Storage::get_images($storage);
        }
        return $storages;
    }

    private function get_images($storage){
        // $test_image_path = 'https://www.rentsmallsmall.com/get-images/170090f1cbb51b8f14072b34669e2891/properties';
        $base_url = "https://www.rentsmallsmall.com/get-images/";
        $image_path = $base_url.$storage->folderName.'/'.'properties';
        $images = [];
        $web_images = json_decode(file_get_contents($image_path), true);
        if(is_array($web_images)){
             $images = $web_images;
        }
        return $images;
    }

    public function sqm_range()
    {
        return response()->json(['data' => [
            'max_sqm' => Storage::max('sqm'), 
            'min_sqm' => Storage::min('sqm')]], 200);
    }

    public function search(Request $request)
    {
        $params = (object)Validator::make($request->input(), [
            'location_id' => 'required',
            'min_sqm' => 'required',
            'max_sqm' => 'required',
            'max_price' => 'required',
            'min_price' => 'required',
            'offset' => 'required',
            'limit' => 'required',
        ])->validate();

        $result = $meta = [];

        if($params->location_id != -1){
            $result = Storage::where([
                ['location_id', $params->location_id],
            ])
                ->whereBetween('cost_per_month', [$params->min_price, $params->max_price])
                ->whereBetween('sqm', [$params->min_sqm, $params->max_sqm])
                ->skip($params->offset)->take($params->limit)
                ->get();

        }else{
            $result = 
                Storage::whereBetween('cost_per_month', [$params->min_price, $params->max_price])
                ->whereBetween('sqm', [$params->min_sqm, $params->max_sqm])
                ->skip($params->offset)->take($params->limit)
                ->get();
        }

        if(!empty($result)){
            $meta = ['total' => count($result)];
            $result = $this->add_images($result);
        }
        return response()->json(['data' => ['meta' => $meta, 'results' => $result]], 200);

    }
}
