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
        <br> <h3>Tesis</h3> <br>
        <button type="button" class="btn btn-outline-secondary btn-sm" data-bs-toggle="modal" data-bs-target="#Modal" @if(count($tesis)>0) disabled @endif>
            <i class="bi bi-plus"></i> Nueva Tesis
        </button> <br>
        <table class="table table-hover align-middle">
            <thead>
                <tr>
                    <th scope="col"> # </th>
                    <th scope="col">Tesis </th>
                    <th scope="col">Jurado</th>
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
                            <td>{{ $item->titulo }}</td>
                            <td>{{ $item->jurado}}</td>
                            <td>{{ $item->estado }}</td>
                        </tr>
                    @empty
                        <td colspan="5" class="table-light" style="text-align:center;"><i class="bi bi-moon"></i> Vacío</td>
                    @endforelse
            </tbody>
        </table>

        <section class="content">

            <!-- Default box -->
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Progreso de la Tesis</h3><br>
                <div class="progress">
                    <div class="progress-bar bg-primary progress-bar-striped" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width: 40%">
                      <span class="sr-only">40%</span>
                    </div>
                  </div>
                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                    <i class="fas fa-minus"></i>
                  </button>
                  <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
                    <i class="fas fa-times"></i>
                  </button>
                </div>
              </div>
              <div class="card-body" style="display: block;">
                <div class="row">
                  <div class="col-12 col-md-12 order-2 order-md-1">
                    <div class="row">
                      <div class="col-12 col-sm-4">
                        <div class="info-box bg-light">
                          <div class="info-box-content">
                            <span class="info-box-text text-center text-muted">Horas dedicadas esta semana:</span>
                            <span class="info-box-number text-center text-muted mb-0">10h</span>
                          </div>
                        </div>
                      </div>
                      <div class="col-12 col-sm-4">
                        <div class="info-box bg-light">
                          <div class="info-box-content">
                            <span class="info-box-text text-center text-muted">Documentos revisados:</span>
                            <span class="info-box-number text-center text-muted mb-0">3</span>
                          </div>
                        </div>
                      </div>
                      <div class="col-12 col-sm-4">
                        <div class="info-box bg-light">
                          <div class="info-box-content">
                            <span class="info-box-text text-center text-muted">Duración total del proyecto de tesis: </span>
                            <span class="info-box-number text-center text-muted mb-0">5 m</span>
                          </div>
                        </div>
                      </div><br><br>

                      <div class="col-12">
                        <div class="card card-primary card-tabs">
                          <div class="card-header p-0 pt-1">
                            <ul class="nav nav-tabs" id="custom-tabs-one-tab" role="tablist">
                              <li class="nav-item">
                                <a class="nav-link active" id="custom-tabs-one-home-tab" data-toggle="pill" href="#custom-tabs-one-home" role="tab" aria-controls="custom-tabs-one-home" aria-selected="true">Observaciones</a>
                              </li>
                              <li class="nav-item">
                                <a class="nav-link" id="custom-tabs-one-profile-tab" data-toggle="pill" href="#custom-tabs-one-profile" role="tab" aria-controls="custom-tabs-one-profile" aria-selected="false">Mis notas</a>
                              </li>
                              <li class="nav-item">
                                <a class="nav-link" id="custom-tabs-one-messages-tab" data-toggle="pill" href="#custom-tabs-one-messages" role="tab" aria-controls="custom-tabs-one-messages" aria-selected="false">Información Personal</a>
                              </li>
                              <li class="nav-item">
                                <a class="nav-link" id="custom-tabs-one-settings-tab" data-toggle="pill" href="#custom-tabs-one-settings" role="tab" aria-controls="custom-tabs-one-settings" aria-selected="false">Repositorio</a>
                              </li>
                            </ul>
                          </div>
                          <div class="card-body">
                            <div class="tab-content" id="custom-tabs-one-tabContent">
                              <div class="tab-pane fade show active" id="custom-tabs-one-home" role="tabpanel" aria-labelledby="custom-tabs-one-home-tab">

                                Lorem ipsum dolor sit amet consectetur adipisicing elit. Iste nostrum ullam corporis. Rem dolore nobis, optio assumenda reiciendis quibusdam praesentium dicta, laudantium nesciunt blanditiis repellat maiores consequuntur non fugit aut.
                                 
                              </div>
                            </div>
                          </div>
                          <!-- /.card -->
                        </div>
                      </div>
                      
                    </div>
                  </div>
                </div>
              </div>
            </div><br>
            <div class="card">
                <div class="card-header">
                  <h3 class="card-title">Pendientes para la semana</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                  <table class="table table-bordered">
                    <thead>
                      <tr>
                        <th style="width: 10px">#</th>
                        <th>Tarea</th>
                        <th>Progreso</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <td>1.</td>
                        <td>Actualizar índice</td>
                        <td>
                          <div class="progress progress-xs">
                            <div class="progress-bar progress-bar-danger" style="width: 55%"></div>
                          </div>
                        </td>
                      </tr>
                      <tr>
                        <td>2.</td>
                        <td>Revisar formato APA página 54</td>
                        <td>
                          <div class="progress progress-xs">
                            <div class="progress-bar bg-warning" style="width: 70%"></div>
                          </div>
                        </td>
                      </tr>
                      <tr>
                        <td>3.</td>
                        <td>Poner más anexos</td>
                        <td>
                          <div class="progress progress-xs progress-striped active">
                            <div class="progress-bar bg-primary" style="width: 30%"></div>
                          </div>
                        </td>
                      </tr>
                      <tr>
                        <td>4.</td>
                        <td>Terminar el marco teórico</td>
                        <td>
                          <div class="progress progress-xs progress-striped active">
                            <div class="progress-bar bg-success" style="width: 90%"></div>
                          </div>
                        </td>
                      </tr>
                    </tbody>
                  </table>
                </div>
                <!-- /.card-body -->
                <div class="card-footer clearfix">
                  <ul class="pagination pagination-sm m-0 float-right">
                    <li class="page-item"><a class="page-link" href="#">«</a></li>
                    <li class="page-item"><a class="page-link" href="#">1</a></li>
                    <li class="page-item"><a class="page-link" href="#">2</a></li>
                    <li class="page-item"><a class="page-link" href="#">3</a></li>
                    <li class="page-item"><a class="page-link" href="#">»</a></li>
                  </ul>
                </div>
              </div>
      
          </section>

    </div>

    <div class="modal fade" id="Modal" tabindex="-1" aria-labelledby="ModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
          <div class="modal-content">
            <div class="modal-header">
              <h6 class="modal-title" id="ModalLabel">Nueva Tesis</h6>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{route('tesis.store')}}" method="post">
                    @csrf

                    <div class="input-group input-group-sm mb-3">
                        <span class="input-group-text"><i class="bi bi-person-check"></i>‎   Asesor</span>
                        <!--input name="txtdocente" type="text" class="form-control" placeholder="Docente" required-->
                        <select class="form-control" name="txtDocente_Asesor" id="txtDocente_Asesor">
                            @foreach ($docentes as $docente)
                                <option value="{{ $docente->name }}">{{ $docente->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="input-group input-group-sm mb-3">
                        <span class="input-group-text"><i class="bi bi-building"></i></span>
                        <input name="txtTitulo" type="text" class="form-control" placeholder="Título de Tesis" required>
                    </div>

                    <div class="input-group input-group-sm mb-3">
                        <span class="input-group-text"><i class="bi bi-award"></i></span>
                        <input name="txtCarpeta" type="text" class="form-control" placeholder="Link de carpeta institucional" required>
                    </div>

                    <div class="input-group input-group-sm mb-3">
                        <span class="input-group-text"><i class="bi bi-phone"></i></span>
                        <input name="txtTelefono" type="number" class="form-control" placeholder="Teléfono de contacto" required>
                    </div>

                    <div class="input-group input-group-sm mb-3">
                        <span class="input-group-text"><i class="bi bi-calendar-check"></i>       Fecha de Inicio</span>
                        <input name="txtFInicio" type="date" class="form-control" placeholder="Fecha de Inicio" required>
                    </div>
                    
                    <div class="input-group input-group-sm mb-3">
                        <span class="input-group-text"><i class="bi bi-card-text"></i></span>
                        <textarea name="txtSumilla" class="form-control" placeholder="Sumilla del trabajo" required></textarea>
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

    @foreach ($tesis as $item)
        <div class="modal fade" id="exampleModalToggle{{ $item->id }}" aria-hidden="true" aria-labelledby="exampleModalToggleLabel{{ $item->id }}" tabindex="-1">
            <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                <h6 class="modal-title" id="exampleModalToggleLabel{{ $item->id }}">Información de la Tesis</h6>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    {{-- <label><b>Evaluación</b></label>
                    <p>Nota: {{ $item->nota }} <br> Observación: {{ $item->observacion }}</p>
                    <label><b>Entrega de Documentos</b></label> <br> <br> --}}

                    <table class="table table-borderless table-sm">
                        <tr>
                            <td colspan="2" class="table-light"><i class="bi bi-pencil-square"></i> Evaluación de Tesis</td>
                        </tr>
                        <tr>
                            <td>Título</td>
                            <td class="fw-light">{{ $item->titulo }}</td>
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
                    
                    <div class="input-group input-group-sm mb-3">
                        <span class="input-group-text"><i class="bi bi-card-text"></i></span>
                        <textarea name="txtComentario" class="form-control" placeholder="Comentario de la tesis" ></textarea>
                    </div>

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