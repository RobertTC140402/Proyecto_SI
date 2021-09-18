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
    <div class="main">
        <div class="container justify-content-center align-items-center">
            <div class="col-auto p-5" style="text-align:center; font-family:'Times New Roman'">
            </div> 
        </div>
    </div>
    <div class="footer" style="text-align:center; font-family:'Times New Roman';">
        <i class="bi-x-diamond" style="font-size: 18px; color:white"></i> <br>
        <label style="font-size: 14px; color: white">e u r u a &nbsp p r o j e c t &nbsp ( c o l e g u i t a s &nbsp t e a m )</label>
        <!--p>(Como Administrador) Correo: admin@test.com. Contraseña: admin. <br> (Como Usuario) Correo: user@test.com. Contraseña: user.</p-->
    </div> 
</body>
</html>

<style>
    .main{
        background-image: url(img/Portada_UNT.jpg);
        background-repeat: no-repeat;
        background-size: cover;
        height: 92vh;
        width: 100vw;
    }
    .footer{
        height: 8vh;
        background-color: #003E80;
        vertical-align: bottom;
    }
</style>