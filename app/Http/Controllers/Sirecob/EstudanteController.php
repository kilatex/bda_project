<?php

namespace App\Http\Controllers\Sirecob;
use App\Models\Sirecob\estudante;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Controllers\Controller;

class EstudanteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return estudante::get();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
     $estudante= new estudante;
     $estudante->create($request->all());
     
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\estudante  $estudante
     * @return \Illuminate\Http\Response
     */
    public function show($estudante)
    {    return estudante::find($estudante);
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\estudante  $estudante
     * @return \Illuminate\Http\Response
     */
    public function update (Request $request, $estudante )
    {  $est = estudante::find($estudante);
        $est->nombre=$request->nombre;
        $est->apellido=$request->apellido;
        $est->ci=$request->ci;
        $est->telefono=$request->telefono;
        $est->correo=$request->correo;
        $est->corte=$request->corte;
        $est->save();
        //$estudante->fill($request->post())->save();
       // $estudante->update($request->all());
        return $est;//response()->json(['Estudiante'=>$estudante]);
        
        
       
      
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\estudante  $estudante
     * @return \Illuminate\Http\Response
     */
    public function destroy($estudante)
    {
       $data =estudante::find($estudante);
       $data->delete();
    }
}
