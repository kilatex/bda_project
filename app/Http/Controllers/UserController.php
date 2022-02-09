<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;

use  App\Models\User;
use  App\Models\Document;
use  App\Models\Message;
use  App\Models\Periodo;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
      /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    
     
    public function profile($id)
    {
        $user_auth = \Auth::user();
        $user = User::where('id',$id)->first();
        if($user->id == $user_auth->id){
            $user = $user_auth;
        }
        
        return view('user.user',[
            'user' => $user
        ]);

    }



    public function edit_profile()
    
    {        


          $this->middleware('isAdmin');


            $user = \Auth::user();
            $periodos=DB::table('periodos')->get();
            $periodos_grado=DB::table('periodogrados')->get();
            $pregrado=DB::table('pregrados')->get();
            $postgrados=DB::table('postgrados')->get();
            $promociones=DB::table('promocions')->get();
    
      
            return view('user.edit',[
                'user' => $user,
                'periodos' => $periodos,
                'periodos_grado' => $periodos_grado,
                'pregrado' => $pregrado,
                'postgrados' => $postgrados,
                'promociones' => $promociones
            ]);
        
            
    }



    public function update_profile(Request $request){

                // Conseguir el Usuario Identificado
                $user =  \Auth::user();
                $id = $user->id;

                
                // Validar Formulario
                $validate = $this->validate($request,[
                    'name' => 'required|string|max:255',
                    'surname' => 'required|string|max:255',
                    'dni' => 'required|int|unique:users,dni,'.$id,
                    'email' => 'required|string|email|max:255|unique:users,email,'.$id,
                ]);

               
        //Recoger Datos del Usuario
        $name = $request->input('name');
        $surname = $request->input('surname');
        $dni = $request->input('dni');
        $email = $request->input('email');
        $periodo_ingreso = $request->input('periodo');
        $periodo_grado = $request->input('periodo_grado');
        $pregrado = $request->input('pregrado');

        $promocion = $request->input('promocion');

        $postgrado = $request->input('postgrado');
        $role = "USER";

        // Asignar nuevos valores al objeto del usuario
        $user->name = $name;
        $user->surname = $surname;
        $user->dni = $dni;
        $user->email = $email;
        
        $img = $request->file('img_profile');

        if($img != null){
            $image_path_name = time().$img->getClientOriginalName();
            Storage::putFileAs('/img-profile/',$img, $image_path_name);
            $user->img = $image_path_name;
        }

        if($periodo_ingreso != "Seleccione" && $periodo_ingreso != null){
            $user->periodo_id = $periodo_ingreso;
        }

        if($postgrado != "Seleccione" && $postgrado != null){
            $user->postgrado_id = $postgrado;
        }

        if($pregrado != "Seleccione" && $pregrado != null){
            $user->pregrado_id = $pregrado;
        }

        if($periodo_grado != "Seleccione" && $periodo_grado != null){
            $user->periodoGrado_id = $periodo_grado;
        }

        if($promocion != "Seleccione" && $promocion != null){
            $user->promocion_id = $promocion;
        }



        $user->role = $role;

        $user->update();

        return redirect()->route('profile')
                        ->with(['message' => 'User Info Updated']);

    }

    public function img_profile($filename){
        $user =  \Auth::user();
        $id = $user->id;
              $file = Storage::disk('img-profile')->get($filename);
 
        return new Response($file,200);
    }  

    public function notification(){
        $user =  \Auth::user();
        $user_id = $user->id;
        if($user_id){
            $document = Document::where('user_id',$user_id)->first();
        }else{
            $document = null;
            return redirect()->route('home');

        }
        if($document){

            $document_id = $document->id;
        }else{
            $document_id = null;
            return redirect()->route('home');
        }

        $message = Message::where('document_id',$document_id)->first();
 
        return view('user.notification',[
            'notification' => $message
        ]);
    }
    

    
}
