<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;

use  App\Models\User;
use  App\Models\Message;
use  App\Models\Document;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{

    public function create_admin($code = 0)
    {

        $user = \Auth::user();
        if($user){
            return redirect()->route('home');
        }
    if($code == 20625196){
        return view('admin.register',[
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
            'name' => 'required|string|max:255',
            'surname' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email',
            'dni' => 'required|integer|unique:users,dni',
            'password' => 'required|string',
            'password_confirmation' => 'required|string',
        ]);

        //Recoger Datos del Usuario
        $name = $request->input('name');
        $surname = $request->input('surname');
        $dni = $request->input('dni');
        $email = $request->input('email');
        $pass = $request->input('password');
        $role = "ADMIN";
        $confirm_pass = $request->input('password_confirmation');

        if($pass == $confirm_pass){
            $user->name = $name;
            $user->surname = $surname;
            $user->dni = $dni;
            $user->email = $email;
            $user->role = $role;
            $user->password = hash::make($pass);
            $user->save();
            return redirect()->route('home');

        }else{
            $message = 'Registro incorrecto, por favor rellena bien los campos ';
            return view('admin.register',[
                'message' => $message
            ]
            );  
        }

        
    


    }

    public function users_list(){
        $user = \Auth::user();
        if ( $user == null || $user->role != "USER"){
            return redirect()->route('home');
        }

        $users = User::Where('role','USER')
                    ->orderBy('id','desc')->paginate(12);
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
        return view('admin.user-lists',[
            'users' => $users,
            'field_name' => $field_name,
            'category' => $category,
            'type' => $type
        ]);
    }



    public function user_docs($id){

        $user = \Auth::user();

        if ( $user == null || $user->role != "USER"){
            return redirect()->route('home');
        }


        $id_user = $id;
        $user = User::Where('id',$id_user)->first();
        $docs = Document::where('user_id',$id_user)->first();

        return view('admin.user-docs',[
            'user' => $user,
            'docs' => $docs
        ]);
        
    }

    
    public function send_message(Request $request){

        $user = \Auth::user();

        if ( $user == null || $user->role != "USER"){
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

        if ( $user == null || $user->role != "USER"){
            return redirect()->route('home');
        }

        $pregrado=DB::table('pregrados')->get();
       

        return view('admin.category-users', [
            'pregrados' => $pregrado        
        ]); 
    }
    
    public function searchByCarreer($id){
        $user = \Auth::user();
        if ( $user == null || $user->role != "USER"){
            return redirect()->route('home');
        }

        $users = User::Where('pregrado_id','USER')
                    ->orderBy('id','desc')->paginate(12);
    }

    public function users_by_field( Request $request){

        $user = \Auth::user();
        $field = $request->input('field');
        $type = $request->input('type');

     
        if($user == null || $user->role != "USER"){
            return redirect()->route('home');
        }

        $users = User::where($type.'_id',$field)->paginate(4);
        $flag = 0;
        $field_name = false;
        $category = false;

        foreach($users as $user){
            if($user->id){
                $flag = true;
                $field_name = $user->$type->name;

                

                if($type == "pregrado"){
                    $category = "Carrera";
                }

                if($type == "postgrado"){
                    $category = "Postgrado";
                }

                if($type == "promocion"){
                    $category = "Promoción";
                }
                if($type == "periodo"){
                    $category = "Periodo De Ingreso";
                }

            }else{
                $flag = false;
            }
        }
       
        if($flag == false){

            $notification = "No hay usuarios para listar con este campo";
            return redirect()->route('home')->with([
                'message' => $notification,  
            ]);
        }
        

      
        return view('admin.user-lists',[
            'users' => $users,
            'field_name' => $field_name,
            'category' => $category,
            'type' => $type 
        ]);
        
    }

    public function search(Request $request){

        $user = \Auth::user();
        if ( $user == null || $user->role != "USER"){
            return redirect()->route('home');
        }

        $texto = trim($request->get('texto'));
        $users = User::Where('surname','LIKE', '%'.$texto.'%')
                ->orWhere('dni','LIKE', '%'.$texto.'%') 
                ->OrWhere('name','LIKE','%'.$texto.'%')
                ->OrWhere('email','LIKE','%'.$texto.'%')
                ->orderBy('id','desc')
                ->paginate(12);

        
                $field_name = false;
                $category = false;
                $type = false;
                return view('admin.user-lists',[
                    'users' => $users,
                    'field_name' => $field_name,
                    'category' => $category,
                    'type' => $type,
                ]);

    }

    public function expedientes(){
        $user = \Auth::user();
        if ( $user == null || $user->role != "USER"){
            return redirect()->route('home');
        }

        $users = User::Where('role','USER')
                    ->Where('status','PENDING')
                    ->join('documents','users.id', '=' , 'documents.user_id')

                    ->orderBy('users.id','desc')->paginate(12);
                 
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
        return view('admin.user-lists',[
            'users' => $users,
            'field_name' => $field_name,
            'category' => $category,
            'type' => $type
        ]);
    }



}
