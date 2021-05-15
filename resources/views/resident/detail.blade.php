@extends('layouts.dashboard')

@section('content')
<div class="container">
    <resident-dialog-detail :resident='@json($resident)'/>
</div>
@endsection