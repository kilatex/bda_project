<?php

namespace App\Http\Controllers\Recopasec;
use App\Models\Recopasec\Tutor_academico;
use App\Models\Recopasec\Tutor_comunitario;
use App\Models\Recopasec\Tutor_institucional;
use App\Models\Recopasec\Direccione;
use App\Models\Recopasec\Cargo;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Sirecob\Tutor;

class TutorController extends Controller
{
    // Tutor Academico
    public function create_tutorac(){
        $tutoresin = Tutor_institucional::all();
        return view('tutores.tutor_ac.tutorac', compact('tutoresin'));
    }
    public function store_tutorac(Request $request){
        $request->validate([
            'tipo_cedula'=>'required',
            'cedula'=> 'required|max:09',
            'nombres'=> 'required|max:50',
            'apellidos'=> 'required|max:50',
            'email'=> 'required|max:100',
            'condicion'=>'required',
            'telefono'=> 'required|max:12',
            'especialidad' => 'required',
        ]);
        $tutorac = new Tutor_academico();

        $tutorac->cedula = $request->tipo_cedula.$request->cedula;
        $tutorac->nombres = $request->nombres;
        $tutorac->apellidos = $request->apellidos;
        $tutorac->email = $request->email;
        $tutorac->telefono = $request->telefono;
        $tutorac->condicion = $request->condicion;
        $tutorac->especialidad = $request->especialidad;
        $tutorac->save();

                
        return redirect()->route('create_pasantias', compact('tutorac'));    
    }
    public function create_tutoracom(){
        return view('tutores.tutor_ac.tutoracom');
    }
    public function store_tutoracom(Request $request){
        $request->validate([
            'tipo_cedula'=>'required',
            'cedula'=> 'required|integer',
            'nombres'=> 'required|max:50',
            'apellidos'=> 'required|max:50',
            'email'=> 'required|max:100',
            'telefono'=> 'required|max:12',
            'especialidad' => 'required',
        ]);
        $tutor = new Tutor_academico();

            $tutor->cedula = $request->tipo_cedula.$request->cedula;
            $tutor->nombres = $request->nombres;
            $tutor->apellidos = $request->apellidos;
            $tutor->email = $request->email;
            $tutor->telefono = $request->telefono;
            $tutor->especialidad = $request->especialidad;      
            $tutor->save();
            return redirect()->route('create_comunitario');    
        }
    public function edit_tutorac(Tutor_academico $tutorcom){
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
            'cedula'=> 'required|max:09',
            'email'=> 'required|max:100',
            'telefono'=> 'required|max:12',
            'especialidad' => 'required|max:100'
        ]);
        $tutor->update($request->all());
        $user = \Auth::user();
        if($user->rol == 'USER_pasantias'){
            return redirect()->route('index_pasantias');
        }else if($user->rol == 'USER_serviciocom'){ 
            return redirect()->route('index_comunitario');
        }    
    } 
    public function destroy_tutorac(Tutor_academico $tutor){
        $tutor->delete();
        return redirect()->route('index_pasantias');
    }

    //Tutor Comunitario
    public function create_tutorcom(){
        $direcciones = Direccione::all();
        return view('tutores.tutor_com.tutorcom', compact('direcciones'));
    }
    public function store_tutorcom(Request $request){
        $request->validate([
            'tipo_cedula'=>'required',
            'cedula'=> 'required|max:09',
            'nombres'=> 'required|max:50',
            'apellidos'=> 'required|max:50',
            'email'=> 'required|max:100',
            'telefono'=> 'required|max:12',
            'cargo' => 'required|max:100'
        ]);
        $tutorco = new Tutor_comunitario();

        $tutorco->cedula = $request->tipo_cedula.$request->cedula;
        $tutorco->nombres = $request->nombres;
        $tutorco->apellidos = $request->apellidos;
        $tutorco->email = $request->email;
        $tutorco->telefono = $request->telefono;
        $tutorco->cargo = $request->cargo;
        $tutorco->save();
        return redirect()->route('create_tutoracom', compact('tutorco'));        
    }
    public function edit_tutorcom(Tutor_comunitario $tutorcom){
        return view('Pasantias.edit', compact('tutorcom'), compact('direccion'), compact('cargo'));
    }
    public function update_tutorcom(Request $request, Tutor_comunitario $tutorcom){
        $request->validate([
            'nombres'=> 'required|max:50',
            'apellidos'=> 'required|max:50',
            'cedula'=> 'required|max:10',
            'email'=> 'required|max:100',
            'telefono'=> 'required|max:12',
            'cargo' => 'required|max:100'
        ]);
        $tutorcom->update($request->all());
        return redirect()->route('index_comunitario');
    } 
    public function destroy_tutorcom(Tutor_comunitario $tutorcom){
        $tutorcom->delete();
        return redirect()->route('index_comunitario');
    }

    //Tutor Institucional
    public function create_tutorin(){
        return view('tutores.tutor_ins.tutorin', [
            'empresaByRif' => false,
            'empresaByNombre' => false,
        ]);
    }
    public function store_tutorin(Request $request){
        $request->validate([
            'nombres'=> 'required|max:50',
            'apellidos'=> 'required|max:50',
            'tipo_cedula'=>'required',
            'cedula'=> 'required|max:08',
            'email'=> 'required|max:100',
            'telefono'=> 'required|max:12',
            'especialidad' => 'required|max:100'
        ]);

        $tutori= new Tutor_institucional();
        $tutori->nombres = $request->nombres;
        $tutori->apellidos = $request->apellidos;
        $tutori->cedula = $request->tipo_cedula .$request->cedula;
        $tutori->email = $request->email;
        $tutori->telefono = $request->telefono;
        $tutori->especialidad = $request->especialidad;
        $tutori->save();
        return redirect()->route('create_tutorac', compact('tutori'));
    }
    public function edit_tutorin(Tutor_institucional $tutori){
        return view('proyecto.pasantias.edit', compact('tutori'));
    }
    public function update_tutorin(Request $request, Tutor_institucional $tutori){
        $request->validate([
            'nombres'=> 'required|max:50',
            'apellidos'=> 'required|max:50',
            'cedula'=> 'required|max:08',
            'email'=> 'required|max:100',
            'telefono'=> 'required|max:11',
            'especialidad' => 'required|max:20'
        ]);
        $tutori->update($request->all());
        return redirect()->route('index_pasantias');
    } 
    public function destroy_tutorin(Tutor_institucional $tutori){
        $tutori->delete();
        return redirect()->route('index_pasantias');
    }
}
