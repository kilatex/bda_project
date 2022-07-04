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
Route::get('/registrar/estudiantes', [App\Http\Controllers\UserController::class, 'register_student'])->name('register_student');
Route::get('/nuevo-expediente', [App\Http\Controllers\DocumentController::class, 'select_user_to_new_file'])->name('select_user_to_new_file');


Route::post('/register-admin', [App\Http\Controllers\AdminController::class, 'register_admin'])->name('register_admin');
Route::get('/user/{id}', [App\Http\Controllers\AdminController::class, 'user_docs'])->name('user_docs');
Route::get('/docs/pass/{docs_id}', [App\Http\Controllers\AdminController::class, 'pass_docs'])->name('pass_docs');
Route::post('/message', [App\Http\Controllers\AdminController::class, 'send_message'])->name('send_message');

