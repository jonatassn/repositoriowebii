    <div>
        <h1 style="text-align: center;" >SAMM - Relatório de Registros</h1>
        <h3 style="text-align: center;" >Sistema de Auxílio ao Módulo de Monitoramento</h3>
    </div>
    <table>
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

