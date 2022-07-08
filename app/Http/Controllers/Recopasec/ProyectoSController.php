<?php

namespace App\Http\Controllers\Recopasec;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Recopasec\Proyecto_comunitario;
use App\Models\Recopasec\Direccione;

class ProyectoSController extends Controller
{
    public function index_comunitario(){
        return view('proyectos.serviciocom.index');
    }
    public function create_comunitario(){
        return view('proyectos.serviciocom.serviciocomcreate');
    }
    public function store_comunitario(Request $request){
        $request->validate([
            'codigo'=> 'required|max:50',
            'titulo'=> 'required|max:255',
            'periodo'=> 'required',

        ]);
        $comunitario = new Proyecto_comunitario();
        $comunitario->codigo = $request->codigo;
        $comunitario->titulo = $request->titulo;
        $comunitario->periodo = $request->periodo;
        $comunitario->save();
        return redirect()->route('index_comunitario');
        
    }
    public function edit_comunitario(Proyecto_comunitario $comunitario){
        return view('proyecto.serviciocom.edit', compact('comunitario'));
    }
    public function update_comunitario(Request $request, Proyecto_comunitario $comunitario){
        $request->validate([
            'codigo'=> 'required|max:50',
            'titulo'=> 'required|max:255',
            'periodo'=> 'required',
        ]);
        $comunitario->update($request->all());
        return redirect()->route('comunitarios.show', $comunitario);    } 
    public function destroy_comunitario(Proyecto_comunitario $comunitario){
        $comunitario->delete();
        return redirect()->route('index_comunitario');
    }
    public function create_direccion(){
        return view('proyectos.serviciocom.comunidad');
    }
    public function store_direccion(Request $request){
        $request->validate([
            'estado'=> 'required',
            'municipio'=> 'required|max:50',
            'parroquia'=> 'required|max:50',
            'comunidad'=> 'required|max:50',
            'consejo_comunal'=> 'required|max:50'
        ]);
        $direccion = new Direccione();
        $direccion->estado = $request->estado;
        $direccion->municipio = $request->municipio;
        $direccion->parroquia = $request->parroquia;
        $direccion->comunidad = $request->comunidad;
        $direccion->consejo_comunal = $request->consejo_comunal;
        $direccion->save();
        return redirect()->route('index_comunitario', $direccion);
    }
    public function edit_direccion(Direccione $direccion){
        return view('proyecto.serviciocom.edit', compact('direccion'));
    }
    public function update_direccion(Request $request, Direccione $direccion){
        $request->validate([
            'estado'=> 'required',
            'municipio'=> 'required|max:50',
            'parroquia'=> 'required|max:50',
            'comunidad'=> 'required|max:50',
            'consejo_comunal'=> 'required|max:50'
        ]);
        $direccion->update($request->all());
        return redirect()->route('index_comunitario', $direccion);
    }
    public function destroy_direccion(Direccione $direccion){
        $direccion->delete();
        return redirect()->route('index_comunitario');
    }
}