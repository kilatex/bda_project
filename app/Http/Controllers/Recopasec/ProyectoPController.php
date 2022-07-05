<?php

namespace App\Http\Controllers\Recopasec;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Recopasec\Proyecto_Pasantia;
use App\Models\Recopasec\Empresa;

class ProyectoPController extends Controller
{
    public function index(){
        $pasantias = Proyecto_Pasantia::orderBy('id')->paginate();
        return view('Pasantias.index', compact('pasantias'));
    }
    public function create(){
        return view('Pasantias.create');
    }
    public function store(Request $request){
        $request->validate([
            'codigo'=> 'required|max:50',
            'titulo'=> 'required|max:255',
            'fecha_inicio'=> 'required|max:12',
            'fecha_final'=> 'required|max:12',
        ]);
        $pasantia = new Proyecto_Pasantia();
        $pasantia->codigo = $request->codigo;
        $pasantia->titulo = $request->titulo;
        $pasantia->fecha_inico = $request->fecha_inicio;
        $pasantia->fecha_final = $request->fecha_final;
        $pasantia->save();
        return redirect()->route('tutors.create', $pasantia);
        
    }
    public function show(Proyecto_Pasantia $pasantia){
        return view('Pasantias.show', compact('pasantia'));
    }
    public function edit(Proyecto_Pasantia $pasantia){
        return view('Pasantias.edit', compact('pasantia'));
    }
    public function update(Request $request, Proyecto_Pasantia $pasantia){
        $pasantia->update($request->all());
        return view('Pasantias.show', compact('pasantia'));
    } 
    public function destroy(Proyecto_Pasantia $pasantia){
        $pasantia->delete();
        return redirect()->route('pasantias.index');
    }
    //Datos de la empresa
    public function create_empresa(){
        return view('proyectos.pasantias.empresa');
    }
    public function edit_empresa(Empresa $empresa){
        return view('proyectos.pasantias.edit', compact('empresa'));
    }
    public function update_empresa(Request $request, Empresa $empresa){
        $empresa->update($request->all());
        return view('empresa.show', compact('empresa'));
    } 
    public function destroy_empresa(Empresa $empresa){
        $empresa->delete();
        return redirect()->route('/estudiantes');
    }
}
