<?php

namespace App\Http\Controllers\Recopasec;
use App\Models\Recopasec\Tutor_Academico;
use App\Models\Recopasec\Tutor_Comunitario;
use App\Models\Recopasec\Tutor_Institucional;
use App\Models\Recopasec\Direccione;
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
        $tutor = new Tutor_Academico();
        $tutor->nombres = $request->nombres;
        $tutor->apellidos = $request->apellidos;
        $tutor->cedula = $request->cedula;
        $tutor->email = $request->email;
        $tutor->telefono = $request->telefono;

        $tutor->save();
        return redirect()->route('carrerass.show', $tutor);
        
    }
    public function show_tutorac(Tutor_Academico $tutor){
        return view('Pasantias.show', compact('tutor'));
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
    public function index(){
        $tutorcoms = Tutor_Comunitario::orderBy('id')->paginate();
        return view('Pasantias.index', compact('tutorcoms'));
    }
    public function create(){
        return view('Pasantias.create');
    }
    public function store(Request $request){
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
        return redirect()->route('tutorcoms.show', $tutorcom);
        $direccion = new Direccione();
        $direccion->estado = $request->estado;
        $direccion->municipio = $request->municipio;
        $direccion->parroquia = $request->parroquia;
        $direccion -> save();
        
        
    }
    public function show(Tutor_Comunitario $tutorcom){
        return view('Pasantias.show', compact('tutorcom'));
    }
    public function edit(Tutor_Comunitario $tutorcom){
        return view('Pasantias.edit', compact('tutorcom'));
    }
    public function update(Request $request, Tutor_Comunitario $tutorcom){
        $tutorcom->update($request->all());
        return view('Pasantias.show', compact('tutorcom'));
    } 
    public function destroy(Tutor_Comunitario $tutorcom){
        $tutorcom->delete();
        return redirect()->route('tutorcoms.index');
    }
}
