<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

use App\Administrativo;
use Auth;
use App\PublicacionAdmini;

class AdministrativoController extends Controller
{	

	use AuthenticatesUsers;

    //Cantidad de intentos antes de bloquear al usuario
     public $maxAttempts = 3;

    //Tiempo en minutos que durará el bloqueo
     public $decayMinutes = 1; 

	//filtro y recuperar la variable de usuario autentificado
	function __construct(){

		$this->middleware('auth:administrativos', ['only' => ['secret','getPosts']]);

	}

	protected function guard()
    {
        return Auth::guard('administrativos');
    }

    public function showLoginForm()
    {	
        return view('administrativo.login'); //Lugar donde esta el Login de administradores
    }

    public function authenticated(){

    	return redirect('administrativo/area');
    
    }

    public function secret() {
        

    	return view('administrativo.dashboard');
    	//'Hola ' .auth('admins')->user()->email;

    }

    public function getPosts(){

        $publicaciones = PublicacionAdmini::orderBy('id','DESC')->paginate(10);

        return view('administrativo.mensajes')->with('publicaciones', $publicaciones);
    }

    public function storeMensaje(Request $request) {
        //Instanciar objeto
        $publicacion = new PublicacionAdmini;
       
        $administrativoId = auth('administrativos')->user()->id;


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


        $publicacion->administrativo_id = $administrativoId;
        $publicacion->titulo = $titulo;
        $publicacion->contenido = $contenido;

        $publicacion->save();

        return redirect()->route('administrativos.posts')->with(['message'=>'Mensaje enviado.']);
    }

    public function deleteMessage($id){

        $publicacion = PublicacionAdmini::find($id);

        $publicacion->delete();

        return redirect()->route('administrativos.posts')->with(['message'=>'Mensaje eliminado.']);
    }


}
