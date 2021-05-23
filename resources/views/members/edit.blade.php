@extends('layouts.dashboard')

@section('content')
<div class="container">
    <member-edit  :member='@json($user)'  :roles='@json($roles)'/>
</div>
@endsection