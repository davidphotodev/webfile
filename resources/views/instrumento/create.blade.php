@extends('layouts.dashboard')

@section('content')
<div class="container">
    <create-instrumento :rol='@json($rol)' />
</div>
@endsection