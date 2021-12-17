<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreTeacher extends FormRequest
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
            'email' => 'required|unique:teachers,Email,'.$this->id,
            'password' =>'required',
            'name_ar'=>'required',
            'name_en'=>'required',
            'special_id'=>'required',
            'date' => 'required|date|date_format:Y-m-d',
            'address' => 'required',
        ];
    }
}
