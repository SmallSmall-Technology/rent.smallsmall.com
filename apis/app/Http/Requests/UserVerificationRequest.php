<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Rules\PropertyTypes;
use App\Verification;
use App\BankStatement;
use App\ValidID;

class UserVerificationRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $checks = [
            'user_id' => 'required',
            'gross_annual_income' => 'required',
            'birth_place' => 'required',
            'country_id' => 'required',
            'dob' => 'required|date',
            'marital_status' => 'required',
            'present_address' => 'required',
            'type' => ['required', 'string', new PropertyTypes],
            'is_verified' => 'required|integer',
            'pID' => '',
        ];
        if ($this->type == 'Residential'){
            $checks['present_country'] = 'required|integer';
            $checks['duration_present_address'] = 'required';
            $checks['current_renting_status'] = 'required';
            $checks['disability'] = 'required';
            $checks['pets'] = 'required';
            $checks['present_landlord'] = 'required';
            // $checks['landlord_email'] = 'required|email';
            $checks['landlord_phone'] = 'required';
            $checks['landlord_address'] = 'required';
            $checks['reason_for_living'] = 'required';
            $checks['employment_status'] = 'required';
            $checks['occupation'] = 'required';
            $checks['company_name'] = 'required';
            $checks['company_address'] = 'required';
            $checks['hr_manager_name'] = 'required';
            $checks['hr_manager_email'] = 'required|email';
            $checks['office_phone'] = 'required|max:20';
            $checks['guarantor_name'] = 'required';
            $checks['guarantor_email'] = 'required|email';
            $checks['guarantor_phone'] = 'required';
            $checks['guarantor_occupation'] = 'required';
            $checks['guarantor_address'] = 'required';
            $checks['validID_path'] = 'required';
            $checks['bank_statement_1'] = 'required';
        }

        return $checks;
    }

    public function save()
    {
        $valid_data = $this->validated();
        
        // Save the validID
        if(!empty($valid_data['validID_path'])){
            $this->save_valid_id($valid_data['user_id'], $valid_data['validID_path']);
        }
        // Save the bank_statements
        if(!empty($valid_data['bank_statement_1'])){
            $this->save_bank_statements($valid_data['user_id'], $valid_data['bank_statement_1']);
        }
        if(!empty($valid_data['bank_statement_2'])){
            $this->save_bank_statements($valid_data['user_id'], $valid_data['bank_statement_2']);
        }
        if(!empty($valid_data['bank_statement_3'])){
            $this->save_bank_statements($valid_data['user_id'], $valid_data['bank_statement_3']);
        }

        // Save the verification form
        $user_exists = Verification::where('user_id', $valid_data['user_id'])->exists();
        if ($user_exists){
            $verification = Verification::where('user_id', $valid_data['user_id'])->update($valid_data);
        }else{
            $verification = Verification::create($valid_data);
            $verification->save();
        }
        return Verification::where('user_id', $valid_data['user_id'])->first();
    }

    public function messages()
    {
        return [
            'validID_path.required' => 'A valid ID is required',
            'bank_statement_1.required' => 'At least one bank statement is required',
        ];
    }

    public function attributes()
    {
        return [
            'validID_path' => 'valid ID',
        ];
    }

    private function uploadFile($file_parameter, $destinationFolder)
    {
        if ($this->hasFile($file_parameter)) {

            $filenameoriginal = str_replace(' ', '', $this->file($file_parameter)->getClientOriginalName());
            $filename = pathinfo($filenameoriginal, PATHINFO_FILENAME);
            $extension = $this->file($file_parameter)->getClientOriginalExtension();
            $destinationPath = 'public/' . $destinationFolder;
            
            //create new $filename
            $filenameToStore = $filename . '_' . time() . '.' . $extension;
            
            // upload image
            return $this->file($file_parameter)->storeAs($destinationPath, $filenameToStore);
        } else {
            return false;
        }
    }

    private function save_bank_statements($user_id, $file_path = null)
    {
        if (!empty($file_path)) {
            BankStatement::create([
                'user_id' => $user_id,
                'file_path' => $file_path
            ])->save();
        }
    }

    private function save_valid_id($user_id, $file_path = null)
    {
        if (!empty($file_path)) {
            if (!ValidID::where('user_id', $user_id)->exists()) {
                ValidID::updateOrCreate([
                    'user_id' => $user_id,
                    'file_path' => $file_path
                ])->save();
            }
        }
    }
}
