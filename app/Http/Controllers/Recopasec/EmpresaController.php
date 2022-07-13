<?php

namespace App\Http\Controllers\Recopasec;
use App\Http\Controllers\Controller;
use App\Models\Recopasec\Empresa;
use App\Models\Recopasec\Estado;
use App\Models\Recopasec\Municipio;
use App\Models\Recopasec\Parroquia;
use Illuminate\Http\Request;
use App\Models\Recopasec\Direccione;
use App\Models\Recopasec\Tutor_institucional;
use Illuminate\Support\Facades\DB;

class EmpresaController extends Controller
{
    public function create_empresa(Request $request){
        return view('proyectos.empresa.empresa');
    }
    
    public function store_empresa(Request $request){
        $request->validate([
            'rif'=>'required',
            'nombre'=> 'required|max:50',
            'email'=>'required',
            'telefono'=> 'required|max:12',
            'departamento'=>'required',
            'estado'=>'required',
            'municipio'=>'required',
            'parroquia'=>'required',
            'nombres'=> 'required|max:50',
            'apellidos'=> 'required|max:50',
            'tipo_cedula'=>'required',
            'cedula'=> 'required|max:08',
            'email_tu'=> 'required|max:100',
            'telefono_tu'=> 'required|max:12',
            'especialidad' => 'required|max:100'
        ]);
        $direccion = new Direccione();
        $direccion->estado_id = $request->estado;
        $direccion->municipio_id = $request->municipio;
        $direccion->parroquia_id = $request->parroquia;
        $direccion->save();
        $empresa = new Empresa();
        $empresa->rif= $request->rif;
        $empresa->nombre = $request->nombre;
        $empresa->email = $request->email;
        $empresa->telefono = $request->telefono;
        $empresa->departamento = $request->departamento;
        $empresa->direccion_id = $direccion->id;
        $empresa->save();
        $tutori= new Tutor_institucional();
        $tutori->nombres = $request->nombres;
        $tutori->apellidos = $request->apellidos;
        $tutori->cedula = $request->tipo_cedula .$request->cedula;
        $tutori->email = $request->email_tu;
        $tutori->telefono = $request->telefono_tu;
        $tutori->especialidad = $request->especialidad;
        $tutori->empresa_id = $empresa->id;
        $tutori->save();

        return redirect()->route('index_pasantias');
        
    }
    public function edit_empresa(Empresa $empresa){
        return view('proyectos.pasantias.edit', compact('direccion'));
    }
    public function update_empresa(Request $request, Empresa $empresa, Tutor_institucional $tutori){
        $request->validate([
            'rif'=>'required',
            'nombre'=> 'required|max:50',
            'email'=> 'required|max:100',
            'telefono'=> 'required|max:12',
            'estados'=>'required',
            'municipios'=>'required',
            'parroquias'=>'required',
            'nombres'=> 'required|max:50',
            'apellidos'=> 'required|max:50',
            'tipo_cedula'=>'required',
            'cedula'=> 'required|max:08',
            'email_tu'=> 'required|max:100',
            'telefono_tu'=> 'required|max:12',
            'especialidad' => 'required|max:100'
        ]);
        $tutori->update($request->all());
        $empresa->update($request->all());
        return redirect()->route('index_pasantias');
    } 
    public function destroy_empresa(Empresa $empresa, Tutor_institucional $tutori){
        $tutori->delete();

        $empresa->delete();
        return redirect()->route('index_pasantias');
    }
    public function verificar_rif(){
        return view('proyectos.empresa.buscarempresa',
        [
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
            return view('proyectos.empresa.buscarempresa', compact('empresaByRif', 'empresaByEmail'));

        }else{
            $estados = Estado::all();
            $municipios = Municipio::all();
            $parroquias = Parroquia::all();
            
            return view('proyectos.empresa.empresa', 
                compact('estados', 'rif', 'municipios', 'parroquias','email')
            );
        }
        
    }
}
