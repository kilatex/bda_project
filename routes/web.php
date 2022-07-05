<?php

use App\Http\Controllers\Recopasec\DireccionController;
use App\Http\Controllers\Recopasec\EmpresaController;
use App\Http\Controllers\Recopasec\ProyectoPController;
use App\Http\Controllers\Recopasec\ProyectoSController;
use App\Http\Controllers\Recopasec\TutorCController;
use App\Http\Controllers\Recopasec\TutorController;
use App\Http\Controllers\Recopasec\TutorIController;
use Illuminate\Support\Facades\Route;
use PHPUnit\TextUI\XmlConfiguration\CodeCoverage\Filter\DirectoryCollectionIterator;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

// HOMECONTROLLER ROUTES
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// DocumentController ROUTES
Route::get('/upload', [App\Http\Controllers\DocumentController::class, 'upload'])->name('upload');
Route::post('/subir', [App\Http\Controllers\DocumentController::class, 'subir'])->name('subir');
Route::get('/my-docs', [App\Http\Controllers\DocumentController::class, 'my_docs'])->name('my_docs');
Route::get('/doc/{filename}', [App\Http\Controllers\DocumentController::class, 'getDoc'])->name('getDoc');
Route::get('/modify', [App\Http\Controllers\DocumentController::class, 'modify'])->name('modify');
Route::post('/update_docs', [App\Http\Controllers\DocumentController::class, 'update_docs'])->name('update_docs');

// UserController ROUTES
Route::get('/profile/{id?}', [App\Http\Controllers\StudentController::class, 'profile'])->name('profile');
Route::post('/update_profile', [App\Http\Controllers\StudentController::class, 'update_profile'])->name('update_profile');
Route::get('/edit-profile', [App\Http\Controllers\StudentController::class, 'edit_profile'])->name('edit_profile');
Route::get('/img-profile/{filename}', [App\Http\Controllers\StudentController::class, 'img_profile'])->name('img_profile');
Route::get('/notification', [App\Http\Controllers\StudentController::class, 'notification'])->name('notification');
Route::get('/estudiantes', [App\Http\Controllers\StudentController::class, 'students_list'])->name('students_list');

// AdminController ROUTES
Route::get('/create-admin/{code?}', [App\Http\Controllers\UserController::class, 'create_admin'])->name('create_admin');
Route::get('/user-list', [App\Http\Controllers\UserController::class, 'users_list'])->name('users_list');
Route::get('/estudiantes-por-carrera', [App\Http\Controllers\UserController::class, 'category_users'])->name('category_users');
Route::get('/users-by-field', [App\Http\Controllers\UserController::class, 'users_by_field'])->name('users_by_field');
Route::get('/user-search/{texto?}', [App\Http\Controllers\UserController::class, 'search'])->name('search');
Route::get('/expedientes', [App\Http\Controllers\UserController::class, 'expedientes'])->name('expedientes');
Route::get('/estudiantes/{carrera?}', [App\Http\Controllers\UserController::class, 'students_by_carreer'])->name('students_by_carreer');


Route::post('/register-admin', [App\Http\Controllers\AdminController::class, 'register_admin'])->name('register_admin');
Route::get('/user/{id}', [App\Http\Controllers\AdminController::class, 'user_docs'])->name('user_docs');
Route::get('/docs/pass/{docs_id}', [App\Http\Controllers\AdminController::class, 'pass_docs'])->name('pass_docs');
Route::post('/message', [App\Http\Controllers\AdminController::class, 'send_message'])->name('send_message');

//RECOPASEC
    //Rutas del Tutor_comunitario
        Route::get('tutorcoms', [TutorCController::class, 'index'])->name('tutorcoms.index');
        Route::get('tutorcoms/create', [TutorCController::class, 'create'])->name('tutorcoms.create');
        Route::post('tutorcoms', [TutorCController::class, 'store'])->name('tutorcoms.store');
        Route::get('tutorcoms/{tutorcom}', [TutorCController::class, 'show'])->name('tutorcoms.show');
        Route::get('tutorcoms/{tutorcom}/edit', [TutorCController::class, 'edit'])->name('tutorcoms.edit');
        Route::put('tutorcoms/{tutorcom}', [TutorCController::class, 'update'])->name('tutorcoms.update');
        Route::delete('tutorcoms/{tutorcom}', [TutorCController::class, 'destroy'])->name('tutorcoms.destroy');
    //Rutas del Tutor_academico
        Route::get('tutors', [TutorController::class, 'index'])->name('tutors.index');
        Route::get('tutors/create', [TutorController::class, 'create'])->name('tutors.create');
        Route::post('tutors', [TutorController::class, 'store'])->name('tutors.store');
        Route::get('tutors/{tutor}', [TutorController::class, 'show'])->name('tutors.show');
        Route::get('tutors/{tutor}/edit', [TutorController::class, 'edit'])->name('tutors.edit');
        Route::put('tutors/{tutor}', [TutorController::class, 'update'])->name('tutors.update');
        Route::delete('tutors/{tutor}', [TutorController::class, 'destroy'])->name('tutors.destroy');
    //Rutas del Tutor_academico
        Route::get('tutoris', [TutorIController::class, 'index'])->name('tutoris.index');
        Route::get('tutoris/create', [TutorIController::class, 'create'])->name('tutoris.create');
        Route::post('tutoris', [TutorIController::class, 'store'])->name('tutoris.store');
        Route::get('tutoris/{tutori}', [TutorIController::class, 'show'])->name('tutoris.show');
        Route::get('tutoris/{tutori}/edit', [TutorIController::class, 'edit'])->name('tutoris.edit');
        Route::put('tutoris/{tutori}', [TutorIController::class, 'update'])->name('tutoris.update');
        Route::delete('tutoris/{tutori}', [TutorIController::class, 'destroy'])->name('tutoris.destroy');
    //Rutas para el proyecto de pasantias
        Route::get('pasantias', [ProyectoPController::class, 'index'])->name('pasantias.index');
        Route::get('pasantias/create', [ProyectoPController::class, 'create'])->name('pasantias.create');
        Route::post('pasantias', [ProyectoPController::class, 'store'])->name('pasantias.store');
        Route::get('pasantias/{pasantia}', [ProyectoPController::class, 'show'])->name('pasantias.show');
        Route::get('pasantias/{pasantia}/edit', [ProyectoPController::class, 'edit'])->name('pasantias.edit');
        Route::put('pasantias/{pasantia}', [ProyectoPController::class, 'update'])->name('pasantias.update');
        Route::delete('pasantias/{pasantia}', [ProyectoPController::class, 'destroy'])->name('pasantias.destroy');
    //Rutas para el proyecto comunitario
        Route::get('comunitarios', [ProyectoSController::class, 'index'])->name('comunitarios.index');
        Route::get('comunitarios/create', [ProyectoSController::class, 'create'])->name('comunitarios.create');
        Route::post('comunitarios', [ProyectoSController::class, 'store'])->name('comunitarios.store');
        Route::get('comunitarios/{pasantia}', [ProyectoSController::class, 'show'])->name('comunitarios.show');
        Route::get('comunitarios/{pasantia}/edit', [ProyectoSController::class, 'edit'])->name('comunitarios.edit');
        Route::put('comunitarios/{pasantia}', [ProyectoSController::class, 'update'])->name('comunitarios.update');
        Route::delete('comunitarios/{pasantia}', [ProyectoSController::class, 'destroy'])->name('comunitarios.destroy');
    //Rutas para las empresas de pasantias
        Route::get('empresas', [EmpresaController::class, 'index'])->name('empresas.index');
        Route::get('empresas/create', [EmpresaController::class, 'create'])->name('empresas.create');
        Route::post('empresas', [EmpresaController::class, 'store'])->name('empresas.store');
        Route::get('empresas/{empresa}', [EmpresaController::class, 'show'])->name('empresas.show');
        Route::get('empresas/{empresa}/edit', [EmpresaController::class, 'edit'])->name('empresas.edit');
        Route::put('empresas/{empresa}', [EmpresaController::class, 'update'])->name('empresas.update');
        Route::delete('empresas/{empresa}', [EmpresaController::class, 'destroy'])->name('empresas.destroy');
    //Rutas para la direccion de la comunidad y la empresa
        Route::get('direcciones', [DireccionController::class, 'index'])->name('direcciones.index');
        Route::get('direcciones', [DireccionController::class, 'create'])->name('direcciones.create');
        Route::post('direcciones', [DireccionController::class, 'store'])->name('direcciones.store');
        Route::get('direcciones/{direccion}', [DireccionController::class, 'show'])->name('direcciones.show');
        Route::put('direcciones/{direccion}', [DireccionController::class, 'update'])->name('direcciones.update');
        Route::delete('direcciones/{direccion}', [DireccionController::class, 'destroy'])->name('direcciones.destroy');


//#########################################
//                  SIRECOB
//#########################################

//Ruta principal de biblioteca
Route::get('/biblioteca', function () {
    return view('sirecob/home');
});

//  REGISTRO TENTATIVO DE PERSONAL
Route::get('/Registro_DET', function () {
    return view('RegistroPersonas');
});

route::get('/Registro_Docente', function () {
    return view('registroDocente');
});
route::get('/Registro_tutor', function () {
    return view('registroTutor');
});
// MODULO DE LIBROS
Route::get('/Modulo_libros', function () {
    return view('sirecob/ModuloLibros');
});

Route::get('/Registro_libros', [App\Http\Controllers\sirecob\LibroController::class, 'index'])->name('registroLibros');
Route::get('/Modulo_Estudiante', function () {
    return view('sirecob/estudiante');
});
route::get('/prestamo', function () {
    return view('sirecob/PrestamosLibros');
});

route::get('/RegistroLibro', function () {
    return view('sirecob/libros\registroLibros');
});

Route::get('/editarlibro/{id}', [App\Http\Controllers\sirecob\LibroController::class, 'EditBook'])->name('editarlibro');
Route::get('/libro/{libro}', [App\Http\Controllers\sirecob\LibroController::class, 'update'])->name('update');
Route::get('/deletelibro/{libro}', [App\Http\Controllers\sirecob\LibroController::class, 'destroy'])->name('deletebook');
//Prestamo de Libros
route::get('/Registro_Prestamo',  [App\Http\Controllers\sirecob\Controladores::class, 'prestamo']);
Route::get('/Prestamos', [App\Http\Controllers\sirecob\PestamolibrosController::class, 'index']);
//#############
//Moduo de proyecto de grados
Route::get('11111111111111111111111', [App\Http\Controllers\sirecob\ProyectoGradoController::class, 'vista_registro']);        