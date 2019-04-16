<?php

namespace App\Http\Controllers;

use Request;
use App\Curso;

class CursoController extends Controller
{
    //
    public function listar() {
        $cursos = Curso::orderBy('nome')->get();
        return view('cursos')->with('cursos', $cursos);
    }

    public function cadastrar() {
        return view('cursoCadastrar');
    }

    public function remover($id) {
        $curso = Curso::find($id);
        if(empty($curso)) {
            return "<h2>[ERRO] Curso não encontrado para o ID=".$id."!</h2>";
        }
        $curso->delete();

        return redirect()->action('CursoController@listar')->withInput();
    }

    public function salvar($id) {
        //insert
        if($id == 0) {
            $objCurso = new Curso();
            $objCurso->nome = mb_strtoupper(Request::input('nome'), 'UTF-8');
            $objCurso->abreviatura = mb_strtoupper(Request::input('abreviatura'), 'UTF-8');
            $objCurso->save();
        }
        else {
            $objCurso = Curso::find($id);
            $objCurso->nome = mb_strtoupper(Request::input('nome'), 'UTF-8');
            $objCurso->abreviatura = mb_strtoupper(Request::input('abreviatura'), 'UTF-8');
            $objCurso->save();
        }

        return redirect()->action('CursoController@listar')->withInput();
    }

    public function editar($id) {
        $curso = Curso::find($id);

        if(empty($curso)) {
            return "<h2>[ERRO]: Curso não encontrado para o ID=".$id."!</h2>";
        }
        return view('cursoEditar')->with('curso', $curso);
    }
}
