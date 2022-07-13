<?php

namespace App\Http\Controllers\Sigecop;
use Illuminate\Support\Facades\Hash;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Controllers\Controller;
use  App\Models\Estudiante;
use  App\Models\Sigecop\Expediente;
use  App\Models\Sigecop\Documento;
use  App\Models\User;
use  App\Models\Document;
use  App\Models\Sigecop\Mensaje;
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
    
     public function my_profile(){

    }
     
    public function profile($id = null)

    {   
        //VALIDATE ROUTE PROFILE
        $user = Estudiante::where('id',$id)->first();
        if($user){
            $expediente = Expediente::where('estudiante_id', $id)->first();

            if($expediente){
                $documentos = Documento::where('expediente_id', $expediente->id)->get();
            }else{
                $documentos = null; 
            }
        }
        return view('recopasec.student.studentProfile',[
            'user' => $user,
            'expediente'=> $expediente,
            'documentos' => $documentos
        ]);

    }



    public function edit_profile()
    
    {        


          $this->middleware('isAdmin');


            $user = \Auth::user();

            $messi = explode('-', $user->telefono);
           
            if($messi[0]){
                $user->telefono =   $messi[1];
            }

      
            return view('recopasec.user.edit',[
                'user' => $user,
                'message' => ''
            ]);
    }

    public function update_profile(Request $request){

        // Conseguir el Usuario Identificado
        $user =  \Auth::user();
        $id = $user->id;
        $user->telefono = $request->input('codigo').'-'.$request->input('telefono');


        $user->update();

        return redirect()->route('home')
                        ->with(['message' => 'User Info Updated']);

    }

    public function change_password(Request $request){
        $user = \Auth::user();

        
        $password_confirm = $request->input('password_confirm');
        $oldPassword = $request->input('old_password');
        $newPassword = $request->input('new_password');


        if($newPassword != $password_confirm){
            return view('recopasec.user.edit',[
                'message' => 'Contraseñas no coinciden',
                'user' => $user,
                'danger' => true
            ]);
        }
        
        if(strlen($newPassword) < 7){
            return view('recopasec.user.edit',[
                'message' => 'ERROR: La contraseña debe ser >= 8 caracteres',
                'user' => $user,
                'success' => '',
                'danger' => true
            ]);

        }

        if($newPassword == $password_confirm) {
            $user->password = Hash::make($newPassword);
            $user->save();
            $notification = "Contraseña Actualizada ";
            return redirect()->route('home')->with([
                'message' => $notification,  
            ]); 
        } else {
            return view('recopasec.user.edit',[
                'message' => 'ERROR: La contraseña no pudo ser Actualizada',
                'user' => $user,
                'danger' => true,
                'success' => false
            ]); 
        }
    }
  
    public function notification(){
        $user =  \Auth::user();
        $message = Mensaje::where('usuario_id',$user->id)->get();
        if(!$message){
            return redirect()->route('home');

        }

 
        return view('recopasec.user.notification',[
            'notifications' => $message,
            'message' => 'null'
        ]);
    }
    
    public function students_list(){
        $user = \Auth::user();

        if ( $user == null || $user->rol != "USER"){
            return redirect()->route('home');
        }
        $users = Estudiante::Paginate(12);
                
                $field_name = 'Seleccione Estudiante para crearle un expediente';                 
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
        return view('recopasec.user.user-lists',[
            'users' => $users,
            'field_name' => $field_name,
            'type' => $type
        ]);
    }
    
}
