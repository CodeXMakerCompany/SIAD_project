<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;

use App\Grupo;
use App\Carrera;
use App\Horario;
use App\Asignatura;
use App\Entrega_tarea;

class UserController extends Controller
{	

	public function __construct()
    {
        $this->middleware('auth');
    }

   	public function completarDatos(){

   		$grupos = Grupo::all();
   		$carreras = Carrera::all();
   		$horarios = Horario::all();

   		$id = Auth::id();


   		return view('user.completar')->with('grupos', $grupos)->with('id', $id)->with('horarios', $horarios)->with('carreras', $carreras);

   	}

   	public function updateDatos(Request $request){

   		//Conseguir usuario identificado
   		$user = \Auth::user();
   		$id = $user->id;

   		//validar datos
   		$validate = $this->validate($request, [
   			'grupo' => 'required',
   			'carrera' => 'required',
   			'horario' => 'required',
   		]);

   		//Recoger data del formulario
   		$grupo = $request->get('grupo');
   		$carrera = $request->get('carrera');
   		$horario = $request->get('horario');

   		//Asignar valores al objeto del usuario
   		$user->grupo_id = $grupo;
   		$user->horario_id =  $carrera;
   		$user->carrera_id =  $horario;

   		//Ejecutar consulta y cambios a la base de datos
   		
   		$user->update();

   		return redirect()->route('home')
   						 ->with(['message'=>'Sus datos han sido actualizados, bienvenido.']);
   		
   	}

   	public function miPerfil() {

   		//Conseguir el usuario identificado
   		$user = \Auth::user();

   		return view('user.profile')->with('user', $user);
   	}

   	public function updateFoto(Request $request) {

   		//Instancio mi usuario
   		$user = \Auth::user();

   		//Subir la imagen
   		
   		$foto_perfil = $request->file('foto');

   		if ($foto_perfil) {
   			//Poner nombre unico
   			$foto_perfil_name = time().$foto_perfil->getClientOriginalName();

   			//Guardar en el storage (app/users)
   			Storage::disk('users')->put($foto_perfil_name, File::get($foto_perfil));

   			//seteo el valor en mi session usuario
   			$user->foto = $foto_perfil_name;
   		}

   		$user->update();

   		return redirect()->route('user.profile')
   						 ->with(['message'=>'Su foto se ha subido con exito.']);
   	}

   	public function getImage($filename){
   		$file = Storage::disk('users')->get($filename);
   		return new Response($file, 200);
   	}

   	public function enviarTarea(){

   		//Instancio mi usuario
   		$user = \Auth::user();

   		$id = $user->id;

   		$asignaturas = Asignatura::all();

   		return view('user.tarea')->with('id', $id)->with('asignaturas', $asignaturas);

   	}

   	public function guardarTarea(Request $request) {

   		//Instanciar las entrega de tareas
   		$eTarea = new Entrega_tarea;
   		//Instancio mi usuario
   		$user = \Auth::user();

   		$id = $user->id;

         //validar datos
         $validate = $this->validate($request, [
            'tarea' => 'required|mimes:pdf|max:10000',
         ]);

   		//Recoger data del formulario
   		$asignatura = $request->get('asignatura');
   		$descripcion = $request->descripcion;
   		$archivo = $request->file('tarea');

   		//Subir el archivo
   		if ($archivo) {
   			//Poner nombre unico
   			$archivo_name = time().$archivo->getClientOriginalName();

   			//Guardar en el storage (app/users)
   			Storage::disk('tareas')->put($archivo_name, File::get($archivo));

   			//seteo el valor en mi session usuario
   			$eTarea->archivo = $archivo_name;
   		}

   		$eTarea->estudiante_id = $id;
   		$eTarea->asignatura_id = $asignatura;
   		$eTarea->descripcion = $descripcion;

   		$eTarea->save();

   		return redirect()->route('user.tarea')
   						 ->with(['message'=>'Su tarea ha sido enviada exitosamente']);  		
   	} 

}
