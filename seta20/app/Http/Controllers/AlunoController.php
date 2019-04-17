<?php

namespace App\Http\Controllers;

use App\Aluno;
use App\CursoModel;
use App\TurmaModel;
use Request;

class AlunoController extends Controller {

    public function listar() {
        $alunos = Aluno::all();
        return view('aluno')->with('alunos', $alunos);
    }

    public function salvar($id) {
        if($id == 0) {
            $objAluno = new Aluno();
            $turma = TurmaModel::find(Request::input('turma'));
            $curso = CursoModel::find($turma->id_curso);
            $objAluno->nome = mb_strtoupper(Request::input('nome'), 'UTF-8');
            $objAluno->curso = mb_strtoupper($curso->abreviatura, 'UTF-8');
            $objAluno->turma = mb_strtoupper($turma->nome, 'UTF-8');
            $objAluno->save();
        }
        else {
            $objAluno = Aluno::find($id);
            $turma = TurmaModel::find(Request::input('turma'));
            $curso = CursoModel::find($turma->id_curso);
            $objAluno->nome = mb_strtoupper(Request::input('nome'), 'UTF-8');
            $objAluno->curso = mb_strtoupper($curso->abreviatura, 'UTF-8');
            $objAluno->turma = mb_strtoupper($turma->nome, 'UTF-8');
            $objAluno->save();
        }

        return redirect()->action('AlunoController@listar')->withInput();
    }

    public function cadastrar() {
        $turmas = TurmaModel::all();

        return view('alunoCadastrar')->with('turmas', $turmas);
    }

    public function editar($id) {
        $aluno = Aluno::find($id);
        $turmas = TurmaModel::select('id', 'nome', 'id_curso')->get();

        //print_r($turmas);

        if(empty($aluno)) {
            return "<h2>[ERRO]: Aluno não encontrado para o ID=".$id."!</h2>";
        }
        return view('alunoEditar')->with('aluno', $aluno)->with('turmas', $turmas);
    }

    public function remover($id) {
        $aluno = Aluno::find($id);

        if(empty($aluno)) {
            $msg = "<h2>[ERRO]: Aluno não encontrado para o ID=".$id."!</h2>";
            return view()->with('tipo', 'alert alert-warning')
                ->with('titulo', 'OPERAÇÂO INVÁLIDA')
                ->with('msg', $msg)
                ->with('acao', '/aluno');
        }

        return view('alunoRemover')->with('aluno', $aluno);
    }

    public function confirmar($id) {
        $aluno = Aluno::find($id);

        if(empty($aluno)) {
            $msg = "<h2>[ERRO]: Aluno não encontrado para o ID=".$id."!</h2>";
            return view()->with('tipo', 'alert alert-warning')
                            ->with('titulo', 'OPERAÇÂO INVÁLIDA')
                            ->with('msg', $msg)
                            ->with('acao', '/aluno');
        }
        $aluno->delete();
        return redirect()->action('AlunoController@listar')->withInput();
    }

}
