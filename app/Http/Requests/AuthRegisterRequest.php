<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AuthRegisterRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'name' => 'required|string',
            'email' => 'required|string|email|unique:users',
            'password' => 'required|string|confirmed',
            'remember_me' => 'boolean'
        ];
    }

    public function messages()
    {
        return [
            'email.required' => 'O e-mail do usuário é requerido',
            'email.email'    => 'O e-mail informado é inválido',
            'email.unique'  => 'Este email já está cadastrado',
            'password.required' => 'A senha é requerida',
            'password.confirmed' => 'As senhas informadas não conferem',
        ];
    }
}
