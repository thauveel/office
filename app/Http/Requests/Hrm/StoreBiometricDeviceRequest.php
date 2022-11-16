<?php

namespace App\Http\Requests\Hrm;

use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Http\FormRequest;

class StoreBiometricDeviceRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return Auth::user()->can('create biometricdevice');
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'name' => 'required|string',
            'ip' => 'required|ipv4',            
            'work_site_id' => 'required|string|exists:work_sites,id',
            'serial' => 'nullable|string|unique:biometric_devices'
        ];
    }

    
}
