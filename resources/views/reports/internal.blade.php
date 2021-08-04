@extends('layouts.dashboard')

@section('content')
    <div class="container card mt-2">


        <div class="row col-md-12 my-5">
            <h4 class="grey-text text-darken-3">Reporte Internal</h4>
        </div>
        <div class="mt-2">
            <div class="row col-md-12">
                <form action="{{ route('report.internal') }}" method="GET" class="">
                    @csrf

                    <div>
                        <calendar-vue />
                    </div>

                    <div class="row mt-4 mb-5 align-items-center">

                        <div class="col s1 input-field">
                            <label for="sexo">Sexo</label>
                            <select name="sexo" id="sexo" class=" form-control">
                                <option></option>
                                <option value="Masculino">Hombre</option>
                                <option value="Femenino">Mujer</option>
                                <option value="Otro">Otro</option>
                            </select>
                        </div>
                        <div class="col s1 input-field">
                            <label for="nacionalidad">Nacionalidad</label>
                            <select name="nacionalidad" id="nacionalidad" class=" form-control">
                                <option></option>
                                <option value="Perú">Nacional</option>
                                <option value="Venezuela">Extranjero</option>
                            </select>
                        </div>

                        <div class="col s1 input-field">
                            <label for="sexo">Origen</label>
                            <select name="origen" id="sexo" class=" form-control">
                                <option></option>
                                <option value="Programa IAFA">Programad IAFA</option>
                                <option value="Residente">Residente</option>
                            </select>
                        </div>


                    </div>
                    <button type="submit" class="btn btn-success">Buscar</button>
                    <div class="row">
                    </div>
                </form>
                <div class="mb-5  d-flex w-100 justify-content-end float-right">
                    <form action="{{ route('report.internal.generate') }}" method="POST" class="">
                        @csrf
                        <input type="hidden" name="array" placeholder="Enter rate from" autocomplete="off"
                            class="form-control" value="{{ $dates }}">
                        <button type="submit" class="btn btn-info" style="margin-top:-62px">Exportar</button>
                    </form>
                </div>
            </div>
        </div>
        <div class="row border white" id="inner-box">
            <div class="padding-0 alto" style="border-right: 1px solid #cfcfcf;">
                <div class="grey-text text-darken-3 padding-25 table-responsive">
                    <table class="table table-bordered">
                        <thead class="table-dark">
                            <th>Nro</th>
                            <th>Nombre</th>
                            <th>Nro Expediente</th>
                            <th>Programa</th>
                            <th>Entrada</th>
                            <th>Salida</th>
                            <th>Destino</th>
                            <th>Cédula</th>
                            <th>Comentarios</th>
                        </thead>
                        <tbody>
                            @foreach ($dates as $key => $date)
                                <tr>
                                    <td>{{ $key + 1 }}</td>
                                    <td>{{ $date->name . ' ' . $date->surname . ' ' . $date->second_surname }}</td>
                                    <td>{{ $date->record }}</td>
                                    <td>{{ $date->origin }}</td>
                                    <td>{{ $date->admission_date }}</td>
                                    <td>{{ $date->egress_date }}</td>
                                    <td>{{ $date->destiny }}</td>
                                    <td>{{ $date->identification }}</td>
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
