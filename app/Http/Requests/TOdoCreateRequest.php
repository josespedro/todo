<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TOdoCreateRequest extends FormRequest
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
            'title'=> 'required|max:20',
            'details'=> 'required',
            
        ];
    }
    public function messages()
    {
        return [
            'title.max' => 'A title shouldn\'t exceed 20 Characters',
        ];
    }
}
