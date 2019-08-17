<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AuthLoginRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'email' => 'required|string|email',
            'password' => 'required|string'
        ];
    }

    public function messages()
    {
        return [
            'email.required' => 'O e-mail do usuário é requerido',
            'email.email'    => 'O e-mail informado é inválido',
            'password.required' => 'A senha é requerida',
        ];
    }
}
