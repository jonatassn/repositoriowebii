@extends('principal')

@section('cabecalho')
    <div>
        <a href="/aluno">
            <img src=" {{ url('/img/aluno_ico.png') }}" >
        </a>
        &nbsp;Cadastrar Novo Aluno
    </div>
@endsection

@section('conteudo')
    <form action="{{ action('AlunoController@salvar', 0) }}" method="POST" class="form">
        <input type="hidden" name="_token" value="{{{ csrf_token() }}}">

        <div class="row">
            <div class="col-sm-12">
                <label>Nome: </label>
                <input type="text" name="nome" class="form-control">
            </div>
        </div>
        <br>
        <div class="row">
            <div class="col-sm-6">
                <label>Curso: </label>
                <input type="text" name="curso" class="form-control">
            </div>
            <div class="col-sm-6">
                <label>Turma: </label>
                <input type="text" name="turma" class="form-control">
            </div>
        </div>
        <br>
        <a href="{{ action('AlunoController@salvar', 0) }}" type="button" class="btn btn-success btn-block" ><b>Salvar</b></a>
    </form>
@endsection
