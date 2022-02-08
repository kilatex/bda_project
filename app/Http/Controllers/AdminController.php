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

class AdminController extends Controller
{

    public function create_admin()
    {
        
        $user = \Auth::user();
        if($user){
            return redirect()->route('home');
        }
        return view('admin.register');
        
  
    }
    
    public function register_admin(Request $request){

        $user = new User();
        // Validar Formulario
        $validate = $this->validate($request,[
            'name' => 'required|string|max:255',
            'surname' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email',
            'dni' => 'required|int|unique:users,dni',
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
        }

        $user->save();
        
        return redirect()->route('home');

    


    }

    public function users_list(){
        $user = \Auth::user();

        if($user->role != "ADMIN"){
            return redirect()->route('home');
        }

        $users = User::Where('role','USER')
                    ->join('documents','users.id', '=' , 'documents.user_id')
                    ->orderBy('users.id','desc')->paginate(12);

       
        
        
        return view('admin.user-lists',[
            'users' => $users
        ]);
    }



    public function user_docs($id){
        $id_user = $id;
        $user = User::Where('id',$id_user)->first();
        $docs = Document::where('user_id',$id_user)->first();


        return view('admin.user-docs',[
            'user' => $user,
            'docs' => $docs
        ]);
        
    }

    
    public function send_message(Request $request){
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

        $docs = Document::where('id',$docs_id)->first();
        $status = "DONE";

        $docs->update(['status'=>'DONE']);

        $notification = 'Documentos Aprobados';
        return redirect()->route('home')->with([
            'message' => $notification,  
        ]);

    }

    public function category_users(){
        return view('admin.category-users');
    }
}
