<?php

namespace App\Http\Controllers;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;

use Illuminate\Http\Request;

use  App\Models\Message;
use  App\Models\User;
use  App\Models\Document;
use Illuminate\Support\Facades\DB;
class DocumentController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function upload()
    {
        return view('docs.upload');
    }

    public function select_user_to_new_file(){
        $user = \Auth::user();
        if ( $user == null || $user->rol != "USER"){
            return redirect()->route('home');
        }

        $users = User::Where('rol','USER')
                    ->orderBy('id','desc')->paginate(12);
    
        
        $field_name = 'Seleccione Estudiante para crearle un expediente';
        $crear_expediente = true;

        return view('admin.user-lists',[
            'users' => $users,
            'field_name' => $field_name,
            'crear_expediente' => $crear_expediente
        ]);

    }
    public function subir(Request $request){
        
        $user =  \Auth::user();
        $file = $request->file('file');
        $doc = $request->input('field');
        var_dump($doc);
        var_dump($file); 
     /*   
         if( $docs == null){
                //VALIDATE
                $validate = $this->validate($request,[
                    'planilla_datos_personales' => 'required|mimes:jpg,jpeg,bmp,png|max:5000',
                    'copia_cedula' => 'required|mimes:jpg,jpeg,bmp,png|max:5000',
                    'record_academico' => 'required|mimes:jpg,jpeg,bmp,png|max:5000',
                    'constancia_culminacion_servicio_comunitario' => 'required|mimes:jpg,jpeg,bmp,png|max:5000',
                    'acta_evaluacion_pasantias' => 'required|mimes:jpg,jpeg,bmp,png|max:5000', 
                    'certificado_pasantias' => 'required|mimes:jpg,jpeg,bmp,png|max:5000', 
                    'acta_defensa_trabajo_especial_grado' => 'required|mimes:jpg,jpeg,bmp,png|max:5000', 
                    'constancia_practicas_educativas' => 'required|mimes:jpg,jpeg,bmp,png|max:5000', 
                    'acta_pasantia_hospitalaria_comunitaria' => 'required|mimes:jpg,jpeg,bmp,png|max:5000', 
                    'certificado_pastantia_hospitalaria_comunitaria' => 'required|mimes:jpg,jpeg,bmp,png|max:5000', 
                    'comunicacion_adicional_casos_concretos' => 'required|mimes:jpg,jpeg,bmp,png|max:5000', 
                    'reconocimientos_amonestaciones' => 'required|mimes:jpg,jpeg,bmp,png|max:5000', 
                    'titulo_bachiller_fondonegro' => 'required|mimes:jpg,jpeg,bmp,png|max:5000', 
                    'copia_titulo_bachiller' => 'required|mimes:jpg,jpeg,bmp,png|max:5000', 
                    'copia_notas_certificadas_educacion_media' => 'required|mimes:jpg,jpeg,bmp,png|max:5000', 
                    'fotocopia_partida_nacimiento' => 'required|mimes:jpg,jpeg,bmp,png|max:5000', 
                    'planilla_rusni' => 'required|mimes:jpg,jpeg,bmp,png|max:5000', 
                    'planilla_din' => 'required|mimes:jpg,jpeg,bmp,png|max:5000', 
 
                ]);
        
                //GET DATA
                $path1 = $request->file('planilla_datos_personales');
                $path2 = $request->file('copia_cedula');
                $path3 = $request->file('record_academico');
                $path5 = $request->file('constancia_culminacion_servicio_comunitario');
                $path4 = $request->file('acta_evaluacion_pasantias');
                $path6 = $request->file('certificado_pasantias');
                $path7 = $request->file('acta_defensa_trabajo_especial_grado');
                $path8 = $request->file('constancia_practicas_educativas');
                $path9 = $request->file('acta_pasantia_hospitalaria_comunitaria');
                $path10 = $request->file('certificado_pastantia_hospitalaria_comunitaria');
                $path11 = $request->file('comunicacion_adicional_casos_concretos');
                $path12 = $request->file('reconocimientos_amonestaciones');
                $path13 = $request->file('titulo_bachiller_fondonegro');
                $path14 = $request->file('copia_titulo_bachiller');
                $path15 = $request->file('copia_notas_certificadas_educacion_media');
                $path16 = $request->file('fotocopia_partida_nacimiento');
                $path17 = $request->file('planilla_rusni');
                $path18 = $request->file('planilla_din');

                //CREATE OBJECT
                $user = \Auth::user();
                $document = new Document();
                $document->user_id = $user->id;
                $user_id = $user->id;
                $document->planilla_datos_personales = null;
                $document->copia_cedula = null;
                $document->record_academico = null;
                $document->constancia_culminacion_servicio_comunitario = null;
                $document->acta_evaluacion_pasantias = null;
                $document->status = "PENDING";
                
                //Post Image
                if($path1 && $path2 && $path3 && $path4 && $path6 && $path6 && $path7){

                    
                    //IMAGE 1
                    $image_path_name1 = time().$path1->getClientOriginalName();
                    Storage::putFileAs('/documents/'.$cedula,$path1, $image_path_name1);
                    $document->planilla_datos_personales = $image_path_name1;
                    
                    //IMAGE 2
                    $image_path_name2 = time().$path2->getClientOriginalName();
                    Storage::putFileAs('/documents/',$path2, $image_path_name2);
                    $document->copia_cedula = $image_path_name2;

                    //IMAGE 3
                    $image_path_name3 = time().$path3->getClientOriginalName();
                    Storage::putFileAs('/documents/',$path3, $image_path_name3);
                    $document->record_academico = $image_path_name3;

                    //IMAGE 4
                    $image_path_name4 = time().$path4->getClientOriginalName();
                    Storage::putFileAs('/documents/',$path4, $image_path_name4);
                    $document->constancia_culminacion_servicio_comunitario = $image_path_name4;

                    //IMAGE 5
                    $image_path_name5 = time().$path5->getClientOriginalName();
                    Storage::putFileAs('/documents/',$path5, $image_path_name5);
                    $document->acta_evaluacion_pasantias = $image_path_name5;

                        //IMAGE 6
                    $image_path_name6 = time().$path6->getClientOriginalName();
                    Storage::putFileAs('/documents/',$path6, $image_path_name6);
                    $document->certificado_pasantias = $image_path_name6;

                    //IMAGE 7
                    $image_path_name7 = time().$path7->getClientOriginalName();
                    Storage::putFileAs('/documents/',$path7, $image_path_name7);
                    $document->acta_defensa_trabajo_especial_grado = $image_path_name7;

                    //IMAGE 8
                    $image_path_name8 = time().$path8->getClientOriginalName();
                    Storage::putFileAs('/documents/',$path8, $image_path_name8);
                    $document->constancia_practicas_educativas = $image_path_name8;

                    //IMAGE 9
                    $image_path_name9 = time().$path9->getClientOriginalName();
                    Storage::putFileAs('/documents/',$path9, $image_path_name9);
                    $document->acta_pasantia_hospitalaria_comunitaria = $image_path_name9;

                    //IMAGE 10
                    $image_path_name10 = time().$path10->getClientOriginalName();
                    Storage::putFileAs('/documents/',$path10, $image_path_name10);
                    $document->certificado_pastantia_hospitalaria_comunitaria = $image_path_name10;

                    //IMAGE 11
                    $image_path_name11 = time().$path11->getClientOriginalName();
                    Storage::putFileAs('/documents/',$path11, $image_path_name11);
                    $document->comunicacion_adicional_casos_concretos = $image_path_name11;

                    //IMAGE 12
                    $image_path_name12 = time().$path12->getClientOriginalName();
                    Storage::putFileAs('/documents/',$path12, $image_path_name12);
                    $document->reconocimientos_amonestaciones = $image_path_name12;

                    //IMAGE 13
                    $image_path_name13 = time().$path13->getClientOriginalName();
                    Storage::putFileAs('/documents/',$path13, $image_path_name13);
                    $document->titulo_bachiller_fondonegro = $image_path_name13;

                    //IMAGE 14
                    $image_path_name14 = time().$path14->getClientOriginalName();
                    Storage::putFileAs('/documents/',$path14, $image_path_name14);
                    $document->copia_titulo_bachiller = $image_path_name14;

                    //IMAGE 15
                    $image_path_name15 = time().$path15->getClientOriginalName();
                    Storage::putFileAs('/documents/',$path15, $image_path_name15);
                    $document->copia_notas_certificadas_educacion_media = $image_path_name15;

                    //IMAGE 16
                    $image_path_name16 = time().$path16->getClientOriginalName();
                    Storage::putFileAs('/documents/',$path16, $image_path_name16);
                    $document->fotocopia_partida_nacimiento = $image_path_name16;

                    //IMAGE 17
                    $image_path_name17 = time().$path17->getClientOriginalName();
                    Storage::putFileAs('/documents/',$path17, $image_path_name17);
                    $document->planilla_rusni = $image_path_name17;

                    //IMAGE 18
                    $image_path_name18 = time().$path18->getClientOriginalName();
                    Storage::putFileAs('/documents/',$path18, $image_path_name18);
                    $document->planilla_din = $image_path_name18;


                    

                    


                }

                $document->save();
                $message = 'Documentos Subidos';
                return redirect()->route('home')->with([
                    'message' => $message
                ]);
        }else{
            $message = 'Ya Subiste tus documentos una vez';
            return redirect()->route('home')->with([
                'message' => $message
            ]);  
        }  */
        

    }
 
    public function getDoc($filename){
        $user =  \Auth::user();
        $id = $user->id;
      

        $file = Storage::disk('documents')->get($filename);
 
        return new Response($file,200);

    }   

    public function my_docs(){

        $user =  \Auth::user();
        $id = $user->id;
        $docs = Document::where('user_id',$id)->first();
       

        return view('docs.mydocs',[
            'docs' => $docs
        ]);

    }

    public function modify(){

        return view('docs.modify');
    }

    public function update_docs(Request $request){
        //GET INFO
        $document_type = $request->input('select_document');
        $file = $request->file('file_modify');
        $user = \Auth::user();
        $user_id = $user->id;
        
        
      

        // VALIDATE NEW DOCUMENT
        $validate = $this->validate($request,[
            'file_modify' => 'image',
        ]);


        //GET DOCUMENTS LIST
        $docs = Document::where('user_id',$user_id)->first();


        // DELETE 
        $url = "/documents/".$docs->$document_type;
        $docs->$document_type = null;


        
        Storage::delete($url);

        //SAVE
        $image_path_name = time().$file->getClientOriginalName();
        Storage::putFileAs('/documents/',$file, $image_path_name);
        $docs->$document_type = $image_path_name;

        $docs->update();
        
        //DELETE NOTIFICATION
        $message = Message::where('document_id',$docs->id)->first();

        $message->delete();
        

        $notification = 'Documento modificado';
        return redirect()->route('home')->with([
            'message' => $notification
        ]);  
    
     
    }
    
    
}
