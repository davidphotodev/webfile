@extends('layouts.dashboard')

@section('content')
<div class="container">
    <resident-dialog-detail  :rol='@json($rol)' :resident='@json($resident)' :instrumentos='@json($instrumentos)'/>
</div>
@endsection