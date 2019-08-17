<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CursoRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'nome' => 'required|string',
            'id_professor' => 'required|integer'
        ];
    }

    public function messages()
    {
        return [
            'nome.required'             => 'O nome do Curso é obrigatório',
            'id_professor.required'  => 'Informe um professor válido',
        ];
    }
}
