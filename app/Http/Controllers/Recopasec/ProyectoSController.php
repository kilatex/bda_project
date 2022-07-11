<?php

namespace App\Http\Controllers\Recopasec;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Estudiante;
use App\Models\Recopasec\Comunidade;
use App\Models\Recopasec\Consejo_comunale;
use App\Models\Recopasec\Direccione;
use App\Models\Recopasec\Proyecto_comunitario;
use App\Models\Recopasec\Estado;
use App\Models\Recopasec\Municipio;
use App\Models\Recopasec\Parroquia;
use PDF;

class ProyectoSController extends Controller
{
    public function index_comunitario(){
        return view('proyectos.serviciocom.index');
    }
    public function create_comunitario(){
        
        return view('proyectos.serviciocom.serviciocomcreate');
    }
    public function store_comunitario(Request $request){
        $comunitario = new Proyecto_comunitario();
        $request->validate([
            'n-codigo' => 'required',
            'n-periodo'=>'required',
            'codigo'=> 'required|max:03',
            'titulo'=> 'required|max:255',
            'periodo'=> 'required',
        ]);
        //Recoger Datos del Usuario
        $codigo = $request->input('n-codigo').'-'.$request->input('codigo');
        $titulo = $request->input('titulo');
        $periodo = $request->input('n-periodo').'-'.$request->input('periodo');
        if($codigo && $titulo && $periodo){
            $comunitario->codigo = $codigo;
            $comunitario->titulo = $titulo;
            $comunitario->periodo = $periodo;
            $comunitario->save();
                 
        return view('proyectos.serviciocom.agregar', compact('comunitario'));
        }else{
            $message = 'Registro incorrecto, por favor rellena bien los campos ';
            return view('proyectos.serviciocom.serviciocomcreate',[
                'message' => $message
            ]
            );
        }
   
    }
    public function profile_pa($id = null){   
        //VALIDATE ROUTE PROFILE
        $user = Estudiante::where('id',$id)->first();
        $comunitario = Proyecto_comunitario::where('estudiante_id', $id)->first();

        return view('proyectos.serviciocom.proyectoServ', compact('user'), compact('comunitario'));

    }
    public function edit_comunitario(Proyecto_comunitario $comunitario){
        return view('proyectos.serviciocom.edit', compact('comunitario'));
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
        return view('proyectos.serviciocom.comunidad', compact('estados'), compact('municipios'), compact('parroquias'));
    }
    public function store_direccion(Request $request){
        $request->validate([
            'estado' => 'required',
            'municipio' => 'required',
            'parroquia' => 'required',
            'comunidad' => 'required',
            'consejo_comunal' => 'required',
        ]);
        $direccion = new Direccione();
        $direccion->estado_id = $request->estado;
        $direccion->municipio_id = $request->municipio;
        $direccion->parroquia_id = $request->parroquia;
        $direccion->comunidad_id = $request->comunidad;
        $direccion->consejo_comunale_id = $request->consejo_comunal;
        $direccion->save();
        return view('proyectos.serviciocom.serviciocomcreate', compact('direccion'));
    }
    public function edit_direccion(Direccione $direccion){
        return view('proyecto.serviciocom.edit', compact('direccion'));
    }
    public function update_direccion(Request $request, Direccione $direccion){
        $request->validate([
            'estado' => 'required',
            'municipio' => 'required',
            'parroquia' => 'required',
            'comunidad' => 'required',
            'consejo_comunal' => 'required',
        ]);
        $direccion->update($request->all());
        return redirect()->route('index_comunitario', $direccion );
    }
    public function destroy_direccion(Direccione $direccion){
        $direccion->delete();
        return redirect()->route('index_comunitario');
    }
    public function search(Request $request){

        $texto = trim($request->get('texto'));
        $comunitarios = Proyecto_comunitario::Where('titulo','LIKE', '%'.$texto.'%')
                ->orWhere('codigo','LIKE', '%'.$texto.'%') 
                ->OrWhere('periodo','LIKE','%'.$texto.'%')
                ->orderBy('id','desc')
                ->paginate(12);

        
                $field_name = false;
                $category = false;
                $type = false;
                return view('proyectos.serviciocom.listarproyectos',[
                    'comunitarios' => $comunitarios,
                    'field_name' => $field_name,
                    'category' => $category,
                    'type' => $type,
                ]);

    }
    public function proyecto_list(){
        $comunitarios = Proyecto_comunitario::Paginate(12);
                
        $flag = false;
        foreach($comunitarios as $comunitario){
            if($comunitario->id){
                $flag = true;
            }else{
                $flag = false;
            }
        }
        
        if($flag == false){
            $notification = "No hay proyectos por listar ";
            return redirect()->route('index_comunitario')->with([
                'message' => $notification,  
            ]);
        }
        $category = false;
        $type = false;
        return view('proyectos.serviciocom.listarproyectos',compact('comunitarios'));
    }
    public function agregar_estudiante(){

    }
    public function documento(){
        $estudiantes = Estudiante::all();
        return view('proyectos.serviciocom.download', compact('estudiantes'));
    }
    public function descargar_pdf(){
        $estudiantes = Estudiante::all();
        view()->share('estudiantes', $estudiantes);
        $pdf = PDF::loadView('proyectos.serviciocom.download', compact('estudiantes'));
        return $pdf->download('certificado.pdf');
    }
}