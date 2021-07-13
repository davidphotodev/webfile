@extends('layouts.dashboard')

@section('content')
<div class="container">
    <aplicar-instrumento :rol='@json($rol)' />
</div>
@endsection