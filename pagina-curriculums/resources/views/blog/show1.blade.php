@extends('template.base')

@section('content')

<table class="table table-hover">
    <tr>
        <td>#</td>
        <td>{{ $blog->id }}</td>
    </tr>
    <tr>
        <td>Nombre</td>
        <td>{{ $blog->nombre }} {{ $blog->apellidos }}</td>
    </tr>
    <tr>
        <td>Correo</td>
        <td>{{ $blog->correo }}</td>
    </tr>
    <tr>
        <td>Teléfono</td>
        <td>{{ $blog->telefono }}</td>
    </tr>
    <tr>
        <td>Fecha de nacimiento</td>
        <td>{{ $blog->fecha_nacimiento }}</td>
    </tr>
    <tr>
        <td>Nota Media</td>
        <td>{{ $blog->nota_media }}</td>
    </tr>
</table>

@endsection