@extends('principal')

@section('cabecalho')
    <div>
        <a href="/aluno">
            <img src=" {{ url('/img/aluno_ico.png') }}" >
        </a>
        &nbsp;Atualizar Dados do Aluno
    </div>
@endsection

@section('conteudo')
    <form action="{{ action('AlunoController@salvar', $aluno->id) }}" method="POST" class="form">
        <input type="hidden" name="_token" value="{{{ csrf_token() }}}">
        <input type="hidden" name="editar" value="E">

        <div class="row">
            <div class="col-sm-12">
                <label>Nome: </label>
                <input type="text" name="nome" class="form-control" value="{{ $aluno->nome }}">
            </div>
        </div>
        <br>
        <div class="row">
            <div class="col-sm-12">
                <label>Turma / Curso: </label>
                <select name="turma" class="form-control">
                    @foreach ($turmas as $dados)
                        {{ $curso = \App\CursoModel::find($dados->id_curso) }}
                        @if($dados->nome == $aluno->turma)
                            <option value="{{ $dados->id }}" selected="true"> {{ $dados->nome }} - {{ $curso->nome }} </option>
                        @else
                            <option value="{{ $dados->id }}"> {{ $dados->nome }} - {{ $curso->nome }} </option>
                        @endif

                    @endforeach
                </select>
            </div>
        </div>
        <br>
        <button class="btn btn-success btn-block" ><b>Salvar</b></button>
    </form>
@endsection

