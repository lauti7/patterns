@extends('layouts.app')
@section('content')
    <h1>Crear mensaje</h1>
    <form class="msj" action="/mensaje" method="post">
        {{ csrf_field() }}
            <input class="form-control" type="hidden" name="__token" value="{{ csrf_token() }}">
            @if (auth()->guest())
                <div class="form-group">
                    <label for="nombre">Nombre</label>
                    <input class="form-control"type="text" name="nombre" value="">
                </div>
                <div class="form-group">
                    <label for="email">email</label>
                    <input class="form-control" type="text" name="email" value="">
                </div>
            @endif
        <div class="form-group">
            <label for="mensaje">Mensaje</label>
            <textarea placeholder="Mensaje"class="form-control" type="text" name="Mensaje" value=""></textarea>
        </div>
        <input id="btn" class="btn btn-primary" type="submit" value="Enviar"></input>
    </form>

@endsection
