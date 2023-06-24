<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Interfaces\Payable;

class Coworking extends Model implements Payable
{
    private $pre_payment_errors;
    
    public function pre_payment_checks($params)
    {
        if($this->isRented()){
            $this->pre_payment_errors =  ['error' => 'This Coworking space is not available for rent'];
        }

        return $this->pre_payment_errors; 
    }

    public function handle_payments($params)
    {
        $this->is_rented = 1;
        $this->expires_at = $params->expires_at;
        $this->save();
    }

    private function isRented()
    {
        return ($this->is_rented == 1) ? TRUE : FALSE;
    }
    
    /**
     * Get the coworking's images.
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

    static function get_images($coworking){
        // $test_image_path = 'https://www.rentsmallsmall.com/get-images/170090f1cbb51b8f14072b34669e2891/properties';
        $base_url = "https://www.rentsmallsmall.com/get-images/";
        $image_path = $base_url.$coworking->folderName.'/'.'properties';
        $images = [];
        $web_images = json_decode(file_get_contents($image_path), true);
        if(is_array($web_images)){
             $images = $web_images;
        }
        return $images;
    }
}
