@extends('template.base')

@section('content')

<div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
    @foreach($blogs as $blog)
    <div class="col">
        <div class="card h-100 shadow-lg border-0 rounded-4 overflow-hidden" style="transition: transform 0.3s;">
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
	<div class="position-relative">
            <img src="{{ asset($blog->path) }}"
    		alt="Foto de {{ $blog->nombre }} {{ $blog->apellidos }}"
     		class="card-img-top"
     		style="height: 225px; object-fit: cover;">

		<div class="position-absolute bottom-0 start-0 w-100 p-2" style="background: rgba(0,0,0,0.4);">
            		<h5 class="text-white m-0" style="font-size: 1.2rem; font-weight: 600;">{{ $blog->nombre }} {{ $blog->apellidos }}</h5>
        	</div>
	</div>
	<div class="card-body text-center">
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

<style>
	.card:hover {
		transform: translateY(-5px);
		box-shadow: 0 1rem 2rem rgba(0,0,0,0.2);
	}
</style>

@endsection
