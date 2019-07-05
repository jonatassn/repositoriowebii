@extends('principal')

@section('cabecalho')
    <div id="m_texto">
        <img src=" {{ url('/img/individual.png') }}" >
        &nbsp;Editar Indivíduo
    </div>
@stop

@section('conteudo')
    <form action="{{ action('IndividuoController@salvar', $individuo->id) }}" method="POST" class="form">
        <input type="hidden" name="_token" value="{{{ csrf_token() }}}">
        <input type="hidden" name="editar" value="E">

        <div class="row">
            <div class="col-sm-3">
                <label>Apelido: </label>
                <input value="{{ $individuo->nickname }}" type="text" name="nickname" class="form-control">
            </div>
            <div class="col-sm-2">
                <label>Idade (anos): </label>
                <input value="{{ $individuo->age }}" type="number" name="age" class="form-control">
            </div>
            <div class="col-sm-1">
                <label>Sexo: </label>
                <select name="gender" class="form-control">
                    <option selected="{{ $individuo->gender == 0 ? 'true': 'false' }}" value="0"> M </option>
                    <option selected="{{ $individuo->gender == 1 ? 'true': 'false' }}" value="1"> F </option>
                </select>
            </div>
            <div class="col-sm-3">
                <label>Tag: </label>
                <select name="tag" class="form-control">
                    <option value="{{ $individuo->id_tag }}" selected="true">{{ $individuo->id_tag }} </option>
                    @foreach($tags as $tag)
                        <option value="{{$tag->id_hex}}"> {{ $tag->id_hex }} </option>
                    @endforeach

                </select>
            </div>
            <div class="col-sm-3">
                <label>Informações Biométricas: </label>
                <input value="{{ $individuo->biometric_info }}" type="text" name="biometric_info" class="form-control">
            </div>
        </div>
        <br>
        <button type="submit" class="btn btn-success btn-block" ><b>Salvar</b></button>
    </form>

@stop
