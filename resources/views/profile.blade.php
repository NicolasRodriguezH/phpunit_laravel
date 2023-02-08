<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>

    @if ( $errors->any() )
        @foreach ($errors->all() as $error)
            <li> {{ $error }} </li>
        @endforeach
    @endif

    {{-- enctype - atributo adicional de encriptacion para enviar archivos al server --}}
    <form action="profile" method="POST" enctype="multipart/form-data">
        @csrf
        {{-- Input que relacion el nombre del file con el metodo request del controller --}}
        <input type="file" name="photo">

        {{-- Input para el boton enviar --}}
        <input type="submit" value="Enviar">
    </form>
    
</body>
</html>