<?php

namespace App\Http\Controllers\Recopasec;
use App\Http\Controllers\Controller;
use App\Models\Recopasec\Empresa;
use App\Models\Recopasec\Direccione;
use Illuminate\Http\Request;

class EmpresaController extends Controller
{
    public function index(){
        $pasantias = Empresa::orderBy('id')->paginate();
        return view('proyectos.pasantias.empresa', compact('empresas'));
    }
    public function create(){
        return view('proyectos.pasantias.empresa');
    }
    public function store(Request $request){
        $request->validate([
            'nombre'=> 'required|max:50',
            'email'=> 'required|max:100',
            'telefono'=> 'required|max:12',
            'estado'=>'required',
            'municipio'=>'required|max:20',
            'parroquia'=>'required|max:50'
        ]);
        $empresa = new Empresa();
        $empresa->nombre = $request->nombre;
        $empresa->email = $request->email;
        $empresa->telefon = $request->telefono;
        $empresa->save();
        $direccion = new Direccione();
        $direccion->estado = $request->estado;
        $direccion->municipio = $request->municipio;
        $direccion->parroquia = $request->parroquia;
        $direccion->save();
        return redirect()->route('/estudiantes');
        
    }
    public function show(Empresa $empresa){
        return view('empresas.show', compact('empresa'));
    }
    public function edit(Empresa $empresa){
        return view('proyectos.pasantias.edit', compact('empresa'));
    }
    public function update(Request $request, Empresa $empresa){
        $empresa->update($request->all());
        return view('empresa.show', compact('empresa'));
    } 
    public function destroy(Empresa $empresa){
        $empresa->delete();
        return redirect()->route('/estudiantes');
    }
}
