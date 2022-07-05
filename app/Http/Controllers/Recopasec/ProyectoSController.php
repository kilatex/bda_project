<?php

namespace App\Http\Controllers\Recopasec;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Recopasec\Proyecto_Comunitario;
class ProyectoSController extends Controller
{
    public function index_comunitario(){
        $pasantias = Proyecto_Comunitario::orderBy('id')->paginate();
        return view('comunitarios.index');
    }
    public function create_comunitario(){
        return view('comunitarios.create');
    }
    public function store_comunitario(Request $request){
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
    public function show_comunitario(Proyecto_Comunitario $comunitario){
        return view('Pasantias.show', compact('comunitario'));
    }
    public function edit_comunitario(Proyecto_Comunitario $comunitario){
        return view('Pasantias.edit', compact('comunitario'));
    }
    public function update_comunitario(Request $request, Proyecto_Comunitario $comunitario){
        $comunitario->update($request->all());
        return view('Pasantias.show', compact('comunitario'));
    } 
    public function destroy_comunitario(Proyecto_Comunitario $comunitario){
        $comunitario->delete();
        return redirect()->route('comunitarios.index');
    }
}
