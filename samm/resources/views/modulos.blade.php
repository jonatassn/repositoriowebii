@extends('principal')

@section('cabecalho')
    <div id="m_texto">
        <img src=" {{ url('/img/module.png') }}" >
        &nbsp;Módulos
    </div>
@stop

@section('conteudo')
    @if (old('cadastrar'))
        <div class="alert alert-success">
            <strong>Módulo {{ old('id') }} </strong>: Cadastrado com Sucesso!
        </div>
    @endif

    @if (old('editar'))
        <div class="alert alert-success">
            <strong>Módulo {{ old('id') }}</strong>: Alterado com Sucesso!
        </div>
    @endif

    <form action="{{ action('ModuloController@salvar', 0) }}" method="POST" class="form">
        <input type="hidden" name="_token" value="{{{ csrf_token() }}}">
        <input type="hidden" name="cadastrar" value="C">

        <div class="row">
            <div class="col-sm-4">
                <label>Descrição: </label>
                <input type="text" name="description" class="form-control">
            </div>
            <div class="col-sm-4">
                <label>Latitude: </label>
                <input type="text" name="latitude" class="form-control">
            </div>
            <div class="col-sm-4">
                <label>Longitude: </label>
                <input type="text" name="longitude" class="form-control">
            </div>
        </div>
        <br>
        <br>
        <button type="submit" class="btn btn-success btn-block" ><b>Salvar</b></button>
    </form>

    <table class="table">
        <thead>
        <tr>
            <th scope="col">ID</th>
            <th scope="col">DESCRIÇÃO</th>
            <th scope="col">LATITUDE</th>
            <th scope="col">LONGITUDE</th>
            <th scope="col">EVENTOS</th>
        </tr>
        </thead>
        <tbody>
        @foreach($modules as $dados)
            <tr>
                <th scope="row">{{ $dados->id }}</th>
                <td>{{ $dados->description}}</td>
                <td>{{ $dados->latitude }}</td>
                <td>{{ $dados->longitude }}</td>
                <td>
                    <a href="{{ action('ModuloController@editar', $dados->id) }}"><span class='glyphicon glyphicon-pencil'></span></a>
                    &nbsp;
                    <a style="color: red" href="{{ action('ModuloController@remover', $dados->id) }}"><span class='glyphicon glyphicon-remove'></span></a>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
@stop
