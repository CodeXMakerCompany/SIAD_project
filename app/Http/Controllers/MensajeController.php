<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Mensaje;
use App\MensajeDoc;
use App\Docente;

class MensajeController extends Controller
{
   public function verContactos() {

	$docentes = Docente::all();

   	return view('mensaje.contactos')->with('docentes', $docentes);

   }

   public function chatUser($id_docente){

   		//id usuario
   		$id = Auth::id();

   		//id docente
   		$docente = Docente::find($id_docente);

   		//mensaje de los docentes en la session de usuarios
         $collectionDocentes = MensajeDoc::all();
         //mensaje
   		$collection = Mensaje::all();

      
      $mensajeDocente = $collectionDocentes->where('docente_id', '=', $id_docente);

		$mensajes = $collection->where('alumno_id', '=', $id);	

		$mensajes->all();

      $mensajeDocente->all();

   		return view('mensaje.chat')->with('id', $id)
   								   ->with('id_docente', $id_docente)
   								   ->with('docente', $docente)
   								   ->with('mensajes', $mensajes)
                              ->with('mensajeDocente', $mensajeDocente);
   }

   public function storeMessage(Request $request){

   		//Aqui guardare el mensaje
   		//id usuario
   		$id = Auth::id();
   		$user = \Auth::user();
   		$correo = $user->email;
   		$docente = (int)$request->get('docente');
   		//Validate
					  
   		//Add to db
   		$mensaje = new Mensaje();

   		//Remitente
   		$mensaje->alumno_id = $id;

   		//Contenido
   		$mensaje->contenido = $request->contenido;
   		$mensaje->correo = $correo;
   		
   		//Destinatario docente
   		$mensaje->destinatarioDocente_id = $docente;
   		

   		//Guardar
   		$mensaje->save();
			return redirect()->back()->with(['message'=>'Comentario enviado.']);
   		
   }



}
