<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\AlunoRequest;
use App\Model\Aluno;
use App\Model\Curso;
use App\Model\Professor;
use PDF;

class AlunoController extends Controller
{
    public function index()
    {
        $cursos = Curso::all();

        $alunos = Aluno::with('cursos')->get(['id', 'nome', 'data_nascimento', 'id_curso']);

        return ["alunos" => $alunos, "cursos" => $cursos];
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

    public function relatorio() {

        //$aluno = Aluno::with('cursos')->get();
        //$aluno = Aluno::with('professors')->with('cursos')->get();

        $alunos = \DB::table('alunos')
            ->join('cursos', 'cursos.id', '=', 'alunos.id_curso')
            ->join('professors', 'professors.id', '=', 'cursos.id_professor')
            ->select('alunos.id', 'alunos.nome as nome_aluno', 'alunos.data_nascimento', 'cursos.nome as nome_curso', 'professors.nome as nome_professor')
            ->get();
        
        return PDF::loadView('relatorio', compact('alunos'))
            ->download('Relatorio.pdf');
    }
}
