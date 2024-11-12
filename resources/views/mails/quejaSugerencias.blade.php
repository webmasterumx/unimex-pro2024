<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Quejas y Sugerencias Metropolitano</title>
</head>

<body>
    <img src="https://unimex.edu.mx/img/header/logo-2020.jpg" style="width:30%;" /><br>
    <ul>
        <li>Nombre Completo: {{ $datos['nombre'] }} </li>
        <li>E-mail: {{ $datos['mail'] }} </li>
        <li>Teléfono:
            <ul>
                <li>Número: {{ $datos['telefono_casa'] }} </li>
                <li>Celular: {{ $datos['telefono_celular'] }} </li>
            </ul>
        </li>
        <li>Matrícula: {{ $datos['matricula'] }} </li>
        <li>Asunto: {{ $datos['asunto'] }} </li>
        <li>Comentarios: {{ $datos['mensaje'] }} </li>
    </ul>
</body>

</html>
