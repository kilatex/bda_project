<?php

namespace App\Http\Controllers\Recopasec;
use App\Http\Controllers\Controller;
use App\Models\Recopasec\Empresa;
use App\Models\Recopasec\Estado;
use App\Models\Recopasec\Municipio;
use App\Models\Recopasec\Parroquia;
use Illuminate\Http\Request;
use App\Models\Recopasec\Direccione;

class EmpresaController extends Controller
{
    public function create_empresa(){
        $estados = Estado::all();
        $municipios = Municipio::all();
        $parroquias = Parroquia::all();
        return view('proyectos.empresa.empresa', compact('estados'), compact('municipios'), compact('parroquias'));
    }
    
    public function store_empresa(Request $request){

        $request->validate([
            'rif'=>'required|max:09|[0-9]+',
            'nombre'=> 'required|max:50',
            'email'=>'required',
            'telefono'=> 'required|max:12|integer',
            'estado'=>'required',
            'municipio'=>'required',
            'parroquia'=>'required',
        ]);
        $empresa = new Empresa();
        $empresa->rif= $request->rif;
        $empresa->nombre = $request->nombre;
        $empresa->email = $request->email;
        $empresa->telefono = $request->telefono;
        $empresa->departamento = $request->departamento;
        $empresa->save();
        $direccion = new Direccione();
        $direccion->estado_id = $request->estado;
        $direccion->municipio_id = $request->municipio;
        $direccion->parroquia_id = $request->parroquia;
        $direccion->save();
        return redirect()->route('create_pasantias');
        
    }
    public function edit_empresa(Empresa $empresa){
        return view('proyectos.pasantias.edit', compact('direccion'));
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
    public function verificar_rif(){
        return view('proyectos.empresa.buscarempresa',[
            'empresaByRif' => false,
            'empresaByEmail' => false,   
        ]);
    }

    public function verificar_empresa(Request $request){
        // Validar Formulario
        $validate = $this->validate($request,[
            'email' => 'required',
            'rif' => 'required|min:7|max:9',
        ]);
        $rif = 'J'.$request->input('rif');
        $email = $request->input('email');
        $empresaByRif = Empresa::where('rif', $rif)->first();
        $empresaByEmail = Empresa::where('email', $email)->first();

        if($empresaByRif ||  $empresaByEmail){
            return view('proyectos.empresa.buscarempresa',[
                'empresaByRif' => $empresaByRif,
                'empresaByEmail' => $empresaByEmail,                
            ]);
        }
        $estados = Estado::all();
        $municipios = Municipio::all();
        $parroquias = Parroquia::all();
        return view('proyectos.empresa.empresa', 
            compact('estados'), 
            compact('rif'),  
            compact('municipios'), 
            compact('parroquias'),
            compact('email'),
            [
            'rif' => $rif,
            'email' => $email,              
        ]);
              
    }
}
