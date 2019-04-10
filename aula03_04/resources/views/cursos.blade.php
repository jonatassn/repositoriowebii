@extends('principal')

<a href="{{ url('/') }}">Home</a>
@section('cabecalho')
    <h2>
        <img src=" {{ url('/img/cursop_ico.png') }}" > &nbsp; Cursos Cadastrados
    </h2>
@stop

@section('conteudo')
<a  href="{{ action('CursoController@cadastrar') }}" type="button">
    <b>Cadastrar Novo Curso</b>
</a>
<br>
<table>
    <thead>
        <tr>
            <th>ID</th>
            <th>NOME DO CURSO</th>
            <th>ABREVIATURA</th>
            <th>EVENTOS</th>
        </tr>
    </thead>
    <tbody>
    @foreach ($cursos as $dados)
        <tr>
            <td>{{ $dados->id }}</td>
            <td>{{ $dados->nome }}</td>
            <td>{{ $dados->abreviatura }}</td>
            <td>
                <a href="{{ action('CursoController@editar', $dados->id) }}">Editar</span></a>
                &nbsp;
                <a href="{{ action('CursoController@remover', $dados->id) }}">Remover</span></a>
            </td>

    @endforeach
    </tbody>
</table>
<br>
@stop
