<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
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

    public function salvar($id) {
        //insert
        if($id == 0) {
            $objCurso = new Curso();
            $objCurso->nome = mb_strtoupper(Request::input('nome'), 'UTF-8');
            $objCurso->curso = mb_strtoupper(Request::input('abreviatura'), 'UTF-8');
            $objCurso->save();
        }

        return redirect()->action('CursoController@listar')->withInput();
    }
}
