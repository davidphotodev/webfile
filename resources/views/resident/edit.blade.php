@extends('layouts.dashboard')

@section('content')
<div class="container">
    
    <resident-dialog-edit :resident='@json($resident)'> </resident-dialog-edit>
</div>
@endsection