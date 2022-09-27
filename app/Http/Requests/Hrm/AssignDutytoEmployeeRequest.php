<?php

namespace App\Http\Requests\Hrm;

use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Http\FormRequest;

class AssignDutytoEmployeeRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return Auth::user()->can('create duty');
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'date_from' => 'required|date',
            'date_to' => 'required|date',
            'employee_id' => 'required|string|exists:employees,id'
        ];
    }
}
