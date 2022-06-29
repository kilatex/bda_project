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

class StudentController extends Controller
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
    
     
    public function profile($id = null)

    {   

        //VALIDATE ROUTE PROFILE
        $user = User::where('id',$id)->first();
        $user_auth = \Auth::user();
        if($user == null){

           
            return view('user.user',[
                'user' => $user_auth
            ]);

        }elseif ($user != null ){
                   
            return view('user.user',[
                'user' => $user
            ]);
        }else{
            return redirect()->route('home')
            ->with(['message' => 'Ruta Inválida']);
        }



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
                    'img_profile' => 'image|max:5000',
                    'dni' => 'required|int|unique:users,dni,'.$id,
                    'email' => 'required|string|email|max:255|unique:users,email,'.$id,
                ]);

               
        //Recoger Datos del Usuario
        $nombres = $request->input('nombres');
        $apellidos = $request->input('apellidos');
        $cedula = $request->input('cedula');
        $email = $request->input('email');
        $rol = "USER";

        // Asignar nuevos valores al objeto del usuario
        $user->cedula = $cedula;
        $user->nombres = $nombres;
        $user->apellidos = $apellidos;
        $user->email = $email;
        
        $user->rol = $rol;

        $user->update();

        return redirect()->route('profile')
                        ->with(['message' => 'User Info Updated']);

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
    
    public function students_list(){
        $user = \Auth::user();
        if ( $user == null || $user->role != "USER"){
            return redirect()->route('home');
        }

        $users = User::Where('role','USER')
                    ->orderBy('id','desc')->paginate(2);
                 
        $flag = false;
        foreach($users as $user){
            if($user->id){
                $flag = true;

            }else{
                $flag = false;
            }
        }
        
        if($flag == false){

            $notification = "No hay Estudiantes por listar ";
            return redirect()->route('home')->with([
                'message' => $notification,  
            ]);
        }
        
        $field_name = false;
        $category = false;
        $type = false;
        return view('admin.user-lists',[
            'users' => $users,
            'field_name' => $field_name,
            'type' => $type
        ]);
    }
    
}
