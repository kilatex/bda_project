<?php

namespace App\Http\Controllers;
use App\Models\Empresa;
use Illuminate\Http\Request;

class EmpresaController extends Controller
{
    public function index(){
        $pasantias = Empresa::orderBy('id')->paginate();
        return view('Pasantias.index', compact('empresas'));
    }
    public function create(){
        return view('Pasantias.create');
    }
    public function store(Request $request){
        $request->validate([
            'nombre'=> 'required|max:50',
            'email'=> 'required|max:100',
            'telefono'=> 'required|max:12',
            'departamento'=> 'required|max:20',

        ]);
        $empresa = new Empresa();
        $empresa->codigo = $request->codigo;
        $empresa->titulo = $request->titulo;
        $empresa->fecha_inico = $request->fecha_inicio;
        $empresa->fecha_final = $request->fecha_final;
        $empresa->save();
        return redirect()->route('pasantias.show', $empresa);
        
    }
    public function show(Empresa $empresa){
        return view('Pasantias.show', compact('empresa'));
    }
    public function edit(Empresa $empresa){
        return view('Pasantias.edit', compact('empresa'));
    }
    public function update(Request $request, Empresa $empresa){
        $empresa->update($request->all());
        return view('Pasantias.show', compact('empresa'));
    } 
    public function destroy(Empresa $empresa){
        $empresa->delete();
        return redirect()->route('pasantias.index');
    }
}
