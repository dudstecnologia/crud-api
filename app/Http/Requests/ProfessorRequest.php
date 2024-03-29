<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProfessorRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

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
