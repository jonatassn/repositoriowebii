@extends('principal')

@section('cabecalho')
    <div id="m_texto">
        <img src=" {{ url('/img/registro.png') }}" >
        &nbsp;Registros
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

    <table class="table">
        <thead>
        <tr>
            <th scope="col">ID MODULO</th>
            <th scope="col">TAG</th>
            <th scope="col">DATA/HORA</th>
            <th scope="col">EVENTOS</th>
        </tr>
        </thead>
        <tbody>
        @foreach($registros as $dados)
            <tr>
                <th scope="row">{{ $dados->id_modulo }}</th>
                <td>{{ $dados->id_tag }}</td>
                <td>{{ $dados->date_time_entry }}</td>
                <td>
                    <a href=""><span class='glyphicon glyphicon-pencil'></span></a>
                    &nbsp;
                    <a href=""><span class='glyphicon glyphicon-remove'></span></a>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
@stop
