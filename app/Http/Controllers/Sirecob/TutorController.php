<?php

namespace App\Http\Controllers\Sirecob;
use App\Models\Tutor;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class TutorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Tutor::get();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $tutor= new Tutor;
     $tutor->create($request->all());
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Tutor  $tutor
     * @return \Illuminate\Http\Response
     */
    public function show( $tutor)
    {
        return Tutor::find($tutor);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Tutor  $tutor
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,  $tutor)
    {
        $tutor = Tutor::find($tutor);
        $tutor->nombre=$request->nombre;
        $tutor->apellido=$request->apellido;
        $tutor->ci=$request->ci;
        $tutor->telefono=$request->telefono;
        $tutor->correo=$request->correo;
        $tutor->cargo=$request->cargo;
        $tutor->institucion=$request->institucion;
        $tutor->save();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Tutor  $tutor
     * @return \Illuminate\Http\Response
     */
    public function destroy( $tutor)
    {
        $data =Tutor::find($tutor);
       $data->delete();
    }
}
