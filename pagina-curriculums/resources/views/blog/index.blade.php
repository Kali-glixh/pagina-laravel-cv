@extends('template.base')

@section('content')

<!-- begin modal -->
<div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="deleteModalLabel">Confirm delete</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        ¿Seguro que quieres borrar el curriculum <span id="modal-blog-nombre">XXX</span>?
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button form="form-delete" type="submit" class="btn btn-primary">Borrar Curriculum</button>
      </div>
    </div>
  </div>
</div>
<!-- end modal -->

<table class="table table-hover">

    <thead>
        <tr>
            <th>#</th>
            <th>Nombre</th>
            <th>Correo</th>
            <th>Nota media</th>
            <th>Acciones</th>
        </tr>
    </thead>

    <tbody>
        @foreach($blogs as $blog)
        <tr>
            <td>{{ $blog->id }}</td>
            <td>{{ $blog->nombre }} {{ $blog->apellidos }}</td>
            <td>{{ $blog->correo }}</td>
            <td>{{ $blog->nota_media }}</td>
            <td>
                <a href="{{ route('blog.show', $blog->id) }}" class="btn btn-success">view</a>
                <a href="{{ route('blog.edit', $blog->id) }}" class="btn btn-warning">edit</a>
                <a data-nombre="{{$blog->nombre}}" data-href="{{ route('blog.destroy', $blog->id) }}" class="btn-delete btn btn-danger">delete</a>
                <!--<form style="display: inline;" action="{{ route('blog.destroy', $blog->id) }}" method="post">
                    @csrf
                    @method('delete')
                    <input class="btn btn-danger" type="submit" value="delete">
                </form>-->
            </td>
        </tr>
        @endforeach
    </tbody>

    <tfoot>
        <tr>
            <th colspan="3">Number of curriculums:</th>
            <th>{{ count($blogs) }}</th>
        </tr>
    </tfoot>
</table>

<form id="form-delete" action="" method="post">
    @csrf
    @method('delete')
</form>

<hr>

@endsection