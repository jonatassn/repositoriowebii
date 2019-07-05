@extends('principal')

@section('cabecalho')
    <div id="m_texto">
        <img src=" {{ url('/img/individual.png') }}" >
        &nbsp;Indivíduos
    </div>
@stop

@section('conteudo')
    @if (old('cadastrar'))
        <div class="alert alert-success">
            <strong>Indivíduo {{ old('nickname') }} </strong>: Cadastrado com Sucesso!
        </div>
    @endif

    @if (old('editar'))
        <div class="alert alert-success">
            <strong>Indivíduo {{ old('nickname') }}</strong>: Alterado com Sucesso!
        </div>
    @endif

    <form action="{{ action('IndividuoController@salvar', 0) }}" method="POST" class="form">
        <input type="hidden" name="_token" value="{{{ csrf_token() }}}">
        <input type="hidden" name="cadastrar" value="C">

        <div class="row">
            <div class="col-sm-3">
                <label>Apelido: </label>
                <input type="text" name="nickname" class="form-control">
            </div>
            <div class="col-sm-2">
                <label>Idade (anos): </label>
                <input type="number" name="age" class="form-control">
            </div>
            <div class="col-sm-1">
                <label>Sexo: </label>
                <select name="gender" class="form-control">
                    <option disabled="true" selected="true"> </option>
                    <option value="0"> M </option>
                    <option value="1"> F </option>
                </select>
            </div>
            <div class="col-sm-3">
                <label>Tag: </label>
                <select name="tag" class="form-control">
                    <option disabled="true" selected="true"> </option>
                    @foreach($tags as $tag)
                        <option value="{{$tag->id_hex}}"> {{ $tag->id_hex }} </option>
                    @endforeach

                </select>
            </div>
            <div class="col-sm-3">
                <label>Informações Biométricas: </label>
                <input type="text" name="biometric_info" class="form-control">
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
            <th scope="col">APELIDO</th>
            <th scope="col">IDADE</th>
            <th scope="col">SEXO</th>
            <th scope="col">INFORMAÇÕES BIOMETRICAS</th>
            <th scope="col">TAG</th>
            <th scope="col">EVENTOS</th>
        </tr>
        </thead>
        <tbody>
        @foreach($especimens as $dados)
            <tr>
                <th scope="row">{{ $dados->id }}</th>
                <td>{{ $dados->nickname }}</td>
                <td>{{ $dados->age }}</td>
                <td>{{ $dados->gender == 0 ? 'M' : 'F' }}</td>
                <td>{{ $dados->biometric_info }}</td>
                <td>{{ $dados->id_tag }}</td>
                <td>
                    <a href="{{ action('IndividuoController@editar', $dados->id) }}"><span class='glyphicon glyphicon-pencil'></span></a>
                    &nbsp;
                    <a style="color: red" href="{{ action('IndividuoController@remover', $dados->id) }}"><span class='glyphicon glyphicon-remove'></span></a>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
@stop
