<?php

namespace App\Http\Controllers\Recopasec;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Estudiante;
use App\Models\Recopasec\Calificacion_pasantia;
use App\Models\Recopasec\Proyecto_Pasantia;
use App\Models\Recopasec\Tutor_academico;
use App\Models\Recopasec\Tutor_institucional;
use App\Models\User;

class ProyectoPController extends Controller
{
    public function index_pasantias(){
        return view('proyectos.pasantias.index');
    }
    public function create_pasantias(Tutor_institucional $tutori){
        
        $tutoracs =Tutor_academico::all();
        return view('proyectos.pasantias.pasantiascreate', compact('tutoracs', 'tutori'));
    }
    public function store_pasantias(Request $request){
        $pasantia = new Proyecto_pasantia();
        $calificacion = new Calificacion_pasantia();
        $request->validate([
            'n_periodo'=>'required',
            'codigo'=> 'required|max:06',
            'titulo'=> 'required|max:255',
            'periodo'=> 'required',
            'calificacion_tutorac'=>'required',
            'calificacion_tutorin'=>'required',
            'calificacion_docentevalu'=>'required',
            'calificacion_global'=>'required',
            'tutori'=>'required',
            'tutorac'=> 'required',
        ]);
        $pasantia->codigo=$request->codigo;
        $pasantia->titulo=$request->titulo;
        $pasantia->periodo = $request->n_periodo.$request->periodo;
        $pasantia->tutor_institucional_id=$request->cedulati;
        $pasantia->tutor_academico_id=$request->tutorac;
        $pasantia->save();
        $calificacion->calificacion_tutor_academico = $request->calificacion_tutorac;
        $calificacion->calificacion_tutor_institucional = $request->calificacion_tutorin;
        $calificacion->calificacion_comite_evaluador = $request->calificacion_docentevalu;
        $calificacion->calificacion_global = $request->promedioTotal;
        $calificacion->proyecto_pasantias_id = $pasantia->id;
        $calificacion->save();
        return redirect()->route('index_pasantias');
             
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
    public function verificar_cedula(){
        return view('proyectos.pasantias.buscarestudiante',
        [  
            'calificacion' => false,
        ]);
    }

    public function verificar_estudiante(Request $request){
        // Validar Formulario
        $validate = $this->validate($request,[
            'tipo_cedula'=> 'required',
            'cedula' => 'required|min:7|max:9',
        ]);
        $cedula = $request->input('tipo_cedula').$request->input('cedula');
        $user = User::where('cedula', $cedula)->first();
        $estudiante = Estudiante::where('usuario_id', $user->id)->first();
        $calificacion = Calificacion_pasantia::where('estudiante_id', $estudiante->id)->first();
        
        if($calificacion){
           
            return view('proyectos.pasantias.buscarestudiante', compact('calificacion'));

        }if($estudiante && $calificacion==null){
            
            return view('proyectos.pasantias.index');
        }
    }
}
