@extends('layouts.app')
@section('content')
    <h3>Mensaje de {{ $m->nombre }} - {{ $m->presenter()->userEmail() }}</h3>
    <p>{{ $m->mensaje }}</p>
@endsection
