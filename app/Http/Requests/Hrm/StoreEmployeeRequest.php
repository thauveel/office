<?php

namespace App\Http\Requests\Hrm;

use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Http\FormRequest;

class StoreEmployeeRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return Auth::user()->can('create department');
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'staff_id' => 'required|string|unique:employees',
            'name' => 'required|string|',
            'name_dv' => 'nullable|string',
            'gender' => 'required|string|in:male,female',
            'birth_date' => 'nullable|date', 
            'nationality' => 'required|string',
            'nid' => 'required|string',
            'passport' => 'nullable|string',
            'joined_date' => 'required|date',
            'probation_end_date' => 'nullable|date',
            'term_end_date' => 'nullable|date',
            'merital_status' => 'nullable|in:unkown,single,married,widowed,separated',
            'phone' => 'nullable|numeric',
            'email' => 'nullable|string',
            'permanent_address' => 'required|string',
            'permanent_address_dv' => 'nullable|string',
            'current_address' => 'nullable|string',
            'current_address_dv' => 'nullable|string',
            'emegency_contact_name' => 'nullable|string',
            'emegency_contact' => 'nullable|numeric',
            'emegency_contact_relation' => 'nullable|string',
            'is_active' => 'required|boolean',
            'basic_salary' => 'nullable|numeric',
            'job_id' => 'required|exists:jobs,uuid',
            'biometric_device_id' => 'sometimes|string',
            'user_id' => 'nullable|numeric|exists:users,id|unique:employees',
            
        ];
    }
}
