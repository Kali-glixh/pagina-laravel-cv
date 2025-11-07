@extends('template.base')

@section('content')

<div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
    @foreach($blogs as $blog)
    <div class="col">
        <div class="card shadow-sm" style="min-height: 450px;">
            @php
                $url = $blog->path 
                    ? url('storage/' . $blog->path)
                    : url('assets/img/fotohtafia.jpg');
            @endphp
            <!--<svg aria-label="Placeholder: Thumbnail" class="bd-placeholder-img card-img-top"
                height="225" preserveAspectRatio="xMidYMid slice" role="img" width="100%"
                xmlns="http://www.w3.org/2000/svg"
                style="background-image: url('{{ $url }}');
                       background-size: cover;
                       background-position: center center;">
                <title>Placeholder</title>
                <rect width="100%" height="100%" fill="#55595c11"></rect>
                <text x="5%" y="30%" fill="#eceeef"
                    dy=".3em" style="font-weight: bold; font-size: 1.5rem;">{{ $blog->title }}</text>
            </svg>-->
            <!-- <svg aria-label="Placeholder: Thumbnail" class="bd-placeholder-img card-img-top"
                height="225" preserveAspectRatio="xMidYMid slice" role="img" width="100%"
                xmlns="http://www.w3.org/2000/svg"
                style="background-image: url('{{ $blog->getPath() }}');
                       background-size: cover;
                       background-position: center center;">
                <title>Placeholder</title>
                <rect width="100%" height="100%" fill="#55595c11"></rect>
                <text x="5%" y="30%" fill="#eceeef"
                    dy=".3em" style="font-weight: bold; font-size: 1.5rem;">{{ $blog->title }}</text>
            </svg> -->
            <!--<svg aria-label="Placeholder: Thumbnail" class="bd-placeholder-img card-img-top"
                height="225" preserveAspectRatio="xMidYMid slice" role="img" width="100%"
                xmlns="http://www.w3.org/2000/svg"
                style="background-image: url('@if($blog->path == null){{ url('assets/img/noticia.jpg') }}@else{{ url('storage/' . $blog->path) }}@endif');
                       background-size: cover;
                       background-position: center center;">
                <title>Placeholder</title>
                <rect width="100%" height="100%" fill="#55595c11"></rect>
                <text x="5%" y="30%" fill="#eceeef"
                    dy=".3em" style="font-weight: bold; font-size: 1.5rem;">{{ $blog->title }}</text>
            </svg>-->
            <img src="{{ $url }}" 
                alt="Foto de {{ $blog->nombre }} {{ $blog->apellidos }}" 
                class="card-img-top" 
                style="height: 225px;">
                
            <div class="card-body text-center">
                <h5 class="card-title fw-bold">
                    {{ $blog->nombre }} {{ $blog->apellidos }}
                </h5>

                <p class="text-muted mb-1">
                    <i class="bi bi-envelope"></i> {{ $blog->correo }}
                </p>

                @if($blog->telefono)
                    <p class="text-muted mb-2">
                        <i class="bi bi-telephone"></i> {{ $blog->telefono }}
                    </p>
                @endif

                @if($blog->experiencia)
                    <p class="card-text text-start" style="font-size: 0.9rem;">
                        {{ Str::limit($blog->experiencia, 100) }} <!-- para mostrar un poco de la experiencia -->
                    </p>
                @endif

                <div class="d-flex justify-content-center align-items-center gap-2 mt-3">
                    <a href="{{ route('blog.show', $blog->id) }}" class="btn btn-sm btn-outline-primary">Ver</a>
                    <a href="{{ route('blog.edit', $blog->id) }}" class="btn btn-sm btn-outline-secondary">Editar</a>
                </div>
            </div>
        </div>
    </div>
    @endforeach
</div>

@endsection