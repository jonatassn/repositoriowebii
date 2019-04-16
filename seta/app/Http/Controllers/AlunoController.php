<?php

namespace App\Http\Controllers;

use App\Aluno;
use Illuminate\Http\Request;

class AlunoController extends Controller
{
    public function listar() {
        $alunos = Aluno::orderBy('nome')->get();
        return view('alunos')->with('alunos', $alunos);
    }
}
