<?php

namespace App\Http\Controllers\Recopasec;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Recopasec\Direccione;

class DireccionController extends Controller
{
    public function index(){
        $pasantias = Direccione::orderBy('id')->paginate();
        return view('Pasantias.index', compact('direcciones'));
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
        $direccion = new Direccione();
        $direccion->codigo = $request->codigo;
        $direccion->titulo = $request->titulo;
        $direccion->fecha_inico = $request->fecha_inicio;
        $direccion->fecha_final = $request->fecha_final;
        $direccion->save();
        return redirect()->route('direcciones.show', $direccion);
        
    }
    public function show(Direccione $direccion){
        return view('Pasantias.show', compact('direccion'));
    }
    public function edit(Direccione $direccion){
        return view('Pasantias.edit', compact('direccion'));
    }
    public function update(Request $request, Direccione $direccion){
        $direccion->update($request->all());
        return view('Pasantias.show', compact('direccion'));
    } 
    public function destroy(Direccione $direccion){
        $direccion->delete();
        return redirect()->route('direcciones.index');
    }

}
