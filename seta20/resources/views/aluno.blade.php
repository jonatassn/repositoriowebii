@extends('principal')

@section('cabecalho')
<div id="m_texto">
        <img src=" {{ url('/img/alunop_ico.png') }}" >
        &nbsp;Alunos Cadastrados
</div>
@stop

@section('conteudo')
    @if (old('cadastrar'))
        <div class="alert alert-success">
            <strong> {{ old('nome') }} </strong>: Cadastrado com Sucesso!
        </div>
    @endif

    @if (old('editar'))
        <div class="alert alert-success">
            <strong> {{ old('nome') }} </strong>: Alterado com Sucesso!
        </div>
    @endif


    <a href="{{ action('AlunoController@cadastrar') }}"
       type="button" class="btn btn-primary btn-block" ><b>Cadastrar Aluno</b></a>
    <table class="table">
        <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">NOME</th>
                <th scope="col">CURSO</th>
                <th scope="col">TURMA</th>
                <th scope="col">EVENTOS</th>
            </tr>
        </thead>
        <tbody>
            @foreach($alunos as $dados)
                <tr>
                    <th scope="row">{{ $dados->id }}</th>
                    <td>{{ $dados->nome }}</td>
                    <td>{{ $dados->curso }}</td>
                    <td>{{ $dados->turma }}</td>
                    <td>
                        <a href="{{ action('AlunoController@editar', $dados->id) }}"><span class='glyphicon glyphicon-pencil'></span></a>
                        &nbsp;
                        <a href="{{ action('AlunoController@remover', $dados->id) }}"><span class='glyphicon glyphicon-remove'></span></a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@stop
