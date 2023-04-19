@extends('layout/template')

@section('title', 'Registrar Alumno | Escuela')

@section('contenido')

    <main>
        <div class="container py-4">
            <h2>Registrar Alumno</h2>

            @if ($errors->any())
                <!-- aqui se visualizan los errores de validacion del formulario -->
                <div class="alert alert-warning alert-dismissible fade show" role="alert">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <!-- se muestran todos los errores con un foreach-->
                            <li>{{ $error }}</li><!--  Lista de errores -->
                        @endforeach
                    </ul>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif


            <form action="{{ url('alumnos') }}" method="POST">

                @csrf
                <!-- Nos va a generar un elemento oculto, y se genera un Token que solo va a ser conocido por nuestra aplicacion para evitar ataques y que otras paginas agreguen usuarios o envien peticiones POST-->


                <div class="mb-3 row">
                    <label for="matricula" class="col-sm-2 col-form-label">Matricula:</label>

                    <div class="col-sm-5">

                        <input type="text" class="form-control" name="matricula" id="matricula"
                            value="{{ old('matricula') }}" required> <!-- Se quito required-->
                    </div>

                </div>
                <div class="mb-3 row">
                    <label for="nombre" class="col-sm-2 col-form-label">Nombre Completo:</label>

                    <div class="col-sm-5">

                        <input type="text" class="form-control" name="nombre" id="nombre" value="{{ old('nombre') }}"
                            required>
                    </div>

                </div>

                <div class="mb-3 row">
                    <label for="fecha" class="col-sm-2 col-form-label">Fecha de nacimiento:</label>

                    <div class="col-sm-5">

                        <input type="date" class="form-control" name="fecha" id="fecha" value="{{ old('fecha') }}"
                            required>
                    </div>

                </div>


                <div class="mb-3 row">
                    <label for="telefono" class="col-sm-2 col-form-label">Telefono:</label>

                    <div class="col-sm-5">

                        <input type="text" class="form-control" name="telefono" id="telefono"
                            value="{{ old('telefono') }}" required>
                    </div>
                </div>



                <div class="mb-3 row">
                    <label for="email" class="col-sm-2 col-form-label">Email:</label>

                    <div class="col-sm-5">

                        <input type="text" class="form-control" name="email" id="email"
                            value="{{ old('email') }}">
                    </div>
                </div>


                <div class="mb-3 row">
                    <label for="nivel" class="col-sm-2 col-form-label">Nivel:</label>

                    <div class="col-sm-5">

                        <select name="nivel" id="nivel" class="form-select" required>
                            <option value="">Seleccionar nivel</option>
                            @foreach ($niveles as $nivel)
                                <option value="{{ $nivel->id }}">{{ $nivel->nombre }}</option>
                            @endforeach
                        </select>
                    </div>

                </div>



                <a href="{{ url('alumnos') }}" class="btn btn-secondary">Regresar</a>
                <button type="submit" class="btn btn-success">Guardar</button>




            </form>
        </div>
    </main>
