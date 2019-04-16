<?php

namespace App\Http\Controllers;

use App\Atividade;
use App\Conteudo;
use App\Curso;
use App\Peso;
use Illuminate\Http\Request;

class DisciplinaController extends Controller
{
    //
    public function listar() {
        $disciplinas = Disciplina::orderBy('nome')->get();
        $cursos = Curso::select('id', 'nome', 'abreviatura')->get();
        $atividades = Atividade::orderBy('bimestre', 'ASC')->orderBy('prazo', 'ASC')->get();
        $conteudos = Conteudo::orderBy('bimestre', 'ASC')->orderBy('data', 'ASC')->get();

        return view('disciplina')->with('disciplinas', $disciplinas)->
                                        with('cursos', $cursos)->
                                        with('atividades', $atividades)->
                                        with('conteudos', $conteudos);
    }

    public function salvar($id) {
        $objDisciplina = new DisciplinaModel();
        $objDisciplina->nome = mb_strtoupper(Request::input('nome'), 'UTF-8');
        $objDisciplina->abreviatura = mb_strtoupper(Request::input('abreviatura'), 'UTF-8');
        $objDisciplina->carga_horaria = Request::input('carga');

        $arr = explode(" ", Request::input('curso'));
        $objDisciplina->id_curso = $arr[0];

        $objDisciplina->periodo = Request::input('periodo');
        $objDisciplina->ativo = 1;
        $objDisciplina->save();

        $objPeso = new Peso();
        $objPeso->id_disciplina = $objDisciplina->id;
        $objPeso->trabalho = 0.5;
        $objPeso->avaliacao = 0.5;

        if(Request::input('periodo') == 'ANUAL') {
            $objPeso->parcial01 = $objPeso->parcial02 = $objPeso->parcial03 = $objPeso->parcial04 = 0.25;
        }
        else {
            $objPeso->parcial01 = $objPeso->parcial02 = $objPeso->parcial03 = $objPeso->parcial04 = 0.50;
        }

        $objPeso->save();
    }
}
