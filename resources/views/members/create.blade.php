@extends('layouts.dashboard')

@section('content')
<div class="container">
    <member-create :roles='@json($roles)'/>
</div>
@endsection