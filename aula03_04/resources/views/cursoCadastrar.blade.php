@extends('principal')

<a href="{{ url('/') }}">Home</a>
@section('cabecalho')
<a href="/cursos">
    <img src=" {{ url('/img/cursop_ico.png') }}" >
</a>
&nbsp;Cadastrar Novo Curso
</div>
@stop

@section('conteudo')

<form action="{{ action('CursoController@salvar', 0) }}" method="POST">
    <input type ="hidden" name="_token" value="{{{ csrf_token() }}}">

    <label>Nome: </label>
    <input type="text" name="nome" class="form-control">
    <br>
    <label>Abreviatura: </label>
    <input type="text" name="abreviatura" class="form-control">
    <br>
    <button type="submit" class="btn btn-success btn-block">Salvar</button>
</form>
@stop
