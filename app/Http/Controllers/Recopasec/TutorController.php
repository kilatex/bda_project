<?php

namespace App\Http\Controllers\Recopasec;
use App\Models\Recopasec\Tutor_Academico;
use App\Models\Recopasec\Tutor_Comunitario;
use App\Models\Recopasec\Tutor_Institucional;
use App\Models\Recopasec\Direccione;
use App\Models\Recopasec\Empresa;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class TutorController extends Controller
{
    public function create_tutorac(){
        return view('Pasantias.create');
    }
    public function store_tutorac(Request $request){
        $request->validate([
            'nombres'=> 'required|max:50',
            'apellidos'=> 'required|max:50',
            'cedula'=> 'required|max:10',
            'email'=> 'required|max:100',
            'telefono'=> 'required|max:12',
        ]);
        $tutorac = new Tutor_Academico();
        $tutorac->nombres = $request->nombres;
        $tutorac->apellidos = $request->apellidos;
        $tutorac->cedula = $request->cedula;
        $tutorac->email = $request->email;
        $tutorac->telefono = $request->telefono;

        $tutorac->save();
        return redirect()->route('/estudiantes');
    }
    public function edit_tutorac(Tutor_Academico $tutorcom){
        return view('Pasantias.edit', compact('tutor'));
    }
    public function update_tutorac(Request $request, Tutor_Academico $tutor){
        $tutor->update($request->all());
        return view('Pasantias.show', compact('tutor'));
    } 
    public function destroy_tutorac(Tutor_Academico $tutor){
        $tutor->delete();
        return redirect()->route('pasantias.index');
    }
    public function create_tutorcom(){
        return view('Pasantias.create');
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
            'parroquia'=> 'required|max:100'
        ]);
        $tutorcom = new Tutor_Comunitario();
        $tutorcom->nombres = $request->nombres;
        $tutorcom->apellidos = $request->apellidos;
        $tutorcom->cedula = $request->cedula;
        $tutorcom->email = $request->email;
        $tutorcom->telefono = $request->telefono;
        $tutorcom->save();
        $direccion = new Direccione();
        $direccion->estado = $request->estado;
        $direccion->municipio = $request->municipio;
        $direccion->parroquia = $request->parroquia;
        $direccion -> save();
        return redirect()->route('/estudiantes');
        
    }
    public function edit_tutorcom(Tutor_Comunitario $tutorcom){
        return view('Pasantias.edit', compact('tutorcom'));
    }
    public function update_tutorcom(Request $request, Tutor_Comunitario $tutorcom){
        $tutorcom->update($request->all());
        return view('Pasantias.show', compact('tutorcom'));
    } 
    public function destroy_tutorcom(Tutor_Comunitario $tutorcom){
        $tutorcom->delete();
        return redirect()->route('tutorcoms.index');
    }
    public function create_tutorin(){
        return view('Pasantias.create');
    }
    public function store_tutorin(Request $request){
        $request->validate([
            'nombres'=> 'required|max:50',
            'apellidos'=> 'required|max:50',
            'cedula'=> 'required|max:10',
            'email'=> 'required|max:100',
            'telefono'=> 'required|max:12',
            'nombre_empresa'=> 'required|max:50',
            'email_empresa'=> 'required|max:100',
            'telefono_empresa'=> 'required|max:12',
            'estado'=>'required',
            'municipio'=>'required|max:20',
            'parroquia'=>'required|max:50'
        ]);
        $empresa = new Empresa();
        $empresa->nombre = $request->nombre_empresa;
        $empresa->email = $request->email_empresa;
        $empresa->telefon = $request->telefono_empresa;
        $empresa->save();
        $direccion = new Direccione();
        $direccion->estado = $request->estado;
        $direccion->municipio = $request->municipio;
        $direccion->parroquia = $request->parroquia;
        $direccion->save();
        $tutori= new Tutor_Institucional();
        $tutori->nombres = $request->nombres;
        $tutori->apellidos = $request->apellidos;
        $tutori->cedula = $request->cedula;
        $tutori->email = $request->email;
        $tutori->telefono = $request->telefono;
        $tutori->save();
        return redirect()->route('/estudiantes', $tutori);
    }
    public function edit_tutorin(Tutor_Institucional $tutori){
        return view('Pasantias.edit', compact('tutori'));
    }
    public function update_tutorin(Request $request, Tutor_Institucional $tutori){
        $tutori->update($request->all());
        return view('Pasantias.show', compact('tutori'));
    } 
    public function destroy_tutorin(Tutor_Institucional $tutori){
        $tutori->delete();
        return redirect()->route('tutoris.index');
    }
}
