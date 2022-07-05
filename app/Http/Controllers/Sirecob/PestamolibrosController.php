<?php

namespace App\Http\Controllers\Sirecob;
use App\Models\Pestamolibros;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PestamolibrosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $prestamos= Pestamolibros::get();
        return view('sirecob/Prestamo_Libros/PrestamosLibros',compact('prestamos'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $val_rbtn=$request->valBtnPrestamista;
        if($val_rbtn =='estudiante'){
            Pestamolibros::create([
                'id_Libro' =>$request->libro,
                'id_Prestamista_est' =>$request->estudiante, 
                'fecha_entrega'=>$request->FechaPrestamo,
    'fecha_prestamo'=>$request->FechaPrestamo,
    'estado_prestamo'=>'prestado',
                
            ]);
        }
        
        elseif ($val_rbtn =='docente') {
            return $val_rbtn;
        }
       
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Pestamolibros  $pestamolibros
     * @return \Illuminate\Http\Response
     */
    public function show(Pestamolibros $pestamolibros)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Pestamolibros  $pestamolibros
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Pestamolibros $pestamolibros)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Pestamolibros  $pestamolibros
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pestamolibros $pestamolibros)
    {
        //
    }
}
