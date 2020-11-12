<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RecordRequest extends FormRequest
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
            'assunto' => 'required',
            'observacao' => 'nullable',
            'classificacao' => 'nullable',
            'categoria' => 'nullable',
            'enviado_para_sibi' => 'required',
            'normalizado' => 'required',
        ];
        return $rules;
    }
    
    public function messages()
    {
    return [
        'assunto.required' => 'O assunto não pode ficar em branco.',
    ];
    }
}
