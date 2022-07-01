<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Proyecto_Comunitario;
class ProyectoSController extends Controller
{
    public function index(){
        $pasantias = Proyecto_Comunitario::orderBy('id')->paginate();
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
        $comunitario = new Proyecto_comunitario();
        $comunitario->codigo = $request->codigo;
        $comunitario->titulo = $request->titulo;
        $comunitario->fecha_inico = $request->fecha_inicio;
        $comunitario->fecha_final = $request->fecha_final;
        $comunitario->save();
        return redirect()->route('comunitarios.show', $comunitario);
        
    }
    public function show(Proyecto_Comunitario $comunitario){
        return view('Pasantias.show', compact('comunitario'));
    }
    public function edit(Proyecto_Comunitario $comunitario){
        return view('Pasantias.edit', compact('comunitario'));
    }
    public function update(Request $request, Proyecto_Comunitario $comunitario){
        $comunitario->update($request->all());
        return view('Pasantias.show', compact('comunitario'));
    } 
    public function destroy(Proyecto_Comunitario $comunitario){
        $comunitario->delete();
        return redirect()->route('comunitarios.index');
    }
}
