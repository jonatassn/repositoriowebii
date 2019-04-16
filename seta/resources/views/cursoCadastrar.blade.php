@extends('principal')

<a href="{{ url('/') }}">HOME</a>
@section('header')
    <h2>Cadastrar Curso</h2>
@endsection

@section('content')
    <form action="{{ action('CursoController@salvar', 0) }}" method="POST">
        <input type="hidden" name="_token" value="{{{ csrf_token() }}}">

        <label>Nome: </label>
        <input type="text" name="nome" class="form-control">
        <br>
        <label>Abreviatura: </label>
        <input type="text" name="abreviatura" class="form-control">
        <br>
        <button type="submit" class="btn btn-success btn-block">Salvar</button>
    </form>
@endsection
