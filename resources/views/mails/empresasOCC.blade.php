<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title> {{ $asunto }} </title>
</head>

<body>
    <ul>
        <li>Nombre de la Empresa: {{ $datos['empresa'] }} </li>
        <li>Nombre del Contacto: {{ $datos['contacto'] }} </li>
        <li>E-mail: {{ $datos['email'] }} </li>
        <li>Teléfono:
            <ul>
                <li>Número: {{ $datos['telefono'] }} </li>
                <li>Celular: {{ $datos['celular'] }} </li>
            </ul>
        </li>
        <li>Razon Social: {{ $datos['razon'] }} </li>
        <li>RFC: {{ $datos['rfc'] }} </li>
        <li>Comentarios: {{ $datos['comentarios'] }} </li>
    </ul>
</body>

</html>
