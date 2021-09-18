<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Tesis de {{ auth()->user()->name }}</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-U1DAWAznBHeqEIlVSCgzq+c9gqGAJn5c/t99JyeKa9xxaYpSvHU5awsuZVVFIhvj" crossorigin="anonymous"></script>
</head>
<body>
    @include('partials.nav')
    <div class="container" style="margin-top:50px;text-align:center">
        <br> <h3>Tesis solicitadas</h3> <br>
        <button type="button" class="btn btn-outline-secondary btn-sm">
            <i class="bi bi-filter"></i> Filtrar
        </button> <br> <br>
        <table class="table table-hover align-middle">
            <thead>
                <tr>
                    <th scope="col">Detalles</th>
                    <th scope="col">Alumno</th>
                    <th scope="col">Título de Tesis</th>
                    <th scope="col">Estado</th>
                </tr>
            </thead>
            <tbody>
                    @forelse ($tesis as $item)
                        <tr>
                            <th scope="row">
                                <button class="btn btn-outline-secondary btn-sm" data-bs-target="#exampleModalToggle{{ $item->id }}" data-bs-toggle="modal" data-bs-dismiss="modal">
                                    <i class="bi bi-file-earmark-text"></i>
                                </button>
                            </th>
                            <td>{{ $item->alumno }}</td>
                            <td>{{ $item->titulo }}</td>
                            <td>{{ $item->estado }}</td>
                        </tr>
                    @empty
                        <td colspan="5" class="table-light" style="text-align:center;"><i class="bi bi-moon"></i> Vacío</td>
                    @endforelse
            </tbody>
        </table>
    </div>
    @foreach ($tesis as $item)
        <div class="modal fade" id="exampleModalToggle{{ $item->id }}" aria-hidden="true" aria-labelledby="exampleModalToggleLabel{{ $item->id }}" tabindex="-1">
            <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                <h6 class="modal-title" id="exampleModalToggleLabel{{ $item->id }}">Tesis</h6>
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
                            <td colspan="2" class="table-light"><i class="bi bi-file-earmark"></i> Sumilla de la Tesis</td>
                        </tr>
                        <tr>
                            <td class="fw-light">{{ $item->sumilla }}</td>
                        </tr>

                        <tr>
                            <td colspan="2" class="table-light"><i class="bi bi-file-earmark"></i> Enlace hacia el avance del proyecto</td>
                        </tr>
                        <tr>
                            <td class="fw-light">{{ $item->documentos }}</td>
                        </tr>
                        
                        <tr>
                            <td colspan="2" class="table-light"><i class="bi bi-file-earmark-post"></i> Fecha de Inicio Propuesta</td>
                        </tr>
                        <tr>
                            <td class="fw-light">{{ $item->finicio }}</td>
                        </tr>
                        <tr>
                            <td colspan="2" class="table-light"><i class="bi bi-pencil-square"></i> Observaciones</td>
                        </tr>
                    </table>

                    <form action="{{route('tesis.update', $item->id)}}" method="post">
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
                                
                                    <option value="Asesoría aceptada">Asesoría aceptada</option>
                                    <option value="Revisada" selected>Revisada</option>
                                    <option value="En proceso de revisión" selected>En proceso de revisión</option>
                                    <option value="Lista para sustentación">Lista para sustentación</option>      

                            </select>
                        </div>
                </div>
                <div class="modal-footer">
                        <button type="submit" class="btn btn-outline-success btn-sm"> <i class="bi bi-check-lg"></i> Guardar</button>      
                    </form>
                </div>
            </div>
            </div>
        </div>
    @endforeach
</body>
</html>