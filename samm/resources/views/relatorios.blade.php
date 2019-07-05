@extends('principal')

@section('cabecalho')
    <div id="m_texto">
        <img src=" {{ url('/img/report.png') }}" >
        &nbsp;Relatorio
    </div>
@stop

@section('conteudo')
    @if (old('enviado'))
        <div class="alert alert-success">
            <strong>Relatorio enviado para {{ old('email') }} </strong> com Sucesso!
        </div>
    @endif

    <form action="{{ action('RelatorioController@enviarEmail', 0) }}" method="POST" class="form">
        <input type="hidden" name="_token" value="{{{ csrf_token() }}}">
        <input type="hidden" name="enviado" value="C">

        <div class="row">
            <div class="col-sm-8">
                <label>email: </label>
                <input type="email" name="email" class="form-control">
            </div>
            <div class="col-sm-4">
                <label> &nbsp;</label>
                <button type="submit" class="btn btn-success btn-block" ><b>Enviar Relatorio via Email</b></button>
            </div>
        </div>
        <br>


    </form>

    <form action="{{ action('RelatorioController@gerarRelatorio') }}">
        <div class="row">
            <div class="col-sm-12">
                <button type="submit" class="btn btn-primary btn-block" ><b>Gerar relatorio em PDF</b></button>
            </div>
        </div>
        <br>
        <br>
    </form>

    <table class="table">
        <thead>
        <tr>
            <th scope="col">ID INDIVÍDUO</th>
            <th scope="col">APELIDO</th>
            <th scope="col">IDADE</th>
            <th scope="col">SEXO</th>
            <th scope="col">INFORMAÇÕES BIOMETRICAS</th>
            <th scope="col">TAG</th>
            <th scope="col">ID MÓDULO</th>
            <th scope="col">DATA/HORA REGISTRO</th>
        </tr>
        </thead>
        <tbody>
        @foreach($entries as $dados)
            <tr>
                <th scope="row">{{ $dados->id }}</th>
                <td>{{ $dados->nickname }}</td>
                <td>{{ $dados->age }}</td>
                <td>{{ $dados->gender == 0 ? 'M' : 'F' }}</td>
                <td>{{ $dados->biometric_info }}</td>
                <td>{{ $dados->id_tag }}</td>
                <td>{{ $dados->id_module }}</td>
                <td>{{ $dados->date_time_entry }}</td>
            </tr>
        @endforeach
        </tbody>
    </table>
@stop
