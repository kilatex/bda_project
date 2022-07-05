<?php

namespace App\Http\Controllers\Sirecob;

use Illuminate\Http\Request;
use App\Models\Sirecob\estudante;
use App\Models\Sirecob\Docente;
use App\Models\Sirecob\Libro;
use App\Models\Sirecob\Datos_libros;
use App\Http\Controllers\Controller;

class Controladores extends Controller
{
    public function prestamo()
    {
        $Estudiante=estudante::get();
        $Docente = Docente::get();
        $Libro = Libro::get();
        return view('sirecob/Prestamo_Libros/RegistroPrestamo',compact('Estudiante','Docente','Libro')); ;
    }
}
