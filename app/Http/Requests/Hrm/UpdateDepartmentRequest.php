<?php

namespace App\Http\Requests\Hrm;

use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Http\FormRequest;

class UpdateDepartmentRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return Auth::user()->can('update department');
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'name' => ['required','string',Rule::unique('departments', 'name')->ignore($this->department)],
            'alias' => ['required','string',Rule::unique('departments', 'alias')->ignore($this->department)],
            'email' => ['required','string',Rule::unique('departments', 'email')->ignore($this->department)], 
            'worksite_id' => 'sometimes|string'
        ];
    }
}
