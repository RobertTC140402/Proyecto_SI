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
            <div class="col-auto p-5" style="text-align:center; font-family:'Times New Roman'">
                @auth
                <label style="font-size: 18px;">{{ auth()->user()->name }} <br> ({{ auth()->user()->role }})</label> <br> <br>
                @endauth
                <i class="bi-x-diamond" style="font-size: 18px;"></i> <br>
                <label style="font-size: 12px;">e u r u a &nbsp p r o j e c t &nbsp ( c o l e g u i t a s &nbsp t e a m )</label>
                <!--p>(Como Administrador) Correo: admin@test.com. Contraseña: admin. <br> (Como Usuario) Correo: user@test.com. Contraseña: user.</p-->
            </div>  
        </div>
    </div>
</body>
</html>
