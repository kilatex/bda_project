<?php

namespace App\Http\Controllers\Sirecob;
use App\Models\Sirecob\Libro;

use App\Models\Sirecob\Datos_libros;

use Illuminate\Http\Request;
use PhpParser\Node\Stmt\Return_;
use App\Http\Controllers\Controller;

use Illuminate\Support\Facades\DB;
class LibroController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        
       $libros = Libro::get();
       return view('sirecob/RegistroLibros',compact('libros'));
       
    }
    public function LibrosInactivos(){
        $libros = Libro::get();
       
        return view('sirecob/libros/LibrosInactivos',compact('libros'));
    }

    public function search(Request $request){

        

        $texto = trim($request->get('texto'));
        $users = Libro::Where('titulo','LIKE', '%'.$texto.'%')
        ->orWhereHas('Datos', function( $query ) use ( $request ){
            $query->where('autor', $request->texto);
        })
        ->orWhereHas('Datos', function( $query ) use ( $request ){
            $query->where('categoria', $request->texto);
        })
        ->orWhereHas('Datos', function( $query ) use ( $request ){
            $query->where('editorial', $request->texto);
        })
        ->orWhereHas('Datos', function( $query ) use ( $request ){
            $query->where('pais', $request->texto);
        })
        ->orWhereHas('Datos', function( $query ) use ( $request ){
            $query->where('edicion', $request->texto);
        })
                ->paginate(12);

        
                
                return view('sirecob/RegistroLibros',[
                    'libros' => $users,
                    
                ]);

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        

        $DatosLibro = new Datos_libros;
        $registro=$DatosLibro->create($request->all());
        
        
        Libro::create([
            'titulo' =>$request->titulo,
            'datos_libros_id' => $registro->id, 
            
        ]);
        $libros = Libro::get();
     
        //return view('RegistroLibros',compact('libros'));
        return redirect('/Registro_libros');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Libro  $libro
     * @return \Illuminate\Http\Response
     */
    public function show(Libro $libro)
    {
       return $libro;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Libro  $libro
     * @return \Illuminate\Http\Response
     */
    //Controller see data edit book
    public function EditBook($id)
    {
        $editar = Libro::findOrfail($id);
        return view('sirecob/libros/EditarLibros',compact('editar'));
    }
    public function update(Request $request, $libro)
    {
        //$DatosLibro = new Datos_libros;
        $actualizar=Datos_libros::findOrfail($libro);
        $actualizar ->categoria =$request->categoria;
        $actualizar ->cantidad =$request->cantidad;
        $actualizar ->editorial =$request->editorial;
        $actualizar ->year=$request->año;
        $actualizar ->pais=$request->pais;
        $actualizar ->edicion =$request->edicion;
        $actualizar ->categoria =$request->categoria;
        $actualizar ->autor =$request->autor;
        $actualizar->save();
        $actualiza2=Libro::findOrfail($libro);
        $actualiza2 ->titulo =$request->titulo;
        $actualiza2->save();
        /*
        Libro::create([
            'titulo' =>$request->titulo,
            'id_Datos_Libros' => $registro->id, 
            
        ]);
*/
//
         
         /*$actualizar ->nombre =$request->nombre;
         $actualizar ->correo =$request->correo;
         $actualizar ->edad =$request->edad;
         $actualizar->save();
         return back()->with('update','datos actualizados');*/
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Libro  $libro
     * @return \Illuminate\Http\Response
     */
    public function destroy(Libro $libro)
    {
        $actualizar=$libro;
        $actualizar->estado='inactivo';
        $actualizar->save();
        return $actualizar;
        //$libro->delete();
    }
}
