<?php

namespace App\Http\Controllers\Sigecop;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use  App\Models\Estudiante;
use  App\Models\User;
use  App\Models\Sigecop\Expediente;
use  App\Models\Carrera;
use  App\Models\Message;
use  App\Models\Document;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{

    public function create_admin($code = 0)
    {
        return view('recopasec.admin.register',[
            'message' => null
        ]);

        $user = \Auth::user();
        if($user){
            return redirect()->route('home');
                }
            if($code == 20625196){
              
            }else{
                return redirect()->route('home');

            }
        

    }
    public function register_student_view($code = 0)
    {

        $user = \Auth::user();
        if($user){

            return view('recopasec.user.registerStudent',[
                'message' => null
            ]);
        }else{
            return redirect()->route('home');

        }
        

    } 
    public function register_admin(Request $request){

        $user = new User();
        // Validar Formulario
        $validate = $this->validate($request,[
            'cedula' => 'required|integer|unique:users,dni',
            'nombres' => 'required|string|max:255',
            'apellidos' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email',
            'password' => 'required|string',
            'password_confirmation' => 'required|string',
        ]);

        //Recoger Datos del Usuario
        $nombres = $request->input('nombres');
        $apellidos = $request->input('apellidos');
        $cedula = $request->input('cedula');
        $email = $request->input('email');
        $pass = $request->input('password');
        $rol = "ADMIN";
        $confirm_pass = $request->input('password_confirmation');

        if($pass == $confirm_pass){
            $user->nombres = $nombres;
            $user->apellidos = $apellidos;
            $user->cedula = $cedula;
            $user->email = $email;
            $user->rol = $rol;
            $user->password = hash::make($pass);
            $user->save();
            return redirect()->route('home');

        }else{
            $message = 'Registro incorrecto, por favor rellena bien los campos ';
            return view('recopasec.admin.register',[
                'message' => $message
            ]
            );

        }
    }
   
    public function register_student(Request $request){

        $user = new User();
        // Validar Formulario
        $validate = $this->validate($request,[
            'nombres' => 'required|string|max:255',
            'apellidos' => 'required|string|max:255',
            'email' => 'string|email|min:6|unique:users,email',
            'cedula' => 'required|integer|unique:users,cedula',
            'password' => 'nullable|string|min:6',
            'password_confirmation' => 'nullable|string|min:6',
            'carrera' => 'required'
        ]);

        //Recoger Datos del Usuario
        $user->nombres = $request->input('nombres');
        $user->apellidos = $request->input('apellidos');
        $user->cedula = $request->input('cedula');
        $user->rol = $request->input('rol');
        if( $request->input('email')){
            $user->email = $request->input('email');
        }

        if($request->input('password') == $request->input('password_confirmation')){
            $password = hash::make($request->input('password'));
        }
        else{   

            $message = 'Contraseñas no coinciden';
            return view('recopasec.user.registerStudent',[
                'message' => $message
            ]
            );
        }

        $user->save();
        $student = new Estudiante();
        $student->usuario_id = $user->id;
        $student->carrera_id = $request->input('carrera');
        $student->save();
        return redirect()->route('home');  


    }
    public function users_list(){
        $user = \Auth::user();
        if ( $user == null || $user->rol != "USER"){
            return redirect()->route('home');
        }

        $users = User::Where('role','USER')
                    ->orderBy('id','desc')->paginate(22);
        $flag = false;
        foreach($users as $user){
            if($user->id){
                $flag = true;

            }else{
                $flag = false;
            }
        }
        
        if($flag == false){

            $notification = "No hay usuarios para listar ";
            return redirect()->route('home')->with([
                'message' => $notification,  
            ]);
        }
        
        $field_name = false;
        $category = false;
        $type = false;
        return view('recopasec.admin.user-lists',[
            'users' => $users,
            'field_name' => $field_name,
            'category' => $category,
            'type' => $type
        ]);
    }



    public function user_docs($id){

        $user = \Auth::user();

        if ( $user == null || $user->rol != "USER"){
            return redirect()->route('home');
        }


        $id_user = $id;
        $user = User::Where('id',$id_user)->first();
        $docs = Document::where('user_id',$id_user)->first();

        return view('recopasec.admin.user-docs',[
            'user' => $user,
            'docs' => $docs
        ]);
        
    }

    
    public function send_message(Request $request){

        $user = \Auth::user();

        if ( $user == null || $user->rol != "USER"){
            return redirect()->route('home');
        }
        
        $docs_id = $request->input('document_id');
  
        $messages = Message::where('document_id',$docs_id)->first();

        if($messages == null){

            $validate = $this->validate($request,[
                'message' => 'required|string',
                'document_id' => 'required'
            ]);
            
            $message = new Message();
            $message->document_id = $request->input('document_id');
            $message->message = $request->input('message');
    
    
            $message->save();
    
            $notification = 'Observación Enviada';
            return redirect()->route('home')->with([
                'message' => $notification  
            ]);
        }else{
            $message = 'Ya Enviaste una Observación sobre estos documentos ';
            return redirect()->route('home')->with([
                'message' => $message
            ]);  
        }

    }

    public function pass_docs($docs_id){
        $user = \Auth::user();

        if ( $user == null || $user->role != "USER"){
            return redirect()->route('home');
        }
        $docs = Document::where('id',$docs_id)->first();
        $status = "DONE";

        $docs->update(['status'=>'DONE']);

        $notification = 'Documentos Aprobados';
        return redirect()->route('home')->with([
            'message' => $notification,  
        ]);

    }

    public function category_users(){
        $user = \Auth::user();

        if ( $user == null || $user->rol != "USER"){
            return redirect()->route('home');
        }

        $pregrado=DB::table('carreras')->get();
       

        return view('recopasec.admin.category-users', [
            'pregrados' => $pregrado        
        ]); 
    }
    
    public function searchByCarreer($id){
        $user = \Auth::user();
        if ( $user == null || $user->rol != "USER"){
            return redirect()->route('home');
        }

        $users = User::Where('pregrado_id','USER')
                    ->orderBy('id','desc')->paginate(12);
    }


    public function users_by_field( Request $request){

        $user = \Auth::user();
        $field = $request->input('field');
        $type = $request->input('type');

     
        if($user == null || $user->rol != "USER"){
            return redirect()->route('home');
        }


        $estudiantes = DB::table('estudiantes')
        ->join('users','users.id', '=' , 'estudiantes.usuario_id')
        ->join('carreras','carreras.id', '=' , 'estudiantes.carrera_id')
        ->where('carreras.id',$field)->paginate(10);
        $flag = 0;
        $field_name = false;
        $category = false;
        $i = 0;

        foreach($estudiantes as $estudiante){
            if($estudiante->id){
                $flag = true;
            }else{
                $flag = false;
            }
            $i++;
        }
        
        if($flag == false){
            $notification = "No hay usuarios para listar con este campo";
            return redirect()->route('home')->with([
                'message' => $notification,  
            ]);
        }
        

        return view('recopasec.admin.user-lists',[
            'users' => $estudiantes,
            'field_name' => $field_name,
            'category' => $category,
            'type' => $type 
        ]);
        
    }

    public function search(Request $request){

        $user = \Auth::user();
        if ( $user == null || $user->rol != "USER"){
            return redirect()->route('home');
        }

        $texto = trim($request->get('texto'));
        $users = User::Where('nombres','LIKE', '%'.$texto.'%')
                ->orWhere('cedula','LIKE', '%'.$texto.'%') 
                ->OrWhere('apellidos','LIKE','%'.$texto.'%')
                ->OrWhere('email','LIKE','%'.$texto.'%')
                ->orderBy('id','desc')
                ->paginate(12);

        
                $field_name = false;
                $category = false;
                $type = false;
                return view('recopasec.admin.user-lists',[
                    'users' => $users,
                    'field_name' => $field_name,
                    'category' => $category,
                    'type' => $type,
                ]);

    }

  

    public function expedientes_list(){
        $user = \Auth::user();

        if ( $user == null || $user->rol != "USER"){
            return redirect()->route('home');
        }
        $expedientes = Expediente::where('estado','En Progreso')->Paginate(12);                

        return view('recopasec.user.expedientes-list',[
            'expedientes' => $expedientes,
            'field_name' => 'Listado de Expedientes',
            'type' => ''
        ]);
    }

}
