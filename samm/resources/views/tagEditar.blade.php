@extends('principal')

@section('cabecalho')
    <div id="m_texto">
        <img src=" {{ url('/img/tag.png') }}" >
        &nbsp;Editar TaG
    </div>
@stop

@section('conteudo')
    <form action="{{ action('TagController@salvar', $tag->id) }}" method="POST" class="form">
        <input type="hidden" name="_token" value="{{{ csrf_token() }}}">
        <input type="hidden" name="editar" value="E">

        <div class="row">
            <div class="col-sm-6">
                <label>Frequência: </label>
                <input value="{{$tag->frequency}}" type="text" name="frequency" class="form-control">
            </div>
            <div class="col-sm-6">
                <label>Código Identificador: </label>
                <input value="{{$tag->id_hex}}" type="text" name="id" class="form-control">
            </div>
        </div>
        <br>
        <button type="submit" class="btn btn-success btn-block" ><b>Salvar</b></button>
    </form>

@stop
