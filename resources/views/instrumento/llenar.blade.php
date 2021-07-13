@extends('layouts.dashboard')

@section('content')
<div class="container">
    <llenar-instrumento :rol='@json($rol)' :instrumento='@json($instrumento)'  />
</div>
@endsection