<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreGrade extends FormRequest
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
        return [
            'grade_name' => 'required|unique:Grades,Name->en,'.$this->id,
            'grade_name_ar' => 'required|unique:Grades,Name->ar,'.$this->id,
            'notes'=>'required'
        ];
    }

    public function messages()
{
    return [
        'grade_name.required' => trans('validation.required')
    ];
}
}
