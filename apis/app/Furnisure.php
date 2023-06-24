<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Interfaces\Payable;

class Furnisure extends Model implements Payable
{
    private $pre_payment_errors;
    private $CYCLE = 12;

    public function featured()
    {
        if ($this->where('featured')){
            return $this;
        }
    }

    public function pre_payment_checks($params)
    {
        if(($this->isRented()) && ($this->belongsToUser($params->user_id))){
            $amount_to_pay = $this->months_paid($params->user_id) + $params->months;
            if ($amount_to_pay > $this->CYCLE){
                $this->pre_payment_errors = ['error' => 
                'The months you want to pay for exceeds the cycle limit of 12 months. Please reduce the number of months to pay.'];
            }
        }

        if(($this->isRented()) && (!$this->belongsToUser($params->user_id))){
                $this->pre_payment_errors = ['error' => 
                'This Furnisure is not available for rent.'];
        }

        return $this->pre_payment_errors; 
    }

    public function handle_payments($params)
    {
        $this->is_rented = 1;
        $this->save();
    }

    private function isRented()
    {
        return ($this->is_rented == 1) ? TRUE : FALSE;
    }

    private function belongsToUser($user_id)
    {
        return UserPayments::where([
            'user_id' => $user_id,
            'property_type' => 'Furnisure',
            'property_id' => $this->id,
            'status' => 'success',
        ])->exists();
    }

    private function months_paid($user_id)
    {
        return UserPayments::where([
            'user_id' => $user_id,
            'property_type' => 'Furnisure',
            'property_id' => $this->id,
            'status' => 'success',
        ])->sum('months');
    }

    /**
     * Get the Furnisure's images.
     */
    public function images()
    {
        return $this->morphMany('App\Image', 'imageable');
    }

    /**
     * Get the favorites.
     */
    public function favorites()
    {
        return $this->morphMany('App\Favorite', 'favoritable');
    }

    /** 
    * Get images from remote server
    */
    static function get_images($furnisure){
        // $test_image_path = 'https://www.rentsmallsmall.com/get-images/170090f1cbb51b8f14072b34669e2891/properties';
        $base_url = "https://www.rentsmallsmall.com/get-images/";
        $image_path = $base_url.$furnisure->folderName.'/'.'furnisure';
        $images = [];
        $web_images = json_decode(file_get_contents($image_path), true);
        if(is_array($web_images)){
             $images = $web_images;
        }
        return $images;
    }
}
