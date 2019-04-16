@extends('principal')

<a href="{{ url('/') }}">HOME</a>
@section('Header')
    <h2>Editar Curso</h2>
@endsection

@section('content')
    <form action="{{ action('CursoController@salvar', $curso->id) }}" method="POST">
        <input type="hidden" name="_token" value="{{{ csrf_token() }}}">

        <label>Nome: </label>
        <input type="text" name="nome" value="{{ $curso->nome }}" class="form-control">
        <br>
        <label>Abreviatura: </label>
        <input type="text" name="abreviatura" value="{{ $curso->abreviatura }}" class="form-control">
        <br>
        <button type="submit" class="btn btn-success btn-block">Salvar</button>
    </form>
@endsection
