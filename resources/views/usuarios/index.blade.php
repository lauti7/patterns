@extends('layouts.app')
@section('content')
    <h1>Dashboard de usuarios</h1>
    <div class="table-responsive">
      <table class="table table-striped table-bordered table-hover table-condensed">
        <thead>
          <tr>
            <th>ID</th>
            <th>Nombre</th>
            <th>Email</th>
            <th>Rol</th>
            <th>Nota</th>
            <th>Acciones</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($users as $user)
              <tr>
                <td>{{ $user->id }}</td>
                <td>{!! $user->present()->link() !!}</td>
                <td>{{ $user->email }}</td>
                <td>

                    {{ $user->roles->pluck('name')->implode(', ') }}

                </td>
                @if ($user->note)
                    <td>{{ $user->note->body }}</td>
                @else
                    <td>-</td>
                @endif
                <td>
                    @can('edit', $user)
                        <a class="btn btn-info btn-xs" href="/usuarios/{{ $user->id }}/edit">Editar</a>
                        <form style="display:inline;" class="" action="/usuarios/{{ $user->id }}" method="post">
                            {{ method_field('DELETE') }}
                            {{ csrf_field() }}
                            <button type="submit" class="btn btn-danger btn-xs" name="button">Eliminar</button>
                        </form>
                    @endcan
                    @cannot('edit', $user)
                        No puedes editar o eliminar porque no eres admin
                    @endcannot
                </td>
              </tr>
          @endforeach
        </tbody>
      </table>
    </div>
@endsection
