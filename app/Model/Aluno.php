<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Aluno extends Model
{
    protected $fillable = [ 'nome', 'data_nascimento', 'logradouro',
        'numero', 'bairro', 'cidade', 'estado', 'cep', 'id_curso'];

    public function curso() {
        return $this->hasOne(Curso::class);
    }
}
