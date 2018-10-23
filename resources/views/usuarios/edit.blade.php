@extends('layouts.app')
@section('content')
    <h1>Modificar usuario</h1>
    @if (session()->has('info'))
        <div class="alert alert-success">
                 <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                 <strong>Excelente!</strong> {{ session('info') }}
        </div>
    @endif
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <form class="" action="/usuarios/{{ $user->id }}" method="post">
        {{ method_field('PUT') }}
        {{ csrf_field() }}
        <input class="" type="hidden" name="__token" value="{{ csrf_token() }}">
        <div class="fomr-group">
            <label for="nombre">Nombre</label>
            <input class="form-control" type="text" name="name" value="{{ $user->name }}">
        </div>
        <div class="form-group">
            <label for="email">email</label>
            <input class="form-control" type="text" name="email" value="{{ $user->email }}">
        </div>
        <div class="checkbox">
            @foreach ($roles as $id => $name )
                <label>
                    <input
                    type="checkbox"
                    name="roles[]"
                    {{ $user->roles->pluck('id')->contains($id) ? 'checked' : '' }}
                    value="{{ $id }}">
                    {{ $name }}
                </label>
            @endforeach
        </div>

        <button class="btn btn-primary" type="submit" name="" value="">Enviar</button>
    </form>
@endsection
