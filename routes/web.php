<?php

use App\Http\Controllers\Recopasec\DireccionController;
use App\Http\Controllers\Recopasec\EmpresaController;
use App\Http\Controllers\Recopasec\ProyectoPController;
use App\Http\Controllers\Recopasec\ProyectoSController;
use App\Http\Controllers\Recopasec\TutorController;
use App\Models\Recopasec\Empresa;
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
    //Rutas de los tutores
        //Tutor academico
        Route::get('tutorac/create', [TutorController::class, 'create_tutorac'])->name('create_tutorac');
        Route::post('tutorac', [TutorController::class, 'store_tutorac'])->name('store_tutorac');
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
        Route::delete('pasantias/{pasantia}', [ProyectoPController::class, 'destroy_pasantias'])->name('destroy_pasantias');
    //Rutas para el proyecto comunitario
        Route::get('comunitarios', [ProyectoSController::class, 'index_comunitario'])->name('index_comunitario');
        Route::get('direcciones/create', [ProyectoSController::class, 'create_direccion'])->name('create_direccion');
        Route::post('direcciones', [ProyectoSController::class, 'store_direccion'])->name('store_direccion');
        Route::put('direcciones/{direccion}', [ProyectoSController::class, 'update_direccion'])->name('update_direccion');
        Route::delete('direcciones/{direccion}', [ProyectoSController::class, 'destroy_direccion'])->name('destroy_direccion');
        Route::get('comunitarios/create', [ProyectoSController::class, 'create_comunitario'])->name('create_comunitario');
        Route::post('comunitarios', [ProyectoSController::class, 'store_comunitario'])->name('store_comunitario');
        Route::get('comunitarios/{comunitario}', [ProyectoSController::class, 'show_comunitario'])->name('show_comunitario');
        Route::get('comunitarios/{comunitario}/edit', [ProyectoSController::class, 'edit_comunitario'])->name('edit_comunitario');
        Route::put('comunitarios/{comunitario}', [ProyectoSController::class, 'update_comunitario'])->name('update_comunitario');
        Route::delete('comunitarios/{comunitario}', [ProyectoSController::class, 'destroy_comunitario'])->name('destroy_comunitario');
    //Rutas para las empresas de pasantias
        Route::post('/empresas-crear', [EmpresaController::class, 'store_empresa'])->name('store_empresa');
        Route::get('empresas/create', [EmpresaController::class, 'create_empresa'])->name('create_empresa');
        Route::get('empresas/{empresa}/edit', [EmpresaController::class, 'edit_empresa'])->name('edit_empresa');
        Route::put('empresas/{empresa}', [EmpresaController::class, 'update_empresa'])->name('update_empresa');
        Route::delete('empresas/{empresa}', [EmpresaController::class, 'destroy_empresa'])->name('destroy_empresa');
   