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
        <input type="hidden" name="cadastrar" value="C">

        <div class="row">
            <div class="col-sm-12">
                <label>Nome: </label>
                <input type="text" name="nome" class="form-control">
            </div>
        </div>
        <br>
        <div class="row">
            <div class="col-sm-12">
                <label>Turma / Curso: </label>
                <select name="turma" class="form-control">
                    <option disabled="true" selected="true"> </option>
                    @foreach ($turmas as $dados)
                        {{ $curso = \App\CursoModel::find($dados->id_curso) }}
                        <option value="{{ $dados->id }}"> {{ $dados->nome }} - {{ $curso->nome }} </option>
                    @endforeach
                </select>
            </div>
        </div>
        <br>
        <button class="btn btn-success btn-block" ><b>Salvar</b></button>
    </form>
@endsection
