<?php

namespace App\Http\Controllers\Recopasec;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Estudiante;
use App\Models\Recopasec\Calificacion_proyecto_comunitario;
use App\Models\Recopasec\Direccione;
use App\Models\Recopasec\Proyecto_comunitario;
use App\Models\Recopasec\Estado;
use App\Models\Recopasec\Municipio;
use App\Models\Recopasec\Parroquia;
use App\Models\Recopasec\Tutor_comunitario;
use App\Models\Recopasec\Tutor_institucional;
use App\Models\User;
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
        
        $request->validate([
            'n_codigo' => 'required',
            'n_periodo'=>'required',
            'codigo'=> 'required|max:03',
            'titulo'=> 'required|max:255',
            'periodo'=> 'required',
            'calificacion'=>'required',
        ]);
        
        $comunitario = new Proyecto_comunitario();
        $calificacion= new Calificacion_proyecto_comunitario();
        //Recoger Datos del proyecto
        $comunitario->titulo = $request->titulo;
        $comunitario->codigo = $request->n_codigo.$request->codigo;
        $comunitario->periodo= $request->n_periodo.$request->periodo;
        $comunitario->tutor_comunitario_id = $tutorcomid;
        $comunitario->tutor_academico_id = $tutoracid;
        $calificacion->calificacion= $request->calificacion;
        $calificacion->proyecto_comunitario_id = $proyectoid;
        $comunitario->save();
        $calificacion->save(); 
                 
        return view('proyectos.serviciocom.agregar', compact('comunitario', 'calificacion'));
   
    }
    public function profile_se($id = null){   
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
            'titulo'=> 'required|max:255|unique:proyecto_comunitarios',
            'periodo'=> 'required',
        ]);
        $comunitario->update($request->all());
        return redirect()->route('index_comunitario');    
    } 
    public function destroy_comunitario(Proyecto_comunitario $comunitario, Calificacion_proyecto_comunitario $calificacion){
        $comunitario->delete();
        $calificacion->delete();
        return redirect()->route('index_comunitario');
    }
    public function create_direccion(Request $request){
        $estados = Estado::all();
        $municipios = Municipio::all();
        $parroquias = Parroquia::all();
        return view('proyectos.serviciocom.comunidad', compact('estados'), compact('municipios'), compact('parroquias'));
    }
    public function store_direccion(Request $request){
        $direccion = new Direccione();
        $request->validate([
            'estado' => 'required',
            'municipio' => 'required',
            'parroquia' => 'required',
            'comunidad' => 'required|max:100',
            'consejo_comunal' => 'required|max:100',
        ]);
        
        $direccion->estado_id = $request->estado;
        $direccion->municipio_id = $request->municipio;
        $direccion->parroquia_id = $request->parroquia;
        $direccion->comunidad = $request->comunidad;
        $direccion->consejo_comunal = $request->consejo_comunal;
        $direccion->save();
        return view('tutores.tutor_com.tutorcom', compact('direccion'));
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
        return redirect()->route('index_comunitario', compact('direccion') );
    }
    public function destroy_direccion(Direccione $direccion){
        $direccion->delete();
        return redirect()->route('index_comunitario');
    }
    public function search(Request $request){
        $texto = trim($request->get('texto'));
        $users = User::Where('nombres','LIKE', '%'.$texto.'%')
                ->orWhere('cedula','LIKE', '%'.$texto.'%') 
                ->OrWhere('apellidos','LIKE','%'.$texto.'%')
                ->OrWhere('email','LIKE','%'.$texto.'%')
                ->orderBy('id','desc')
                ->paginate(12);

        
                $field_name = false;
                $category = false;
                $type = false;
                return view('proyectos.serviciocom.listarproyecto', compact('users'), [
                    'field_name' => $field_name,
                    'category' => $category,
                    'type' => $type,
                ]);

    }
    public function show_proyectoserv($comunitario_id){
        $comunitario = Proyecto_comunitario::find($comunitario_id);

        return view('proyectos.serviciocom.myproyecto', compact('comunitario'));

    }
    public function agregar_estudiante(){
        
    }
    public function documento(){
        $estudiantes = User::all();
        return view('proyectos.serviciocom.download', compact('estudiantes'));
    }
    public function descargar_pdf(){
        $estudiantes = User::all();
        view()->share('estudiantes', $estudiantes);
        $pdf = PDF::loadView('proyectos.serviciocom.download', compact('estudiantes'));
        return $pdf->download('certificado.pdf');
    }
}