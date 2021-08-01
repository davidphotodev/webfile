<table>
    <tr>
        <th>Nro</th>
        <th>Nombre</th>
        <th>Nro Expediente</th>
        <th>Programa</th>
        <th>Entrada</th>
        <th>Salida</th>
        <th>Destino</th>
        <th>Cédula</th>
        <th>Comentarios</th>
    </tr>
    @foreach ($residents as $key => $date)
        <tr>
            <td>{{ $key + 1 }}</td>
            <td>{{ $date->name .' '. $date->surname .' '.$date->second_surname }}</td>
            <td>{{ $date->record }}</td>
            <td>{{ $date->origin }}</td>
            <td>{{ $date->admission_date }}</td>
            <td>{{ $date->egress_date }}</td>
            <td>{{ $date->destiny}}</td>
            <td>{{ $date->identification}}</td>
            <td>{{ $date->commentaries }}</td>
        </tr>
    @endforeach
    
</table>