<nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top" aria-label="Tenth navbar example">
    <div class="container-fluid">
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarsExample08" aria-controls="navbarsExample08" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse justify-content-md-center" id="navbarsExample08">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="/">
                        @auth
                        {{ auth()->user()->name }} <sup>{{ auth()->user()->code }}</sup>
                        @else
                       FACING:  Sistema de Prácticas y Tesis  <sup>β</sup> 
                        @endauth
                    </a>
                 </li>
                @auth
                @if (auth()->user()->role=='admin')
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('admin.index') }}">Preinscripciones</a>
                    </li><li class="nav-item">
                        <a class="nav-link" href="{{ route('admin.practicas') }}">Prácticas</a>
                    </li>
                    {{-- </li><li class="nav-item">
                        <a class="nav-link" href="{{ route('admin.estadisticas') }}">Estadísticas</a>
                    </li> --}}
                @elseif(auth()->user()->role=='judge')
                <li class="nav-item">
                    <a class="nav-link" href="{{route('judge.index')}}">Tesis</a>
                </li>
                @else
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('preinscripcion.index') }}">Mis Preinscripciones</a>
                    </li><li class="nav-item">
                        <a class="nav-link" href="{{ route('practica.index') }}">Mis Prácticas</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('tesis.index')}}">Mi Tesis</a>
                    </li>
                @endif
                <li class="nav-item">
                    <form style="display:inline" action="/logout" method="POST">
                        @csrf
                        <a class="nav-link" href="#" onclick="this.closest('form').submit()">Cerrar</a>
                    </form>
                </li>
                @else 
                <li class="nav-item">
                    <a class="nav-link" href="/login">Acceso</a>
                </li>
                @endauth
            </ul>
        </div>
        <div style="position:absolute;right:16px;top:25%;height:100%">
            <span class="navbar-text" style="font-size:10px;line-height:100%;color:#0d6efd">
                @if(session('status'))
                <i class="bi bi-info-circle"></i> {{ session('status') }}
                @endif
            </span>
        </div>
    </div>
</nav>

