@extends('layouts.app')
@section('content')
    <h1>Perfil de {{ $user->name }}</h1>
    <table class="table">
        <tr>
            <th>Nombre:</th>
            <td>{{ $user->name }}</td>
        </tr>
        <tr>
            <th>email:</th>
            <td>{{ $user->email }}</td>
        </tr>
        <tr>
            <th>Roles:</th>
            <td>@foreach ($user->roles as $role)
                {{ $role->name }}-
            @endforeach</td>
        </tr>
    </table>
    @can('edit', $user)
        <a href="/usuarios/{{ $user->id }}/edit" type="submit" class="btn btn-lg btn-default btn-info ">Editar</a>
    @endcan
    @can('destroy', $user)
        <a href="/usuarios/{{ $user->id }}" type="submit" class="btn btn-lg btn-default btn-info ">Eliminar</a>
    @endcan

@endsection
