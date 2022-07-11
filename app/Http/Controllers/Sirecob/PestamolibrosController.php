<?php

namespace App\Http\Controllers\Sirecob;

use App\Models\Sirecob\prestamo_libros;
use App\Models\Estudiante;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
class PestamolibrosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $prestamos = prestamo_libros::get();
        return view('sirecob/Prestamo_Libros/PrestamosLibros', compact('prestamos'));
    }
    
    public function EstadoPrestamo($id)
    {
        
        $editar = prestamo_libros::findOrfail($id);
        return view('sirecob/Prestamo_Libros/EditarPrestamo',compact('editar'));
    }
    public function librosEntregados()
    {   $prestamos = prestamo_libros::get();
        return view('sirecob/Prestamo_Libros/librosEntregados', compact('prestamos'));
        
    }
    public function libros_pendiente()
    {   $prestamos = prestamo_libros::get();
        return view('sirecob/Prestamo_Libros/entregaPendiente', compact('prestamos'));
        
    }
    
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $val_rbtn = $request->valBtnPrestamista;
        if ($val_rbtn == 'estudiante') {
            prestamo_libros::create([
                'libro_id' => $request->libro,
                'prestamista_est_id' => $request->estudiante,
                'fecha_entrega' => $request->FechaPrestamo,
                'fecha_prestamo' => $request->FechaPrestamo,
                'estado' => 'prestado',

            ]);
        } elseif ($val_rbtn == 'docente') {
            prestamo_libros::create([
                'libro_id' => $request->libro,
                'prestamista_doc_id' => $request->docente,
                'fecha_entrega' => $request->FechaPrestamo,
                'fecha_prestamo' => $request->FechaPrestamo,
                'estado' => 'prestado',

            ]);
                
        }
        return redirect('/Prestamos');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\prestamo_libros  $pestamolibros
     * @return \Illuminate\Http\Response
     */
    public function show(prestamo_libros  $pestamolibros)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\prestamo_libros   $pestamolibros
     * @return \Illuminate\Http\Response
     */
    public function EditarPrestamo($id)
    {
        $editar = prestamo_libros::findOrfail($id);
        return view('sirecob/Prestamo_Libros/EditarPrestamo',compact('editar'));
    }
    public function update(Request $request,   $pestamolibros)
    {
        $actualizar=prestamo_libros::findOrfail($pestamolibros);
        $actualizar ->estado =$request->estado;
        
        $actualizar->save();
        return redirect('/Prestamos');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\prestamo_libros   $pestamolibros
     * @return \Illuminate\Http\Response
     */
    public function destroy(prestamo_libros  $pestamolibros)
    {
        //
    }
}
