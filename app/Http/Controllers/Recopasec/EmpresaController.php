<?php

namespace App\Http\Controllers\Recopasec;
use App\Http\Controllers\Controller;
use App\Models\Recopasec\Empresa;
use App\Models\Recopasec\Direccione;
use Illuminate\Http\Request;

class EmpresaController extends Controller
{
    public function create_empresa(){
        return view('proyectos.pasantias.empresa');
    }
    public function store_empresa(Request $request){

        $request->validate([
            'nombre'=> 'required|max:50',
            'email'=> 'required|max:100',
            'telefono'=> 'required|max:12',
            'estado'=>'required',
            'municipio'=>'required|max:20',
            'parroquia'=>'required|max:50'
        ]);
        $direccion = new Direccione();
        $direccion->estado = $request->estado;
        $direccion->municipio = $request->municipio;
        $direccion->parroquia = $request->parroquia;
        $direccion->save();
        $empresa = new Empresa();
        $empresa->nombre = $request->nombre;
        $empresa->email = $request->email;
        $empresa->telefono = $request->telefono;
        $empresa->departamento = $request->departamento;
        $empresa->direccion_id = $direccion->id;
        $empresa->save();
        return redirect()->route('index_pasantias');
        
    }
    public function edit_empresa(Empresa $empresa){
        return view('proyectos.pasantias.edit', compact('empresa'));
    }
    public function update_empresa(Request $request, Empresa $empresa){
        $empresa->update($request->all());
        return redirect()->route('index_pasantias');
    } 
    public function destroy_empresa(Empresa $empresa){
        $empresa->delete();
        return redirect()->route('/estudiantes');
    }
}
