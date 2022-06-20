<?php

namespace App\Http\Controllers\Recopasec;
use App\Models\Recopasec\Tutor_Institucional;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class TutorIController extends Controller
{
    public function index(){
        $tutoris = Tutor_Institucional::orderBy('id')->paginate();
        return view('Pasantias.index', compact('tutoris'));
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
        $tutori= new Tutor_Institucional();
        $tutori->nombres = $request->nombres;
        $tutori->apellidos = $request->apellidos;
        $tutori->cedula = $request->cedula;
        $tutori->email = $request->email;
        $tutori->telefono = $request->telefono;

        $tutori->save();
        return redirect()->route('tutoris.show', $tutori);
        
    }
    public function show(Tutor_Institucional $tutori){
        return view('Pasantias.show', compact('tutori'));
    }
    public function edit(Tutor_Institucional $tutori){
        return view('Pasantias.edit', compact('tutori'));
    }
    public function update(Request $request, Tutor_Institucional $tutori){
        $tutori->update($request->all());
        return view('Pasantias.show', compact('tutori'));
    } 
    public function destroy(Tutor_Institucional $tutori){
        $tutori->delete();
        return redirect()->route('tutoris.index');
    }
}
