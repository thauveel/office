<?php

namespace App\Http\Requests\Hrm;

use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Http\FormRequest;

class StoreDepartmentRequest extends FormRequest
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
            'name' => 'required|string|unique:departments',
            'alias' => 'required|string|unique:departments',
            'email' => 'required|string|unique:departments', 
            'work_site_id' => 'sometimes|string'
        ];
    }
}
