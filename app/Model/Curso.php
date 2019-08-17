<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Curso extends Model
{
    protected $fillable = ['nome', 'id_professor'];

    public function professors()
    {
        return $this->hasOne(Professor::class, 'id', 'id_professor');
    }
}
