@extends('principal')

@section('cabecalho')
    <img src=" {{ url('/img/homep_ico.png') }}" >
    <h2>Menu Principal</h2><br>
@stop

@section('conteudo')
    <a href="/alunos"><img src="{{ url('/img/aluno_ico.png') }}"></a>
    <!--<a href="/professores"><img src="{{ url('/img/prof_ico.png') }}"></a>-->
    <a href="/cursos"><img src="{{ url('/img/curso_ico.png') }}"></a>
    <br><br>
@stop
