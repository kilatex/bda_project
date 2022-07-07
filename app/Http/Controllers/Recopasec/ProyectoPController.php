<?php

namespace App\Http\Controllers\Recopasec;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Recopasec\Proyecto_Pasantia;
use App\Models\Recopasec\Tutor_Academico;
use App\Models\Recopasec\Tutor_Institucional;
use App\Models\Recopasec\Especialidade;

class ProyectoPController extends Controller
{
    public function index_pasantias(){
        return view('proyectos.pasantias.index');
    }
    public function create_pasantias(){
        return view('proyectos.pasantias.pasantiascreate');
    }
    public function store_pasantias(Request $request){
        $request->validate([
            'codigo'=> 'required|max:50',
            'titulo'=> 'required|max:255',
            'fecha_inicio'=> 'required|max:12',
            'fecha_final'=> 'required|max:12',
            'nombres'=> 'required|max:50',
            'apellidos'=> 'required|max:50',
            'cedula'=> 'required|max:10',
            'email'=> 'required|max:100',
            'telefono'=> 'required|max:12',
            'nombre_especialidad' => 'required|max:20'
        ]);
        $pasantia = new Proyecto_Pasantia();
        $pasantia->codigo = $request->codigo;
        $pasantia->titulo = $request->titulo;
        $pasantia->fecha_inico = $request->fecha_inicio;
        $pasantia->fecha_final = $request->fecha_final;
        $pasantia->save();
        $tutor = new Tutor_Academico();
        $tutor->nombres = $request->nombres;
        $tutor->apellidos = $request->apellidos;
        $tutor->cedula = $request->cedula;
        $tutor->email = $request->email;
        $tutor->telefono = $request->telefono;
        $tutor->save();
        $especialidad= new Especialidade();
        $especialidad->nombre = $request->nombre_especialidad;
        $especialidad->save();
        return redirect()->route('index_pasantias');
        
    }
    public function edit_pasantias(Proyecto_Pasantia $pasantia){
        return view('proyecto.pasantias.edit', compact('pasantia'));
    }
    public function update_pasantias(Request $request, Proyecto_Pasantia $pasantia){
        $request->validate([
            'codigo'=> 'required|max:50',
            'titulo'=> 'required|max:255',
            'fecha_inicio'=> 'required|max:12',
            'fecha_final'=> 'required|max:12',
        ]);
        $pasantia->update($request->all());
        return redirect()->route('index_pasantias');
    } 
    public function destroy_pasantias(Proyecto_Pasantia $pasantia){
        $pasantia->delete();
        return redirect()->route('index_pasantias');
    }
}
