@extends('principal')

@section('cabecalho')
    <div id="m_texto">
        <img src=" {{ url('/img/tag.png') }}" >
        &nbsp;Tags
    </div>
@stop

@section('conteudo')
    @if (old('cadastrar'))
        <div class="alert alert-success">
            <strong>TAG {{ old('id') }} </strong>: Cadastrado com Sucesso!
        </div>
    @endif

    @if (old('editar'))
        <div class="alert alert-success">
            <strong>TAG {{ old('id') }}</strong>: Alterado com Sucesso!
        </div>
    @endif

    <form action="{{ action('TagController@salvar', 0) }}" method="POST" class="form">
        <input type="hidden" name="_token" value="{{{ csrf_token() }}}">
        <input type="hidden" name="cadastrar" value="C">

        <div class="row">
            <div class="col-sm-6">
                <label>Frequência: </label>
                <input type="text" name="frequency" class="form-control">
            </div>
            <div class="col-sm-6">
                <label>Código Identificador: </label>
                <input type="text" name="id" class="form-control">
            </div>
        </div>
        <br>
        <button type="submit" class="btn btn-success btn-block" ><b>Salvar</b></button>
    </form>

    <table class="table">
        <thead>
        <tr>
            <th scope="col">ID</th>
            <th scope="col">FREQUÊNCIA</th>
            <th scope="col">CÓDIGO IDENTIFICADOR</th>
            <th scope="col">EVENTOS</th>
        </tr>
        </thead>
        <tbody>
        @foreach($tags as $dados)
            <tr>
                <th scope="row">{{ $dados->id }}</th>
                <td>{{ $dados->frequency }}</td>
                <td>{{ $dados->id_hex }}</td>
                <td>
                    <a href="{{ action('TagController@editar', $dados->id) }}"><span class='glyphicon glyphicon-pencil'></span></a>
                    &nbsp;
                    <a style="color: red" href="{{ action('TagController@remover', $dados->id) }}"><span class='glyphicon glyphicon-remove'></span></a>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
@stop
