@extends('layouts.app')
@section('content')
    <h1>editar mensaje</h1>
    <form class="" action="/mensaje/{{ $m->id }}" method="post">
        {{ method_field('PUT') }}
        {{ csrf_field() }}
        <input class="" type="hidden" name="__token" value="{{ csrf_token() }}">
        <div class="fomr-group">
            <label for="nombre">Nombre</label>
            <input class="form-control" type="text" name="nombre" value="{{ $m->nombre }}">
        </div>
        <div class="form-group">
            <label for="email">email</label>
            <input class="form-control" type="text" name="email" value="{{ $m->email }}">
        </div>
        <div class="form-group">
            <label for="mensaje">Mensaje</label>
            <textarea class="form-control"type="text" name="Mensaje" value="">{{ $m->mensaje }}</textarea>
        </div>
        <button class="btn btn-primary" type="submit" name="" value="">Enviar</button>
    </form>
@endsection
