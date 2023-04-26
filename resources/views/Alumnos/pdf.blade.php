<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <style>
        .cabecera {
            background-color: black;
            color: white;
        }

        h1 {
            color: brown;
        }
    </style>
</head>

<body>
    <img src="assets/Firma.png" alt="" width="100px" height="50px">
    <!-- Imagen del LOGO esta en: C:\xampp\htdocs\crud-laravel\public\assets-->
    <h1 class="text-center">ALUMNOS</h1><br>
    <table class="table" style="text-align:center">

        <thead class="cabecera">
            <tr>
                <!--   <th>#</th>  -->
                <th>Matricula</th>
                <th>Nombre</th>
                <th>Fecha_nacimiento</th>
                <th>Telefono</th>
                <th>Email</th>
                <th>Nivel</th>
            </tr>

        </thead>

        <tbody>
            @foreach ($alumnos as $alumno)
                <tr>

                    <td> {{ $alumno->matricula }}</td>
                    <td> {{ $alumno->nombre }}</td>
                    <td> {{ $alumno->fecha_nacimiento }}</td>
                    <td> {{ $alumno->telefono }}</td>
                    <td> {{ $alumno->email }}</td>
                    <td> {{ $alumno->nivel->nombre }}</td>
                    <!-- Aqui se muestra el campo nombre de la tabla nivel, Se hizo un inerjoin-->
                </tr>
            @endforeach
        </tbody>

    </table>






</body>

</html>
