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

class SuperAdminController extends Controller
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
    
     public function register_user(){
        $user = \Auth::user();
        if($user->rol == "ADMIN"){
            return view('recopasec.admin.register',[
                'user' => $user,
            ]);
        }
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



    
  

    public function users_list(){
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
