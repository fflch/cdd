<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CddRequest extends FormRequest
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
        $rules = [
            'cdd' => 'required',
        ];
        
        return $rules;
    }

    public function messages()
    {
    return [
        'cdd.required' => 'O CDD não pode ficar em branco.',    
    ];

    }
}
