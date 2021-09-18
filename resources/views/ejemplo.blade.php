<!doctype html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Resolución</title>
</head>
<body>
<h1>Certificado de Prácticas Preprofesionales</h1>
<p>El que suscribe, {{ $item->preinscripcion->supervisor }}, {{ $item->preinscripcion->cargo }} de {{ $item->preinscripcion->organizacion }}.</p>
<p><b>CERTIFICA:</b></p>
<p>Que, el alumno {{ $item->preinscripcion->alumno }}, estudiantes de la Facultad de Ingeniería de la Universidad Nacional de Trujillo, ha realizado sus practicas preprofesionales con mi persona, desde el {{ $item->preinscripcion->finicio }} hasta el {{ $item->preinscripcion->ftermino }}, en el proyecto {{ $item->preinscripcion->descripcion }}, a cargo de {{ $item->preinscripcion->supervisor }}.</p>
<p>Durante su permanencia en nuestra empresa, el estudiante practicante ha demostrado capacidad, puntualidad, responsabilidad y colaboración en el desempeño de sus funciones.</p>
<p>Se expide el presente certificado a solicitud del interesado para los fines que estime conveniente.</p>
<p>Atentamente,</p>
<br>
<br>
<br>
<br>
<p>Firma: <br>{{$item->preinscripcion->docente}}</p>
</body>
</html>