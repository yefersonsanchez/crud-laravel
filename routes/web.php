<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AlumnoController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
Route::get('/alumnos/pdf', [AlumnoController::class,'pdf']);// Ruta para crear PDFS
Route::get('/', function () {
    return view('welcome');
});

Route::resource('/alumnos', AlumnoController::class); //resource nos va a generar las rutas para el create, el guardado, el editar, el actualizar y el eliminar asi como el index que es para mostrar la tabla.



//Route::get('/alumnos', [AlumnoController::class, 'index']);
//Route::get('/alumnos/create',[AlumnoController::class,'create']);
//Route::get('/alumnos/store',[AlumnoController::class,'store']);
//Route::get('/alumnos/show',[AlumnoController::class,'show']);
//Route::get('/alumnos/edit',[AlumnoController::class,'edit']);
//Route::get('/alumnos/update',[AlumnoController::class,'update']);
//Route::get('/alumnos/destroy',[AlumnoController::class,'destroy']);


