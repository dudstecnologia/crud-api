<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\CursoRequest;
use App\Model\Professor;
use App\Model\Curso;

class CursoController extends Controller
{
    public function index()
    {
        $professors = Professor::all();
        $curso = Curso::with('professors')->get();

        return ["professors" => $professors, "curso" => $curso];
    }

    public function store(CursoRequest $request)
    {
        if(Curso::where('nome', $request->nome)
            ->where('id_professor', $request->id_professor)
            ->count() != 0) {
            
            return response()->json([ 'message' => 'Curso já cadastrado' ], 409);
        }

        return Curso::create($request->all());
    }

    public function update(CursoRequest $request, Curso $curso)
    {
        $curso->update($request->all());

        return $curso;
    }

    public function show(Curso $curso)
    {
        $curso['professor'] = Professor::where('id', $curso->id_professor)->get();

        return $curso;
    }

    public function destroy(Curso $curso)
    {
        $curso->delete();
    }
}
