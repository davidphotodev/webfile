@extends('layouts.dashboard')

@section('content')
<div class="container">
    <gestion-instrumento :instrumentos='@json($instrumentos)' :rol='@json($rol)'/>
</div>
@endsection