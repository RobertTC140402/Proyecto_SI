<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Practicas de {{ auth()->user()->name }}</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-U1DAWAznBHeqEIlVSCgzq+c9gqGAJn5c/t99JyeKa9xxaYpSvHU5awsuZVVFIhvj" crossorigin="anonymous"></script>
</head>
<body>
    @include('partials.nav')
    <div class="container" style="margin-top:50px;text-align:center">
        <br> <h3>Practicas</h3> <br>
        <button type="button" class="btn btn-outline-secondary btn-sm">
            <i class="bi bi-filter"></i> Filtrar
        </button> <br> <br>
        <table class="table table-hover align-middle">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Organización</th>
                    <th scope="col">Docente</th>
                    <th scope="col">Estado</th>
                    
                </tr>
            </thead>
            <tbody>
                    @forelse ($practicas as $item)
                        <tr>
                            <th scope="row">
                                <button class="btn btn-outline-secondary btn-sm" data-bs-target="#exampleModalToggle{{ $item->id }}" data-bs-toggle="modal" data-bs-dismiss="modal">
                                    <i class="bi bi-file-earmark-text"></i>
                                </button>
                            </th>
                            <td>{{ $item->preinscripcion->organizacion }}</td>
                            <td>{{ $item->preinscripcion->docente }}</td>
                            <td>{{ $item->estado }}</td>
                        </tr>
                    @empty
                        <td colspan="5" class="table-light" style="text-align:center;"><i class="bi bi-moon"></i> Vacío</td>
                    @endforelse
            </tbody>
        </table>
    </div>
    @foreach ($practicas as $item)
        <div class="modal fade" id="exampleModalToggle{{ $item->id }}" aria-hidden="true" aria-labelledby="exampleModalToggleLabel{{ $item->id }}" tabindex="-1">
            <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                <h6 class="modal-title" id="exampleModalToggleLabel{{ $item->id }}">Información de la Práctica</h6>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    {{-- <label><b>Evaluación</b></label>
                    <p>Nota: {{ $item->nota }} <br> Observación: {{ $item->observacion }}</p>
                    <label><b>Entrega de Documentos</b></label> <br> <br> --}}

                    <table class="table table-borderless table-sm">
                        <tr>
                            <td colspan="2" class="table-light"><i class="bi bi-pencil-square"></i> Evaluación de Práctica</td>
                        </tr>
                        <tr>
                            <td>Calificación</td>
                            <td class="fw-light">{{ $item->estado }}</td>
                        </tr>
                        <tr>
                            <td>Observación</td>
                            <td class="fw-light">{{ $item->observacion }}</td>
                        </tr>
                        <tr>
                            <td colspan="2" class="table-light"><i class="bi bi-file-earmark-post"></i> Entrega de Documentos</td>
                        </tr>
                    </table>

                    <form action="{{route('practica.updateu', $item->id)}}" method="post">
                        @csrf{{method_field('PUT')}}
                        <div class="input-group input-group-sm mb-3">
                            <span class="input-group-text"><i class="bi bi-file-text"></i></span>
                            <input name="txtinforme" type="url" class="form-control" placeholder="Informe (Liga)" @if ($item->estado=='Pendiente Envío') required @else value="{{ $item->informe }}" disabled @endif>
                        </div>
                        <div class="input-group input-group-sm mb-3">
                            <span class="input-group-text"><i class="bi bi-chat-right-dots"></i></span>
                            <textarea name="txtcomentario" class="form-control" placeholder="Comentario" @if ($item->estado!='Pendiente Envío') disabled @endif>@if ($item->estado!='Pendiente Envío') {{ $item->comentario }} @endif</textarea>
                        </div>
                </div>
                <div class="modal-footer">
                        @if ($item->estado=='Reprobada' || $item->estado=='Pendiente Corrección')
                            <button type="button" class="btn btn-outline-secondary btn-sm disabled" data-bs-dismiss="modal-x-lg"> <i class="bi bi-info-circle"></i> {{ $item->estado }}</button>
                        @elseif ($item->estado=='Aprobada')
                            <a class="btn btn-outline-primary btn-sm" href='{{ route('topdf', $item->id) }}'> <i class="bi bi-file-pdf"></i> Abrir Resolución </a>
                        @else
                            <button type="submit" class="btn btn-outline-success btn-sm"> <i class="bi bi-check-lg"></i> Guardar</button>
                        @endif
                    </form>
                </div>
            </div>
            </div>
        </div>
    @endforeach
</body>
</body>
</html>