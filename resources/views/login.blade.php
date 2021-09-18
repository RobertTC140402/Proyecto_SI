<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Sistema de Prácticas</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
</head>
<body style="background-color:#F8F9FA;"> 
    @include('partials.nav')
    <div class="container">
        <div class="row vh-100 justify-content-center align-items-center">
            <div class="col-auto p-5" style="text-align:center">
                <h1><i class="bi bi-door-open"></i></label></h1>
                @if($errors->any())
                    <br>
                    @foreach ($errors->all() as $error)
                    <div class="alert alert-danger" role="alert" style="font-size:10px">
                        <i class="bi bi-x-circle"></i> {{ $error }}
                    </div> 
                    @endforeach
                @else
                <br>
                @endif
                <form method="POST">
                    @csrf
                    <div class="form-element input-group mb-3">
                        <span class="input-group-text"><i class="bi bi-at"></i></span>
                        <input class="form-control" type="email" name="email" value="{{ old('email') }}" placeholder="Correo" autofocus required>
                    </div>
                    <div class="form-element input-group mb-3">
                        <span class="input-group-text"><i class="bi bi-key"></i></span>
                        <input class="form-control" type="password" name="password" placeholder="Contraseña" required>
                    </div>
                    <button class="btn btn-outline-secondary" type="submit" style="width: 100%;">Acceder</button>
                </form>
            </div>  
        </div>
    </div>
</body>
</html>