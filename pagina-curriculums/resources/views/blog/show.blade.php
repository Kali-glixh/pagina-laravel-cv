@extends('template.base')

@section('scripts')
<script src="https://kit.fontawesome.com/ec3e7e2cc5.js" crossorigin="anonymous"></script>
@endsection

@section('content')
@php
@endphp
<header class="masthead py-5" style="background-color: transparent;">
    <div class="container px-4 px-lg-5">
        <div class="row justify-content-center text-center">
            <div class="col-md-6">
                <div class="profile-img mb-3">
               		 <img src="{{ $blog->getPath() }}"
                    		 alt="Foto de {{ $blog->nombre }}"
                    		 class="img-fluid">
		</div>

                <h1 class="fw-bold">{{ $blog->nombre }} {{ $blog->apellidos }}</h1>

                @if($blog->nota_media)
                    <h4 class="text-muted mb-3 animate-fade-delay">Nota media: {{ $blog->nota_media }}</h4>
                @endif

		<div class="contact-info">
	                <div class="d-block text-muted mb-2">
        	            <i class="fas fa-envelope me-2"></i>
                	    <a href="mailto:{{ $blog->correo }}">{{ $blog->correo }}</a>
              		</div>
                	@if($blog->telefono)
                    		<div class="d-block text-muted mb-2">
                        		<i class="fas fa-phone me-2"></i>{{ $blog->telefono }}
                    		</div>
                	@endif
                	@if($blog->fecha_nacimiento)
                    		<div class="d-block text-muted mb-2">
                        		<i class="fas fa-birthday-cake me-2"></i>{{ $blog->fecha_nacimiento }}
                    		</div>
                	@endif
            		</div>
        	</div>
	</div>
    </div>
</header>
<article class="mb-4 section-card animate-up">
    <div class="container px-4 px-lg-5">
        <div class="row gx-4 gx-lg-5 justify-content-center">
            <div class="col-md-10 col-lg-8 col-xl-7">
                <h1>Experiencia</h1><br>
                <p>{{ $blog->experiencia }}</p>
            </div>
        </div>
    </div>
</article>
<article class="mb-4">
    <div class="container px-4 px-lg-5">
        <div class="row gx-4 gx-lg-5 justify-content-center">
            <div class="col-md-10 col-lg-8 col-xl-7">
                <h1>Formación</h1><br>
                <p>{{ $blog->formacion }}</p>
            </div>
        </div>
    </div>
</article>
<article class="mb-4">
    <div class="container px-4 px-lg-5">
        <div class="row gx-4 gx-lg-5 justify-content-center">
            <div class="col-md-10 col-lg-8 col-xl-7">
                <h1>Habilidades</h1><br>
                <p>{{ $blog->habilidades }}</p>
            </div>
        </div>
    </div>
</article>
<footer class="border-top">
    <div class="container px-4 px-lg-5">
        <div class="row gx-4 gx-lg-5 justify-content-center">
            <div class="col-md-10 col-lg-8 col-xl-7">
                <ul class="list-inline text-center">
                    <li class="list-inline-item">
                        <a href="#!">
                            <span class="fa-stack fa-lg">
                                <i class="fas fa-circle fa-stack-2x"></i>
                                <i class="fab fa-twitter fa-stack-1x fa-inverse"></i>
                            </span>
                        </a>
                    </li>
                    <li class="list-inline-item">
                        <a href="#!">
                            <span class="fa-stack fa-lg">
                                <i class="fas fa-circle fa-stack-2x"></i>
                                <i class="fab fa-facebook-f fa-stack-1x fa-inverse"></i>
                            </span>
                        </a>
                    </li>
                    <li class="list-inline-item">
                        <a href="#!">
                            <span class="fa-stack fa-lg">
                                <i class="fas fa-circle fa-stack-2x"></i>
                                <i class="fab fa-github fa-stack-1x fa-inverse"></i>
                            </span>
                        </a>
                    </li>
                </ul>
            <div class="small text-center text-muted fst-italic">Copyright &copy; Dwes Tarde {{ $year }}</div>
        </div>
    </div>
</footer>
@endsection
