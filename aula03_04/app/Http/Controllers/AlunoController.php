<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\AlunoModel;

class AlunoController extends Controller {

    public function listar() {

        $alunos = AlunoModel::orderBy('nome')->get();
        return view('alunos')->with('alunos', $alunos);
    }
}
