<?php

namespace App\Http\Controllers\Recopasec;
use App\Models\Recopasec\Tutor_academico;
use App\Models\Recopasec\Tutor_comunitario;
use App\Models\Recopasec\Tutor_institucional;
use App\Models\Recopasec\Estado;
use App\Models\Recopasec\Municipio;
use App\Models\Recopasec\Parroquia;
use App\Models\Recopasec\Direccione;
use App\Models\Recopasec\Cargo;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Recopasec\Empresa;
use App\Models\Sirecob\Tutor;

class TutorController extends Controller
{
    // Tutor Academico
    public function create_tutorac(){
        return view('tutores.tutor_ac.tutorac');
    }
    public function store_tutorac(Request $request){
        $request->validate([
            'cedula'=> 'required',
            'nombres'=> 'required|max:50',
            'apellidos' => 'required|max:50',
            'email'=> 'required',
            'condicion'=>'required',
            'telefono'=> 'required|max:12',
            'especialidad' => 'required',
        ]);
        $tutorac = new Tutor_academico();

        $tutorac->cedula = $request->cedula;
        $tutorac->nombres = $request->nombres;
        $tutorac->apellidos = $request->apellidos;
        $tutorac->email = $request->email;
        $tutorac->telefono = $request->telefono;
        $tutorac->condicion = $request->condicion;
        $tutorac->especialidad = $request->especialidad;
        $tutorac->save();
        return redirect()->route('home');
 
    }
    public function edit_tutorac(Tutor_academico $tutorcom){
        $user = \Auth::user();
        if($user->rol == 'USER_pasantias'){
            return redirect()->route('index_pasantias');
        }else if($user->rol == 'USER_serviciocom'){ 
            return redirect()->route('index_comunitario');
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
        $user = \Auth::user();
        if($user->rol == 'USER_pasantias'){
            return redirect()->route('index_pasantias');
        }else if($user->rol == 'USER_serviciocom'){ 
            return redirect()->route('index_comunitario');
        }        
    }
    public function verificar_cedulat(){
        return view('tutores.tutor_ac.buscartutor',
        [
            'tutorByCedula' => false,
            'tutorByEmail' => false,   
        ]);
    }

    public function verificar_tutor(Request $request){
        // Validar Formulario
        $validate = $this->validate($request,[
            'email' => 'required',
            'cedula' => 'required|min:7|max:9',
        ]);
        $cedula = $request->input('tipo_cedula').$request->input('cedula');
        $email = $request->input('email');
        $tutorByCedula = Tutor_academico::where('cedula', $cedula)->first();
        $tutorByEmail = Tutor_academico::where('email', $email)->first();

        if($tutorByCedula ||  $tutorByEmail){
            return view('tutores.tutor_ac.buscartutor', compact('tutorByCedula', 'tutorByEmail'));
        }else{
            return view('tutores.tutor_ac.tutorac', compact('cedula', 'email'));            
        }
        
        
    }

    //Tutor Comunitario
    public function create_tutorcom(){
        $estados = Estado::all();
        $municipios = Municipio::all();
        $parroquias = Parroquia::all();
        return view('tutores.tutor_com.tutorcom', compact('estados'), compact('municipios'), compact('parroquias'));
    }
    public function store_tutorcom(Request $request){
        $request->validate([
            'tipo_cedula'=>'required',
            'cedula'=> 'required|max:09',
            'nombres'=> 'required|max:50',
            'apellidos'=> 'required|max:50',
            'email'=> 'required|max:100',
            'telefono'=> 'required|max:12',
            'cargo' => 'required|max:100',
            'estado' => 'required',
            'municipio' => 'required',
            'parroquia' => 'required',
            'comunidad' => 'required|max:100',
            'consejo_comunal' => 'required|max:100',
        ]);
        $tutorco = new Tutor_comunitario();
        $direccion = new Direccione();
        $direccion->estado_id = $request->estado;
        $direccion->municipio_id = $request->municipio;
        $direccion->parroquia_id = $request->parroquia;
        $direccion->comunidad = $request->comunidad;
        $direccion->consejo_comunal = $request->consejo_comunal;
        $direccion->save();
        $tutorco->cedula = $request->tipo_cedula.$request->cedula;
        $tutorco->nombres = $request->nombres;
        $tutorco->apellidos = $request->apellidos;
        $tutorco->email = $request->email;
        $tutorco->telefono = $request->telefono;
        $tutorco->cargo = $request->cargo;
        $tutorco->direccion_id = $direccion->id;
        $tutorco->save();
        return view('proyectos.pasantias.pasantiascreate', compact('tutorco'));        
    }
    public function edit_tutorcom(Tutor_comunitario $tutorcom){
        return view('edit.pasantias', compact('tutorcom'), compact('direccion'));
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
}
