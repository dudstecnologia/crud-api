<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\AlunoRequest;
use App\Model\Aluno;
use App\Model\Curso;

class AlunoController extends Controller
{
    public function index()
    {
        $aluno = Aluno::with('cursos')->get(['id', 'nome', 'data_nascimento', 'id_curso']);

        return $aluno;
    }

    public function store(AlunoRequest $request)
    {
        if(Aluno::where('nome', $request->nome)
            ->where('data_nascimento', $request->data_nascimento)
            ->count() != 0) {
            
            return response()->json([ 'message' => 'Aluno já cadastrado' ], 409);
        }

        return Aluno::create($request->all());
    }

    public function update(AlunoRequest $request, Aluno $aluno)
    {
        $aluno->update($request->all());

        return $aluno;
    }

    public function show(Aluno $aluno)
    {
        $aluno['curso'] = Curso::where('id', $aluno->id_curso)->get();

        return $aluno;
    }

    public function destroy(Aluno $aluno)
    {
        $aluno->delete();
    }
}
