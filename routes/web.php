<?php

use App\Http\Controllers\Recopasec\DireccionController;
use App\Http\Controllers\Recopasec\EmpresaController;
use App\Http\Controllers\Recopasec\ProyectoPController;
use App\Http\Controllers\Recopasec\ProyectoSController;
use App\Http\Controllers\Recopasec\TutorController;
use App\Http\Controllers\ValidateformController;
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
Route::get('/sigecop/home', [App\Http\Controllers\Sigecop\HomeController::class, 'index'])->name('home');

// DocumentController ROUTES
Route::get('/sigecop/upload/{user}', [App\Http\Controllers\Sigecop\DocumentController::class, 'upload'])->name('upload');
Route::post('/sigecop/subir', [App\Http\Controllers\Sigecop\DocumentController::class, 'subir'])->name('subir');
Route::get('/sigecop/expediente/{expediente_id}', [App\Http\Controllers\Sigecop\DocumentController::class, 'show_expediente'])->name('show_expediente');
Route::get('/sigecop/doc/{filename}', [App\Http\Controllers\Sigecop\DocumentController::class, 'getDoc'])->name('getDoc');
Route::get('/sigecop/modify', [App\Http\Controllers\Sigecop\DocumentController::class, 'modify'])->name('modify');
Route::post('/sigecop/update_docs', [App\Http\Controllers\Sigecop\DocumentController::class, 'update_docs'])->name('update_docs');

// UserController ROUTES
Route::get('/sigecop/estudiante/{id?}', [App\Http\Controllers\Sigecop\StudentController::class, 'profile'])->name('profile');
Route::post('/sigecop/update_profile', [App\Http\Controllers\Sigecop\StudentController::class, 'update_profile'])->name('update_profile');
Route::get('/sigecop/edit-profile', [App\Http\Controllers\Sigecop\StudentController::class, 'edit_profile'])->name('edit_profile');
Route::get('/sigecop/img-profile/{filename}', [App\Http\Controllers\Sigecop\StudentController::class, 'img_profile'])->name('img_profile');
Route::get('/sigecop/notification', [App\Http\Controllers\Sigecop\StudentController::class, 'notification'])->name('notification');
Route::get('/sigecop/estudiantes', [App\Http\Controllers\Sigecop\StudentController::class, 'students_list'])->name('students_list');

// AdminController ROUTES
Route::get('/sigecop/create-admin/{code?}', [App\Http\Controllers\Sigecop\UserController::class, 'create_admin'])->name('create_admin');
Route::get('/sigecop/user-list', [App\Http\Controllers\Sigecop\UserController::class, 'users_list'])->name('users_list');
Route::get('/sigecop/estudiantes-por-carrera', [App\Http\Controllers\Sigecop\UserController::class, 'category_users'])->name('category_users');
Route::get('/sigecop/users-by-field', [App\Http\Controllers\Sigecop\UserController::class, 'users_by_field'])->name('users_by_field');
Route::get('/sigecop/user-search/{texto?}', [App\Http\Controllers\Sigecop\UserController::class, 'search'])->name('search');
Route::get('/sigecop/expedientes', [App\Http\Controllers\Sigecop\UserController::class, 'expedientes_list'])->name('expedientes_list');
Route::get('/sigecop/estudiantes/{carrera?}', [App\Http\Controllers\Sigecop\UserController::class, 'students_by_carreer'])->name('students_by_carreer');
Route::get('/sigecop/registrar-estudiante', [App\Http\Controllers\Sigecop\UserController::class, 'register_student_view'])->name('register_student_view');
Route::post('/sigecop/registrar/estudiantes', [App\Http\Controllers\Sigecop\UserController::class, 'register_student'])->name('register_student');
Route::get('/sigecop/verificar-cedula', [App\Http\Controllers\Sigecop\UserController::class, 'verificar_cedula'])->name('verificar_cedula');
Route::post('/verificar-usuario', [App\Http\Controllers\Sigecop\UserController::class, 'verificar_usuario'])->name('verificar_usuario');

Route::get('/nuevo-expediente', [App\Http\Controllers\Sigecop\DocumentController::class, 'select_user_to_new_file'])->name('select_user_to_new_file');
Route::get('/eliminar-expediente/{expediente_id} ', [App\Http\Controllers\Sigecop\DocumentController::class, 'delete_expediente'])->name('delete_expediente');


Route::post('/sigecop/register-admin', [App\Http\Controllers\Sigecop\AdminController::class, 'register_admin'])->name('register_admin');
Route::get('/sigecop/user/{id}', [App\Http\Controllers\Sigecop\AdminController::class, 'user_docs'])->name('user_docs');
Route::get('/sigecop/docs/pass/{docs_id}', [App\Http\Controllers\Sigecop\AdminController::class, 'pass_docs'])->name('pass_docs');
Route::post('/sigecop/message', [App\Http\Controllers\Sigecop\AdminController::class, 'send_message'])->name('send_message');

//RECOPASEC
    //Rutas de los tutores
        //Tutor academico
        Route::get('tutorac/create', [TutorController::class, 'create_tutorac'])->name('create_tutorac');
        Route::get('tutoracom/create', [TutorController::class, 'create_tutoracom'])->name('create_tutoracom');
        Route::post('tutorac', [TutorController::class, 'store_tutorac'])->name('store_tutorac');        
        Route::post('tutoracom', [TutorController::class, 'store_tutoracom'])->name('store_tutoracom');
        Route::get('tutorac/{tutor}/edit', [TutorController::class, 'edit_tutorac'])->name('edit_tutorac');
        Route::put('tutorac/{tutor}', [TutorController::class, 'update_tutorac'])->name('update_tutorac');
        Route::delete('tutorac/{tutor}', [TutorController::class, 'destroy_tutorac'])->name('destroy_tutoracy');
        //Tutor comunitario
        Route::get('tutorcom/create', [TutorController::class, 'create_tutorcom'])->name('create_tutorcom');
        Route::post('tutorcom', [TutorController::class, 'store_tutorcom'])->name('store_tutorcom');
        Route::get('tutorcom/{tutorco}/edit', [TutorController::class, 'edit_tutorcom'])->name('edit_tutorcomt');
        Route::put('tutorcom/{tutorco}', [TutorController::class, 'update_tutorcom'])->name('update_tutorcom');
        Route::delete('tutorcom/{tutorco}', [TutorController::class, 'destroy_tutorcom'])->name('destroy_tutorcom');
        //Tutor institucional
        Route::get('tutorin/create', [TutorController::class, 'create_tutorin'])->name('create_tutorin');
        Route::post('tutorin', [TutorController::class, 'store_tutorin'])->name('store_tutorin');
        Route::get('tutorin/{tutori}/edit', [TutorController::class, 'edit_tutorin'])->name('edit_tutorin');
        Route::put('tutorin/{tutori}', [TutorController::class, 'update_tutorin'])->name('update_tutorin');
        Route::delete('tutorin/{tutori}', [TutorController::class, 'destroy_tutorin'])->name('destroy_tutorin');
    //Rutas para el proyecto de pasantias
        Route::get('pasantias', [ProyectoPController::class, 'index_pasantias'])->name('index_pasantias');
        Route::get('pasantias/create', [ProyectoPController::class, 'create_pasantias'])->name('create_pasantias');
        Route::post('pasantias', [ProyectoPController::class, 'store_pasantias'])->name('store_pasantias');
        Route::get('pasantias/{pasantia}', [ProyectoPController::class, 'show_pasantias'])->name('show_pasantias');
        Route::get('pasantias/{pasantia}/edit', [ProyectoPController::class, 'edit_pasantias'])->name('edit_pasantias');
        Route::put('pasantias/{pasantia}', [ProyectoPController::class, 'update_pasantias'])->name('update_pasantias');
        Route::get('/recopasec/proyectosp', [ProyectoPController::class, 'proyecto_listp'])->name('proyecto_listp');
        Route::get('/recopasec/proyecto-searchp/{texto?}', [ProyectoSController::class, 'searchp'])->name('searchp');
        Route::delete('pasantias/{pasantia}', [ProyectoPController::class, 'destroy_pasantias'])->name('destroy_pasantias');
        Route::get('/recopasec/proyectopas/{proyecto_id}', [ProyectoPController::class, 'show_proyectopa'])->name('show_proyectopa');
    //Rutas para el proyecto comunitario
        Route::get('comunitarios', [ProyectoSController::class, 'index_comunitario'])->name('index_comunitario');
        Route::get('direcciones/create', [ProyectoSController::class, 'create_direccion'])->name('create_direccion');
        Route::post('direcciones', [ProyectoSController::class, 'store_direccion'])->name('store_direccion');
        Route::get('comunitarios/create', [ProyectoSController::class, 'create_comunitario'])->name('create_comunitario');
        Route::post('comunitarios', [ProyectoSController::class, 'store_comunitario'])->name('store_comunitario');
        Route::get('comunitarios/{comunitario}', [ProyectoSController::class, 'show_comunitario'])->name('show_comunitario');
        Route::get('comunitarios/{comunitario}/edit', [ProyectoSController::class, 'edit_comunitario'])->name('edit_comunitario');
        Route::put('comunitarios/{comunitario}', [ProyectoSController::class, 'update_comunitario'])->name('update_comunitario');
        Route::delete('comunitarios/{comunitario}', [ProyectoSController::class, 'destroy_comunitario'])->name('destroy_comunitario');
        Route::get('estudiantes/{comunitario}', [ProyectoSController::class, 'agregar_estudiante'])->name('agregar_estudiante');
        Route::get('/recopasec/proyectos', [ProyectoSController::class, 'proyecto_list'])->name('proyecto_list');
        Route::get('/recopasec/proyecto-search/{texto?}', [ProyectoSController::class, 'search'])->name('search');
        Route::get('/recopasec/proyectoser/{proyecto_id}', [ProyectoSController::class, 'show_proyectoserv'])->name('show_proyectoserv');
    //Descargar comprobante
        Route::get('documento', [ProyectoSController::class, 'documento'])->name('documento');
        Route::get('download-pdf', [ProyectoSController::class, 'descargar_pdf'])->name('descargar_pdf');
    //Rutas para las empresas de pasantias
        Route::post('/empresas-crear', [EmpresaController::class, 'store_empresa'])->name('store_empresa');
        Route::get('empresas/create', [EmpresaController::class, 'create_empresa'])->name('create_empresa');
        Route::get('empresas/{empresa}/edit', [EmpresaController::class, 'edit_empresa'])->name('edit_empresa');
        Route::put('empresas/{empresa}', [EmpresaController::class, 'update_empresa'])->name('update_empresa');
        Route::delete('empresas/{empresa}', [EmpresaController::class, 'destroy_empresa'])->name('destroy_empresa');
        Route::get('/recopasec/verificar-rif', [EmpresaController::class, 'verificar_rif'])->name('verificar_rif');
        Route::post('/verificar-empresa', [EmpresaController::class, 'verificar_empresa'])->name('verificar_empresa');
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
Route::get('/editarEstadoPrestamo/{id}', [App\Http\Controllers\sirecob\PestamolibrosController::class, 'EstadoPrestamo'])->name('editarlibro');
Route::get('/libro/{libro}', [App\Http\Controllers\sirecob\LibroController::class, 'update'])->name('update');
Route::get('/deletelibro/{libro}', [App\Http\Controllers\sirecob\LibroController::class, 'destroy'])->name('deletebook');
//Prestamo de Libros
route::get('/Registro_Prestamo',  [App\Http\Controllers\sirecob\Controladores::class, 'prestamo']);
Route::get('/Prestamos', [App\Http\Controllers\sirecob\PestamolibrosController::class, 'index']);
//#############
//Moduo de proyecto de grados
Route::get('/proyectos', [App\Http\Controllers\sirecob\ProyectoGradoController::class, 'vista_registro']);

//VALIDAR FORMULARIOS
Route::post('/guardar', [ValidateformController::class, 'guardarDatos']);