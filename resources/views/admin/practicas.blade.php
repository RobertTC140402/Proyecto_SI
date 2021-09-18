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
        <br> <h3>Prácticas Asignadas</h3> <br>
        <button type="button" class="btn btn-outline-secondary btn-sm">
            <i class="bi bi-filter"></i> Filtrar
        </button> <br> <br>
        <table class="table table-hover align-middle">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Alumno</th>
                    <th scope="col">Organización</th>
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
                            <td>{{ $item->preinscripcion->alumno }}</td>
                            <td>{{ $item->preinscripcion->organizacion }}</td>
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
                <h6 class="modal-title" id="exampleModalToggleLabel{{ $item->id }}">Práctica</h6>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    {{-- <label><b>Preinscripción Asociada</b></label>
                    <p>Organización: {{ $item->preinscripcion->organizacion }} <br> Rubro: {{ $item->preinscripcion->rubro }} <br> Fecha de Inicio - Termino: {{ $item->preinscripcion->finicio }} - {{ $item->preinscripcion->ftermino }} <br> Descripción de Práctica: {{ $item->preinscripcion->descripcion }}</p>
                    <label><b>Última Entrega</b></label>
                    <p>Informe: {{ $item->informe }} <br> Comentario: {{ $item->comentario }}</p>
                    <label><b>Corrector</b></label>
                    <p>Corrector: {{ $item->corrector }}</p>
                    <label><b>Evaluación de Práctica</b></label> <br> <br> --}}

                    <table class="table table-borderless table-sm">
                        <tr>
                            <td colspan="2" class="table-light"><i class="bi bi-file-earmark"></i> Preinscripción Asociada</td>
                        </tr>
                        <tr>
                            <td>Organización</td>
                            <td class="fw-light">{{ $item->preinscripcion->organizacion }}</td>
                        </tr>
                        <tr>
                            <td>Rubro de la organización</td>
                            <td class="fw-light">{{ $item->preinscripcion->rubro }}</td>
                        </tr>
                        <tr>
                            <td>Inicio y fin</td>
                            <td class="fw-light">{{ $item->preinscripcion->finicio }} / {{ $item->preinscripcion->ftermino }}</td>
                        </tr>
                        <tr>
                            <td>Descripción</td>
                            <td class="fw-light">{{ $item->preinscripcion->descripcion }}</td>
                        </tr>
                        <tr>
                            <td colspan="2" class="table-light"><i class="bi bi-file-earmark-post"></i> Última Entrega</td>
                        </tr>
                        <tr>
                            <td>Informe</td>
                            <td class="fw-light">{{ $item->informe }}</td>
                        </tr>
                        <tr>
                            <td>Comentario</td>
                            <td class="fw-light">{{ $item->comentario }}</td>
                        </tr>
                        <tr>
                            <td colspan="2" class="table-light"><i class="bi bi-pencil-square"></i> Evaluación de Práctica</td>
                        </tr>
                    </table>

                    <form action="{{route('practica.update', $item->id)}}" method="post">
                        @csrf{{method_field('PUT')}}
                        {{-- <div class="input-group input-group-sm mb-3">
                            <span class="input-group-text"><i class="bi bi-bookmark-star"></i></span>
                            <input name="txtnota" type="number" class="form-control" placeholder="Nota" @if ($item->estado!='Terminado') required @else value="{{ $item->nota }}" disabled @endif>
                        </div> --}}
                        <div class="input-group input-group-sm mb-3">
                            <span class="input-group-text"><i class="bi bi-chat-right-dots"></i></span>
                            <textarea name="txtobservacion" class="form-control" placeholder="Observación" @if ($item->estado=='Aprobada' || $item->estado=='Reprobada') disabled @endif>{{ $item->observacion }}</textarea>
                        </div>
                        <div class="input-group input-group-sm mb-3">
                            <span class="input-group-text"><i class="bi bi-check-square"></i></span>
                            <select class="form-control" name="txtestado" @if ($item->estado=='Aprobada' || $item->estado=='Reprobada') disabled @endif>>
                                
                                @if ($item->estado=='Pendiente Envío' || $item->estado=='Pendiente Corrección')
                                    <option value="Pendiente Envío">Pendiente Envío</option>
                                    <option value="Aprobada" selected>Aprobada</option>
                                    <option value="Reprobada">Reprobada</option>      
                                @else
                                    <option value="0">{{ $item->estado }}</option>
                                @endif
                            </select>
                        </div>
                </div>
                <div class="modal-footer">
                    @if ($item->estado=='Pendiente Envío' || $item->estado=='Pendiente Corrección')
                        <button type="submit" class="btn btn-outline-success btn-sm"> <i class="bi bi-check-lg"></i> Guardar</button>      
                    @else
                        <button type="button" class="btn btn-outline-secondary btn-sm disabled" data-bs-dismiss="modal-x-lg"> <i class="bi bi-info-circle"></i> {{ $item->estado }}</button>
                    @endif
                    </form>
                </div>
            </div>
            </div>
        </div>
    @endforeach
</body>
</html>