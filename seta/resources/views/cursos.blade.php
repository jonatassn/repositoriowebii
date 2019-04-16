@extends('principal')

<a href="{{ url('/') }}">Home</a>
@section('header')
    <h2>Cursos Cadastrados</h2>
@endsection

@section('content')
    <table>
        <tr>
            <th>ID</th>
            <th>NOME DO CURSO</th>
            <th>ABREVIATURA</th>
        </tr>
        @foreach($cursos as $dados)
            <tr>
                <td>{{ $dados->id }}</td>
                <td>{{ $dados->nome }}</td>
                <td>{{ $dados->abreviatura }}</td>
                <td>
                    <a href="{{ action('CursoController@editar', $dados->id) }}">Editar</a>
                    <a href="{{ action('CursoController@remover', $dados->id) }}">Remover</a>
                </td>
            </tr>
        @endforeach
    </table>
@endsection

