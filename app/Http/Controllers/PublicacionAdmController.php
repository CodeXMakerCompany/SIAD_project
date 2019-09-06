<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use App\PublicacionAdm;

class PublicacionAdmController extends Controller
{
    use AuthenticatesUsers;

    //filtro para que solo la sesion de admin pueda ingresara las urls
    function __construct(){

        $this->middleware('auth:admins', ['only' => ['nuevoMensaje']
        ]);

    }

    public function nuevoMensaje(){

    	return view('admin.newMensaje');
    }

    public function storeMensaje(Request $request) {

    	//Instanciar objeto
    	$publicacion = new PublicacionAdm;

    	$adminId = auth('admins')->user()->id;

    	$titulo = $request->input('titular');

    	$contenido = $request->contenido;

    	$archivo = $request->file('imagen');

    	//Subir el archivo
   		if ($archivo) {
   			//Poner nombre unico
   			$archivo_name = time().$archivo->getClientOriginalName();

   			//Guardar en el storage (app/users)
   			Storage::disk('public')->put($archivo_name, File::get($archivo));

   			//seteo el valor en mi session usuario
   			$publicacion->imagen = $archivo_name;
   		}

    	$publicacion->admin_id = $adminId;
    	$publicacion->titulo = $titulo;
    	$publicacion->contenido = $contenido;

    	$publicacion->save();

    	return redirect()->route('admin.area')->with(['message'=>'Mensaje enviado.']);
    }

    public function getImage($filename) {
      $file = Storage::disk('public')->get($filename);
      return new Response($file, 200);
    }

    public function deleteMensaje($id) {

      $publicacion = PublicacionAdm::find($id);

      $publicacion->delete();

      return redirect()->route('admin.area')->with(['message'=>'Mensaje borrado.']);
    }

}
