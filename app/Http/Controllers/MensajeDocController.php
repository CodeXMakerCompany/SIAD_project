<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\MensajeDoc;
use Illuminate\Foundation\Auth\AuthenticatesUsers;


use Auth;

class MensajeDocController extends Controller
{
	use AuthenticatesUsers;

	function __construct(){

		$this->middleware('auth:docentes');

	}

    public function storeMessage(Request $request){

    	$mensaje = new MensajeDoc();
   		//Aqui guardare el mensaje
   		//id usuario
   		$id = Auth::id();
   		$user = \Auth::user();
   		$email = $user->email;
   		$id_destinatario = $request->input('id_alumno');
   		$contenido = $request->contenido;


   		$mensaje->docente_id = $id;
   		$mensaje->destinatarioAlumno_id = $id_destinatario;
   		$mensaje->correo = $email;
   		$mensaje->contenido = $contenido;

   		$mensaje->save();
		     		
   		//Guardar
   		$mensaje->save();
			return redirect()->back()->with(['message'=>'Comentario enviado.']);
   		
   }

}
