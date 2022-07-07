<?php

namespace App\Http\Controllers\Sirecob;
use App\Models\Sirecob\Docente;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Controllers\Controller;

class DocenteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return Docente::get();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $docentes = new Docente ;
        
        $docentes->create($request->all());

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Docente  $docente
     * @return \Illuminate\Http\Response
     */
    public function show($docente)
    {
        return Docente::find($docente);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Docente  $docente
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request , $docente)
    {   
        $doc = Docente::find($docente);
        $doc->nombre=$request->nombre;
        $doc->apellido=$request->apellido;
        $doc->ci=$request->ci;
        $doc->telefono=$request->telefono;
        $doc->correo=$request->correo;
        
        $doc->save();
        //$estudante->fill($request->post())->save();
       // $estudante->update($request->all());
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Docente  $docente
     * @return \Illuminate\Http\Response
     */
    public function destroy($docente)
    {
        $data = Docente::find($docente);
        $data->delete();
    }
}
