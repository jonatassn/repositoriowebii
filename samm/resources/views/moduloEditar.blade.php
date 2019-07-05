@extends('principal')

@section('cabecalho')
    <div id="m_texto">
        <img src=" {{ url('/img/module.png') }}" >
        &nbsp;Editar Módulo
    </div>
@stop

@section('conteudo')
    <form action="{{ action('ModuloController@salvar', $modulo->id) }}" method="POST" class="form">
        <input type="hidden" name="_token" value="{{{ csrf_token() }}}">
        <input type="hidden" name="editar" value="E">

        <div class="row">
            <div class="col-sm-4">
                <label>Descrição: </label>
                <input value="{{ $modulo->description }}" type="text" name="description" class="form-control">
            </div>
            <div class="col-sm-4">
                <label>Latitude: </label>
                <input value="{{ $modulo->latitude }}" type="text" name="latitude" class="form-control">
            </div>
            <div class="col-sm-4">
                <label>Longitude: </label>
                <input value="{{ $modulo->longitude }}" type="text" name="longitude" class="form-control">
            </div>
        </div>
        <br>
        <button type="submit" class="btn btn-success btn-block" ><b>Salvar</b></button>
    </form>

@stop
