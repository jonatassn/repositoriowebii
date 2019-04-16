@extends('principal')

<a href="{{url('/')}}">Home</a>
@section('header')
    <h2>Alunos Cadastrados</h2>
@endsection

@section('content')
    <table>
        <tr>
            <th>ID</th>
            <th>NOME DO ALUNO</th>
            <th>CURSO</th>
        </tr>
        @foreach($alunos as $dados)
            <tr>
                <td>{{ $dados->id }}</td>
                <td>{{ $dados->nome }}</td>
                <td>{{ $dados->curso }}</td>
            </tr>
        @endforeach
    </table>
@endsection
