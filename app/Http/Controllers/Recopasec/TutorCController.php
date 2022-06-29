<?php

namespace App\Http\Controllers;
use App\Models\Recopasec\Tutor_Comunitario;
use Illuminate\Http\Request;

class TutorCController extends Controller
{
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

        ]);
        $tutorcom = new Tutor_Comunitario();
        $tutorcom->nombres = $request->nombres;
        $tutorcom->apellidos = $request->apellidos;
        $tutorcom->cedula = $request->cedula;
        $tutorcom->email = $request->email;
        $tutorcom->telefono = $request->telefono;

        $tutorcom->save();
        return redirect()->route('tutorcoms.show', $tutorcom);
        
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
