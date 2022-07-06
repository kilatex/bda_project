<?php

namespace App\Http\Controllers\Recopasec;
use App\Models\Recopasec\Tutor_Academico;
use App\Models\Recopasec\Tutor_Comunitario;
use App\Models\Recopasec\Tutor_Institucional;
use App\Models\Recopasec\Direccione;
use App\Models\Recopasec\Especialidade;
use App\Models\Recopasec\Cargo;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class TutorController extends Controller
{
    // Tutor Academico
    public function create_tutorac(){
        return view('tutores.tutor_ac.tutorac');
    }
    public function store_tutorac(Request $request){
        $request->validate([
            'nombres'=> 'required|max:50',
            'apellidos'=> 'required|max:50',
            'cedula'=> 'required|max:10',
            'email'=> 'required|max:100',
            'telefono'=> 'required|max:12',
            'nombre_especialidad' => 'required|max:20'
        ]);
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
        return redirect()->route('/estudiantes');
    }
    public function edit_tutorac(Tutor_Academico $tutorcom){
        $user = \Auth::user();
        if($user->rol == 'USER_pasantias'){
            return view('proyecto.pasantias.edit', compact('tutor'));
        }else{
            return view('proyecto.serviciocom.edit', compact('tutor'));
        }
    }
    public function update_tutorac(Request $request, Tutor_Academico $tutor){
        $tutor->update($request->all());
        return view('Pasantias.show', compact('tutor'));
    } 
    public function destroy_tutorac(Tutor_Academico $tutor){
        $tutor->delete();
        return redirect()->route('/estudiantes');
    }

    //Tutor Comunitario
    public function create_tutorcom(){
        return view('tutores.tutor_com.tutorcom');
    }
    public function store_tutorcom(Request $request){
        $request->validate([
            'nombres'=> 'required|max:50',
            'apellidos'=> 'required|max:50',
            'cedula'=> 'required|max:10',
            'email'=> 'required|max:100',
            'telefono'=> 'required|max:12',
            'estado'=> 'required',
            'municipio'=> 'required|max:100',
            'parroquia'=> 'required|max:100',
            'nombre_cargo' => 'required|max:100'
        ]);
        $tutorco = new Tutor_Comunitario();
        $tutorco->nombres = $request->nombres;
        $tutorco->apellidos = $request->apellidos;
        $tutorco->cedula = $request->cedula;
        $tutorco->email = $request->email;
        $tutorco->telefono = $request->telefono;
        $tutorco->save();
        $direccion = new Direccione();
        $direccion->estado = $request->estado;
        $direccion->municipio = $request->municipio;
        $direccion->parroquia = $request->parroquia;
        $direccion -> save();
        $cargo = new Cargo();
        $cargo->nombre = $request->nombre_cargo;
        return redirect()->route('comunitarios');
        
    }
    public function edit_tutorcom(Tutor_Comunitario $tutorcom){
        return view('Pasantias.edit', compact('tutorco'));
    }
    public function update_tutorcom(Request $request, Tutor_Comunitario $tutorcom){
        $tutorcom->update($request->all());
        return view('Pasantias.show', compact('tutorco'));
    } 
    public function destroy_tutorcom(Tutor_Comunitario $tutorcom){
        $tutorcom->delete();
        return redirect()->route('comunitarios');
    }

    //Tutor Institucional
    public function create_tutorin(){
        return view('tutores.tutor_ins.tutorin');
    }
    public function store_tutorin(Request $request){
        $request->validate([
            'nombres'=> 'required|max:50',
            'apellidos'=> 'required|max:50',
            'cedula'=> 'required|max:10',
            'email'=> 'required|max:100',
            'telefono'=> 'required|max:12',
            'nombre_especialidad' => 'required|max:20'
        ]);

        $tutori= new Tutor_Institucional();
        $tutori->nombres = $request->nombres;
        $tutori->apellidos = $request->apellidos;
        $tutori->cedula = $request->cedula;
        $tutori->email = $request->email;
        $tutori->telefono = $request->telefono;
        $tutori->save();
        $especialidad= new Especialidade();
        $especialidad->nombre = $request->nombre_especialidad;
        $especialidad->save();
        return redirect()->route('pasantias');
    }
    public function edit_tutorin(Tutor_Institucional $tutori){
        return view('proyecto.pasantias.edit', compact('tutori'));
    }
    public function update_tutorin(Request $request, Tutor_Institucional $tutori){
        $tutori->update($request->all());
        return view('Pasantias.show', compact('tutori'));
    } 
    public function destroy_tutorin(Tutor_Institucional $tutori){
        $tutori->delete();
        return redirect()->route('pasantias');
    }
}
