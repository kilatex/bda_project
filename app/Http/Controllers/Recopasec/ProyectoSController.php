<?php

namespace App\Http\Controllers\Recopasec;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Recopasec\Comunidade;
use App\Models\Recopasec\Consejo_comunale;
use App\Models\Recopasec\Proyecto_comunitario;
use App\Models\Recopasec\Estado;
use App\Models\Recopasec\Municipio;
use App\Models\Recopasec\Parroquia;

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
            'codigo'=> 'required|max:06',
            'titulo'=> 'required|max:255',
            'periodo'=> 'required',
        ]);

        $comunitario = new Proyecto_comunitario();
        $comunitario->codigo = $request->codigo;
        $comunitario->titulo = $request->titulo;
        $comunitario->periodo = $request->periodo;
        $comunitario->save();
        return view('proyecto.serviciocom.agregar');
    }
    public function edit_comunitario(Proyecto_comunitario $comunitario){
        return view('proyecto.serviciocom.edit', compact('comunitario'));
    }
    public function update_comunitario(Request $request, Proyecto_comunitario $comunitario){
        $request->validate([
            'codigo'=> 'required|max:06',
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
        $estados = Estado::all();
        $municipios = Municipio::all();
        $parroquias = Parroquia::all();
        $comunidades = Comunidade::all();
        $consejo_comunales = Consejo_comunale::all();
        return view('proyectos.serviciocom.comunidad', compact('estados'), compact('municipios'), compact('parroquias'), compact('comunidades'), compact('consejo_comunales'));
    }
    public function store_direccion(Request $request){
        $request->validate([
            'estado' => 'required',
            'municipio' => 'required',
            'parroquia' => 'required',
            'comunidad' => 'required',
            'consejo_comunal' => 'required'
        ]);
        $estado = new Estado();
        $estado->estado = $request->nombre;
        $estado -> save();
        $municipio = new Municipio();
        $municipio->municipio = $request->nombre;
        $municipio -> save();
        $parroquia = new Parroquia();
        $parroquia->parroquia = $request->nombre;
        $parroquia -> save();
        $comunidad = new Comunidade();
        $comunidad->omunidad = $request->nombre;
        $comunidad -> save();
        $consejo_comunal = new Consejo_comunale();
        $consejo_comunal->consejo_comunal = $request->nombre;
        $consejo_comunal -> save();
       
        return view('proyectos.serviciocom.serviciocomcreate', compact('estado'), compact('municipio'), compact('parroquia'));
    }
    public function edit_direccion(Estado $estado, Municipio $municipio, Parroquia $parroquia, Comunidade $comunidad, Consejo_comunale $consejo_comunal){
        return view('proyecto.serviciocom.edit', compact('estado'), compact('municipio'), compact('parroquia'), compact('comunidad'), compact('consejo_comunal'));
    }
    public function update_direccion(Request $request, Estado $estado, Municipio $municipio, Parroquia $parroquia, Comunidade $comunidad, Consejo_comunale $consejo_comunal){
        $request->validate([
            'nombre_estado' => 'required',
            'nombre_municipio' => 'required',
            'nombre_parroquia' => 'required',
            'nombre_comunidad' => 'required',
            'nombre_consejo_comunal' => 'required'
        ]);
        $estado->update($request->all());
        $municipio->update($request->all());
        $parroquia->update($request->all());
        $comunidad->update($request->all());
        $consejo_comunal->update($request->all());
        return redirect()->route('index_comunitario', $estado, $municipio, $parroquia, $comunidad, $consejo_comunal);
    }
    public function destroy_direccion(Estado $estado, Municipio $municipio, Parroquia $parroquia, Comunidade $comunidad, Consejo_comunale $consejo_comunal){
        $estado->delete();
        $municipio->delete();
        $parroquia->delete();
        $comunidad->delete();
        $consejo_comunal->delete();
        return redirect()->route('index_comunitario');
    }
    public function agregar_estudiante(){

    }
}