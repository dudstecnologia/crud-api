<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Curso extends Model
{
    protected $fillable = ['nome', 'id_professor'];

    public function professor() {
        return $this->hasOne(Professor::class);
    }
}
