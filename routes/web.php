<?php

use Illuminate\Support\Facades\Route;

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
Route::get('/sigecop/profile/{id?}', [App\Http\Controllers\Sigecop\StudentController::class, 'profile'])->name('profile');
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

Route::get('/nuevo-expediente', [App\Http\Controllers\Sigecop\DocumentController::class, 'select_user_to_new_file'])->name('select_user_to_new_file');
Route::get('/eliminar-expediente/{expediente_id} ', [App\Http\Controllers\Sigecop\DocumentController::class, 'delete_expediente'])->name('delete_expediente');


Route::post('/sigecop/register-admin', [App\Http\Controllers\Sigecop\AdminController::class, 'register_admin'])->name('register_admin');
Route::get('/sigecop/user/{id}', [App\Http\Controllers\Sigecop\AdminController::class, 'user_docs'])->name('user_docs');
Route::get('/sigecop/docs/pass/{docs_id}', [App\Http\Controllers\Sigecop\AdminController::class, 'pass_docs'])->name('pass_docs');
Route::post('/sigecop/message', [App\Http\Controllers\Sigecop\AdminController::class, 'send_message'])->name('send_message');

