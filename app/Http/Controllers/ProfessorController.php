<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ProfessorRequest;
use App\Model\Professor;

class ProfessorController extends Controller
{
    public function index()
    {
        return Professor::all();
    }

    public function store(ProfessorRequest $request)
    {
        if(Professor::where('nome', $request->nome)
            ->where('data_nascimento', $request->data_nascimento)
            ->count() != 0) {
            
            return response()->json([ 'message' => 'Professor já cadastrado' ], 409);
        }

        return Professor::create($request->all());
    }

    public function update(ProfessorRequest $request, Professor $professor)
    {
        $professor->update($request->all());

        return $professor;
    }

    public function show(Professor $professor)
    {
        return $professor;
    }

    public function destroy(Professor $professor)
    {
        $professor->delete();
    }
}
