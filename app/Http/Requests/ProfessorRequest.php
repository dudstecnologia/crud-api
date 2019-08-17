<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProfessorRequest extends FormRequest
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
            'nome' => 'required|string',
            'data_nascimento' => 'required|date'
        ];
    }

    public function messages()
    {
        return [
            'nome.required'             => 'O nome do Professor é obrigatório',
            'data_nascimento.required'  => 'A data de nascimento é obrigatória',
            'data_nascimento.date'      => 'Data inválida',
        ];
    }
}
