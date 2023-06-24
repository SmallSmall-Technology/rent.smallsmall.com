<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Verification extends Model
{
    protected $fillable = [
        'user_id',
        'gross_annual_income',
        'birth_place',
        'country_id',
        'dob',
        'marital_status',
        'present_address',
        'present_country',
        'duration_present_address',
        'current_renting_status',
        'disability',
        'pets',
        'present_landlord',
        'landlord_email',
        'landlord_phone',
        'landlord_address',
        'reason_for_living',
        'employment_status',
        'occupation',
        'company_name',
        'company_address',
        'hr_manager_name',
        'hr_manager_email',
        'office_phone',
        'guarantor_name',
        'guarantor_email',
        'guarantor_phone',
        'guarantor_occupation',
        'guarantor_address',
        'validID_path',
        'bank_statement_1',
        'bank_statement_2',
        'bank_statement_3',
        'is_verified',
        'pID'
    ];
}
