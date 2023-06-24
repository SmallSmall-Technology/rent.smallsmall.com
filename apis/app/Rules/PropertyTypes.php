<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class PropertyTypes implements Rule
{
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        $allowed_property_types = [
            'Residential', 'Coworking', 'Storage', 'Furnisure'
        ];

        return in_array($value, $allowed_property_types);
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'Should be any of Residential, Coworking, Storage, Furnisure.';
    }
}
