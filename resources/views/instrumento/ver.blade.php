@extends('layouts.dashboard')

@section('content')
<div class="container">
    <ver-instrumento :rol='@json($rol)' :instrumento='@json($instrumento)'  />
</div>
@endsection