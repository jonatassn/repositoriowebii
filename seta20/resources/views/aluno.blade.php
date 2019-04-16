@extends('principal')

@section('cabecalho')
<div id="m_texto">
        <img src=" {{ url('/img/alunop_ico.png') }}" >
        &nbsp;Alunos Cadastrados
</div>
@stop

@section('conteudo')
    <a href="{{ action('AlunoController@cadastrar') }}"
       type="button" class="btn btn-primary btn-block" ><b>Cadastrar Aluno</b></a>
@stop
