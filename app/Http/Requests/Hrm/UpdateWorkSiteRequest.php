<?php

namespace App\Http\Requests\Hrm;

use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Http\FormRequest;

class UpdateWorkSiteRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return Auth::user()->can('update worksite');
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'code' => ['required','string',Rule::unique('work_sites', 'code')->ignore($this->worksite)],
            'name' => ['required','string',Rule::unique('work_sites', 'name')->ignore($this->worksite)],
            'employee_id' => 'sometimes|string'
        ];
    }
}
