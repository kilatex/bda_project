<?php

namespace App\Http\Controllers\Recopasec;
use App\Models\Recopasec\Tutor_academico;
use App\Models\Recopasec\Tutor_comunitario;
use App\Models\Recopasec\Tutor_institucional;
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
        $user = \Auth::user();
        if($user->rol == 'USER_pasantias'){
            $request->validate([
                'nombres'=> 'required|max:50',
                'apellidos'=> 'required|max:50',
                'cedula'=> 'required|max:08',
                'email'=> 'required|max:100',
                'telefono'=> 'required|max:12',
                'nombre_especialidad' => 'required|max:20'
            ]);
            $tutor = new Tutor_academico();
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
        }else if($user->rol == 'USER_serviciocom'){ 
            $request->validate([
                'nombres'=> 'required|max:50',
                'apellidos'=> 'required|max:50',
                'cedula'=> 'required|max:08',
                'email'=> 'required|max:100',
                'telefono'=> 'required|max:12',
                'nombre_especialidad' => 'required|max:20'
            ]);
            $tutor = new Tutor_academico();
            $tutor->nombres = $request->nombres;
            $tutor->apellidos = $request->apellidos;
            $tutor->cedula = $request->cedula;
            $tutor->email = $request->email;
            $tutor->telefono = $request->telefono;
            $tutor->save();
            $especialidad= new Especialidade();
            $especialidad->nombre = $request->nombre_especialidad;
            $especialidad->save();
            return redirect()->route('index_comunitario');          
        }
    }
    public function edit_tutorac(Tutor_academico $tutorcom, Especialidade $especialidad){
        $user = \Auth::user();
        if($user->rol == 'USER_pasantias'){
            return view('proyecto.pasantias.edit', compact('tutor'), compact('especialidad'));
        }else if($user->rol == 'USER_serviciocom'){ 
            return view('proyecto.serviciocom.edit', compact('tutor'), compact('especialidad'));
        }
    }
    public function update_tutorac(Request $request, Tutor_academico $tutor){
        $request->validate([
            'nombres'=> 'required|max:50',
            'apellidos'=> 'required|max:50',
            'cedula'=> 'required|max:08',
            'email'=> 'required|max:100',
            'telefono'=> 'required|max:12',
            'nombre_especialidad' => 'required|max:20'
        ]);
        $tutor->update($request->all());
        $user = \Auth::user();
        if($user->rol == 'USER_pasantias'){
            return redirect()->route('index_pasantias');
        }else if($user->rol == 'USER_serviciocom'){ 
            return redirect()->route('index_comunitario');
        }    
    } 
    public function destroy_tutorac(Tutor_academico $tutor, Especialidade $especialidad){
        $tutor->delete();
        $especialidad->delete();
        return redirect()->route('index_pasantias');
    }

    //Tutor Comunitario
    public function create_tutorcom(){
        return view('tutores.tutor_com.tutorcom');
    }
    public function store_tutorcom(Request $request){
        $request->validate([
            'nombres'=> 'required|max:50',
            'apellidos'=> 'required|max:50',
            'cedula'=> 'required|max:08',
            'email'=> 'required|max:100',
            'telefono'=> 'required|max:12',
            'nombre_cargo' => 'required|max:100'
        ]);
        $tutorco = new Tutor_comunitario();
        $tutorco->nombres = $request->nombres;
        $tutorco->apellidos = $request->apellidos;
        $tutorco->cedula = $request->cedula;
        $tutorco->email = $request->email;
        $tutorco->telefono = $request->telefono;
        $tutorco->save();
        $cargo = new Cargo();
        $cargo->nombre = $request->nombre_cargo;
        return redirect()->route('index_comunitario');
        
    }
    public function edit_tutorcom(Tutor_comunitario $tutorcom, Cargo $cargo){
        return view('Pasantias.edit', compact('tutorco'), compact('direccion'), compact('cargo'));
    }
    public function update_tutorcom(Request $request, Tutor_comunitario $tutorcom, Cargo $cargo){
        $request->validate([
            'nombres'=> 'required|max:50',
            'apellidos'=> 'required|max:50',
            'cedula'=> 'required|max:10',
            'email'=> 'required|max:100',
            'telefono'=> 'required|max:12',
            'nombre_cargo' => 'required|max:100'
        ]);
        $tutorcom->update($request->all());
        $cargo->update($request->all());
        return redirect()->route('index_comunitario');
    } 
    public function destroy_tutorcom(Tutor_comunitario $tutorcom, Cargo $cargo){
        $tutorcom->delete();
        $cargo->delete();
        return redirect()->route('index_comunitario');
    }

    //Tutor Institucional
    public function create_tutorin(){
        return view('tutores.tutor_ins.tutorin');
    }
    public function store_tutorin(Request $request){
        $request->validate([
            'nombres'=> 'required|max:50',
            'apellidos'=> 'required|max:50',
            'cedula'=> 'required|max:08',
            'email'=> 'required|max:100',
            'telefono'=> 'required|max:12',
            'nombre_especialidad' => 'required|max:20'
        ]);

        $tutori= new Tutor_institucional();
        $tutori->nombres = $request->nombres;
        $tutori->apellidos = $request->apellidos;
        $tutori->cedula = $request->cedula;
        $tutori->email = $request->email;
        $tutori->telefono = $request->telefono;
        $tutori->save();
        $especialidad= new Especialidade();
        $especialidad->nombre = $request->nombre_especialidad;
        $especialidad->save();
        return redirect()->route('index_pasantias');
    }
    public function edit_tutorin(Tutor_institucional $tutori, Especialidade $especialidad){
        return view('proyecto.pasantias.edit', compact('tutori'), compact('especialidad'));
    }
    public function update_tutorin(Request $request, Tutor_institucional $tutori, Especialidade $especialidad){
        $request->validate([
            'nombres'=> 'required|max:50',
            'apellidos'=> 'required|max:50',
            'cedula'=> 'required|max:08',
            'email'=> 'required|max:100',
            'telefono'=> 'required|max:11',
            'nombre_especialidad' => 'required|max:20'
        ]);
        $tutori->update($request->all());
        $especialidad->update($request->all());
        return redirect()->route('index_pasantias');
    } 
    public function destroy_tutorin(Tutor_institucional $tutori, Especialidade $especialidad){
        $tutori->delete();
        $especialidad->delete();
        return redirect()->route('index_pasantias');
    }
}
