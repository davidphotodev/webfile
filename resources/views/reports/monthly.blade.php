@extends('layouts.dashboard')

@section('content')
    <div class="container card mt-2">


        <div class="row col-md-12 my-5">
            <h4 class="grey-text text-darken-3">Reporte Mensual</h4>
        </div>
        <div class="mt-2">
            <div class="row col-md-12">
                <form action="{{ route('report.monthly') }}" method="GET" class="">
                    @csrf

                    <div>
                        <calendar-vue />
                    </div>

                    <div class="row mt-4 mb-5 align-items-center">
                        <div class="col-md-3 s1 input-field">
                            <label for="nacionalidad">Nacionalidad</label>
                            <select name="nacionalidad" id="nacionalidad" class=" form-control">
                                <option></option>
                                <option value="Perú">Nacional</option>
                                <option value="Venezuela">Extranjero</option>
                            </select>
                        </div>

                        <div class="col-md-3 s1 input-field">
                            <label for="sexo">Origen</label>
                            <select name="origen" id="sexo" class=" form-control">
                                <option></option>
                                <option value="Programa IAFA">Programad IAFA</option>
                                <option value="Residente">Residente</option>
                            </select>
                        </div>

                    </div>
                    <button type="submit" class="btn btn-success">Buscar</button>

                </form>
                <div class="mb-5  d-flex w-100 justify-content-end float-right">
                    <form action="{{ route('report.monthly.generate') }}" method="POST" class="">
                        @csrf
                        <input type="hidden" name="array" placeholder="Enter rate from" autocomplete="off"
                            class="form-control" value="{{ $dates }}">
                        <button type="submit" class="btn btn-info" style="margin-top: -62px;">Exportar</button>
                    </form>
                </div>
            </div>
        </div>
        <div class="row border white" id="inner-box">
            <div class="padding-0 alto" style="border-right: 1px solid #cfcfcf;">
                <div class="grey-text text-darken-3 padding-25 table-responsive"  style="max-height: 100vh">
                    <table class="table table-bordered">
                        <thead class="table-dark">
                            <th>Nro</th>
                            <th>Nombre</th>
                            <th>Expediente</th>
                            <th>Fecha Ingreso</th>
                            <th>Posible Fecha Egreso</th>
                            <th>Psicología</th>
                            <th>Trabajo Social</th>
                            <th>Consejeria</th>
                            <th>Terapia Ocupacional</th>
                            <th>TS</th>
                            <th>PSI</th>
                            <th>TO</th>
                            <th>CO</th>
                            <th>MED</th>
                            <th>Salida del Centro</th>
                            <th>Motivo Egreso</th>
                            <th>Observaciones</th>
                        </thead>
                        <tbody>
                            @foreach ($dates as $key => $date)
                                <tr>
                                    <td>{{ $key + 1 }}</td>
                                    <td>{{ $date->name . ' ' . $date->surname . ' ' . $date->second_surname }}</td>
                                    <td>{{ $date->record }}</td>
                                    <td>{{ $date->admission_date }}</td>
                                    <td>{{ $date->egress_date }}</td>
                                    <td>{{ $date->instrument_status ? $date->instrument_status['c_psicologia'] : '' }}</td>
                                    <td>{{ $date->instrument_status ? $date->instrument_status['c_trabajo_social'] : '' }}</td>
                                    <td>{{ $date->instrument_status ? $date->instrument_status['c_consejeria'] : ''}}</td>
                                    <td> - </td>
                                    <td>{{ $date->instrument_status ? $date->instrument_status['s_trabajo_social']: '' }} </td>
                                    <td>{{ $date->instrument_status ? $date->instrument_status['s_psicologia'] : '' }}</td>
                                    <td> - </td>
                                    <td>{{ $date->instrument_status ? $date->instrument_status['s_consejeria']: ''}} </td>
                                    <td>{{ $date->instrument_status ? $date->instrument_status['s_medicina'] : '' }} </td>
                                    <td>{{ $date->egress_date }}</td>
                                    <td>{{ $date->egress_reason }}</td>
                                    <td>{{ $date->commentaries }}</td>
                                </tr>
                            @endforeach

                        </tbody>
                    </table>
                </div>


            </div>
        </div>
    </div>
@endsection
