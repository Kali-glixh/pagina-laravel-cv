@extends('template.base')

@section('content')
<form action="{{ route('blog.update', $blog->id) }}" method="post">
    @csrf
    @method('put')
    <div>
        <label for="title">Nombre:</label>
        <input class="form-control" required id="nombre" minlength="2" maxlength="100" type="text" name="nombre" placeholder="Tu nombre" value="{{ old('nombre') }}">
    </div>
    <div>
        <label for="entry">Apellidos:</label>
        <input class="form-control" required id="apellidos" minlength="4" maxlength="150" type="text" name="apellidos" placeholder="Tus apellidos" value="{{ old('apellidos') }}">
    </div>
    <div>
        <label for="text">Correo electrónico:</label>
        <input class="form-control" required id="correo" type="email" name="correo" placeholder="ejemplo@correo.com" value="{{ old('correo') }}">
    </div>
    <div>
        <label for="author">Teléfono:</label>
        <input class="form-control" id="telefono" maxlength="15" type="tel" name="telefono" placeholder="Ej. 600123456" value="{{ old('telefono') }}">
    </div>
    <div>
        <label for="genre">Fecha de nacimiento:</label>
        <input class="form-control" id="fecha_nacimiento" type="date" name="fecha_nacimiento" value="">
    </div>
    <div>
        <label for="genre">Nota media:</label>
        <input class="form-control" id="nota_media" type="number" step="0.01" min="0" max="10" name="nota_media" placeholder="Ej. 8.75" value="{{ old('nota_media') }}">
    </div>
    <div>
        <label for="genre">Fotografia</label>
        <input class="form-control" id="fotografia" type="file" name="fotografia" accept="image/*">
    </div>
    <div>
        <label for="genre">Experiencia:</label>
        <textarea cols="60" rows="6" class="form-control" id="experiencia" name="experiencia" placeholder="Experiencia (puestos, empresas, fechas)">{{ old('experiencia') }}</textarea>
    </div>
    <div>
        <label for="genre">Formación:</label>
        <textarea cols="60" rows="6" class="form-control" id="formacion" name="formacion" placeholder="Formación (títulos, centros, fechas)">{{ old('formacion') }}</textarea>
    </div>
    <div>
        <label for="genre">Habilidades:</label>
        <textarea cols="60" rows="4" class="form-control" id="habilidades" name="habilidades" placeholder="Habilidades (ej. Laravel, JavaScript, Liderazgo)">{{ old('habilidades') }}</textarea>
    </div>
    <div class="upper-space" style="padding-top: 16px;">
        <input class="btn btn-primary" type="submit" value="Edit post">
    </div>
</form>
@endsection