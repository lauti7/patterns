@extends('layouts.app')
@section('content')
    <h1>Todos los mensajes</h1>

    <table class="table table-striped table-bordered table-hover table-condensed" >
        <thead class=>
            <tr>
                <th>Nombre</th>
                <th>Email</th>
                <th>Mensaje</th>
                <th>Notas</th>
                <th>Etiquetas</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($m as $me)
                <tr>
                    <td>{!! $me->present()->userName() !!}</td>

                    <td>{{ $me->present()->userEmail() }}</td>

                    <td>{{ $me->mensaje }}</td>

                    <td>{{ $me->note ? $me->note->body : '' }}</td>

                    <td>{{ $me->tags ? $me->tags->pluck('name')->implode('-') : '' }}</td>

                    <td>
                        <a class="btn btn-info btn-xs" href="/mensaje/{{ $me->id }}/edit">Editar</a>
                        <form style="display:inline;" class="" action="/mensaje/{{ $me->id }}/delete" method="post">
                            {{ method_field('DELETE') }}
                            {{ csrf_field() }}
                            <button type="submit" class="btn btn-danger btn-xs" name="button">Eliminar</button>
                        </form>

                    </td>
                </tr>
            @endforeach
            {{ $m->fragment('hash')->appends(request()->query())->links('pagination::simple-default') }}
        </tbody>
    </table>
@endsection
{{--
    con esto le pasas parametros a la url y que permanezacan siempre
    appends(['sorted' => request('sorted')]
--}}
