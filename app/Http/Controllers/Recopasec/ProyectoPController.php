<?php

namespace App\Http\Controllers\Recopasec;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Recopasec\Proyecto_Pasantia;

class ProyectoPController extends Controller
{
    public function index_pasantias(){
        return view('proyectos.pasantias.index');
    }
    public function create_pasantias(){
        return view('proyectos.pasantias.pasantiascreate');
    }
    public function store_pasantias(Request $request){
        $request->validate([
            'codigo'=> 'required|max:06',
            'titulo'=> 'required|max:255',
            'periodo'=> 'required',
        ]);
        $pasantia = new Proyecto_pasantia();
        $pasantia->codigo = $request->codigo;
        $pasantia->titulo = $request->titulo;
        $pasantia->periodo = $request->periodo;
        $pasantia->save();
        return redirect()->route('index_pasantias');
        
    }
    public function edit_pasantias(Proyecto_pasantia $pasantia){
        return view('proyecto.pasantias.edit', compact('pasantia'));
    }
    public function update_pasantias(Request $request, Proyecto_pasantia $pasantia){
        $request->validate([
            'codigo'=> 'required|max:06',
            'titulo'=> 'required|max:255',
            'periodo'=> 'required',
        ]);
        $pasantia->update($request->all());
        return redirect()->route('index_pasantias');
    } 
    public function destroy_pasantias(Proyecto_pasantia $pasantia){
        $pasantia->delete();
        return redirect()->route('index_pasantias');
    }
}
