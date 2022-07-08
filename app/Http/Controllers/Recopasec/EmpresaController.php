<?php

namespace App\Http\Controllers\Recopasec;
use App\Http\Controllers\Controller;
use App\Models\Recopasec\Empresa;
use App\Models\Recopasec\Estado;
use App\Models\Recopasec\Municipio;
use App\Models\Recopasec\Parroquia;
use Illuminate\Http\Request;

class EmpresaController extends Controller
{
    public function create_empresa(){
        return view('proyectos.pasantias.empresa');
    }
    public function store_empresa(Request $request){

        $request->validate([
            'rif'=>'required',
            'nombre'=> 'required|max:50',
            'email'=> 'required|max:100',
            'telefono'=> 'required|max:12',
            'nombre_estado'=>'required',
            'nombre_municipio'=>'required',
            'nombre_parroquia'=>'required'
        ]);
        $estado = new Estado();
        $estado->nombre_estado = $request->nombre;
        $estado->save();        
        $municipio = new Municipio();
        $municipio->nombre_municipio = $request->nombre;
        $municipio->save();
        $parroquia = new Parroquia();
        $parroquia->nombre_parroquia = $request->nombre;
        $parroquia->save();
        $empresa = new Empresa();
        $empresa->nombre = $request->nombre;
        $empresa->email = $request->email;
        $empresa->telefono = $request->telefono;
        $empresa->departamento = $request->departamento;
        $empresa->parroquia_id = $parroquia->id;
        $empresa->save();
        return redirect()->route('index_pasantias');
        
    }
    public function edit_empresa(Empresa $empresa){
        return view('proyectos.pasantias.edit', compact('empresa'));
    }
    public function update_empresa(Request $request, Empresa $empresa){
        $request->validate([
            'rif'=>'required',
            'nombre'=> 'required|max:50',
            'email'=> 'required|max:100',
            'telefono'=> 'required|max:12',
            'nombre_estado'=>'required',
            'nombre_municipio'=>'required',
            'nombre_parroquia'=>'required'
        ]);
        $empresa->update($request->all());
        return redirect()->route('index_pasantias');
    } 
    public function destroy_empresa(Empresa $empresa){
        $empresa->delete();
        return redirect()->route('index_pasantias');
    }
}
