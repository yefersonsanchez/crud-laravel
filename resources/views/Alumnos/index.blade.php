@extends('layout/template')

@section('title', 'Alumno | Escuela')

@section('contenido')

    <main>
        <div class="container py-4">
            <h2>Listado de Alumnos</h2>
            <a href="{{ url('alumnos/create') }}" class="btn btn-primary btn"> Nuevo registro <a>
                    <!-- Esto es un boton y como url le pasamos la ruta del metodo-->

                    <table class="table table-hober">

                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Matricula</th>
                                <th>Nombre</th>
                                <th>Fecha de nacimiento</th>
                                <th>Telefono</th>
                                <th>Email</th>
                                <th>Nivel</th>
                                <th></th>
                                <th></th>
                            </tr>

                        </thead>

                        <tbody>
                            @foreach ($alumnos as $alumno)
                                <tr>
                                    <td> {{ $alumno->id }}</td>
                                    <td> {{ $alumno->matricula }}</td>
                                    <td> {{ $alumno->nombre }}</td>
                                    <td> {{ $alumno->fecha_nacimiento }}</td>
                                    <td> {{ $alumno->telefono }}</td>
                                    <td> {{ $alumno->email }}</td>
                                    <td> {{ $alumno->nivel->nombre }}</td><!-- Aqui se muestra el campo nombre de la tabla nivel, Se hizo un inerjoin--> 
                                    <td> <a href="{{url('alumnos/'.$alumno->id.'/edit')}}" class="btn btn-warning btn-sm">Editar</a></td>
                                    <td>

                                        <form action="{{ url('alumnos/'.$alumno->id) }}" method="post">
                                        @method('DELETE')
                                        @csrf

                                        <button type="submit"   class="btn btn-danger btn-sm">Eliminar</button>
                                        
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>


                    </table>

        </div>

    </main>
