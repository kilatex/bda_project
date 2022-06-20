<?php

namespace App\Http\Controllers\Recopasec;
use App\Models\Recopasec\Tutor_Academico;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class TutorController extends Controller
{
    public function index(){
        $tutors = Tutor_Academico::orderBy('id')->paginate();
        return view('Pasantias.index', compact('tutors'));
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
    public function show(Tutor_Academico $tutor){
        return view('Pasantias.show', compact('tutor'));
    }
    public function edit(Tutor_Academico $tutorcom){
        return view('Pasantias.edit', compact('tutor'));
    }
    public function update(Request $request, Tutor_Academico $tutor){
        $tutor->update($request->all());
        return view('Pasantias.show', compact('tutor'));
    } 
    public function destroy(Tutor_Academico $tutor){
        $tutor->delete();
        return redirect()->route('pasantias.index');
    }
}
