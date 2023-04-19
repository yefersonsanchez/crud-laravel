@extends('layout/template')

@section('title', 'Alumno | Escuela')

@section('contenido')

    <main>
        <div class="container py-4">
            <h2> {{ $msg }}</h2><!-- recivimos la varible msg -->

            <a href="{{  url('alumnos')  }}" class= "btn btn-secondary">Regresar</a> <!-- link para regresar a vista alumnos -->
        </div>
    </main>