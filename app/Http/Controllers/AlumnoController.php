<?php

namespace App\Http\Controllers;

use App\Models\Nivel;
use App\Models\Alumno;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;

class AlumnoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $alumnos = Alumno::all();
        return view('Alumnos.index', ['alumnos' => $alumnos]); //retornamos la vista index.blade.php que esta en la carpeta Alumnos dentro de views
    }
     

    public function pdf(){//Funcion para crear PDFS
        $alumnos = Alumno::all();
        $pdf = Pdf::loadView('Alumnos.pdf',compact('alumnos'));
        return $pdf->stream(); // visualizar en el navegador
     // return $pdf->download('reporte.pdf');//Para descargar sin visualizar
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // return 'Hola soy create';
        // return "Hola soy Yo";
        //$niveles = Nivel::all();// le pedimos que del modelo Nivel me traiga todos los registros para poder mostrarlos en la vista
        return view('Alumnos.create', ['niveles' => Nivel::all()]); // le pasamos a Nivel para ahorrar linea de codigo
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request) //Aqui se recive formulario de Alumnos por el POST DE FORM de la vista create.store: almacenar o guardar registros. Con el el metodo Post de resource del formulario se va a dirigir al metodo store de AlumnoController
    {
        //
        $request->validate([ //Validacion de registros que se van a ingresar

            'matricula' => 'required|unique:alumnos|max:10', //Reglas de validacion -> required(requerido y obligatorio), unique:Alumnos(unico de la tabla alumnos), max:10(De maximo 10 caracteres)
            'nombre' => 'required|max:255', //Reglas de validacion -> required(requerido y obligatorio), max:255 (De maximo 255 caracteres)
            'fecha' => 'required|date', // reglas de validacion  ->   required(requerido y obligatorio), de tipo Date(fecha).
            'telefono' => 'required|',  // Reglas de validacion  -> required(requerido y obligatorio)
            'email' => 'nullable|email', // Reglas de validacion -> nullable(que puede quedar vacio o es un campo null), de tipo email
            'nivel' => 'required'
        ]); //Si estas validaciones(reglas) no se cumplen entonces nos devolvera al formulario

        $alumno = new Alumno(); //Agregamos el registro a los campos de la Base de Datos
        $alumno->matricula = $request->input('matricula');
        $alumno->nombre = $request->input('nombre');
        $alumno->fecha_nacimiento = $request->input('fecha');
        $alumno->telefono = $request->input('telefono');
        $alumno->email = $request->input('email');
        $alumno->nivel_id = $request->input('nivel');
        $alumno->save(); //funcion save(); para guardar el registro

        return view("alumnos.message", ['msg' => "Registro Guardado"]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Alumno $alumno)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id) //recivimos el id del alumno que se va a editar y se muestra un formulario de edicion.
    {
        //
        $alumno = Alumno::find($id); // find($id) es para que busque al alumno por su id
        return view('alumnos.edit', ['alumno' => $alumno, 'niveles' => Nivel::all()]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id) // Aqui se cambian los registros y se guardan los cambios en la base de datos.
    {
        //
        $request->validate([ //Validacion de registros que se van a ingresar

            'matricula' => 'required|max:10|unique:alumnos,matricula,' . $id, //se agrega id para que ignore la validacion y deje actualizar
            'nombre' => 'required|max:255', //Reglas de validacion -> required(requerido y obligatorio), max:255 (De maximo 255 caracteres)
            'fecha' => 'required|date', // reglas de validacion  ->   required(requerido y obligatorio), de tipo Date(fecha).
            'telefono' => 'required|',  // Reglas de validacion  -> required(requerido y obligatorio)
            'email' => 'nullable|email', // Reglas de validacion -> nullable(que puede quedar vacio o es un campo null), de tipo email
            'nivel' => 'required'
        ]); //Si estas validaciones(reglas) no se cumplen entonces nos devolvera al formulario

        $alumno = Alumno::find($id); //Agregamos el registro a los campos de la Base de Datos
        $alumno->matricula = $request->input('matricula');
        $alumno->nombre = $request->input('nombre');
        $alumno->fecha_nacimiento = $request->input('fecha');
        $alumno->telefono = $request->input('telefono');
        $alumno->email = $request->input('email');
        $alumno->nivel_id = $request->input('nivel');
        $alumno->save(); //funcion save(); para guardar el registro

        return view("alumnos.message", ['msg' => "Registro Modificado"]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        //

        $alumno = Alumno::find($id);
        $alumno->delete();

        return redirect("alumnos");
    }
}
