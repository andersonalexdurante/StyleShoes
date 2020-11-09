@extends('templates/nav-bar')

@section('content')
<h1 class="text-center text-dark font-weight-bold mt-3">{{strtoupper(session('user'))}}</h1>
    <div class="container col-8">
    
@endsection