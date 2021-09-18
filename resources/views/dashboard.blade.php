<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Prácticas de {{ auth()->user()->name }}</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-U1DAWAznBHeqEIlVSCgzq+c9gqGAJn5c/t99JyeKa9xxaYpSvHU5awsuZVVFIhvj" crossorigin="anonymous"></script>
</head>
<body>
    @include('partials.nav')
    <div class="container" style="margin-top:50px;text-align:center">
        <br> <h3>Preinscripciones Enviadas</h3> <br>
        <button type="button" class="btn btn-outline-secondary btn-sm" data-bs-toggle="modal" data-bs-target="#Modal">
            <i class="bi bi-plus"></i> Nueva Preinscripción
        </button>
        {{-- <button type="button" class="btn btn-outline-secondary btn-sm">
            <i class="bi bi-filter"></i> Filtrar
        </button>  <br> --}}
        <br>
        <table class="table table-hover align-middle">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Organización</th>
                    <th scope="col">Docente</th>
                    <th scope="col">Fecha Envío</th>
                    <th scope="col">Estado</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($preinscripciones as $item)
                    <tr>
                        <th scope="row">
                            <button class="btn btn-outline-secondary btn-sm" data-bs-target="#exampleModalToggle{{ $item->id }}" data-bs-toggle="modal" data-bs-dismiss="modal">
                                <i class="bi bi-file-earmark-text"></i>
                            </button>
                        </th>
                        <td>{{ $item->organizacion }}</td>
                        <td>{{ $item->docente }}</td>
                        <td>{{ $item->fenvio }}</td>
                        <td>{{ $item->estado }}</td>
                    </tr>
                @empty
                    <td colspan="5" class="table-light" style="text-align:center;"><i class="bi bi-moon"></i> Vacío</td>
                @endforelse
            </tbody>
        </table>
    </div>
    <div class="modal fade" id="Modal" tabindex="-1" aria-labelledby="ModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
          <div class="modal-content">
            <div class="modal-header">
              <h6 class="modal-title" id="ModalLabel">Nueva Preinscripción</h6>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{route('preinscripcion.store')}}" method="post">
                    @csrf
                    <div class="input-group input-group-sm mb-3">
                        <span class="input-group-text"><i class="bi bi-person-check"></i></span>
                        <!--input name="txtdocente" type="text" class="form-control" placeholder="Docente" required-->
                        <select class="form-control" name="txtdocente" id="txtdocente">
                            @foreach ($docentes as $docente)
                                <option value="{{ $docente->name }}">{{ $docente->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="input-group input-group-sm mb-3">
                        <span class="input-group-text"><i class="bi bi-building"></i></span>
                        <input name="txtorganizacion" type="text" class="form-control" placeholder="Organización" required>
                    </div>
                    <div class="input-group input-group-sm mb-3">
                        <span class="input-group-text"><i class="bi bi-box-seam"></i></span>
                        <input name="txtrubro" type="text" class="form-control" placeholder="Rubro" required>
                    </div>
                    <div class="input-group input-group-sm mb-3">
                        <span class="input-group-text"><i class="bi bi-person-badge"></i></span>
                        <input name="txtsupervisor" type="text" class="form-control" placeholder="Nombre Supervisor" required>
                    </div>
                    <div class="input-group input-group-sm mb-3">
                        <span class="input-group-text"><i class="bi bi-award"></i></span>
                        <input name="txtcargo" type="text" class="form-control" placeholder="Cargo Supervisor" required>
                    </div>
                    <div class="input-group input-group-sm mb-3">
                        <span class="input-group-text"><i class="bi bi-phone"></i></span>
                        <input name="txttelefono" type="number" class="form-control" placeholder="Télefono Supervisor" required>
                    </div>
                    <div class="input-group input-group-sm mb-3">
                        <span class="input-group-text"><i class="bi bi-envelope-open"></i></span>
                        <input name="txtcorreo" type="email" class="form-control" placeholder="Correo Supervisor" required>
                    </div>
                    <div class="input-group input-group-sm mb-3">
                        <span class="input-group-text"><i class="bi bi-calendar-check"></i></span>
                        <input name="txtfinicio" type="date" class="form-control" placeholder="Fecha Inicio" required>
                    </div>
                    <div class="input-group input-group-sm mb-3">
                        <span class="input-group-text"><i class="bi bi-calendar-x"></i></span>
                        <input name="txtftermino" type="date" class="form-control" placeholder="Fecha Termino" required>
                    </div>
                    <div class="input-group input-group-sm mb-3">
                        <span class="input-group-text"><i class="bi bi-clock"></i></span>
                        <input name="txthoras" type="number" class="form-control" placeholder="Horas de Trabajo Semanal" required>
                    </div>
                    <div class="input-group input-group-sm mb-3">
                        <span class="input-group-text"><i class="bi bi-card-text"></i></span>
                        <textarea name="txtdescripcion" class="form-control" placeholder="Descripción de Práctica" required></textarea>
                    </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-outline-secondary btn-sm" data-bs-dismiss="modal"> <i class="bi bi-x-lg"></i> Cancelar</button>
              <button type="submit" class="btn btn-outline-primary btn-sm"> <i class="bi bi-triangle"></i> Enviar</button>
                </form>
            </div>
          </div>
        </div>
    </div>
    @foreach ($preinscripciones as $item)
        <div class="modal fade" id="exampleModalToggle{{ $item->id }}" aria-hidden="true" aria-labelledby="exampleModalToggleLabel{{ $item->id }}" tabindex="-1">
            <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                <h6 class="modal-title" id="exampleModalToggleLabel{{ $item->id }}">Preinscripción {{ $item->estado }}</h6>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    {{-- <p>Docente: {{ $item->docente }}</p>
                    <label><b>Información de la Organización</b></label>
                    <p>Organización: {{ $item->organizacion }} <br> Rubro de la Organización: {{ $item->rubro }} <br> Nombre Supervisor: {{ $item->supervisor }} <br> Cargo Supervisor: {{ $item->cargo }} <br> Teléfono Supervisor: {{ $item->telefono }} <br> Correo Supervisor: {{ $item->email }}</p>
                    <label><b>Información de la Práctica Profesional</b></label>
                    <p>Fecha Inicio: {{ $item->finicio }} <br> Fecha Termino: {{ $item->ftermino }} <br> Horas de Trabajo Semanal: {{ $item->horas }} <br> Descripción de la práctica: {{ $item->descripcion }} <br> Observaciones: {{ $item->observacion }} <br> Estado: {{ $item->estado }}</p> --}}

                    <table class="table table-borderless table-sm">
                        <tr>
                            <td colspan="2" class="table-light"><i class="bi bi-person"></i> Docente</td>
                        </tr>
                        <tr>
                            <td>Nombre</td>
                            <td class="fw-light">{{ $item->docente }}</td>
                        </tr>
                        <tr>
                            <td colspan="2" class="table-light"><i class="bi bi-building"></i> Organización</td>
                        </tr>
                        <tr>
                            <td>Nombre</td>
                            <td class="fw-light">{{ $item->organizacion }}</td>
                        </tr>
                        <tr>
                            <td>Rubro</td>
                            <td class="fw-light">{{ $item->rubro }}</td>
                        </tr>
                        <tr>
                            <td>Supervisor</td>
                            <td class="fw-light">{{ $item->supervisor }}</td>
                        </tr>
                        <tr>
                            <td>Cargo del supervisor</td>
                            <td class="fw-light">{{ $item->cargo }}</td>
                        </tr>
                        <tr>
                            <td>Telefono del supervisor</td>
                            <td class="fw-light">{{ $item->telefono }}</td>
                        </tr>
                        <tr>
                            <td>Correo del supervisor</td>
                            <td class="fw-light">{{ $item->email }}</td>
                        </tr>
                        <tr>
                            <td colspan="2" class="table-light"><i class="bi bi-file-earmark-medical"></i> Práctica Profesional</td>
                        </tr>
                        <tr>
                            <td>Inicio</td>
                            <td class="fw-light">{{ $item->finicio }}</td>
                        </tr>
                        <tr>
                            <td>Fin</td>
                            <td class="fw-light">{{ $item->ftermino }}</td>
                        </tr>
                        <tr>
                            <td>Horas por semana</td>
                            <td class="fw-light">{{ $item->horas }}</td>
                        </tr>
                        <tr>
                            <td>Descripción</td>
                            <td class="fw-light">{{ $item->descripcion }}</td>
                        </tr>
                        <tr>
                            <td>Observación</td>
                            <td class="fw-light">{{ $item->observacion }}</td>
                        </tr>
                        <tr>
                            <td>Estado</td>
                            <td class="fw-light">{{ $item->estado }}</td>
                        </tr>
                    </table>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-outline-secondary btn-sm" data-bs-dismiss="modal"> <i class="bi bi-check-lg"></i> Aceptar</button>
                </div>
            </div>
            </div>
        </div>
    @endforeach
</body>
</html>