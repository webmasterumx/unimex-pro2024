<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Trabaja en UNIMEX Metro</title>
</head>

<body>
    <img src="https://unimex.edu.mx/img/header/logo-2020.jpg" style="width:30%;" /><br>
    <ul>
        <li>Nombre del candidato: {{ $datos['nombre'] }} </li>
        <li>E-mail: {{ $datos['mail'] }} </li>
        <li>Teléfono Fijo: {{ $datos['telefono_casa'] }} </li>
        <li>Teléfono Celular: {{ $datos['telefono_celular'] }} </li>
        <li>Plantel que le interesa:  {{ $datos['plantel'] }} </li>
        <li>Último nivel de estudios: {{ $datos['nivel_estudios'] }} </li>
        <li>Puesto de interes: {{ $datos['puesto_interes'] }} </li>
        <li>Experiencia: {{ $datos['experiencia_laboral'] }} </li>
    </ul>
</body>

</html>
