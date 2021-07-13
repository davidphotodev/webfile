@extends('layouts.dashboard')

@section('content')
<div class="container">
    <editar-instrumento :rol='@json($rol)' :instrumento='@json($instrumento)'  />
</div>
@endsection