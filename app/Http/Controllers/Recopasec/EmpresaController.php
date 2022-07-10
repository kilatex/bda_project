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
        $estados = Estado::all();
        $municipios = Municipio::all();
        $parroquias = Parroquia::all();
        return view('proyectos.pasantias.empresa', compact('estados'), compact('municipios'));
    }
    
    public function store_empresa(Request $request){

        $request->validate([
            'rif'=>'required|max:09',
            'nombre'=> 'required|max:50',
            'email'=> 'required|max:100',
            'telefono'=> 'required|max:12|integer',
            'estado'=>'required',
            'municipio'=>'required',
            'parroquia'=>'required',
        ]);
        $empresa = new Empresa();
        $empresa->nombre = $request->nombre;
        $empresa->email = $request->email;
        $empresa->telefono = $request->telefono;
        $empresa->departamento = $request->departamento;
        $empresa->save();
        $estado = new Estado();
        $estado->estado = $request -> nombre;
        $estado->save();
        $municipio = new Municipio();
        $municipio->municipio = $request->nombre;
        $municipio->save();
        $parroquia = new Parroquia();
        $parroquia->parroquia = $request->nombre;
        $parroquia->save();
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
            'estado'=>'required',
            'municipio'=>'required',
            'parroquia'=>'required',
        ]);
        $empresa->update($request->all());
        return redirect()->route('index_pasantias');
    } 
    public function destroy_empresa(Empresa $empresa){
        $empresa->delete();
        return redirect()->route('index_pasantias');
    }
}
