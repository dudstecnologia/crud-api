<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AlunoRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }
    
    public function rules()
    {
        return [
            'nome'              => 'required|string',
            'data_nascimento'   => 'required|date',
            'id_curso'          => 'required|integer'
        ];
    }

    public function messages()
    {
        return [
            'nome.required'             => 'O nome do Aluno é obrigatório',
            'data_nascimento.required'  => 'A data de nascimento é obrigatória',
            'data_nascimento.date'      => 'Data inválida',
            'id_curso.required'         => 'Informe um curso válido',
        ];
    }
}
