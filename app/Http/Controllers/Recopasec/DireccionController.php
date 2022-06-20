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
            'estado'=> 'required|max:20',
            'municipio'=> 'required|max:50',
            'parroquia'=> 'required|max:50',
            'comunidad'=> 'required|max:50',
            'consejo_comunal'=> 'required|max:50',

        ]);
        $direccion = new Direccione();
        $direccion->estado = $request->estado;
        $direccion->municipio = $request->municipio;
        $direccion->parroquia = $request->parroqui;
        $direccion->comunidad = $request->comunidad;
        $direccion->consejo_comunal = $request->consejo_comunal;
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
