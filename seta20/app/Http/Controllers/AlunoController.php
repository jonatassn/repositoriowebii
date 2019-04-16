<?php

namespace App\Http\Controllers;

use App\Aluno;
use Illuminate\Http\Request;

class AlunoController extends Controller {

    public function listar() {
        return view('aluno');
    }

    public function salvar($id) {
        $objAluno = new Aluno();
        $objAluno->nome = mb_strtoupper(Request::input('nome'), 'UTF-8');
        $objAluno->curso = mb_strtoupper(Request::input('curso'), 'UTF-8');
        $objAluno->turma = mb_strtoupper(Request::input('turma'), 'UTF-8');
    }

    public function cadastrar() {
        return view('alunoCadastrar');
    }

}
