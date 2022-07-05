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
        Route::get('tutors', [TutorController::class, 'index'])->name('tutors.index');
        Route::get('tutorac/create', [TutorController::class, 'create_tutorac'])->name('tutorac.create');
        Route::get('tutorcom/create', [TutorController::class, 'create_tutorcom'])->name('tutorcom.create');
        Route::get('tutorin/create', [TutorController::class, 'create_tutorin'])->name('tutorin.create');
        Route::post('tutorac', [TutorController::class, 'store_tutorac'])->name('tutorac.store');
        Route::post('tutorcom', [TutorController::class, 'store_tutorcom'])->name('tutorcom.store');
        Route::post('tutorin', [TutorController::class, 'store_tutorin'])->name('tutorin.store');
        Route::get('tutors/{tutor}', [TutorController::class, 'show'])->name('tutors.show');
        //Route::get('tutors/{tutor}/edit', [TutorController::class, 'edit'])->name('tutors.edit');
        Route::put('tutors/{tutor}', [TutorController::class, 'update'])->name('tutors.update');
        Route::delete('tutors/{tutor}', [TutorController::class, 'destroy'])->name('tutors.destroy');
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
        Route::get('direccion/create', [ProyectoSController::class, 'create_direccion'])->name('direccion.create');
        Route::get('comunitarios/create', [ProyectoSController::class, 'create'])->name('comunitarios.create');
        Route::post('comunitarios', [ProyectoSController::class, 'store'])->name('comunitarios.store');
        Route::get('comunitarios/{comunitario}', [ProyectoSController::class, 'show'])->name('comunitarios.show');
        Route::get('comunitarios/{comunitario}/edit', [ProyectoSController::class, 'edit'])->name('comunitarios.edit');
        Route::put('comunitarios/{comunitario}', [ProyectoSController::class, 'update'])->name('comunitarios.update');
        Route::delete('comunitarios/{comunitario}', [ProyectoSController::class, 'destroy'])->name('comunitarios.destroy');
    //Rutas para las empresas de pasantias
        Route::post('empresas', [EmpresaController::class, 'store_empresa'])->name('empresas.store');
        Route::get('empresas/create', [EmpresaController::class, 'create_empresa'])->name('empresas.create');
        //Route::get('empresas/{empresa}/edit', [EmpresaController::class, 'edit'])->name('empresas.edit');
        Route::put('empresas/{empresa}', [EmpresaController::class, 'update_empresa'])->name('empresas.update');
        Route::delete('empresas/{empresa}', [EmpresaController::class, 'destroy_empresa'])->name('empresas.destroy');
   