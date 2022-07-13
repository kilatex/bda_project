<?php

namespace App\Http\Controllers\Recopasec;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Recopasec\Calificacion_proyecto_pasantia;
use App\Models\Recopasec\Proyecto_Pasantia;

class ProyectoPController extends Controller
{
    public function index_pasantias(){
        return view('proyectos.pasantias.index');
    }
    public function create_pasantias(){
        return view('proyectos.pasantias.pasantiascreate');
    }
    public function store_pasantias(Request $request){
        $pasantia = new Proyecto_pasantia();
        $calificacion = new Calificacion_proyecto_pasantia();
        $request->validate([
            'n-periodo'=>'required',
            'codigo'=> 'required|max:06',
            'titulo'=> 'required|max:255',
            'periodo'=> 'required',
            'calificacion_tutorac'=>'required|integer|max:02',
            'calificacion_tutorin'=>'required|integer|max:02',
            'calificacion_docentevalu'=>'required|integer|max:02'
        ]);
        $codigo = 'P-'.$request->input('codigo');
        $titulo = $request->input('titulo');
        $periodo = $request->input('n-periodo').'-'.$request->input('periodo');
        $calificacion_tutorac = $request->input('calificacion_tutorac');
        $calificacion_tutorin = $request->input('calificacion_tutorac');
        $calificacion_docentevalu = $request->input('calificacion_tutorac');
        if($codigo && $titulo && $periodo && $calificacion_tutorac){
            $pasantia->codigo = $codigo;
            $pasantia->titulo = $titulo;
            $pasantia->periodo = $periodo;
            $pasantia->save();
            $calificacion->calificacion_tutor_academico = $calificacion_tutorac;
            $calificacion->calificacion_tutor_institucional = $calificacion_tutorin;
            $calificacion->calificacion_comite_evaluador = $calificacion_docentevalu;
            $calificacion->save(); 
                 
        return view('proyectos.serviciocom.agregar', compact('comunitario'), compact('calificacion'));
        }else{
            $message = 'Registro incorrecto, por favor rellena bien los campos ';
            return view('proyectos.serviciocom.serviciocomcreate',[
                'message' => $message
            ]
            );
        }      
    }
    public function edit_pasantias(Proyecto_pasantia $pasantia){
        return view('proyecto.pasantias.edit', compact('pasantia'));
    }
    public function update_pasantias(Request $request, Proyecto_pasantia $pasantia){
        $request->validate([
            'codigo'=> 'required|max:06',
            'titulo'=> 'required|max:255',
            'periodo'=> 'required',
        ]);
        $pasantia->update($request->all());
        return redirect()->route('index_pasantias');
    } 
    public function destroy_pasantias(Proyecto_pasantia $pasantia){
        $pasantia->delete();
        return redirect()->route('index_pasantias');
    }
}
