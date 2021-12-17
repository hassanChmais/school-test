<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreStudent extends FormRequest
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
            'name_ar' => 'required',
            'name_en' =>'required',
            'email'=>'required|unique:students,Email,'.$this->id,
            'password'=>'required',
            'grade_id'=>'required',
            'section_id'=>'required',
            'parent_id' =>'required',
            'date_birth'=>'required',
            'blood_id'=>'required',
            'year' =>'required'
        ];
    }
}
