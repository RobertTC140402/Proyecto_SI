<nav class="navbar navbar-expand-lg fixed-top" aria-label="Tenth navbar example">
    <div class="container-fluid">
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarsExample08" aria-controls="navbarsExample08" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse justify-content-md-center" id="navbarsExample08">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="navbar-brand" href="/">
                        <img src="img/logo_UNT.png" alt="Logo_de_la_UNT" width="65" height="45">
                      </a>
                </li>
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

<style>
    .navbar {
  background-color: #3b53b2;
}
.navbar .navbar-brand {
  color: #ffffff;
}
.navbar .navbar-brand:hover,
.navbar .navbar-brand:focus {
  color: #90acbf;
}
.navbar .navbar-text {
  color: #ffffff;
}
.navbar .navbar-text a {
  color: #90acbf;
}
.navbar .navbar-text a:hover,
.navbar .navbar-text a:focus {
  color: #90acbf; 
}
.navbar .navbar-nav .nav-link {
  color: #ffffff;
  border-radius: .25rem;
  margin: 0 0.25em;
}
.navbar .navbar-nav .nav-link:not(.disabled):hover,
.navbar .navbar-nav .nav-link:not(.disabled):focus {
  color: #90acbf;
}
.navbar .navbar-nav .nav-item.active .nav-link,
.navbar .navbar-nav .nav-item.active .nav-link:hover,
.navbar .navbar-nav .nav-item.active .nav-link:focus,
.navbar .navbar-nav .nav-item.show .nav-link,
.navbar .navbar-nav .nav-item.show .nav-link:hover,
.navbar .navbar-nav .nav-item.show .nav-link:focus {
  color: #90acbf;
  background-color: #053d72;
}
.navbar .navbar-toggler {
  border-color: #053d72;
}
.navbar .navbar-toggler:hover,
.navbar .navbar-toggler:focus {
  background-color: #053d72;
}
.navbar .navbar-toggler .navbar-toggler-icon {
  color: #ffffff;
}
.navbar .navbar-collapse,
.navbar .navbar-form {
  border-color: #ffffff;
}
.navbar .navbar-link {
  color: #ffffff;
}
.navbar .navbar-link:hover {
  color: #90acbf;
}

@media (max-width: 575px) {
  .navbar-expand-sm .navbar-nav .show .dropdown-menu .dropdown-item {
    color: #ffffff;
  }
  .navbar-expand-sm .navbar-nav .show .dropdown-menu .dropdown-item:hover,
  .navbar-expand-sm .navbar-nav .show .dropdown-menu .dropdown-item:focus {
    color: #90acbf;
  }
  .navbar-expand-sm .navbar-nav .show .dropdown-menu .dropdown-item.active {
    color: #90acbf;
    background-color: #053d72;
  }
}

@media (max-width: 767px) {
  .navbar-expand-md .navbar-nav .show .dropdown-menu .dropdown-item {
    color: #ffffff;
  }
  .navbar-expand-md .navbar-nav .show .dropdown-menu .dropdown-item:hover,
  .navbar-expand-md .navbar-nav .show .dropdown-menu .dropdown-item:focus {
    color: #90acbf;
  }
  .navbar-expand-md .navbar-nav .show .dropdown-menu .dropdown-item.active {
    color: #90acbf;
    background-color: #053d72;
  }
}

@media (max-width: 991px) {
  .navbar-expand-lg .navbar-nav .show .dropdown-menu .dropdown-item {
    color: #ffffff;
  }
  .navbar-expand-lg .navbar-nav .show .dropdown-menu .dropdown-item:hover,
  .navbar-expand-lg .navbar-nav .show .dropdown-menu .dropdown-item:focus {
    color: #90acbf;
  }
  .navbar-expand-lg .navbar-nav .show .dropdown-menu .dropdown-item.active {
    color: #90acbf;
    background-color: #053d72;
  }
}

@media (max-width: 1199px) {
  .navbar-expand-xl .navbar-nav .show .dropdown-menu .dropdown-item {
    color: #ffffff;
  }
  .navbar-expand-xl .navbar-nav .show .dropdown-menu .dropdown-item:hover,
  .navbar-expand-xl .navbar-nav .show .dropdown-menu .dropdown-item:focus {
    color: #90acbf;
  }
  .navbar-expand-xl .navbar-nav .show .dropdown-menu .dropdown-item.active {
    color: #90acbf;
    background-color: #053d72;
  }
}

.navbar-expand .navbar-nav .show .dropdown-menu .dropdown-item {
  color: #ffffff;
}
.navbar-expand .navbar-nav .show .dropdown-menu .dropdown-item:hover,
.navbar-expand .navbar-nav .show .dropdown-menu .dropdown-item:focus {
  color: #90acbf;
}
.navbar-expand .navbar-nav .show .dropdown-menu .dropdown-item.active {
  color: #90acbf;
  background-color: #053d72;
}
</style>
