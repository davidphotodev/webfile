<table>
    <tr>
        <td>Nro</td>
        <td>Nombre</td>
        <td>Expediente</td>
        <td>Fecha Ingreso</td>
        <td>Posible Fecha Egreso</td>
        <td>Psicología</td>
        <td>Trabajo Social</td>
        <td>Consejeria</td>
        <td>Terapia Ocupacional</td>
        <td>TS</td>
        <td>PSI</td>
        <td>TO</td>
        <td>CO</td>
        <td>MED</td>
        <td>Salida del Centro</td>
        <td>Motivo Egreso</td>
        <td>Observaciones</td>
    </tr>
    @foreach ($residents as $key => $date)
        <tr>
            <td>{{ $key + 1 }}</td>
            <td>{{ $date->name .' '. $date->surname .' '.$date->second_surname }}</td>
            <td>{{ $date->record }}</td>
            <td>{{ $date->admission_date }}</td>
            <td>{{ $date->egress_date }}</td>
            <td>{{ $date->instrument_status['c_psicologia'] }}</td>
            <td>{{ $date->instrument_status['c_trabajo_social']}}</td>
            <td>{{ $date->instrument_status['c_consejeria'] }}</td>
            <td> - </td>
            <td>{{ $date->instrument_status['s_trabajo_social'] }} </td>
            <td>{{ $date->instrument_status['s_psicologia'] }}</td>
            <td> - </td>
            <td>{{ $date->instrument_status['s_consejeria'] }} </td>
            <td>{{ $date->instrument_status['s_medicina'] }} </td>
            <td>{{ $date->egress_date }}</td>
            <td>{{ $date->egress_reason }}</td>
            <td>{{ $date->commentaries }}</td>
        </tr>
    @endforeach
    
</table>