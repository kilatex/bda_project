<?php

namespace App\Http\Controllers\Sirecob;
use App\Models\ProyectoGrado;
use App\Models\DatosProyecto;
use App\Models\estudante;
use App\Models\Docente;
use App\Models\Tutor;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProyectoGradoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }
    public function vista_registro()
    {
        return view('sirecob/ProyectoGrado/registro_proyecto');
    }
    

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        /*
        $estudiate = new estudante;
        $registro_proyecto=$estudiate->create($request->all());
        */
        $datosproyecto = new DatosProyecto;
        $registro_proyecto=$datosproyecto->create($request->all());
//$registro_proyecto=DatosProyecto::create([]);
         
            
        
        ProyectoGrado::create([
            'Titulo' =>$request->Titulo,
            'id_autor' => 1, 
            'fecha_presentacion'=>'21-12-12',
            'id_datos_proyecto'=>$registro_proyecto->id,
            'Tipo_proyecto'=>1,
            
        ]);
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ProyectoGrado  $proyectoGrado
     * @return \Illuminate\Http\Response
     */
    public function show(ProyectoGrado $proyectoGrado)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ProyectoGrado  $proyectoGrado
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ProyectoGrado $proyectoGrado)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ProyectoGrado  $proyectoGrado
     * @return \Illuminate\Http\Response
     */
    public function destroy(ProyectoGrado $proyectoGrado)
    {
        //
    }
}
