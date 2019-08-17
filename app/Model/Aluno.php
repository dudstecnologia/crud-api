<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Aluno extends Model
{
    protected $fillable = [ 'nome', 'data_nascimento', 'logradouro',
        'numero', 'bairro', 'cidade', 'estado', 'cep', 'id_curso'];

    public function cursos() {
        return $this->hasOne(Curso::class, 'id', 'id_curso');
    }
}
